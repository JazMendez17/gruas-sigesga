<script setup>
import { ref } from 'vue'
import { router, useForm } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'
import Badge from '@/Components/Badge.vue'

const user = {
  nombre: 'Juan Carlos Pérez López',
  email: 'admin@sigesga.com',
  rol: 'Administrador',
  empresa: 'Grúas y Equipos del Valle, S.A. de C.V.',
}

const passwordData = ref({
  actual: '',
  nueva: '',
  confirmar: '',
})

const notificaciones = [
  { id: 1, mensaje: 'Su servicio ha sido asignado al operador Roberto Méndez.', fecha: '23 Jul 2026 09:15', estado: 'leido' },
  { id: 2, mensaje: 'Recordatorio: Cotización #00124 pendiente de revisión.', fecha: '22 Jul 2026 14:30', estado: 'leido' },
  { id: 3, mensaje: 'Nuevo operador registrado en el sistema.', fecha: '21 Jul 2026 11:00', estado: 'no_leido' },
  { id: 4, mensaje: 'Actualización de tarifas disponible.', fecha: '20 Jul 2026 18:45', estado: 'no_leido' },
  { id: 5, mensaje: 'Mantenimiento programado para la unidad U-002.', fecha: '19 Jul 2026 10:20', estado: 'leido' },
]

const passwordForm = useForm({
  actual: '',
  nueva: '',
  confirmar: '',
})

function cambiarPassword() {
  if (passwordForm.nueva !== passwordForm.confirmar) {
    alert('Las contraseñas no coinciden')
    return
  }
  passwordForm.put(route('password.update'), {
    preserveScroll: true,
    onSuccess: () => {
      passwordForm.reset()
      alert('Contraseña actualizada correctamente')
    },
    onError: () => {
      alert('Error al actualizar la contraseña')
    },
  })
}
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Mi Perfil</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- User Info -->
        <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] lg:col-span-1 space-y-5">
          <div class="flex flex-col items-center">
            <div class="flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-indigo-500 to-purple-600 text-3xl font-bold text-white shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff]">
              {{ user.nombre.charAt(0) }}
            </div>
            <h2 class="mt-4 text-xl font-bold text-gray-800">{{ user.nombre }}</h2>
            <p class="text-sm text-gray-500">{{ user.email }}</p>
          </div>

          <div class="space-y-3 rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff]">
            <div class="flex justify-between">
              <span class="text-sm text-gray-500">Rol</span>
              <Badge variant="info">{{ user.rol }}</Badge>
            </div>
            <div class="flex justify-between">
              <span class="text-sm text-gray-500">Empresa</span>
              <span class="text-sm font-medium text-gray-800 text-right max-w-[180px]">{{ user.empresa }}</span>
            </div>
          </div>
        </div>

        <div class="space-y-6 lg:col-span-2">
          <!-- Cambiar Contraseña -->
          <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
            <h3 class="text-lg font-semibold text-gray-800">Cambiar Contraseña</h3>
            <NeumorphicInput v-model="passwordForm.actual" type="password" label="Contraseña Actual" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <NeumorphicInput v-model="passwordForm.nueva" type="password" label="Nueva Contraseña" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <NeumorphicInput v-model="passwordForm.confirmar" type="password" label="Confirmar Nueva Contraseña" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <NeumorphicButton @click="cambiarPassword" :disabled="passwordForm.processing">Actualizar Contraseña</NeumorphicButton>
          </div>

          <!-- Notificaciones Recibidas -->
          <div class="rounded-3xl bg-[#EEF2F7] p-6 shadow-[8px_8px_16px_#d0d5da,-8px_-8px_16px_#ffffff] space-y-4">
            <h3 class="text-lg font-semibold text-gray-800">Notificaciones Recibidas</h3>
            <div class="space-y-3">
              <div
                v-for="notif in notificaciones"
                :key="notif.id"
                class="flex items-start gap-3 rounded-2xl bg-[#E8EDF2] p-4 shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff]"
              >
                <div class="mt-1">
                  <div
                    class="h-2.5 w-2.5 rounded-full"
                    :class="notif.estado === 'no_leido' ? 'bg-indigo-500' : 'bg-gray-300'"
                  ></div>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-sm text-gray-800 truncate">{{ notif.mensaje }}</p>
                  <p class="text-xs text-gray-500 mt-0.5">{{ notif.fecha }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
