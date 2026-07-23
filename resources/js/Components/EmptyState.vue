<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  title: { type: String, default: 'Sin datos' },
  description: { type: String, default: 'No hay información disponible en este momento.' },
  action: { type: Object, default: null },
})
</script>

<template>
  <div class="neumorphic-raised rounded-3xl p-12 text-center bg-[#EEF2F7]">
    <div class="w-20 h-20 mx-auto mb-6 rounded-3xl bg-[#E8EDF2] flex items-center justify-center shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff]">
      <svg class="w-10 h-10 text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
      </svg>
    </div>
    <h3 class="text-lg font-semibold text-[#1F2937] mb-2">{{ title }}</h3>
    <p class="text-sm text-[#6B7280] mb-6 max-w-md mx-auto">{{ description }}</p>
    <Link
      v-if="action"
      :href="action.url"
      class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-2xl text-sm font-medium shadow-lg shadow-indigo-200"
    >
      {{ action.label }}
    </Link>
  </div>
</template>

<style scoped>
.neumorphic-raised {
  box-shadow: 8px 8px 16px #d0d5da, -8px -8px 16px #ffffff;
}
</style>
