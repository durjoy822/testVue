<template>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
              <Link href="/admin/dashboard" class="nav-link">Dashboard</Link>
            </li>
            <li class="nav-item">
              <Link href="/admin/users" class="nav-link">Users</Link>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <slot />   <!-- Page content এখানে আসবে -->
        </div>
      </div>
    </div>

    <footer class="main-footer">
      <strong>Admin Panel</strong>
    </footer>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>