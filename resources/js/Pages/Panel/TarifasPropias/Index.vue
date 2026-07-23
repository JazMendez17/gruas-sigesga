<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import DataTable from '@/Components/DataTable.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import Badge from '@/Components/Badge.vue'

const busqueda = ref('')

const columns = [
  { key: 'nombre', label: 'Nombre' },
  { key: 'tipo_servicio', label: 'Tipo Servicio' },
  { key: 'ruta', label: 'Ruta' },
  { key: 'banderazo', label: 'Banderazo' },
  { key: 'costo_km', label: 'Costo/KM' },
  { key: 'activo', label: 'Activo' },
]

const tarifas = [
  { nombre: 'Tarifa Local Norte', tipo_servicio: 'Transporte Local', ruta: 'Centro - Norte', banderazo: '$150', costo_km: '$12.50', activo: true },
  { nombre: 'Tarifa Local Sur', tipo_servicio: 'Transporte Local', ruta: 'Centro - Sur', banderazo: '$150', costo_km: '$14.00', activo: true },
  { nombre: 'Tarifa Refrigerada', tipo_servicio: 'Carga Refrigerada', ruta: 'Central - Aeropuerto', banderazo: '$200', costo_km: '$18.50', activo: true },
  { nombre: 'Tarifa Express', tipo_servicio: 'Entrega Express', ruta: 'Zona Rosa - Polanco', banderazo: '$100', costo_km: '$10.00', activo: false },
  { nombre: 'Tarifa Maquinaria', tipo_servicio: 'Transporte de Maquinaria', ruta: 'Industrial - Cuautitlán', banderazo: '$300', costo_km: '$25.00', activo: true },
]
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Tarifas Propias</h1>
        <NeumorphicButton @click="alert('Funcionalidad: Nueva Tarifa')">
          + Nueva Tarifa
        </NeumorphicButton>
      </div>

      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div></div>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar tarifa..."
          class="w-full sm:w-64"
        />
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="tarifas">
          <template #cell-activo="{ row }">
            <Badge :variant="row.activo ? 'success' : 'neutral'">{{ row.activo ? 'Sí' : 'No' }}</Badge>
          </template>
          <template #actions="{ row }">
            <div class="flex items-center gap-2">
              <button @click="alert('Ver tarifa: ' + row.nombre)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#4F46E5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
              <button @click="alert('Editar tarifa: ' + row.nombre)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#059669]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
              </button>
            </div>
          </template>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
