import { createRouter, createWebHistory } from 'vue-router'
// import HomeView from '@/views/frontend/Home.vue'
import Layout from '@/components/backend/Layout.vue'
import Dashboard from '@/views/backend/Dashboard.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   component: HomeView
    // },

    //Phần Đăng Nhập, Đăng Kí

    {
      path: '/admin',
      name: 'admin',
      component: () => import('@/views/backend/auth/Login.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/views/backend/auth/Register.vue')
    },

    //Phần Dashboard Quản Lý Admin

    {
      path: '/dashboard',
      name: 'dashboard.index',
      component: Dashboard
    },

    // Phần Thể Loại

    {
      path: '/theloai',
      name: 'theloai.index',
      component: () => import('@/views/backend/theloai/IndexTheLoai.vue')
    },

    {
      path: '/user',
      name: 'user.index',
      component: () => import('@/views/backend/users/IndexUser.vue')
    },
  ]
})

export default router
