<template>
  <!-- Begin page -->
   <!-- <img :src="asset('admin/assets/images/logo.png')" alt="Logo">
   <img :src="asset('admin/assets/images/logo.png')" alt="Logo"> -->
    <!-- END wrapper -->


     <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <admin-sidebar/>
        <!-- Sidenav Menu End -->
        

        <!-- Topbar Start -->
     
        <AdminNavbar />
        <!-- Topbar End -->

     

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">
                <div class="container-fluid">
                    <slot></slot>
                </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            2026 © Osen - By <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
</template>

<script setup>
import  {asset} from '@/importAsset/asset'
import { Link } from '@inertiajs/vue3'
import AdminNavbar from './AdminNavbar.vue';
import AdminSidebar from './AdminSidebar.vue';
</script>