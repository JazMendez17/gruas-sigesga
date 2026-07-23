<script setup>
import { ref } from 'vue'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'

const reporte1 = { fecha_inicio: '', fecha_fin: '', generado: false }
const reporte2 = { generado: false }
const reporte3 = { operador: '', generado: false }
const reporte4 = { servicio: '', generado: false }

const reportes = [reporte1, reporte2, reporte3, reporte4]

function generar(n) {
  reportes[n - 1].generado = true
  setTimeout(() => {
    reportes[n - 1].generado = false
  }, 3000)
}
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Reportes</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Servicios por Periodo -->
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Servicios por Periodo</h3>
            <p class="text-sm text-gray-500 mt-1">Genera un reporte de todos los servicios realizados en un rango de fechas.</p>
          </div>
          <div class="grid grid-cols-2 gap-3">
            <NeumorphicInput v-model="reporte1.fecha_inicio" type="date" label="Fecha Inicio" />
            <NeumorphicInput v-model="reporte1.fecha_fin" type="date" label="Fecha Fin" />
          </div>
          <NeumorphicButton @click="generar(1)" variant="secondary" class="w-full">Generar</NeumorphicButton>
          <div v-if="reporte1.generado" class="rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff] text-sm text-gray-600">
            Resultados aquí...
          </div>
        </div>

        <!-- Costos e Ingresos -->
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Costos e Ingresos</h3>
            <p class="text-sm text-gray-500 mt-1">Reporte financiero con costos operativos e ingresos por servicio.</p>
          </div>
          <NeumorphicButton @click="generar(2)" variant="secondary" class="w-full">Generar</NeumorphicButton>
          <div v-if="reporte2.generado" class="rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff] text-sm text-gray-600">
            Resultados aquí...
          </div>
        </div>

        <!-- Rendimiento por Operador -->
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Rendimiento por Operador</h3>
            <p class="text-sm text-gray-500 mt-1">Evalúa el desempeño de cada operador según servicios completados.</p>
          </div>
          <NeumorphicInput v-model="reporte3.operador" placeholder="Nombre del operador" />
          <NeumorphicButton @click="generar(3)" variant="secondary" class="w-full">Generar</NeumorphicButton>
          <div v-if="reporte3.generado" class="rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff] text-sm text-gray-600">
            Resultados aquí...
          </div>
        </div>

        <!-- Calificaciones Promedio -->
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Calificaciones Promedio</h3>
            <p class="text-sm text-gray-500 mt-1">Promedio de calificaciones recibidas por servicio o período.</p>
          </div>
          <NeumorphicButton @click="generar(4)" variant="secondary" class="w-full">Generar</NeumorphicButton>
          <div v-if="reporte4.generado" class="rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff] text-sm text-gray-600">
            Resultados aquí...
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
