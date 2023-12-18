<template>
  <div>
    <Head title="Edit Header" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/header-website">Header</Link>
        <span class="text-indigo-400 font-medium">/</span>
        Edit
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <select-input v-model="form.id_produk" :error="form.errors.id_produk" class="pb-8 pr-6 w-full lg:w-1/2" label="Pilih Produk">
            <option v-for="p in produk" :key="p.id_produk" :value="p.id_produk">{{ p.nama_produk }}</option>
          </select-input>
          <textarea-input v-model="form.slogan" :error="form.errors.slogan" class="pb-8 pr-6 w-full" label="Slogan" />
          <textarea-input v-model="form.deskripsi" :error="form.errors.deskripsi" class="pb-8 pr-6 w-full" label="Deskripsi" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Hapus Header</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Perbarui Header</loading-button>
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
  props: {
    headerWebsite: Object,
    produk: Array,
    auth: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        slogan: this.headerWebsite.slogan,
        deskripsi: this.headerWebsite.deskripsi,
        id_produk: this.headerWebsite.id_produk,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/dashboard/header-website/${this.headerWebsite.id}`)
    },
    destroy() {
      if (confirm('Apakah kamu yakin ingin menghapus header ini?')) {
        this.$inertia.delete(`/dashboard/header-website/${this.headerWebsite.id}`)
      }
    },
  },
}
</script>
