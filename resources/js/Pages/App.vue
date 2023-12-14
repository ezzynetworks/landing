<script setup>
import { Head, usePage } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

import AppLayout from '@/Layouts/AppLayout.vue'
import Ads from '@/Components/Ads.vue'

const logged = ref(false)
const editor = ref(null)
const section = ref(null)

const props = defineProps({
  contents: {
    type: String,
    default: null
  }
})

onMounted(() => {
  let onlyRead = {
    readOnly: true
  }

  section.value = new Quill('.section', onlyRead)
  if (props.contents != null) section.value.root.innerHTML = props.contents

  if (usePage().props.auth.user != null && logged.value == false) {
    localStorage.setItem('logged', true)
    window.open('https://www.google.com')
  }

  if (usePage().props.auth.user == null) {
    localStorage.removeItem('logged')
  }
})
</script>

<template>
  <Head title="Ezzytable" />

  <AppLayout>
    <section class="bg-neutral-500 p-4 rounded">
      <article class="section bg-white text-neutral-600 p-2 rounded"></article>
    </section>

    <section class="bg-neutral-500 p-4 rounded">
      <Ads />
    </section>
  </AppLayout>
</template>

<style>

</style>
