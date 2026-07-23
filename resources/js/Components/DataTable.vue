<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  columns: { type: Array, required: true },
  data: { type: Array, default: () => [] },
  pagination: { type: Object, default: null },
})

defineEmits(['sort', 'pageChange', 'rowClick'])

const sortField = ref(null)
const sortDir = ref('asc')

function toggleSort(key) {
  if (sortField.value === key) {
    sortDir.value = sortDir.value === 'asc' ? 'desc' : 'asc'
  } else {
    sortField.value = key
    sortDir.value = 'asc'
  }
}

function sortIcon(key) {
  if (sortField.value !== key) return 'M7 10l5 5 5-5'
  return sortDir.value === 'asc' ? 'M7 14l5-5 5 5' : 'M7 10l5 5 5-5'
}
</script>

<template>
  <div class="neumorphic-raised rounded-3xl bg-[#EEF2F7] overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="border-b border-[#d0d5da]/30">
            <th
              v-for="col in columns"
              :key="col.key"
              @click="col.sortable && toggleSort(col.key)"
              :class="['px-4 py-3 text-left text-xs font-semibold text-[#6B7280] uppercase tracking-wider', col.sortable ? 'cursor-pointer hover:text-[#4B5563]' : '']"
            >
              <div class="flex items-center gap-1">
                <span>{{ col.label }}</span>
                <svg v-if="col.sortable" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="sortIcon(col.key)" />
                </svg>
              </div>
            </th>
            <th v-if="$slots.actions" class="px-4 py-3 text-right text-xs font-semibold text-[#6B7280] uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#d0d5da]/20">
          <tr v-for="(row, i) in data" :key="i" @click="$emit('rowClick', row)" class="cursor-pointer hover:bg-white/30 transition-colors">
            <td v-for="col in columns" :key="col.key" class="px-4 py-3 text-sm text-[#4B5563] whitespace-nowrap">
              <slot :name="`cell-${col.key}`" :row="row" :value="row[col.key]">
                {{ row[col.key] }}
              </slot>
            </td>
            <td v-if="$slots.actions" class="px-4 py-3 text-right whitespace-nowrap">
              <slot name="actions" :row="row" />
            </td>
          </tr>
          <tr v-if="data.length === 0">
            <td :colspan="columns.length + ($slots.actions ? 1 : 0)" class="px-4 py-12 text-center text-[#6B7280]">
              No hay datos disponibles
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="pagination" class="flex items-center justify-between px-4 py-3 border-t border-[#d0d5da]/30">
      <p class="text-sm text-[#6B7280]">
        Mostrando {{ pagination.from || 0 }} - {{ pagination.to || 0 }} de {{ pagination.total || 0 }}
      </p>
      <div class="flex gap-2">
        <button :disabled="!pagination.prev" class="neumorphic-pressed px-3 py-1.5 rounded-xl text-sm disabled:opacity-30">
          Anterior
        </button>
        <button :disabled="!pagination.next" class="neumorphic-pressed px-3 py-1.5 rounded-xl text-sm disabled:opacity-30">
          Siguiente
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.neumorphic-raised {
  box-shadow: 8px 8px 16px #d0d5da, -8px -8px 16px #ffffff;
}
.neumorphic-pressed {
  box-shadow: inset 3px 3px 6px #d0d5da, inset -3px -3px 6px #ffffff;
}
</style>
