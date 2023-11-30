<script setup>
import { ref, onMounted } from 'vue'

const ad = ref(null)

onMounted(() => {
  (window.adsbygoogle = window.adsbygoogle || []).push({})
  ad.value.classList.toggle('w-full')
})

const ad_client = ref(import.meta.env.VITE_ADS_CLIENT)
const ad_slot = ref(import.meta.env.VITE_ADS_SLOT)
</script>

<template>
  <ins class="adsbygoogle w-full flex justify-center items-center my-2 py-4"
        :data-ad-client="ad_client"
        :data-ad-slot="ad_slot"
        data-ad-format="auto"
        data-full-width-responsive="true"
        ref="ad">
  </ins>
</template>

<style scoped>
</style>
