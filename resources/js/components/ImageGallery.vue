<template>
    <main class="antialiased">
        <div class="w-1/4 bg-gray-lighter h-screen fixed p-6">
            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Category</h3>
                <div class='bg-white border border-gray-light rounded p-4 mb-2'>
                    <span class="font-futura uppercase text-sm">
                        Tees
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2'>
                    <span class="font-futura uppercase text-sm">
                        Hoodies
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2'>
                    <span class="font-futura font-normal uppercase text-sm">
                        Hats
                    </span>
                </div>
            </div>
            <div class="mb-8">
                <h3 class='font-bold mb-2 font-futura'>Print Method</h3>
                <div class='bg-white border border-gray-light rounded p-4 mb-2'>
                    <span class="font-futura font-normal uppercase text-sm">
                        Screenprinting
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2'>
                    <span class="font-futura font-normal uppercase text-sm">
                        Embroidery
                    </span>
                </div>
                <div class='bg-white border border-gray-light rounded p-4 mb-2 hover:bg-gray-100 cursor-pointer'>
                    <span class="font-futura font-normal uppercase text-sm">
                        Digital
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <h3 class='font-bold mb-2 font-futura'>Color Count</h3>
                <div class="container flex flex-wrap -mx-1">
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center">
                            <span class="font-futura font-normal uppercase text-sm">
                                1
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center">
                            <span class="font-futura font-normal uppercase text-sm">
                                2
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center">
                            <span class="font-futura font-normal uppercase text-sm">
                                3
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center">
                            <span class="font-futura font-normal uppercase text-sm">
                                4
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center cursor-pointer hover:bg-gray-100">
                            <span class="font-futura font-normal uppercase text-sm">
                                5
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center cursor-pointer hover:bg-gray-100">
                            <span class="font-futura font-normal uppercase text-sm">
                                6
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center cursor-pointer hover:bg-gray-100">
                            <span class="font-futura font-normal uppercase text-sm">
                                7
                            </span>
                        </div>
                    </div>
                    <div class='w-1/4 px-1 mb-2'>
                        <div class="bg-white border border-gray-light rounded p-4 text-center cursor-pointer hover:bg-gray-100">
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
                            <img :src="image.image_url">
                            <div class="border-gray-light border-l border-r border-b p-2">
                                {{ image.name }}
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
            imageArray: this.images
        }
    }
}
</script>