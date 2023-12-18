<template>
  <div>
    <Head title="Buat Testimoni" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/testimoni">Testimoni</Link>
      <span class="text-indigo-400 font-medium">/</span> Tambah
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.nama" :error="form.errors.nama" class="pb-8 pr-6 w-full lg:w-1/2" label="Nama" />
          <text-input v-model="form.skor_bintang" type="number" min="1" max="5" :error="form.errors.skor_bintang" class="pb-8 pr-6 w-full lg:w-1/2" label="Skor Testimoni (1-5)" />
          <file-input v-model="form.foto" :errors="form.errors.foto" class="pb-8 pr-6 w-full lg:w-1/2" label="Foto Testimoni (ukuran 600x600px)" />
          <textarea-input v-model="form.deskripsi" :error="form.errors.deskripsi" class="pb-8 pr-6 w-full lg:w-1/2" label="Deskripsi Testimoni" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Tambah Testimoni</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import FileInput from '@/Shared/FileInput.vue'
import TextareaInput from '@/Shared/TextareaInput.vue'

export default {
  components: {
    TextareaInput,
    FileInput,
    Head,
    Link,
    LoadingButton,
    TextInput,
  },
  layout: Layout,
  remember: 'form',
  props: {
    auth: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        nama: null,
        skor_bintang: null,
        deskripsi: null,
        foto: null,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/dashboard/testimoni')
    },
  },
}
</script>
