<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import DataTable from '@/Components/DataTable.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'

const busqueda = ref('')

const columns = [
  { key: 'nombre', label: 'Nombre' },
  { key: 'nombre_comercial', label: 'Nombre Comercial' },
  { key: 'rfc', label: 'RFC' },
  { key: 'telefono', label: 'Teléfono' },
]

const aseguradoras = [
  { nombre: 'Seguros Atlas S.A. de C.V.', nombre_comercial: 'Seguros Atlas', rfc: 'SAT-990101-XXX', telefono: '555-111-2233' },
  { nombre: 'GNP Seguros S.A.B.', nombre_comercial: 'GNP Seguros', rfc: 'GNP-880202-XXX', telefono: '555-222-3344' },
  { nombre: 'Quálitas Compañía de Seguros', nombre_comercial: 'Quálitas', rfc: 'QCA-770303-XXX', telefono: '555-333-4455' },
  { nombre: 'BBVA Seguros S.A.', nombre_comercial: 'BBVA Seguros', rfc: 'BBS-660404-XXX', telefono: '555-444-5566' },
  { nombre: 'AXA Seguros S.A. de C.V.', nombre_comercial: 'AXA Seguros', rfc: 'AXA-550505-XXX', telefono: '555-555-6677' },
]

const filtrados = computed(() => {
  if (!busqueda.value) return aseguradoras
  const q = busqueda.value.toLowerCase()
  return aseguradoras.filter(a =>
    a.nombre.toLowerCase().includes(q) ||
    a.nombre_comercial.toLowerCase().includes(q) ||
    a.rfc.toLowerCase().includes(q)
  )
})
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Aseguradoras</h1>
        <NeumorphicButton @click="alert('Funcionalidad: Nueva Aseguradora')">
          + Nueva Aseguradora
        </NeumorphicButton>
      </div>

      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div></div>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar aseguradora..."
          class="w-full sm:w-64"
        />
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="filtrados">
          <template #actions="{ row }">
            <div class="flex items-center gap-2">
              <button @click="router.visit(route('panel.aseguradoras.show'))" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#4F46E5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
              <button @click="alert('Editar aseguradora: ' + row.nombre_comercial)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#059669]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
              </button>
            </div>
          </template>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
