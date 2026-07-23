<script setup>
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import Badge from '@/Components/Badge.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-800">COT-00124</h1>
          <p class="text-sm text-gray-500 mt-1">Detalle de cotización</p>
        </div>
        <NeumorphicButton @click="router.visit(route('panel.cotizaciones.index'))">Volver</NeumorphicButton>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="neumorphic-card p-6 lg:col-span-2 space-y-5">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Cliente</p>
              <p class="text-gray-800 font-medium">Juan Pérez</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Fecha</p>
              <p class="text-gray-800 font-medium">23 Jul 2026</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Tipo de Servicio</p>
              <p class="text-gray-800 font-medium">Transporte Local</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Estatus</p>
              <Badge variant="warning">Pendiente</Badge>
            </div>
            <div class="col-span-2">
              <p class="text-xs text-gray-500 uppercase tracking-wider">Origen</p>
              <p class="text-gray-800 font-medium">Centro, Ciudad de México</p>
            </div>
            <div class="col-span-2">
              <p class="text-xs text-gray-500 uppercase tracking-wider">Destino</p>
              <p class="text-gray-800 font-medium">Norte, Ciudad de México</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Distancia</p>
              <p class="text-gray-800 font-medium">15 km</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Total Estimado</p>
              <p class="text-xl font-bold text-indigo-600">$1,200</p>
            </div>
          </div>
        </div>

        <div class="neumorphic-card p-6 space-y-4">
          <h3 class="font-semibold text-gray-800">Historial</h3>
          <div class="space-y-3">
            <div class="text-sm">
              <p class="text-gray-500">23 Jul - Creada por Admin</p>
            </div>
            <div class="text-sm">
              <p class="text-gray-500">23 Jul - Enviada al cliente</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.neumorphic-card {
  background: #EEF2F7;
  border-radius: 24px;
  box-shadow: 8px 8px 16px #d0d5da, -8px -8px 16px #ffffff;
}
</style>
