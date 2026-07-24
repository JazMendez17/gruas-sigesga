<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const empresa = computed(() => page.props.empresa)

const form = useForm({ password: '' })

const submit = () => { form.post(route('password.confirm'), { onFinish: () => form.reset() }) }
</script>

<template>
    <Head title="Confirmar Contraseña" />
    <div class="min-h-screen bg-[#E8EDF2] flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-indigo-200" :style="{ backgroundColor: 'var(--color-primary)' }">
                    {{ empresa?.siglas?.charAt(0) || 'S' }}
                </div>
                <h1 class="text-2xl font-bold text-[#1F2937]">Confirma tu contraseña</h1>
                <p class="text-sm text-[#6B7280] mt-1">Esta es un área segura, confirma tu contraseña para continuar</p>
            </div>

            <div class="neumorphic-card p-8">
                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-[#4B5563] mb-2">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input v-model="form.password" type="password" placeholder="••••••••" required autocomplete="current-password"
                                class="w-full bg-[#E8EDF2] text-[#1F2937] placeholder-[#9CA3AF] rounded-2xl py-3 pl-12 pr-4 shadow-[inset_6px_6px_12px_#d0d5da,inset_-6px_-6px_12px_#ffffff] focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                        </div>
                        <p v-if="form.errors.password" class="mt-2 text-sm text-red-500">{{ form.errors.password }}</p>
                    </div>
                    <button type="submit" :disabled="form.processing"
                        class="w-full py-3 px-6 text-white font-medium rounded-2xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 transition-all duration-200 disabled:opacity-50" :style="{ backgroundColor: 'var(--color-primary)' }">
                        <span v-if="form.processing" class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></span>
                        Confirmar
                    </button>
                </form>
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
