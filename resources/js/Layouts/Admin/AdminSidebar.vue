<template>
    <div class="sidenav-menu">

        <!-- Brand Logo -->
        <a href="index.html" class="logo">
            <span class="logo-light">
                <span class="logo-lg"><img :src="asset('admin/assets/images/logo.png')" alt="logo"></span>
                <span class="logo-sm"><img :src="asset('admin/assets/images/logo-sm.png')" alt="small logo"></span>
            </span>

            <span class="logo-dark">
                <span class="logo-lg"><img :src="asset('admin/assets/images/logo-dark.png')" alt="dark logo"></span>
                <span class="logo-sm"><img :src="asset('admin/assets/images/logo-sm.png')" alt="small logo"></span>
            </span>
        </a>

        <!-- Sidebar Hover Menu Toggle Button -->
        <button class="button-sm-hover">
            <i class="ti ti-circle align-middle"></i>
        </button>

        <!-- Full Sidebar Menu Close Button -->
        <button class="button-close-fullsidebar">
            <i class="ti ti-x align-middle"></i>
        </button>

        <div data-simplebar>

            <!--- Sidenav Menu -->
            <ul class="side-nav">
                <li class="side-nav-title">Dash</li>

                <li class="side-nav-item">
                    <Link :href="route('admin.dashboard.index')" class="side-nav-link">
                        <span class="menu-icon">
                            <i class="ti ti-dashboard"></i>
                        </span>

                        <span class="menu-text">
                            Dashboard
                        </span>
                    </Link>
                </li>

                <li class="side-nav-item">
                    <Link :href="route('admin.dashboard.users')" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-building-hospital"></i></span>
                        <span class="menu-text"> User </span>
                    </Link>
                </li>

                <li class="side-nav-item">
                    <a href="dashboard-wallet.html" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-wallet"></i></span>
                        <span class="menu-text"> eWallet </span>
                        <span class="badge p-0 menu-alert fs-16 text-danger">
                            <i class="ti ti-info-triangle" data-bs-html="true" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="tooltip-warning"
                                data-bs-title="Your wallet balance is <b>low!</b>"></i>
                        </span>
                    </a>
                </li>


            </ul>



            <div class="clearfix"></div>
        </div>
    </div>
</template>

<script setup>
import { asset } from '@/importAsset/asset'
import { Link } from '@inertiajs/vue3'
</script>