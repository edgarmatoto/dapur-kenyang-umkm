<template>
  <div>
    <Head :title="`${form.nama}`" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/testimoni">Testimoni</Link>
        <span class="text-indigo-400 font-medium">/</span>
        {{ form.nama }}
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.nama" :error="form.errors.nama" class="pb-8 pr-6 w-full lg:w-1/2" label="Nama" />
          <text-input v-model="form.skor_bintang" type="number" min="1" max="5" :error="form.errors.skor_bintang" class="pb-8 pr-6 w-full lg:w-1/2" label="Skor Testimoni (1-5)" />
          <div class="w-full pb-4">
            <file-input v-model="form.foto" :errors="form.errors.foto" class="pb-8 pr-6 w-full lg:w-1/2" label="Foto Testimoni (ukuran 600x600px)" />
            <img v-if="!form.foto" :src="testimoni.foto" class="w-52" :alt="testimoni.nama" />
          </div>
          <textarea-input v-model="form.deskripsi" :error="form.errors.deskripsi" class="pb-8 pr-6 w-full" label="Deskripsi Testimoni" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Hapus Testimoni</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Perbarui Testimoni</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import FileInput from '@/Shared/FileInput'
import LoadingButton from '@/Shared/LoadingButton'
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
  props: {
    testimoni: Object,
    auth: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        nama: this.testimoni.nama,
        skor_bintang: this.testimoni.skor_bintang,
        foto: null,
        deskripsi: this.testimoni.deskripsi,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/dashboard/testimoni/${this.testimoni.id}`, {
        onSuccess: () => this.form.reset('foto'),
      })
    },
    destroy() {
      if (confirm('Apakah kamu yakin ingin menghapus testimoni ini?')) {
        this.$inertia.delete(`/dashboard/testimoni/${this.testimoni.id}`)
      }
    },
  },
}
</script>
