<script setup>
import { router, useForm } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'

const form = useForm({
  cliente: '',
  tipo_servicio: '',
  origen: '',
  destino: '',
  distancia: '',
  monto: '',
  observaciones: '',
})
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Nueva Cotización</h1>
        <p class="text-sm text-gray-500 mt-1">Llena los datos para generar una nueva cotización</p>
      </div>

      <div class="neumorphic-card p-6 max-w-2xl">
        <form @submit.prevent="form.post(route('panel.cotizaciones.store'))" class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Cliente</label>
              <NeumorphicInput v-model="form.cliente" placeholder="Nombre del cliente" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Tipo de Servicio</label>
              <NeumorphicInput v-model="form.tipo_servicio" placeholder="Seleccionar tipo" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Origen</label>
              <NeumorphicInput v-model="form.origen" placeholder="Dirección de origen" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Destino</label>
              <NeumorphicInput v-model="form.destino" placeholder="Dirección de destino" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Distancia (km)</label>
              <NeumorphicInput v-model="form.distancia" type="number" placeholder="0" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Monto Estimado</label>
              <NeumorphicInput v-model="form.monto" type="number" placeholder="$0.00" />
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Observaciones</label>
            <textarea v-model="form.observaciones" class="w-full bg-[#E8EDF2] text-gray-700 rounded-2xl p-3 shadow-[inset_6px_6px_12px_#d0d5da,inset_-6px_-6px_12px_#ffffff] focus:outline-none focus:ring-2 focus:ring-indigo-300" rows="3" placeholder="Notas adicionales..."></textarea>
          </div>

          <div class="flex gap-3 pt-2">
            <NeumorphicButton type="submit" :disabled="form.processing">Guardar Cotización</NeumorphicButton>
            <NeumorphicButton variant="secondary" @click="router.visit(route('panel.cotizaciones.index'))">Cancelar</NeumorphicButton>
          </div>
        </form>
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
