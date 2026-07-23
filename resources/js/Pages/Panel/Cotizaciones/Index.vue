<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import DataTable from '@/Components/DataTable.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import Badge from '@/Components/Badge.vue'

const filtroActivo = ref('todas')
const busqueda = ref('')

const filtros = ['todas', 'pendientes', 'aprobadas', 'rechazadas']

const columns = [
  { key: 'folio', label: 'Folio' },
  { key: 'cliente', label: 'Cliente' },
  { key: 'tipo', label: 'Tipo Servicio' },
  { key: 'origen', label: 'Origen' },
  { key: 'destino', label: 'Destino' },
  { key: 'total', label: 'Total' },
  { key: 'estatus', label: 'Estatus' },
  { key: 'fecha', label: 'Fecha' },
]

const cotizaciones = [
  { folio: 'COT-00124', cliente: 'Juan Pérez', tipo: 'Transporte Local', origen: 'Centro', destino: 'Norte', total: '$1,200', estatus: 'pendiente', fecha: '23 Jul 2026' },
  { folio: 'COT-00123', cliente: 'María García', tipo: 'Carga Refrigerada', origen: 'Av. Reforma', destino: 'Aeropuerto', total: '$3,800', estatus: 'aprobada', fecha: '22 Jul 2026' },
  { folio: 'COT-00122', cliente: 'Carlos López', tipo: 'Mudanza Residencial', origen: 'Colonia del Valle', destino: 'Santa Fe', total: '$5,500', estatus: 'rechazada', fecha: '21 Jul 2026' },
  { folio: 'COT-00121', cliente: 'Ana Martínez', tipo: 'Entrega Express', origen: 'Zona Rosa', destino: 'Polanco', total: '$850', estatus: 'aprobada', fecha: '20 Jul 2026' },
  { folio: 'COT-00120', cliente: 'Roberto Díaz', tipo: 'Transporte de Maquinaria', origen: 'Industrial Vallejo', destino: 'Cuautitlán', total: '$12,000', estatus: 'pendiente', fecha: '19 Jul 2026' },
  { folio: 'COT-00119', cliente: 'Sofía Ramírez', tipo: 'Paquetería', origen: 'Condesa', destino: 'Coyoacán', total: '$350', estatus: 'pendiente', fecha: '18 Jul 2026' },
  { folio: 'COT-00118', cliente: 'Pedro Infante', tipo: 'Mudanza Comercial', origen: 'Reforma', destino: 'Insurgentes', total: '$8,200', estatus: 'aprobada', fecha: '17 Jul 2026' },
  { folio: 'COT-00117', cliente: 'Laura Torres', tipo: 'Carga Refrigerada', origen: 'Central Abasto', destino: 'Mérida', total: '$15,400', estatus: 'rechazada', fecha: '16 Jul 2026' },
]

const paginas = [1, 2, 3, 4, 5]
const paginaActual = ref(1)

const filteredCotizaciones = computed(() => {
  let result = cotizaciones
  if (filtroActivo.value !== 'todas') {
    result = result.filter(c => c.estatus === filtroActivo.value)
  }
  if (busqueda.value) {
    const q = busqueda.value.toLowerCase()
    result = result.filter(c => c.cliente.toLowerCase().includes(q) || c.folio.toLowerCase().includes(q))
  }
  return result
})
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <!-- Header -->
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Cotizaciones</h1>
        <NeumorphicButton @click="router.visit(route('panel.cotizaciones.create'))">
          + Nueva Cotización
        </NeumorphicButton>
      </div>

      <!-- Filters -->
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-wrap gap-2">
          <button
            v-for="filtro in filtros"
            :key="filtro"
            @click="filtroActivo = filtro"
            class="rounded-xl px-5 py-2 text-sm font-medium capitalize transition-all duration-200"
            :class="filtroActivo === filtro
              ? 'bg-[#EEF2F7] text-[#4F46E5] shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]'
              : 'bg-transparent text-gray-500 hover:text-gray-700'"
          >
            {{ filtro === 'todas' ? 'Todas' : filtro }}
          </button>
        </div>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar cotización..."
          class="w-full sm:w-64"
        />
      </div>

      <!-- Table -->
      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="filteredCotizaciones" @row-click="(row) => router.visit(route('panel.cotizaciones.show', { id: row.folio }))">
          <template #cell-estatus="{ row }">
            <Badge :variant="row.estatus">{{ row.estatus }}</Badge>
          </template>
        </DataTable>
      </div>

      <!-- Pagination -->
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
