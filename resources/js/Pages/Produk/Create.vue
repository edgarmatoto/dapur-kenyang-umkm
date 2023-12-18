<template>
  <div>
    <Head title="Buat Produk" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/produk">Produk</Link>
      <span class="text-indigo-400 font-medium">/</span> Tambah
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.nama_produk" :error="form.errors.nama_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Nama Produk" />
          <file-input v-model="form.gambar_produk" :errors="form.errors.gambar_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Gambar Produk (ukuran 1:1)" />
          <text-input v-model="form.harga_produk" type="number" :error="form.errors.harga_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Harga Produk" />
          <text-input v-model="form.stok_produk" type="number" :error="form.errors.stok_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Stok Produk" />
          <textarea-input v-model="form.deskripsi_produk" :error="form.errors.deskripsi_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Deskripsi Produk" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Tambah Produk</loading-button>
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
  data() {
    return {
      form: this.$inertia.form({
        nama_produk: null,
        gambar_produk: null,
        harga_produk: null,
        stok_produk: null,
        deskripsi_produk: null,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/dashboard/produk')
    },
  },
}
</script>
