<script setup>
const props = defineProps({
  variant: { type: String, default: 'neutral' },
  size: { type: String, default: 'sm' },
})

const variants = {
  success: 'bg-green-100 text-green-700 shadow-[2px_2px_4px_#b0d0b6,-2px_-2px_4px_#ffffff]',
  warning: 'bg-amber-100 text-amber-700 shadow-[2px_2px_4px_#d4b88a,-2px_-2px_4px_#ffffff]',
  danger: 'bg-red-100 text-red-700 shadow-[2px_2px_4px_#d4a0a0,-2px_-2px_4px_#ffffff]',
  info: 'bg-blue-100 text-blue-700 shadow-[2px_2px_4px_#a0b8d4,-2px_-2px_4px_#ffffff]',
  neutral: 'bg-gray-100 text-gray-700 shadow-[2px_2px_4px_#c0c4c8,-2px_-2px_4px_#ffffff]',
}

const sizes = {
  sm: 'px-2 py-0.5 text-xs',
  md: 'px-3 py-1 text-sm',
}
</script>

<template>
  <span :class="[variants[variant], sizes[size], 'inline-flex items-center font-medium rounded-xl']">
    <slot />
  </span>
</template>
