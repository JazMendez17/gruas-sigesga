<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
    canResetPassword: Boolean,
    status: String,
})

const page = usePage()
const empresa = computed(() => page.props.empresa)

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <Head title="Iniciar Sesión" />

    <div class="min-h-screen bg-[#E8EDF2] flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-indigo-200">
                    {{ empresa?.siglas?.charAt(0) || 'S' }}
                </div>
                <h1 class="text-2xl font-bold text-[#1F2937]">Iniciar Sesión</h1>
                <p class="text-sm text-[#6B7280] mt-1">{{ empresa?.nombre || 'SIGESGA' }}</p>
            </div>

            <div v-if="status" class="mb-4 p-3 rounded-2xl bg-green-100 text-green-700 text-sm text-center shadow-[2px_2px_4px_#b0d0b6,-2px_-2px_4px_#ffffff]">
                {{ status }}
            </div>

            <div class="neumorphic-card p-8">
                <form @submit.prevent="submit">
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-[#4B5563] mb-2">Correo electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="tu@correo.com"
                                required
                                autofocus
                                autocomplete="username"
                                class="w-full bg-[#E8EDF2] text-[#1F2937] placeholder-[#9CA3AF] rounded-2xl py-3 pl-12 pr-4 shadow-[inset_6px_6px_12px_#d0d5da,inset_-6px_-6px_12px_#ffffff] focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all duration-200"
                            />
                        </div>
                        <p v-if="form.errors.email" class="mt-2 text-sm text-red-500">{{ form.errors.email }}</p>
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-[#4B5563] mb-2">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                v-model="form.password"
                                type="password"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                                class="w-full bg-[#E8EDF2] text-[#1F2937] placeholder-[#9CA3AF] rounded-2xl py-3 pl-12 pr-4 shadow-[inset_6px_6px_12px_#d0d5da,inset_-6px_-6px_12px_#ffffff] focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all duration-200"
                            />
                        </div>
                        <p v-if="form.errors.password" class="mt-2 text-sm text-red-500">{{ form.errors.password }}</p>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" v-model="form.remember" class="w-4 h-4 rounded-lg bg-[#E8EDF2] border-0 shadow-[inset_2px_2px_4px_#d0d5da,inset_-2px_-2px_4px_#ffffff] text-indigo-600 focus:ring-indigo-500" />
                            <span class="text-sm text-[#6B7280]">Recordarme</span>
                        </label>
                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                            ¿Olvidaste tu contraseña?
                        </Link>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full py-3 px-6 bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-medium rounded-2xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 transition-all duration-200 disabled:opacity-50"
                    >
                        <span v-if="form.processing" class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2 align-middle"></span>
                        Iniciar Sesión
                    </button>
                </form>
            </div>

            <p class="text-center mt-6 text-sm text-[#6B7280]">
                ¿No tienes cuenta?
                <Link :href="route('register')" class="text-indigo-600 hover:text-indigo-800 font-medium">Regístrate</Link>
            </p>
        </div>
    </div>
</template>

<style scoped>
.neumorphic-card {
    background: #EEF2F7;
    border-radius: 24px;
    box-shadow: 8px 8px 16px #d0d5da, -8px -8px 16px #ffffff;
}
</style>
