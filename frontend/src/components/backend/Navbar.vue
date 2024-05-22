<script setup>
</script>

<template>
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="" class="logo logo-dark">
                <router-link to="/dashboard">
                    <span class="logo-sm">
                        <img src="@/assets/backend/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="@/assets/backend/images/logo-dark.png" alt="" height="17">
                    </span>
                </router-link>
            </a>
            <!-- Light Logo-->
            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="@/assets/backend/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="@/assets/backend/images/logo-light.png" alt="" height="17">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="">
                            <i class="ri-honour-line"></i> <span data-key="t-widgets">
                                <router-link :to="{ name: 'theloai.index' }"> QL
                                    Thể Loại </router-link>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Tài khoản</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarPages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="pages-starter.html" class="nav-link" data-key="t-starter"> QL Nhóm
                                        Tài
                                        Khoản </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-key="t-starter">
                                        <router-link to="/admin/user"> QL Tài Khoản </router-link>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages-starter.html" class="nav-link" data-key="t-starter"> QL Quyền
                                        Tài
                                        Khoản </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="widgets.html">
                            <i class="ri-honour-line"></i> <span data-key="t-widgets">Cấu hình Web</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>

</template>

<style scoped></style>
