<template>
    <main>
        <div class="flex items-center">
            <div class="container mx-auto px-4">

                <gallery-search class="mt-12 mb-10"></gallery-search>

                <div class="container">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <image-gallery-item v-for="image in imageArray" :image="image" :key="image.id"></image-gallery-item>
                    </div>
                    <div v-if="imageArray.length == 0" class="text-center mx-auto">
                        <div class="border border-gray-light rounded py-6 px-12">
                            <h2 class="font-futura font-bold text-xl mb-3">Nothing in Our Gallery Matches Your Search</h2>
                            <p class="text-sm mb-6">That doesn't mean we can't make it, though.</p>
                            <a href="https://clockwise.io/contact" target="_blank" class="font-futura font-bold inline-block bg-green text-white px-6 py-3 rounded mb-2">
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
            grid: null,
            masonry: null,
            paginationCount: 0,
            canLoadMore: false,
            searchTerm: ''
            // selectedCategory: "all styles",
            // categoriesVisible: false,
            // selectedPrintMethod: "all print methods",
            // printMethodsVisible: false,
        }
    },
    methods: {
        updateImageList(term) {
            this.searchTerm = term;
            console.log('searching');
            axios.post(`${window.location.origin}/search/?search=${term}`)
                .then(response => {
                    this.imageArray = response.data;
                    console.log(`Term: ${term}`);
                    this.canLoadMore = false;
                    if (term == "") {
                        this.canLoadMore = true;
                    }
                    this.reInitMasonry();
                    window.history.pushState({}, '', `${window.location.origin}/?search=${term}`);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        initMasonry() {
            console.log('initMasonry');
            this.grid = document.querySelector('.grid');
            this.masonry = new Masonry( this.grid, {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true
            });

            var self = this;
            imagesLoaded(this.grid).on('progress', function() {
                self.masonry.layout();
                self.canLoadMore = true;
                // Start here tomorrow; shouldn't load if there's a search term.
            });
        },

        reInitMasonry() {
            console.log('reInitMasonry');
            this.masonry.reloadItems();

            var self = this;
            imagesLoaded(this.grid).on('progress', function() {
                self.masonry.layout();
            });
        },

        paginate() {
            console.log('paginate');
            this.canLoadMore = false;
            this.paginationCount = this.paginationCount + 30;
            var self = this;
            axios.post(`${window.location.origin}/search?offset=${this.paginationCount}`)
                .then(response => {
                    this.imageArray = this.imageArray.concat(response.data);
                    self.reInitMasonry();
                    self.canLoadMore = true;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.eventHub.$on('search', this.updateImageList);
        console.log(`canLoadMore: ${this.canLoadMore}`);
        this.initMasonry();
        window.onscroll = () => {
            let documentHeight = document.documentElement["scrollHeight"] - document.documentElement["offsetHeight"];
            if (this.canLoadMore == true && (documentHeight - 750 < document.documentElement.scrollTop)) {
                this.paginate();
            }
        };

    }
}
</script>