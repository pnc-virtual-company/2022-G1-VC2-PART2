import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "../views/HomeView.vue"
import AlumniProfile from "../views/Alumni/AlumniView.vue"
const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/alumni-profile',
    name: 'alumni-profile',
    component: AlumniProfile
  },
  
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
