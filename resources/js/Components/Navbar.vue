<script setup>
import { inject, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)
const toggleSidebar = inject('toggleSidebar', () => {})

function logout() {
  router.post(route('logout'))
}
</script>

<template>
  <header class="fixed top-0 right-0 left-0 lg:left-64 z-30 bg-[var(--color-bg)]/80 backdrop-blur-md">
    <div class="flex items-center justify-between px-4 sm:px-6 h-16">
      <button @click="toggleSidebar" class="lg:hidden neumorphic-raised p-2 rounded-xl">
        <svg class="w-6 h-6 text-[var(--color-text)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <div class="hidden lg:block"></div>

      <div class="flex items-center gap-4">
        <button class="neumorphic-raised p-2 rounded-xl relative">
          <svg class="w-5 h-5 text-[var(--color-text)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] rounded-full flex items-center justify-center">3</span>
        </button>

        <div class="flex items-center gap-3 neumorphic-raised rounded-2xl px-4 py-2">
          <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-sm font-semibold" :style="{ backgroundColor: 'var(--color-primary)' }">
            {{ user?.name?.charAt(0) || 'U' }}
          </div>
          <div class="hidden sm:block">
            <p class="text-sm font-medium text-[var(--color-text)]">{{ user?.name || 'Usuario' }}</p>
            <p class="text-xs text-[var(--color-text)] opacity-60 capitalize">{{ user?.rol || '' }}</p>
          </div>
        </div>

        <button @click="logout" class="neumorphic-raised p-2 rounded-xl">
          <svg class="w-5 h-5 text-[var(--color-text)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
        </button>
      </div>
    </div>
  </header>
</template>

<style scoped>
.neumorphic-raised {
  box-shadow: 4px 4px 8px var(--neumorphic-dark, #d0d5da), -4px -4px 8px var(--neumorphic-light, #ffffff);
}
</style>
