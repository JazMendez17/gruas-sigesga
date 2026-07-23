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
  { key: 'folio', label: 'Folio Factura' },
  { key: 'cliente', label: 'Cliente' },
  { key: 'servicio', label: 'Servicio' },
  { key: 'subtotal', label: 'Subtotal' },
  { key: 'iva', label: 'IVA' },
  { key: 'total', label: 'Total' },
  { key: 'estatus', label: 'Estatus' },
  { key: 'fecha', label: 'Fecha' },
]

const facturas = [
  { folio: 'FAC-00056', cliente: 'María García', servicio: 'Transporte Local', subtotal: '$1,034', iva: '$165', total: '$1,200', estatus: 'vigente', fecha: '23 Jul 2026' },
  { folio: 'FAC-00055', cliente: 'Carlos López', servicio: 'Carga Refrigerada', subtotal: '$3,276', iva: '$524', total: '$3,800', estatus: 'vigente', fecha: '22 Jul 2026' },
  { folio: 'FAC-00054', cliente: 'Ana Martínez', servicio: 'Entrega Express', subtotal: '$733', iva: '$117', total: '$850', estatus: 'cancelada', fecha: '21 Jul 2026' },
  { folio: 'FAC-00053', cliente: 'Roberto Díaz', servicio: 'Transporte de Maquinaria', subtotal: '$10,345', iva: '$1,655', total: '$12,000', estatus: 'vigente', fecha: '20 Jul 2026' },
  { folio: 'FAC-00052', cliente: 'Sofía Ramírez', servicio: 'Paquetería', subtotal: '$302', iva: '$48', total: '$350', estatus: 'cancelada', fecha: '19 Jul 2026' },
  { folio: 'FAC-00051', cliente: 'Pedro Infante', servicio: 'Mudanza Comercial', subtotal: '$7,069', iva: '$1,131', total: '$8,200', estatus: 'vigente', fecha: '18 Jul 2026' },
]
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Facturación</h1>
        <NeumorphicButton @click="alert('Funcionalidad: Generar Factura')">
          + Generar Factura
        </NeumorphicButton>
      </div>

      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div></div>
        <NeumorphicInput
          v-model="busqueda"
          placeholder="Buscar factura..."
          class="w-full sm:w-64"
        />
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="facturas">
          <template #cell-estatus="{ row }">
            <Badge :variant="row.estatus === 'vigente' ? 'success' : 'danger'">{{ row.estatus }}</Badge>
          </template>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
