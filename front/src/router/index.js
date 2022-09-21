import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "../views/HomeView.vue"
import AlumniProfile from "../views/Alumni/AlumniView.vue"
import LoginView from '../views/Authentication/LoginView.vue'
import ForgotView from '../views/Resetpassword/ForgotPW.vue'
import RegisterView from '../views/Authentication/RegisterView.vue'
import AdminExplore from '../views/Admin/AdminView.vue'
import ManageUser from '../views/Admin/ManageUserView.vue'
// import EroView from '../views/Ero/EroView.vue'
import ManageAlumni from '../views/Ero/ManageAlumniView.vue'
import user from '../middleware/user'
import ero from '../middleware/ero'
import { store } from '../stores/store'
import admin from '../middleware/admin'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta:{ middleware: [user] }
  },
  {
    path: '/alumni-profile',
    name: 'alumni-profile',
    component: AlumniProfile,
    meta:{ middleware: [user] }
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterView,
  },
  {
    path: '/forgot',
    name: 'forgot',
    component: ForgotView,
  },
  {
    path: '/explore',
    name: 'explore',
    component: AdminExplore,
    meta:{ middleware: [admin] }
  },
  {
    path: '/admin-manage',
    name: 'admin-manage',
    component: ManageUser,
    meta:{ middleware: [admin] }
  },
  {
    path: '/ero-explore',
    name: 'ero-explore',
    component: AdminExplore,
    meta:{ middleware: [ero] }
  },
  {
    path: '/ero-manage',
    name: 'ero-manage',
    component: ManageAlumni,
    meta:{ middleware: [ero] }
  },
  { path: '/:pathMatch(.*)*', redirect: '/' }  
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach(async (to) => {
  const publicPages = ['/login', '/forgot','/register',];
  const authRequired = !publicPages.includes(to.path);
  if (authRequired && !store.state.token) {
    return '/login';
  }
});

export default router
