<template>
    <div>
        <input
        v-model="term"
        @change="search"
        type="search"
        class="border border-gray-light rounded-full w-full py-4 px-12 font-futura text-lg tracking-wide"
        placeholder="Search our catalog for terms like “screenprinting”, “foil”, or “hoodie”"
        >
    </div>

</template>

<script>
export default {
    data() {
        return {
            term: null
        }
    },
    methods: {
        search() {
            // if (this.term.length < 2) return;
            this.eventHub.$emit('search', this.term);
        },
        getExistingSearchTerm() {
            const urlParams = new URLSearchParams(window.location.search);
            this.term = urlParams.get('search');
        }
    },
    mounted() {
        this.getExistingSearchTerm();
    }
}
</script>