<script setup>
import { useTheme } from '@/Composables/useTheme'
import Navbar from '@/Components/Navbar.vue'
import Toast from '@/Components/Toast.vue'

useTheme()
</script>

<template>
  <div class="min-h-screen bg-[var(--color-bg)]">
    <Navbar />
    <Toast />

    <main class="min-h-screen pt-16">
      <div class="p-4 sm:p-6 lg:p-8">
        <slot />
      </div>
    </main>
  </div>
</template>