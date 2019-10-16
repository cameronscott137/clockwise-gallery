require('./bootstrap');
window.Vue = require('vue');
Vue.component('image-gallery', require('./components/ImageGallery').default);

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
