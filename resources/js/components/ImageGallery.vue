<template>
    <main class="antialiased">
        <div class="w-1/4 bg-gray-lighter h-screen fixed pt-4 px-6 pb-6 overflow-scroll">

            <div class="text-center mb-8">
                <a :href="`${domain}`">
                    <img class="mx-auto w-16" :src="`${domain}/img/icon-logo.svg`">
                </a>
            </div>

            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Category</h3>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('tees')" :class="[selectedCategory == 'tees' ? 'border-green' : '']">
                    <span class="font-futura uppercase text-sm">
                        Tees
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('hoodies')" :class="[selectedCategory == 'hoodies' ? 'border-green' : '']">
                    <span class="font-futura uppercase text-sm">
                        Hoodies
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('hats')" :class="[selectedCategory == 'hats' ? 'border-green' : '']">
                    <span class="font-futura font-normal uppercase text-sm">
                        Hats
                    </span>
                </div>
            </div>
            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Print Method</h3>
                <div class='text-center bg-white border border-gray-light rounded p-4 mb-2 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('screenprinting')" :class="[selectedPrintMethod == 'screenprinting' ? 'border-green' : '']">
                    <img class="mx-auto w-12 lg:mr-3 lg:ml-0 mb-3 lg:mb-0" :src="`${domain}/img/icon-screenprinting.svg`">
                    <span class="block font-futura font-normal uppercase text-sm">
                        Screenprinting
                    </span>
                </div>
                <div class='text-center bg-white border border-gray-light rounded p-4 mb-2 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('embroidery')" :class="[selectedPrintMethod == 'embroidery' ? 'border-green' : '']">
                    <div class="mx-auto w-12 lg:mr-3 lg:ml-0">
                        <img class="mx-auto h-10 mb-3 lg:mb-0" :src="`${domain}/img/icon-embroidery.svg`">
                    </div>
                    <span class="block font-futura font-normal uppercase text-sm">
                        Embroidery
                    </span>
                </div>
                <div class='text-center bg-white border border-gray-light rounded p-4 mb-2 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('digital')" :class="[selectedPrintMethod == 'digital' ? 'border-green' : '']">
                    <img class="mx-auto w-12 lg:mr-3 lg:ml-0 mb-3 lg:mb-0 w-12" :src="`${domain}/img/icon-digital.svg`">
                    <span class="block font-futura font-normal uppercase text-sm">
                        Digital
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <h3 class='font-bold mb-2 font-futura'>Color Count</h3>
                <div class="container flex flex-wrap -mx-1">
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('1')" :class="[selectedColorCount == '1' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                1
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('2')"  :class="[selectedColorCount == '2' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                2
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('3')"  :class="[selectedColorCount == '3' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                3
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('4')"  :class="[selectedColorCount == '4' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                4
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('5')"  :class="[selectedColorCount == '5' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                5
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('6')"  :class="[selectedColorCount == '6' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                6
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('7')"  :class="[selectedColorCount == '7' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                7
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center hover:bg-gray-lightest cursor-pointer" @click="updateColorCount('8')"  :class="[selectedColorCount == '8' ? 'border-green' : '']">
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
                    <div v-for="image in imageArray" :key='image.id' class="md:w-1/2 xl:w-1/3 px-2 mb-8">
                        <a @click.prevent href="#" class="block rounded border border-gray-light hover:border-green">
                            <img :src="image.image_url">
                            <div class="">
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
export default {
    props: ['images'],
    data() {
        return {
            domain: window.location.origin,
            imageArray: this.images,
            selectedCategory: null,
            selectedPrintMethod: null,
            selectedColorCount: null,
        }
    },
    methods: {
        updateCategory(category) {
            if (this.selectedCategory == category) {
                this.selectedCategory = null;
            } else {
                this.selectedCategory = category;
            }
            this.updateImageList();
        },
        updatePrintMethod(printMethod) {
            if (this.selectedPrintMethod == printMethod) {
                this.selectedPrintMethod = null;
            } else {
                this.selectedPrintMethod = printMethod;
            }
            this.updateImageList();
        },
        updateColorCount(color) {
            if (this.selectedColorCount == color) {
                this.selectedColorCount = null;
            } else {
                this.selectedColorCount = color;
            }
            this.updateImageList();
        },
        updateImageList() {
            var searchString = this.buildSearchString();
            axios.post(`${window.location.origin}/search/?${searchString}`)
                .then(response => {
                    this.imageArray = response.data;
                    window.history.pushState({}, '', `${window.location.origin}/?${searchString}`);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        buildSearchString() {
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
            return string;
        },
        clearSearch() {
            this.selectedCategory = null;
            this.selectedPrintMethod = null;
            this.selectedColorCount = null;
            this.updateImageList();
        }
    },
    mounted() {

    }
}
</script>