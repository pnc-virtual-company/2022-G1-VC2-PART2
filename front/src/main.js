import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './style.css'
import { createPinia } from 'pinia'
import vClickOutside from "click-outside-vue3"
createApp(App).use(createPinia()).use(router).use(vClickOutside).mount('#app')
