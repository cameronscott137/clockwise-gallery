<template>
    <main class="antialiased">
        <div class="w-1/4 bg-gray-lighter h-screen fixed p-6 overflow-scroll">
            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Category</h3>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer' @click="updateImageList">
                    <span class="font-futura uppercase text-sm">
                        Tees
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer'>
                    <span class="font-futura uppercase text-sm">
                        Hoodies
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer'>
                    <span class="font-futura font-normal uppercase text-sm">
                        Hats
                    </span>
                </div>
            </div>
            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Print Method</h3>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 flex flex-wrap items-center hover:bg-gray-lightest cursor-pointer'>
                    <img class="w-12 mr-3" :src="`${domain}/img/icon-screenprinting.svg`">
                    <span class="font-futura font-normal uppercase text-sm">
                        Screenprinting
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 flex flex-wrap items-center hover:bg-gray-lightest cursor-pointer'>
                    <div class="w-12 mr-3">
                        <img class="h-10" :src="`${domain}/img/icon-embroidery.svg`">
                    </div>
                    <span class="font-futura font-normal uppercase text-sm">
                        Embroidery
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 flex flex-wrap items-center hover:bg-gray-lightest cursor-pointer'>
                    <img class="w-12 mr-3" :src="`${domain}/img/icon-digital.svg`">
                    <span class="font-futura font-normal uppercase text-sm">
                        Digital
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <h3 class='font-bold mb-2 font-futura'>Color Count</h3>
                <div class="container flex flex-wrap -mx-1">
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                1
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                2
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                3
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                4
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                5
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                6
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                7
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer">
                            <span class="font-futura font-normal uppercase text-sm">
                                8
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex items-center">
            <div class="w-3/4 p-10 ml-auto">
                <div class="container flex flex-wrap -mx-2">
                    <div v-for="image in imageArray" :key='image.id' class="w-1/2 px-2 mb-8">
                        <a :href="`${domain}/images/${image.id}`" class="hover:bg-green-500">
                            <img class='rounded-t' :src="image.image_url">
                            <div class="border-gray-light border-l border-r border-b rounded-b">
                                <div class="flex flex-wrap justify-between bg-gray-lighter p-2 text-xs uppercase">
                                    <span class='font-futura'>
                                        {{ image.print_method }}
                                    </span>
                                    <span class='font-futura'>
                                        {{ image.num_colors }} Color
                                    </span>
                                </div>
                                <div class="py-3 px-2">
                                    <p class="mb-0 text-sm font-futura">
                                        {{ image.name }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    props: ['images'],
    data() {
        return {
            domain: window.location.origin,
            imageArray: this.images,
            selectedCategory: "hats",
            selectedPrintMethod: null,
            selectedColorCount: null,
        }
    },
    methods: {
        updateImageList() {
            var searchString = this.buildUrl();
            axios.post(`${searchString}`)
                .then(response => {
                    this.imageArray = response.data;
                    window.history.pushState({}, '', searchString);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        buildUrl() {
            var string = `` ;
            if (this.selectedCategory) {
                string += `category=${this.selectedCategory}&`
            }
            if (this.selectedPrintMethod) {
                string += `print_method=${this.selectedPrintMethod}&`
            }
            if (this.selectedColorCount) {
                string += `color_count=${this.selectedColorCount}&`
            }
            if (string == '') {
                return `${window.origin}/styles`;
            }
            return `${window.location.origin}/search/?${string}`;
        }
    },
    mounted() {

    }
}
</script>