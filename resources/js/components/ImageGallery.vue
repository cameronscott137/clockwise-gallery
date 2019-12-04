<template>
    <main>
        <div class="flex items-center">
            <div class="container mx-auto px-4">

                <div class="mt-12 mb-10">
                    <input
                    v-model="term"
                    @change="this.searchImages"
                    type="search"
                    class="border border-gray-light rounded-full w-full py-4 px-12 font-futura text-lg tracking-wide focus:outline-none focus:border-green-400"
                    placeholder="Search our catalog for terms like “screenprinting”, “foil”, or “hoodie”"
                    >
                </div>

                <div class="container">
                    <div class="grid opacity-0">
                        <div class="grid-sizer"></div>
                        <image-gallery-item v-for="image in imageArray" :image="image" :key="image.id" :pagination="paginationCount"></image-gallery-item>
                    </div>

                    <div v-if="imageArray.length == 0" class="text-center mx-auto mb-10">
                        <div class="border border-gray-light rounded py-10 px-12">
                            <h2 class="font-futura font-bold text-3xl mb-3">Nothing in Our Gallery Matches Your Search</h2>
                            <p class="text-xl mb-6">That doesn't mean we can't make it, though.</p>
                            <a href="https://clockwise.io/contact" target="_blank" class="font-futura font-bold inline-block bg-green text-white hover:text-white px-8 py-4 text-lg rounded mb-2">
                                Tell Us What You Need
                            </a>
                            <a href="#" @click.prevent="clearSearch" class="block text-sm text-green">
                                Or search for something else
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </main>
</template>

<script>
import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';
import { mixin as clickaway } from 'vue-clickaway';
export default {
    mixins: [clickaway],
    props: ['images'],
    data() {
        return {
            domain: window.location.origin,
            imageArray: this.images,
            term: null,
            grid: null,
            masonry: null,
            paginationCount: 0,
            loading: false,
            canLoadMore: true,
        }
    },
    methods: {

        paginate() {
            this.paginationCount = this.paginationCount + 30;
            axios.post(`${window.location.origin}/paginate?offset=${this.paginationCount}`)
                .then(response => {
                    this.imageArray = this.imageArray.concat(response.data.images);
                    this.canLoadMore = response.data.load_more;

                    // Give Vue time to display the new images
                    setTimeout(() => {
                        this.reInitMasonry();
                    }, 500);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        searchImages() {

            if (this.term == "") this.clearSearch();

            if (this.grid) {
                this.grid.classList.add('opacity-0');
            }

            axios.post(`${window.location.origin}/search/?search=${this.term}`)
                .then(response => {
                    this.imageArray = response.data.images;
                    this.canLoadMore = false;

                    setTimeout(() => {
                        this.initMasonry();
                    }, 500);

                    window.history.pushState({}, '', `${window.location.origin}/?search=${this.term}`);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        initMasonry() {
            this.grid = document.querySelector('.grid');
            this.masonry = new Masonry(this.grid, {
                itemSelector: 'none', // select none at first
                columnWidth: '.grid-sizer',
                percentPosition: true,
                stagger: 30,
                visibleStyle: { transform: 'translateY(0)', opacity: 1 },
                hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
            });

            var self = this;
            imagesLoaded( this.grid, function() {
                self.grid.classList.remove('opacity-0');
                self.masonry.options.itemSelector = '.grid-item';
                var items = self.grid.querySelectorAll('.grid-item');
                self.masonry.appended( items );
                self.loading = true;
            });
        },

        reInitMasonry() {
            var self = this;
            var items = $(`.grid-item-${self.paginationCount}`);
            items.hide();
            imagesLoaded(items).on('progress', function(imgLoad, image) {
                var $item = $( image.img ).parents('.grid-item');
                $item.show();
                self.masonry.appended( $item );
            });

            imagesLoaded( items, function() {
                self.loading = true;
            });
        },

        getExistingSearchTerm() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('search')) {
                this.term = urlParams.get('search');
                this.searchImages();
                return;
            }

            this.initMasonry();
        },

        clearSearch() {
            window.location.href = window.location.origin;
        }

    },

    mounted() {

        this.getExistingSearchTerm();

        window.onscroll = () => {
            if (!this.canLoadMore) {
                return;
            }

            let documentHeight = document.documentElement["scrollHeight"] - document.documentElement["offsetHeight"];
            if (this.loading == true && (documentHeight - 3000 < document.documentElement.scrollTop)) {
                this.loading = false;
                this.paginate();
            }
        };
    }
}
</script>