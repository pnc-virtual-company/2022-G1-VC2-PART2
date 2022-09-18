// import { createApp } from 'vue'
// import App from './App.vue'
// import router from './router'
// import './style.css'
// import './axios-http'
// // import { createPinia } from 'pinia'
// import VueCookies from 'vue3-cookies'
// createApp(App).use(createPinia()).use(router).mount('#app')

import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import './axios-http'
import router from './router'
import VueCookies from 'vue3-cookies'
import middleware from "vue-router-middleware-system"
import {store} from './stores/store'



router.beforeEach(middleware({ store }))
const app = createApp(App)
app.use(store)
app.use(VueCookies)
app.use(router).mount('#app')

