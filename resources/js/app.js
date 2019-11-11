require('./bootstrap');

window.Vue = require('vue');
Vue.component('image-gallery', require('./components/ImageGallery').default);
Vue.component('image-gallery-item', require('./components/ImageGalleryItem').default);
Vue.component('gallery-search', require('./components/GallerySearch').default);

import Toasted from 'vue-toasted';
Vue.use(Toasted)

var eventHub = new Vue();
Vue.mixin({
    data: function () {
        return {
            eventHub: eventHub
        };
    }
});

const app = new Vue({
    el: '#app'
});
