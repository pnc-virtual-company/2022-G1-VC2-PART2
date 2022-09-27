
import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import './axios-http'
import router from './router'
import VueCookies from 'vue3-cookies'
import middleware from "vue-router-middleware-system"
import {store} from './stores/store'
import vClickOutside from "click-outside-vue3"

router.beforeEach(middleware({ store }))
const app = createApp(App)
app.use(store)
app.use(VueCookies)
app.use(vClickOutside)
app.use(router).mount('#app')

