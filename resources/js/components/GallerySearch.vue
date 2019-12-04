<template>
    <div>

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
            // this.eventHub.$emit('search', this.term);
        },
        getExistingSearchTerm() {
            const urlParams = new URLSearchParams(window.location.search);
            this.term = urlParams.get('search');
            this.eventHub.$emit('search', this.term);
        }
    },
    mounted() {

    }
}
</script>