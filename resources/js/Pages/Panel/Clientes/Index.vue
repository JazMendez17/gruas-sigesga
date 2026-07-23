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
  { key: 'telefono', label: 'Teléfono' },
  { key: 'email', label: 'Email' },
  { key: 'aseguradora', label: 'Aseguradora' },
  { key: 'poliza', label: 'Póliza' },
]

const clientes = [
  { nombre: 'Juan Pérez', telefono: '555-123-4567', email: 'juan@example.com', aseguradora: 'Seguros Atlas', poliza: 'POL-00124' },
  { nombre: 'María García', telefono: '555-234-5678', email: 'maria@example.com', aseguradora: 'GNP Seguros', poliza: 'POL-00123' },
  { nombre: 'Carlos López', telefono: '555-345-6789', email: 'carlos@example.com', aseguradora: 'Quálitas', poliza: 'POL-00122' },
  { nombre: 'Ana Martínez', telefono: '555-456-7890', email: 'ana@example.com', aseguradora: 'BBVA Seguros', poliza: 'POL-00121' },
  { nombre: 'Roberto Díaz', telefono: '555-567-8901', email: 'roberto@example.com', aseguradora: 'Seguros Atlas', poliza: 'POL-00120' },
  { nombre: 'Sofía Ramírez', telefono: '555-678-9012', email: 'sofia@example.com', aseguradora: 'GNP Seguros', poliza: 'POL-00119' },
  { nombre: 'Pedro Infante', telefono: '555-789-0123', email: 'pedro@example.com', aseguradora: 'Quálitas', poliza: 'POL-00118' },
  { nombre: 'Laura Torres', telefono: '555-890-1234', email: 'laura@example.com', aseguradora: 'AXA Seguros', poliza: 'POL-00117' },
]

const paginas = [1, 2, 3]
const paginaActual = ref(1)

const filtrados = computed(() => {
  if (!busqueda.value) return clientes
  const q = busqueda.value.toLowerCase()
  return clientes.filter(c =>
    c.nombre.toLowerCase().includes(q) ||
    c.telefono.includes(q) ||
    c.email.toLowerCase().includes(q) ||
    c.aseguradora.toLowerCase().includes(q)
  )
})
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Clientes</h1>
        <NeumorphicButton @click="alert('Funcionalidad: Nuevo Cliente')">
          + Nuevo Cliente
        </NeumorphicButton>
      </div>

      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div></div>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar cliente..."
          class="w-full sm:w-64"
        />
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="filtrados">
          <template #actions="{ row }">
            <div class="flex items-center gap-2">
              <button @click="router.visit(route('panel.clientes.show'))" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#4F46E5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
              <button @click="alert('Editar cliente: ' + row.nombre)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#059669]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
              </button>
            </div>
          </template>
        </DataTable>
      </div>

      <div class="flex items-center justify-center gap-2">
        <button class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEF2F7] text-gray-500 shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff] transition-all hover:text-gray-700">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button
          v-for="pag in paginas"
          :key="pag"
          @click="paginaActual = pag"
          class="flex h-10 w-10 items-center justify-center rounded-xl text-sm font-medium transition-all duration-200"
          :class="paginaActual === pag
            ? 'bg-[#4F46E5] text-white shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]'
            : 'bg-[#EEF2F7] text-gray-600 shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff] hover:text-gray-800'"
        >
          {{ pag }}
        </button>
        <button class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEF2F7] text-gray-500 shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff] transition-all hover:text-gray-700">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
      </div>
    </div>
  </AppLayout>
</template>
