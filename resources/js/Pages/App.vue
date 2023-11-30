<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Ads from '@/Components/Ads.vue'
import { Head, usePage } from '@inertiajs/vue3'
import { ref, onMounted, onBeforeMount } from 'vue'

const logged = ref(false)

onBeforeMount(() => {
  if (localStorage.getItem('logged') != null) logged.value = true
})

onMounted(() => {
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
      <article class="text-white">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis veritatis nesciunt quibusdam saepe dolores iure deleniti corporis delectus rerum vitae quis hic quos at aut, dolor, sunt aliquid labore ratione.
      </article>
    </section>

    <section class="bg-neutral-500 p-4 rounded">
      <Ads />
    </section>
  </AppLayout>
</template>

<style>

</style>
