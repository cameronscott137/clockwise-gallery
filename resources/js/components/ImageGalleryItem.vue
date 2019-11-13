<template>
    <div class="mb-8 px-2 w-full md:w-1/2 grid-item">
        <input class="absolute h-0 w-0" ref="clipboardInput" type="text" :value="`${domain}/gallery/${image.slug}`" readonly>
        <a :href="`${domain}/gallery/${image.slug}`" class="block rounded">
            <div class="absolute top-0 right-0 mr-4 z-40 mt-2 bg-black opacity-50 hover:opacity-100 p-2 rounded-full cursor-pointer" @click.prevent="copyLink">
                <svg width="19" height="19" xmlns="http://www.w3.org/2000/svg"><path d="M9.782 12.61a.396.396 0 01-.008.558l-4.526 4.525a.396.396 0 01-.558.008l-3.3-3.3a.396.396 0 01.008-.557l4.526-4.526a.396.396 0 01.558-.008l.825.825.565-.565-.825-.825c-.455-.456-1.205-.445-1.673.023L.849 13.294c-.469.468-.48 1.218-.024 1.673l3.3 3.3c.455.455 1.205.445 1.673-.024l4.526-4.525c.468-.469.479-1.218.023-1.674l-.825-.825-.565.566.825.825zM13.294.85L8.768 5.374c-.468.468-.479 1.218-.023 1.673l.825.825.565-.565-.825-.825a.396.396 0 01.008-.558l4.526-4.525a.396.396 0 01.557-.008l3.3 3.3a.396.396 0 01-.008.557l-4.525 4.526a.396.396 0 01-.558.008l-.825-.825-.566.565.825.825c.456.456 1.205.445 1.674-.023l4.525-4.526c.469-.468.48-1.218.024-1.673l-3.3-3.3C14.512.37 13.762.38 13.294.849zM5.877 12.665l6.788-6.788a.395.395 0 01.558-.008.395.395 0 01-.008.558l-6.788 6.788a.395.395 0 01-.558.008.395.395 0 01.008-.558z" fill="#FFF" fill-rule="evenodd"/></svg>
            </div>
            <img class="w-full" :src="image.small_image_url">
            <div class="pt-2 md:pt-3 mb-0 text-sm md:text-base leading-normal font-futura text-black" v-html="image.description">
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ['image'],
    data() {
        return {
            domain: window.location.origin,
        }
    },
    methods: {
        copyLink() {
            this.$refs.clipboardInput.select();
            document.execCommand("copy");
            this.$toasted.show("Link copied to clipboard", {
                theme: "",
                position: "bottom-right",
                className: "bg-green text-white rounded-full",
                type: "success",
                duration : 5000,
            });
        }
    }
}
</script>