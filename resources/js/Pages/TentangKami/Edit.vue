<template>
  <div>
    <Head title="Tentang Kami" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/tentang-kami">Tentang Kami</Link>
        <span class="text-indigo-400 font-medium">/</span>
        Edit
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.judul" :error="form.errors.judul" class="pb-8 pr-6 w-full lg:w-1/2" label="Judul" />
          <textarea-input v-model="form.deskripsi" :error="form.errors.deskripsi" class="pb-8 pr-6 w-full" label="Deskripsi" />
          <div class="w-full pb-4">
            <file-input v-model="form.foto" :errors="form.errors.foto" class="pb-8 pr-6 w-full lg:w-1/2" label="Foto" />
            <img v-if="!form.foto" :src="tentangKami.foto" class="w-52" :alt="tentangKami.judul" />
          </div>
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Hapus Bagian Ini</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Perbarui Bagian Ini</loading-button>
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
    tentangKami: Object,
    auth: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        judul: this.tentangKami.judul,
        foto: null,
        deskripsi: this.tentangKami.deskripsi,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/dashboard/tentang-kami/${this.tentangKami.id}`, {
        onSuccess: () => this.form.reset('foto'),
      })
    },
    destroy() {
      if (confirm('Apakah kamu yakin ingin menghapus ini?')) {
        this.$inertia.delete(`/dashboard/tentang-kami/${this.tentangKami.id}`)
      }
    },
  },
}
</script>
