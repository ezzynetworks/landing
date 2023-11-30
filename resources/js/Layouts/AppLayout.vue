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

    <nav class="fixed flex bottom-0 w-full h-16">
      <a class="bg-white w-1/3 shadow-inner shadow-indigo-400 h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white" href="https://play.ezzytable.com" target="_blank">
        <i class="fa-solid fa-play"></i>
        <p class="text-xs font-semibold uppercase">jugar</p>
      </a>

      <Link :href="route('home')" class="bg-white w-1/3 shadow-inner shadow-indigo-400 h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white">
        <i class="fa-solid fa-home"></i>
        <p class="text-xs font-semibold uppercase">inicio</p>
      </Link>

      <Link v-if="usePage().props.auth.user == null" :href="route('login')" method="get" as="button" class="bg-white w-1/3 shadow-inner shadow-indigo-400 h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white">
        <i class="fa-solid fa-right-to-bracket"></i>
        <p class="text-xs font-semibold uppercase">login</p>
      </Link>

      <Link v-if="usePage().props.auth.user != null" :href="route('logout')" method="post" as="button" class="bg-white w-1/3 shadow-inner shadow-indigo-400 h-full flex gap-1 flex-col items-center justify-center duration-150 md:hover:bg-blue-500 md:hover:text-white md:hover:shadow-white">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p class="text-xs font-semibold uppercase">logout</p>
      </Link>
    </nav>
  </div>
</template>

<style>

</style>
