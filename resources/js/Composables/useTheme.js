import { computed, watch, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'

const defaultModuloColores = {
  dashboard: '#4F46E5',
  cotizaciones: '#059669',
  servicios: '#D97706',
  clientes: '#7C3AED',
  aseguradoras: '#2563EB',
  convenios: '#DC2626',
  facturacion: '#0891B2',
  unidades: '#65A30D',
  empleados: '#9333EA',
  reportes: '#0D9488',
}

export function useTheme() {
  const page = usePage()

  const empresa = computed(() => page.props.empresa)

  const isDark = computed(() => empresa.value?.modo_oscuro ?? false)

  const fontFamily = computed(() => empresa.value?.tipografia || 'Roboto')

  const primaryColor = computed(() => empresa.value?.color_primario || '#4F46E5')
  const secondaryColor = computed(() => empresa.value?.color_secundario || '#7C3AED')
  const bgColor = computed(() => isDark.value ? '#111827' : (empresa.value?.color_fondo || '#E8EDF2'))
  const textColor = computed(() => isDark.value ? '#F3F4F6' : (empresa.value?.color_texto || '#1F2937'))

  const moduloColores = computed(() => ({
    ...defaultModuloColores,
    ...(empresa.value?.modulo_colores || {}),
  }))

  function getModuloColor(modulo) {
    return moduloColores.value[modulo] || defaultModuloColores[modulo] || primaryColor.value
  }

  function loadGoogleFont(fontName) {
    if (!fontName || fontName === 'Roboto' || fontName === 'System Default') return

    const linkId = 'sigesga-font'
    const existing = document.getElementById(linkId)
    if (existing) existing.remove()

    const link = document.createElement('link')
    link.id = linkId
    link.rel = 'stylesheet'
    link.href = `https://fonts.googleapis.com/css2?family=${fontName.replace(/\s+/g, '+')}:wght@300;400;500;600;700;800&display=swap`
    document.head.appendChild(link)
  }

  function applyCSSVariables() {
    document.documentElement.style.setProperty('--font-family', fontFamily.value)
    document.documentElement.style.setProperty('--color-primary', primaryColor.value)
    document.documentElement.style.setProperty('--color-secondary', secondaryColor.value)
    document.documentElement.style.setProperty('--color-bg', bgColor.value)
    document.documentElement.style.setProperty('--color-text', textColor.value)

    if (isDark.value) {
      document.documentElement.style.setProperty('--color-surface', '#1e293b')
      document.documentElement.style.setProperty('--neumorphic-light', '#1e293b')
      document.documentElement.style.setProperty('--neumorphic-dark', '#0f172a')
      document.documentElement.classList.add('dark')
    } else {
      document.documentElement.style.setProperty('--color-surface', '#EEF2F7')
      document.documentElement.style.setProperty('--neumorphic-light', '#ffffff')
      document.documentElement.style.setProperty('--neumorphic-dark', '#d0d5da')
      document.documentElement.classList.remove('dark')
    }

    Object.entries(moduloColores.value).forEach(([modulo, color]) => {
      document.documentElement.style.setProperty(`--color-modulo-${modulo}`, color)
    })
  }

  onMounted(() => {
    loadGoogleFont(fontFamily.value)
    applyCSSVariables()
  })

  watch(fontFamily, (newFont) => {
    loadGoogleFont(newFont)
  })

  watch([primaryColor, secondaryColor, bgColor, textColor, moduloColores], () => {
    applyCSSVariables()
  }, { deep: true })

  return {
    fontFamily,
    primaryColor,
    secondaryColor,
    bgColor,
    textColor,
    moduloColores,
    getModuloColor,
    loadGoogleFont,
    applyCSSVariables,
  }
}

export const availableFonts = [
  'Roboto', 'Inter', 'Poppins', 'Montserrat', 'Nunito', 'Lato',
  'Open Sans', 'Raleway', 'Work Sans', 'Quicksand', 'Manrope',
  'DM Sans', 'Sora', 'Outfit', 'Plus Jakarta Sans', 'Jost',
  'Figtree', 'Lexend', 'Urbanist', 'Be Vietnam Pro', 'Space Grotesk',
  'Epilogue', 'Barlow', 'Rubik', 'Nunito Sans', 'Mulish',
  'Public Sans', 'Chakra Petch', 'Prompt', 'Karla', 'IBM Plex Sans',
  'Hanken Grotesk', 'Cabinet Grotesk', 'General Sans',
]
