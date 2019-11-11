<template>
    <main>

        <!-- <div class="w-full fixed z-50 py-2 px-4 bg-white shadow">

            <div class="container mx-auto flex flex-wrap items-center ">
                <a :href="`${domain}`" class="block mr-10">
                    <img class="w-12" :src="`${domain}/img/icon-logo.svg`">
                </a>

                <div class="relative mr-8" style="width: 200px" v-on-clickaway="closeCategories">
                    <a class="font-futura flex text-sm items-center justify-between w-full uppercase p-2 border-b border-gray-light" href="#" @click.prevent="categoriesVisible = !categoriesVisible">
                        {{ selectedCategory }}
                        <svg class="block ml-5" width="9" height="5" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 5L8 1H1z" fill="#404040" stroke="#404040" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <div class="w-full bg-white absolute mt-2 shadow-lg" v-if="categoriesVisible">
                        <div class='border-b border-gray-light p-4 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('tees')" :class="[selectedCategory == 'tees' ? 'border-green' : '']">
                            <span class="font-futura uppercase text-sm">
                                Tees
                            </span>
                        </div>
                        <div class='border-b border-gray-light p-4 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('hoodies')" :class="[selectedCategory == 'hoodies' ? 'border-green' : '']">
                            <span class="font-futura uppercase text-sm">
                                Hoodies
                            </span>
                        </div>
                        <div class='border-b border-gray-light p-4 hover:bg-gray-lightest cursor-pointer' @click="updateCategory('hats')" :class="[selectedCategory == 'hats' ? 'border-green' : '']">
                            <span class="font-futura font-normal uppercase text-sm">
                                Hats
                            </span>
                        </div>
                    </div>
                </div>


                <div class="relative" style="width: 200px" v-on-clickaway="closePrintMethods">
                    <a class="font-futura text-sm flex items-center justify-between w-full uppercase p-2 border-b border-gray-light" href="#" @click.prevent="printMethodsVisible = !printMethodsVisible">
                        {{ selectedPrintMethod }}
                        <svg class="block ml-5" width="9" height="5" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 5L8 1H1z" fill="#404040" stroke="#404040" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <div class="w-full bg-white absolute mt-2 shadow-lg" v-if="printMethodsVisible">
                        <div class='text-center bg-white border-b border-gray-light p-4 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('screenprinting')" :class="[selectedPrintMethod == 'screenprinting' ? 'bg-gray-lightest border-green' : '']">
                            <img class="mx-auto w-10 lg:mr-3 lg:ml-0 mb-3 lg:mb-0" :src="`${domain}/img/icon-screenprinting.svg`">
                            <span class="block font-futura font-normal uppercase text-sm">
                                Screenprinting
                            </span>
                        </div>
                        <div class='text-center bg-white border-b border-gray-light p-4 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('embroidery')" :class="[selectedPrintMethod == 'embroidery' ? 'bg-gray-lightest border-green' : '']">
                            <div class="mx-auto w-10 lg:mr-3 lg:ml-0">
                                <img class="mx-auto h-10 mb-3 lg:mb-0" :src="`${domain}/img/icon-embroidery.svg`">
                            </div>
                            <span class="block font-futura font-normal uppercase text-sm">
                                Embroidery
                            </span>
                        </div>
                        <div class='text-center bg-white p-4 lg:flex lg:flex-wrap lg:items-center hover:bg-gray-lightest cursor-pointer' @click="updatePrintMethod('digital')" :class="[selectedPrintMethod == 'digital' ? 'bg-gray-lightest border-green' : '']">
                            <img class="mx-auto w-8 lg:mr-3 lg:ml-0 mb-3 lg:mb-0 w-12" :src="`${domain}/img/icon-digital.svg`">
                            <span class="block font-futura font-normal uppercase text-sm">
                                Digital
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mr-8">
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
            </div>
        </div> -->

        <div class="flex items-center">
            <div class="container mx-auto px-4">

                <gallery-search class="mt-12 mb-10"></gallery-search>

                <div class=" flex flex-wrap -mx-2">
                    <image-gallery-item v-for="image in imageArray" :image="image" :key="image.id"></image-gallery-item>
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
import { mixin as clickaway } from 'vue-clickaway';
export default {
    mixins: [clickaway],
    props: ['images'],
    data() {
        return {
            domain: window.location.origin,
            imageArray: this.images,
            selectedCategory: "all styles",
            categoriesVisible: false,
            selectedPrintMethod: "all print methods",
            printMethodsVisible: false,
        }
    },
    methods: {
        // updateCategory(category) {
        //     if (this.selectedCategory == category) {
        //         this.selectedCategory = "all styles";
        //     } else {
        //         this.selectedCategory = category;
        //     }
        //     this.updateImageList();
        // },
        // updatePrintMethod(printMethod) {
        //     if (this.selectedPrintMethod == printMethod) {
        //         this.selectedPrintMethod = "all print methods";
        //     } else {
        //         this.selectedPrintMethod = printMethod;
        //     }
        //     this.updateImageList();
        // },
        updateImageList(term) {
            // var searchString = this.buildSearchString();
            // debugger;
            axios.post(`${window.location.origin}/search/?search=${term}`)
                .then(response => {
                    this.imageArray = response.data;
                    window.history.pushState({}, '', `${window.location.origin}/?search=${term}`);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        // buildSearchString() {
        //     var string = `` ;
        //     if (this.selectedCategory) {
        //         string += `category=${this.selectedCategory}&`
        //     }
        //     if (this.selectedPrintMethod) {
        //         string += `print_method=${this.selectedPrintMethod}&`
        //     }
        //     return string;
        // },
        clearSearch() {
            this.selectedCategory = "all styles";
            this.selectedPrintMethod = "all print methods";
            this.updateImageList();
        },
        // closePrintMethods() {
        //     this.printMethodsVisible = false;
        // },
        // closeCategories() {
        //     this.categoriesVisible = false;
        // }
    },
    mounted() {
        this.eventHub.$on('search', this.updateImageList)
    }
}
</script>