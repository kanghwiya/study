require('./bootstrap');

// vue 사용해서 App.vue 불러오기

import { createApp } from 'vue';
import router from '../js/router.js';
import store from '../js/store.js';
import AppComponent from '../components/AppComponent.vue';

createApp({
    components: {
        AppComponent,
    }
})
.use(router)
.use(store)
.mount('#app');