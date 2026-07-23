<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import Badge from '@/Components/Badge.vue'

const props = defineProps({
  aseguradora: { type: Object, default: () => ({
    id: 1,
    nombre: 'Seguros Atlas S.A. de C.V.',
    nombre_comercial: 'Seguros Atlas',
    rfc: 'SAT-990101-XXX',
    telefono: '555-111-2233',
    email: 'contacto@segurosatlas.com',
    sitio_web: 'www.segurosatlas.com',
  })},
})

const contactos = [
  { departamento: 'Atención a Clientes', nombre: 'Luis Hernández', telefono: '555-111-2244', email: 'lhernandez@segurosatlas.com' },
  { departamento: 'Siniestros', nombre: 'María Torres', telefono: '555-111-2255', email: 'mtorres@segurosatlas.com' },
  { departamento: 'Convenios', nombre: 'Carlos Ruiz', telefono: '555-111-2266', email: 'cruiz@segurosatlas.com' },
]

const conveniosActivos = [
  { nombre: 'Convenio General Atlas', tipo_servicio: 'Transporte Local', vigencia: '31 Dic 2026', estatus: 'activo' },
  { nombre: 'Convenio Flotillas Atlas', tipo_servicio: 'Carga Refrigerada', vigencia: '30 Jun 2027', estatus: 'activo' },
]
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-800">{{ aseguradora.nombre_comercial }}</h1>
          <p class="text-sm text-gray-500 mt-1">Detalles de la aseguradora</p>
        </div>
        <div class="flex gap-3">
          <NeumorphicButton variant="secondary" @click="router.visit(route('panel.aseguradoras.index'))">
            Volver
          </NeumorphicButton>
          <NeumorphicButton @click="alert('Editar aseguradora')">
            Editar
          </NeumorphicButton>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] lg:col-span-2">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Datos Generales</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Nombre</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.nombre }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Nombre Comercial</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.nombre_comercial }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">RFC</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.rfc }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Teléfono</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.telefono }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Email</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.email }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 uppercase tracking-wider">Sitio Web</p>
              <p class="text-sm font-medium text-gray-800">{{ aseguradora.sitio_web }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Contactos</h3>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="border-b border-[#d0d5da]/30">
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Departamento</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Teléfono</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Email</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#d0d5da]/20">
              <tr v-for="(cto, i) in contactos" :key="i" class="hover:bg-white/30 transition-colors">
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ cto.departamento }}</td>
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ cto.nombre }}</td>
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ cto.telefono }}</td>
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ cto.email }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Convenios Activos</h3>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="border-b border-[#d0d5da]/30">
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Tipo Servicio</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Vigencia</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Estatus</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#d0d5da]/20">
              <tr v-for="(conv, i) in conveniosActivos" :key="i" class="hover:bg-white/30 transition-colors">
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ conv.nombre }}</td>
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ conv.tipo_servicio }}</td>
                <td class="px-4 py-3 text-sm text-[#4B5563]">{{ conv.vigencia }}</td>
                <td class="px-4 py-3 text-sm"><Badge variant="success">{{ conv.estatus }}</Badge></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
