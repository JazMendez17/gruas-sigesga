<script setup>
import { router, useForm } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'

const form = useForm({
  nombre: 'Convenio General Atlas',
  aseguradora: 'Seguros Atlas',
  tipo_servicio: 'Transporte Local',
  fecha_inicio: '2026-01-01',
  fecha_vencimiento: '2026-12-31',
  descuento: '15',
  comision: '10',
  condiciones: 'Descuento preferencial por volumen.',
})

function submit() {
  form.put(route('panel.convenios.update', 1), {
    onSuccess: () => form.reset(),
  })
}
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Editar Convenio</h1>
        <p class="text-sm text-gray-500 mt-1">Modifica los datos del convenio seleccionado</p>
      </div>

      <div class="neumorphic-card p-6 max-w-2xl">
        <form @submit.prevent="submit" class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-600 mb-1">Nombre del Convenio</label>
              <NeumorphicInput v-model="form.nombre" placeholder="Ej: Convenio General Atlas" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Aseguradora</label>
              <NeumorphicInput v-model="form.aseguradora" placeholder="Nombre de la aseguradora" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Tipo de Servicio</label>
              <NeumorphicInput v-model="form.tipo_servicio" placeholder="Tipo de servicio" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Fecha de Inicio</label>
              <NeumorphicInput v-model="form.fecha_inicio" type="date" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Fecha de Vencimiento</label>
              <NeumorphicInput v-model="form.fecha_vencimiento" type="date" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Descuento (%)</label>
              <NeumorphicInput v-model="form.descuento" type="number" placeholder="0" />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-600 mb-1">Comisión (%)</label>
              <NeumorphicInput v-model="form.comision" type="number" placeholder="0" />
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Condiciones</label>
            <textarea v-model="form.condiciones" class="w-full bg-[#E8EDF2] text-gray-700 rounded-2xl p-3 shadow-[inset_6px_6px_12px_#d0d5da,inset_-6px_-6px_12px_#ffffff] focus:outline-none focus:ring-2 focus:ring-indigo-300" rows="3" placeholder="Términos y condiciones del convenio..."></textarea>
          </div>

          <div class="flex gap-3 pt-2">
            <NeumorphicButton type="submit" :loading="form.processing">Actualizar Convenio</NeumorphicButton>
            <NeumorphicButton variant="secondary" @click="router.visit(route('panel.convenios.index'))">Cancelar</NeumorphicButton>
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
