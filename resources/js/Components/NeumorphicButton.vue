<script setup>
const props = defineProps({
  variant: { type: String, default: 'primary' },
  size: { type: String, default: 'md' },
  loading: Boolean,
})

defineEmits(['click'])

const variants = {
  primary: 'bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-200',
  secondary: 'neumorphic-raised text-[#4B5563]',
  danger: 'bg-gradient-to-br from-red-500 to-rose-600 text-white shadow-lg shadow-red-200',
  ghost: 'text-[#4B5563] hover:neumorphic-raised',
}

const sizes = {
  sm: 'px-3 py-1.5 text-xs',
  md: 'px-5 py-2.5 text-sm',
  lg: 'px-7 py-3 text-base',
}
</script>

<template>
  <button
    @click="$emit('click')"
    :disabled="loading"
    :class="[
      variants[variant],
      sizes[size],
      'inline-flex items-center justify-center gap-2 font-medium rounded-2xl transition-all duration-200 disabled:opacity-50 cursor-pointer',
    ]"
  >
    <svg v-if="loading" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
    </svg>
    <slot />
  </button>
</template>

<style scoped>
.neumorphic-raised {
  box-shadow: 4px 4px 8px #d0d5da, -4px -4px 8px #ffffff;
}
</style>
