<script setup>
import { computed } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const empresa = computed(() => page.props.empresa)

const form = useForm({})

const submit = () => { form.post(route('verification.send')) }
</script>

<template>
    <Head title="Verificar Correo" />
    <div class="min-h-screen bg-[#E8EDF2] flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-indigo-200" :style="{ backgroundColor: 'var(--color-primary)' }">
                    {{ empresa?.siglas?.charAt(0) || 'S' }}
                </div>
                <h1 class="text-2xl font-bold text-[#1F2937]">Verifica tu correo</h1>
                <p class="text-sm text-[#6B7280] mt-1">Te enviamos un enlace de verificación a tu correo</p>
            </div>

            <div class="neumorphic-card p-8 text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#E8EDF2] flex items-center justify-center shadow-[inset_4px_4px_8px_#d0d5da,inset_-4px_-4px_8px_#ffffff]">
                    <svg class="w-8 h-8 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <p class="text-[#4B5563] text-sm mb-6">Antes de continuar, revisa tu correo para el enlace de verificación. Si no lo recibiste, solicita uno nuevo.</p>
                <form @submit.prevent="submit">
                    <button type="submit" :disabled="form.processing"
                        class="w-full py-3 px-6 text-white font-medium rounded-2xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 transition-all duration-200 disabled:opacity-50" :style="{ backgroundColor: 'var(--color-primary)' }">
                        <span v-if="form.processing" class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></span>
                        Reenviar verificación
                    </button>
                </form>
                <Link :href="route('logout')" method="post" as="button" class="mt-4 text-sm text-[#6B7280] hover:text-indigo-600">
                    Cerrar sesión
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.neumorphic-card {
    background: #EEF2F7; border-radius: 24px;
    box-shadow: 8px 8px 16px #d0d5da, -8px -8px 16px #ffffff;
}
</style>
