import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/frontend/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/backend/auth/Login.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/backend/auth/Register.vue')
    }
  ]
})

export default router
