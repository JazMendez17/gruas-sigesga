<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import DataTable from '@/Components/DataTable.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import Badge from '@/Components/Badge.vue'

const busqueda = ref('')
const filtroActivo = ref('todos')

const columns = [
  { key: 'marca', label: 'Marca' },
  { key: 'tipo', label: 'Tipo' },
  { key: 'modelo', label: 'Modelo' },
  { key: 'placas', label: 'Placas' },
  { key: 'no_economico', label: 'No. Económico' },
  { key: 'seguro_vence', label: 'Seguro Vence' },
  { key: 'activo', label: 'Activo' },
  { key: 'operador', label: 'Operador' },
]

const unidades = [
  { marca: 'Freightliner', tipo: 'Grúa Ligera', modelo: 'M2 106', placas: 'GRA-1234', no_economico: 'U-001', seguro_vence: '15 Dic 2026', activo: true, operador: 'Roberto Méndez' },
  { marca: 'Peterbilt', tipo: 'Grúa Pesada', modelo: '389', placas: 'GRB-5678', no_economico: 'U-002', seguro_vence: '10 Ene 2027', activo: true, operador: 'Laura Torres' },
  { marca: 'Kenworth', tipo: 'Arrastre', modelo: 'T680', placas: 'GRC-9012', no_economico: 'U-003', seguro_vence: '05 Feb 2027', activo: true, operador: 'Pedro Sánchez' },
  { marca: 'Ford', tipo: 'Plataforma', modelo: 'F-550', placas: 'GRD-3456', no_economico: 'U-004', seguro_vence: '20 Mar 2027', activo: false, operador: null },
  { marca: 'International', tipo: 'Grúa Ligera', modelo: '4300', placas: 'GRE-7890', no_economico: 'U-005', seguro_vence: '01 Abr 2027', activo: true, operador: 'Sofía Ramírez' },
  { marca: 'Chevrolet', tipo: 'Panel', modelo: 'Silverado 3500', placas: 'GRF-1112', no_economico: 'U-006', seguro_vence: '12 May 2027', activo: false, operador: null },
]

const filtradas = computed(() => {
  let data = unidades
  if (filtroActivo.value === 'activos') data = data.filter(u => u.activo)
  if (filtroActivo.value === 'inactivos') data = data.filter(u => !u.activo)
  if (busqueda.value) {
    const q = busqueda.value.toLowerCase()
    data = data.filter(u => u.marca.toLowerCase().includes(q) || u.placas.toLowerCase().includes(q) || u.no_economico.toLowerCase().includes(q))
  }
  return data
})
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Unidades</h1>
        <NeumorphicButton @click="alert('Formulario: Nueva Unidad')">+ Nueva Unidad</NeumorphicButton>
      </div>

      <div class="flex flex-wrap gap-2 items-center">
        <button
          v-for="f in ['todos', 'activos', 'inactivos']"
          :key="f"
          @click="filtroActivo = f"
          class="rounded-xl px-5 py-2 text-sm font-medium capitalize transition-all duration-200"
          :class="filtroActivo === f
            ? 'bg-[#EEF2F7] text-[#4F46E5] shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]'
            : 'bg-transparent text-gray-500 hover:text-gray-700'"
        >
          {{ f === 'todos' ? 'Todos' : f }}
        </button>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar unidad..."
          class="w-full sm:w-64 ml-auto"
        />
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="filtradas">
          <template #cell-activo="{ row }">
            <Badge :variant="row.activo ? 'success' : 'neutral'">{{ row.activo ? 'Sí' : 'No' }}</Badge>
          </template>
          <template #cell-operador="{ row }">
            <span class="text-gray-500">{{ row.operador || '—' }}</span>
          </template>
          <template #actions="{ row }">
            <div class="flex items-center gap-2">
              <button @click="router.visit(route('unidades.show', row.no_economico))" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#4F46E5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
              <button @click="router.visit(route('unidades.edit', row.no_economico))" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#059669]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
              </button>
              <button @click="alert('Eliminar unidad: ' + row.no_economico)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-red-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
              </button>
            </div>
          </template>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
