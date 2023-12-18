<template>
  <div>
    <Head title="Buat Header" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/header-website">Header</Link>
      <span class="text-indigo-400 font-medium">/</span> Tambah
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <select-input v-model="form.id_produk" :error="form.errors.id_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Pilih Produk">
            <option v-for="p in produk" :key="p.id_produk" :value="p.id_produk">{{ p.nama_produk }}</option>
          </select-input>
          <textarea-input v-model="form.slogan" :error="form.errors.slogan" class="pb-8 pr-6 w-full" label="Slogan" />
          <textarea-input v-model="form.deskripsi" :error="form.errors.deskripsi" class="pb-8 pr-6 w-full" label="Deskripsi" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Tambah Header</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout'
import LoadingButton from '@/Shared/LoadingButton'
import TextareaInput from '@/Shared/TextareaInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'

export default {
  components: {
    SelectInput,
    TextareaInput,
    Head,
    Link,
    LoadingButton,
  },
  layout: Layout,
  remember: 'form',
  props: {
    produk: Array,
    auth: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        slogan: null,
        deskripsi: null,
        id_produk: null,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/dashboard/header-website')
    },
  },
}
</script>
