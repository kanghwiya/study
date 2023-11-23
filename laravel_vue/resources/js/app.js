require('./bootstrap');

// vue 사용해서 App.vue 불러오기

import { createApp } from 'vue';
import App from '../components/App.vue';

createApp({
    components: {
        App,
    }
}).mount('#app');