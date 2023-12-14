<script setup>
import { Link, usePage } from '@inertiajs/vue3'

if (usePage().props.flash.success != null) {
  setTimeout(() => {
    usePage().props.flash.success = null
  }, 3000)
}
</script>

<template>
  <div class="relative w-screen h-screen">
    <p v-if="usePage().props.flash.success != null" class="text-white fixed top-2 right-2 px-4 py-2 bg-blue-500 z-10 rounded">
      {{ usePage().props.flash.success }}
    </p>

    <main class="relative flex flex-col gap-2 p-2">
      <slot />
    </main>

    <nav class="fixed flex bg-neutral-600 justify-between bottom-0 w-full h-16">
      <Link :href="route('admin.dashboard')" class="w-full text-white shadow-inner shadow-white h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white">
        <i class="fa-solid fa-home"></i>
        <p class="text-xs font-semibold uppercase">inicio</p>
      </Link>

      <Link :href="route('logout')" method="post" as="button" class="w-full text-white shadow-inner shadow-white h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p class="text-xs font-semibold uppercase">logout</p>
      </Link>
    </nav>
  </div>
</template>

<style>

</style>
