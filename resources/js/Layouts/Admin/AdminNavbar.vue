<template>
   <header class="app-topbar">
            <div class="page-container topbar-menu">
                <div class="d-flex align-items-center gap-2">

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

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2">
                        <i class="ti ti-menu-deep fs-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="ti ti-menu-deep fs-22"></i>
                    </button>

                    <!-- Button Trigger Search Modal -->
                    <div class="topbar-search text-muted d-none d-xl-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                        <i class="ti ti-search fs-18"></i>
                        <span class="me-2">Search something..</span>
                        <span class="ms-auto fw-medium">⌘K</span>
                    </div>

                    <!-- Mega Menu Dropdown -->
                    <div class="topbar-item d-none d-md-flex">
                        <div class="dropdown">
                            <a href="#" class="topbar-link btn btn-link px-2 dropdown-toggle drop-arrow-none fw-medium" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-offset="0,17" aria-haspopup="false" aria-expanded="false">
                                Pages <i class="ti ti-chevron-down ms-1"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-xxl p-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <h5 class="mb-2 fw-semibold">UI Components</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a href="#!">Widgets</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/extended-dragula.html')">Dragula</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/ui-dropdowns.html')">Dropdowns</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/extended-ratings.html')">Ratings</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/extended-sweetalerts.html')">Sweet Alerts</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/extended-scrollbar.html')">Scrollbar</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/form-range-slider.html')">Range Slider</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="p-3">
                                            <h5 class="mb-2 fw-semibold">Applications</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a :href="asset('admin/apps-ecommerce-products.html')">eCommerce Pages</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/apps-hospital-doctors.html')">Hospital</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/apps-email.html')">Email</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/apps-calendar.html')">Calendar</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/apps-kanban.html')">Kanban Board</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/apps-invoices.html')">Invoice Management</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-pricing.html')">Pricing</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 bg-light bg-opacity-50">
                                        <div class="p-3">
                                            <h5 class="mb-2 fw-semibold">Extra Pages</h5>
                                            <ul class="list-unstyled megamenu-list">
                                                <li>
                                                    <a :href="asset('admin/pages-left-sidebar.html')">Left Sidebar with User</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-menu-collapsed.html')">Menu Collapsed</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-small-left-sidebar.html')">Small Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-new-header-style.html')">New Header Style</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-my-account.html')">My Account</a>
                                                </li>
                                                <li>
                                                    <a :href="asset('admin/pages-coming-soon.html')">Maintenance & Coming Soon</a>
                                                </li>
                                            </ul>
                                        </div> <!-- end .bg-light-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->
                            </div> <!-- .dropdown-menu-->
                        </div> <!-- .dropdown-->
                    </div> <!-- end topbar-item -->
                </div>

            </div>
        </header>
</template>

<script setup>
import  {asset} from '@/importAsset/asset'
import { Link } from '@inertiajs/vue3'
</script>