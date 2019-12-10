<template>
        <li class="lg:px-6 relative list-none">
            <a class="hidden lg:block text-black font-futura uppercase text-base no-underline tracking-wider cursor-pointer" itemprop="url" @click="isVisible = !isVisible">Services</a>
            <ul class="sub-menu mt-2 block" :class="[isVisible ? '' : 'lg:hidden']">
                <li class="px-3 pb-3"><a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="http://clockwise-marcomm.cscott.webfactional.com/screenprinting/" itemprop="url">Screenprinting</a></li>
                <li class="px-3 pb-3"><a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="http://clockwise-marcomm.cscott.webfactional.com/embroidery/" itemprop="url">Embroidery</a></li>
                <li class="px-3 pb-3"><a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="http://clockwise-marcomm.cscott.webfactional.com/digital/" itemprop="url">Digital</a></li>
                <li class="px-3 pb-3 lg:pb-0"><a class="text-black font-futura uppercase text-base no-underline tracking-wider" href="http://clockwise-marcomm.cscott.webfactional.com/fulfillment/" itemprop="url">Fulfillment</a></li>
            </ul>
        </li>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';
export default {
    mixins: [clickaway],
    data() {
        return {
            isVisible: false
        }
    },
    methods: {
        close() {
            this.isVisible = false;
        }
    }
}
</script>