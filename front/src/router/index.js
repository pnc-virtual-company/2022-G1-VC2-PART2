import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "@/views/HomeView"
import AlumniProfile from "@/views/Alumni/AlumniView"
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
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
