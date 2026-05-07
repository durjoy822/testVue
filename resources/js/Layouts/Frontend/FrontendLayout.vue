<template>
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <Link href="/" class="navbar-brand">MyWebsite</Link>
        <div class="navbar-nav">
          <Link href="/" class="nav-link">Home</Link>
          <Link href="/about" class="nav-link">About</Link>
          <Link href="/contact" class="nav-link">Contact</Link>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main>
      <slot />   <!-- Page content এখানে আসবে -->
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <p>© 2024 MyWebsite</p>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>