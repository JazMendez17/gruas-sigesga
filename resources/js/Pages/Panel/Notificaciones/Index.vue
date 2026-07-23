<script setup>
import { ref, computed } from 'vue'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import DataTable from '@/Components/DataTable.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import Badge from '@/Components/Badge.vue'

const filtroCanal = ref('todos')
const filtroEstado = ref('todos')

const notificacionesFiltradas = computed(() =>
  notificaciones.filter(n =>
    (filtroCanal.value === 'todos' || n.canal === filtroCanal.value) &&
    (filtroEstado.value === 'todos' || n.estado === filtroEstado.value)
  )
)

const columns = [
  { key: 'usuario', label: 'Usuario' },
  { key: 'mensaje', label: 'Mensaje' },
  { key: 'canal', label: 'Canal' },
  { key: 'estado', label: 'Estado' },
  { key: 'intentos', label: 'Intentos' },
  { key: 'fecha', label: 'Fecha' },
]

const notificaciones = [
  { id: 1, usuario: 'Juan Pérez', mensaje: 'Su servicio ha sido asignado al operador Roberto Méndez. Unidad U-001 en camino.', canal: 'whatsapp', estado: 'enviado', intentos: 1, fecha: '23 Jul 2026 09:15' },
  { id: 2, usuario: 'María García', mensaje: 'Recordatorio: Su servicio está programado para mañana a las 09:00 hrs.', canal: 'email', estado: 'enviado', intentos: 1, fecha: '22 Jul 2026 14:30' },
  { id: 3, usuario: 'Carlos López', mensaje: 'Su cotización #00123 ha sido aprobada. Proceda con el pago para confirmar.', canal: 'whatsapp', estado: 'fallido', intentos: 3, fecha: '22 Jul 2026 11:00' },
  { id: 4, usuario: 'Ana Martínez', mensaje: 'Código de verificación: 8492 para acceder a su cuenta.', canal: 'sms', estado: 'enviado', intentos: 1, fecha: '21 Jul 2026 18:45' },
  { id: 5, usuario: 'Roberto Díaz', mensaje: 'Su factura electrónica está disponible para descarga.', canal: 'email', estado: 'fallido', intentos: 2, fecha: '21 Jul 2026 10:20' },
]

const canales = ['todos', 'whatsapp', 'email', 'sms']
const estados = ['todos', 'enviado', 'fallido']
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Notificaciones</h1>
      </div>

      <div class="flex flex-wrap gap-4">
        <div class="flex flex-wrap gap-2">
          <button
            v-for="c in canales"
            :key="c"
            @click="filtroCanal = c"
            class="rounded-xl px-5 py-2 text-sm font-medium capitalize transition-all duration-200"
            :class="filtroCanal === c
              ? 'bg-[#EEF2F7] text-[#4F46E5] shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]'
              : 'bg-transparent text-gray-500 hover:text-gray-700'"
          >
            {{ c === 'todos' ? 'Todos' : c }}
          </button>
        </div>
        <div class="flex flex-wrap gap-2">
          <button
            v-for="e in estados"
            :key="e"
            @click="filtroEstado = e"
            class="rounded-xl px-5 py-2 text-sm font-medium capitalize transition-all duration-200"
            :class="filtroEstado === e
              ? 'bg-[#EEF2F7] text-[#4F46E5] shadow-[4px_4px_8px_#d0d5da,-4px_-4px_8px_#ffffff]'
              : 'bg-transparent text-gray-500 hover:text-gray-700'"
          >
            {{ e === 'todos' ? 'Todos' : e }}
          </button>
        </div>
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <DataTable :columns="columns" :data="notificacionesFiltradas">
          <template #cell-mensaje="{ row }">
            <span class="block max-w-xs truncate" :title="row.mensaje">{{ row.mensaje }}</span>
          </template>
          <template #cell-canal="{ row }">
            <Badge :variant="row.canal === 'whatsapp' ? 'success' : row.canal === 'email' ? 'info' : 'neutral'">{{ row.canal }}</Badge>
          </template>
          <template #cell-estado="{ row }">
            <Badge :variant="row.estado === 'enviado' ? 'success' : 'danger'">{{ row.estado }}</Badge>
          </template>
          <template #actions="{ row }">
            <div class="flex items-center gap-2">
              <button
                v-if="row.estado === 'fallido'"
                @click="alert('Reenviar notificación a: ' + row.usuario)"
                class="rounded-lg bg-[#EEF2F7] p-2 text-[#4F46E5] shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-indigo-700"
                title="Reenviar"
              >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
              </button>
              <button @click="alert('Ver detalle de notificación ID: ' + row.id)" class="rounded-lg bg-[#EEF2F7] p-2 text-gray-500 shadow-[3px_3px_6px_#d0d5da,-3px_-3px_6px_#ffffff] transition-all hover:text-[#4F46E5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
            </div>
          </template>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
