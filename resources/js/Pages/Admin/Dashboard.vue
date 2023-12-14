<script setup>
import { ref, onMounted } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/vue3'

import AdminLayout from '@/Layouts/AdminLayout.vue'

const props = defineProps({
  contents: {
    type: String,
    default: null
  }
})

const editor = ref(null)
const test = ref('')
const formContent = useForm({
  content: null,
  user: usePage().props.auth.user
})

onMounted(() => {
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    ['image','video'],
    ['blockquote', 'code-block'],
    [{ 'header': 1 }, { 'header': 2 }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],
    [{ 'direction': 'rtl' }],
    [{ 'size': ['small', false, 'large', 'huge'] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'font': [] }],
    [{ 'align': [] }],
    ['clean']
  ]

  let options = {
    modules: {
      toolbar: toolbarOptions
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
  }

  editor.value = new Quill('.editor', options)
  if (props.contents != null) editor.value.root.innerHTML = props.contents

  let toolbar = document.querySelector('.ql-toolbar')
  toolbar.classList.add('bg-white')
  toolbar.classList.add('text-neutral-600')
  toolbar.classList.add('rounded-tr')
  toolbar.classList.add('rounded-tl')
})

const saveContent = () => {
  formContent.content = editor.value.root.innerHTML

  formContent.post('/store-content', {
    preserveScroll: true
  })
}
</script>

<template>
  <Head title="Dashboard" />

  <AdminLayout>
    <div class="flex flex-col gap-0 bg-neutral-600 p-2 rounded">
      <p class="text-white text-2xl font-bold mb-2">Modificar contenido de inicio</p>
      <div @change="test = editor.getContents()" class="editor bg-white text-neutral-600 rounded-br rounded-bl"></div>
      <button class="text-white hover:bg-blue-600 bg-blue-400 mt-2 p-2 md:w-2/12 md:self-end rounded duration-200" @click="saveContent">Guardar</button>
    </div>
  </AdminLayout>
</template>

<style>
</style>
