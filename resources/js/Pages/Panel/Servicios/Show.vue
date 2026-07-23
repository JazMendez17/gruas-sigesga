<script setup>
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import Badge from '@/Components/Badge.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-800">SVC-00089</h1>
          <p class="text-sm text-gray-500 mt-1">Detalle del servicio</p>
        </div>
        <NeumorphicButton @click="$inertia.visit(route('panel.servicios.index'))">Volver</NeumorphicButton>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="neumorphic-card p-6 lg:col-span-2 space-y-5">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Cliente</p>
              <p class="text-gray-800 font-medium">María García</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Fecha</p>
              <p class="text-gray-800 font-medium">23 Jul 2026</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Operador</p>
              <p class="text-gray-800 font-medium">Roberto Méndez</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Unidad</p>
              <p class="text-gray-800 font-medium">Grúa 01</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Tipo de Servicio</p>
              <p class="text-gray-800 font-medium">Transporte Local</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Estatus</p>
              <Badge variant="info">Asignado</Badge>
            </div>
            <div class="col-span-2">
              <p class="text-xs text-gray-500 uppercase tracking-wider">Origen</p>
              <p class="text-gray-800 font-medium">Av. Reforma, Ciudad de México</p>
            </div>
            <div class="col-span-2">
              <p class="text-xs text-gray-500 uppercase tracking-wider">Destino</p>
              <p class="text-gray-800 font-medium">Zona Industrial, Ciudad de México</p>
            </div>
            <div class="col-span-2">
              <p class="text-xs text-gray-500 uppercase tracking-wider">Observaciones</p>
              <p class="text-gray-600">Cliente solicita grúa de plataforma para vehículo sedán.</p>
            </div>
          </div>
        </div>

        <div class="space-y-4">
          <div class="neumorphic-card p-6">
            <h3 class="font-semibold text-gray-800 mb-3">Bitácora de Tiempos</h3>
            <div class="space-y-2 text-sm">
              <p class="text-gray-500">Salida: <span class="text-gray-800">08:30</span></p>
              <p class="text-gray-500">Llegada a cliente: <span class="text-gray-800">09:15</span></p>
              <p class="text-gray-500">Término servicio: <span class="text-gray-800">10:00</span></p>
              <p class="text-gray-500">Regreso base: <span class="text-gray-800">10:45</span></p>
            </div>
          </div>

          <div class="neumorphic-card p-6">
            <h3 class="font-semibold text-gray-800 mb-3">Kilometraje</h3>
            <div class="space-y-2 text-sm">
              <p class="text-gray-500">Salida: <span class="text-gray-800">12,450 km</span></p>
              <p class="text-gray-500">Regreso: <span class="text-gray-800">12,485 km</span></p>
              <p class="text-gray-500">Cobrados: <span class="text-gray-800">35 km</span></p>
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
