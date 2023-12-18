<template>
  <div>
    <Head :title="`${form.nama_produk}`" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/produk">Produk</Link>
        <span class="text-indigo-400 font-medium">/</span>
        {{ form.nama_produk }}
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.nama_produk" :error="form.errors.nama_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Nama Produk" />
          <div class="w-full pb-4">
            <file-input v-model="form.gambar_produk" :errors="form.errors.gambar_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Gambar Produk (ukuran 1:1)" />
            <img v-if="!form.gambar_produk" :src="produk.gambar_produk" class="w-52" :alt="produk.nama_produk" />
          </div>
          <text-input v-model="form.harga_produk" type="number" :error="form.errors.harga_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Harga Produk" />
          <text-input v-model="form.stok_produk" type="number" :error="form.errors.stok_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Stok Produk" />
          <textarea-input v-model="form.deskripsi_produk" :error="form.errors.deskripsi_produk" class="pb-8 pr-6 w-full" label="Deskripsi Produk" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Hapus Produk</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Perbarui Produk</loading-button>
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
    produk: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        nama_produk: this.produk.nama_produk,
        harga_produk: this.produk.harga_produk,
        stok_produk: this.produk.stok_produk,
        gambar_produk: null,
        deskripsi_produk: this.produk.deskripsi_produk,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/dashboard/produk/${this.produk.id_produk}`, {
        onSuccess: () => this.form.reset('gambar_produk'),
      })
    },
    destroy() {
      if (confirm('Apakah kamu yakin ingin menghapus produk ini?')) {
        this.$inertia.delete(`/dashboard/produk/${this.produk.id_produk}`)
      }
    },
  },
}
</script>
