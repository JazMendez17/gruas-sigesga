<script setup>
import { ref } from 'vue'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import Badge from '@/Components/Badge.vue'

const integraciones = ref([
  {
    provider: 'WhatsApp',
    icon: 'M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z',
    activo: true,
    configurado: true,
  },
  {
    provider: 'Gmail',
    icon: 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
    activo: false,
    configurado: false,
  },
  {
    provider: 'Google Maps',
    icon: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
    activo: true,
    configurado: true,
  },
])

function toggleActivo(index) {
  integraciones.value[index].activo = !integraciones.value[index].activo
}
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Integraciones</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
        <div
          v-for="(item, i) in integraciones"
          :key="item.provider"
          class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4"
        >
          <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#E8EDF2] shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]">
              <svg class="h-7 w-7 text-[#4F46E5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="item.icon" /></svg>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-800">{{ item.provider }}</h3>
              <Badge :variant="item.configurado ? 'success' : 'neutral'">{{ item.configurado ? 'Configurado' : 'Sin configurar' }}</Badge>
            </div>
          </div>

          <div class="flex items-center justify-between">
            <span class="text-sm text-gray-600">Activo</span>
            <button
              @click="toggleActivo(i)"
              class="relative h-7 w-12 rounded-full transition-colors duration-200"
              :class="item.activo ? 'bg-indigo-500' : 'bg-gray-300'"
            >
              <span
                class="absolute left-0.5 top-0.5 h-6 w-6 rounded-full bg-white shadow transition-transform duration-200"
                :class="item.activo ? 'translate-x-5' : 'translate-x-0'"
              ></span>
            </button>
          </div>

          <NeumorphicButton variant="secondary" class="w-full" @click="alert('Configurar integración: ' + item.provider)">Configurar</NeumorphicButton>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
