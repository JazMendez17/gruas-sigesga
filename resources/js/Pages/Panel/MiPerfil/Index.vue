<script setup>
import { ref } from 'vue'
import { router, useForm, usePage } from '@inertiajs/vue3'
import AppLayout from '@/Pages/Panel/AppLayout.vue'
import NeumorphicButton from '@/Components/NeumorphicButton.vue'
import NeumorphicInput from '@/Components/NeumorphicInput.vue'

const page = usePage()
const usuario = page.props.usuario

const profileForm = useForm({
  email: usuario.email,
  telefono: usuario.telefono || '',
})

const passwordForm = useForm({
  actual: '',
  nueva: '',
  confirmar: '',
})

const uploading = ref(false)

function actualizarPerfil() {
  profileForm.put(route('panel.mi-perfil.update'), {
    preserveScroll: true,
    onSuccess: () => {},
  })
}

function cambiarPassword() {
  if (passwordForm.nueva !== passwordForm.confirmar) {
    passwordForm.setError('confirmar', 'Las contraseñas no coinciden')
    return
  }
  passwordForm.put(route('panel.mi-perfil.password'), {
    preserveScroll: true,
    onSuccess: () => {
      passwordForm.reset()
    },
  })
}

function uploadFoto(e) {
  const file = e.target.files?.[0]
  if (!file) return
  uploading.value = true
  router.post(route('panel.mi-perfil.foto'), {
    foto: file,
  }, {
    preserveScroll: true,
    onFinish: () => {
      uploading.value = false
      e.target.value = ''
    },
  })
}

const rolLabel = {
  admin: 'Administrador',
  cotizador: 'Cotizador',
  operador: 'Operador',
  cliente: 'Cliente',
}
</script>

<template>
  <AppLayout>
    <div class="space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold" style="color: var(--color-text)">Mi Perfil</h1>
      </div>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="rounded-3xl bg-[var(--color-surface)] p-6 shadow-[8px_8px_16px_var(--neumorphic-dark),-8px_-8px_16px_var(--neumorphic-light)] lg:col-span-1 space-y-5">
          <div class="flex flex-col items-center">
            <div class="relative">
              <div v-if="usuario.foto" class="w-28 h-28 rounded-3xl overflow-hidden shadow-[8px_8px_16px_var(--neumorphic-dark),-8px_-8px_16px_var(--neumorphic-light)]">
                <img :src="'/storage/' + usuario.foto" class="w-full h-full object-cover" alt="Foto" />
              </div>
              <div v-else class="w-28 h-28 rounded-3xl flex items-center justify-center text-4xl font-bold text-white shadow-[8px_8px_16px_var(--neumorphic-dark),-8px_-8px_16px_var(--neumorphic-light)]" :style="{ backgroundColor: 'var(--color-primary)' }">
                {{ usuario.name.charAt(0) }}
              </div>
              <label class="absolute -bottom-2 -right-2 w-9 h-9 rounded-xl bg-[var(--color-primary)] text-white flex items-center justify-center cursor-pointer shadow-[3px_3px_6px_var(--neumorphic-dark),-3px_-3px_6px_var(--neumorphic-light)] hover:scale-105 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <input type="file" accept="image/jpeg,image/png,image/webp" class="hidden" @change="uploadFoto" />
              </label>
            </div>
            <h2 class="mt-5 text-xl font-bold" style="color: var(--color-text)">{{ usuario.name }}</h2>
            <p class="text-sm opacity-60" style="color: var(--color-text)">{{ usuario.email }}</p>
            <div v-if="uploading" class="mt-2 flex items-center gap-2 text-sm" style="color: var(--color-primary)">
              <span class="inline-block w-4 h-4 border-2 border-current border-t-transparent rounded-full animate-spin"></span>
              Subiendo...
            </div>
          </div>

          <div class="space-y-3 rounded-2xl p-4 shadow-[inset_4px_4px_8px_var(--neumorphic-dark),inset_-4px_-4px_8px_var(--neumorphic-light)]" style="background-color: var(--color-bg)">
            <div class="flex justify-between">
              <span class="text-sm opacity-60" style="color: var(--color-text)">Rol</span>
              <span class="text-sm font-semibold px-3 py-0.5 rounded-xl" :style="{ backgroundColor: 'var(--color-primary)', color: '#ffffff' }">{{ rolLabel[usuario.rol] || usuario.rol }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-sm opacity-60" style="color: var(--color-text)">Empresa</span>
              <span class="text-sm font-medium text-right max-w-[180px]" style="color: var(--color-text)">{{ usuario.empresa }}</span>
            </div>
          </div>
        </div>

        <div class="space-y-6 lg:col-span-2">
          <div class="rounded-3xl bg-[var(--color-surface)] p-6 shadow-[8px_8px_16px_var(--neumorphic-dark),-8px_-8px_16px_var(--neumorphic-light)] space-y-4">
            <h3 class="text-lg font-semibold" style="color: var(--color-text)">Información del Perfil</h3>
            <NeumorphicInput v-model="profileForm.email" type="email" label="Correo Electrónico" icon="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            <p v-if="profileForm.errors.email" class="text-sm text-red-500 -mt-2">{{ profileForm.errors.email }}</p>
            <NeumorphicInput v-model="profileForm.telefono" type="text" label="Teléfono" icon="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            <p v-if="profileForm.errors.telefono" class="text-sm text-red-500 -mt-2">{{ profileForm.errors.telefono }}</p>
            <NeumorphicButton @click="actualizarPerfil" :disabled="profileForm.processing">Guardar Cambios</NeumorphicButton>
          </div>

          <div class="rounded-3xl bg-[var(--color-surface)] p-6 shadow-[8px_8px_16px_var(--neumorphic-dark),-8px_-8px_16px_var(--neumorphic-light)] space-y-4">
            <h3 class="text-lg font-semibold" style="color: var(--color-text)">Cambiar Contraseña</h3>
            <NeumorphicInput v-model="passwordForm.actual" type="password" label="Contraseña Actual" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <p v-if="passwordForm.errors.actual" class="text-sm text-red-500 -mt-2">{{ passwordForm.errors.actual }}</p>
            <NeumorphicInput v-model="passwordForm.nueva" type="password" label="Nueva Contraseña" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <NeumorphicInput v-model="passwordForm.confirmar" type="password" label="Confirmar Nueva Contraseña" icon="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            <p v-if="passwordForm.errors.confirmar" class="text-sm text-red-500 -mt-2">{{ passwordForm.errors.confirmar }}</p>
            <NeumorphicButton @click="cambiarPassword" :disabled="passwordForm.processing">Actualizar Contraseña</NeumorphicButton>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
