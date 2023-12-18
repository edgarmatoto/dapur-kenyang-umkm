<template>
  <div>
    <Head :title="Kontak" />
    <div class="flex justify-start mb-8 max-w-3xl">
      <h1 class="text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="">Kontak</Link>
        <span class="text-indigo-400 font-medium">/</span>
        Edit
      </h1>
    </div>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.nomor_telepon" :error="form.errors.nomor_telepon" class="pb-8 pr-6 w-full lg:w-1/2" label="Nomor Telepon" />
          <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email UMKM" />
          <text-input v-model="form.alamat" :error="form.errors.alamat" class="pb-8 pr-6 w-full lg:w-1/2" label="Alamat (Google Maps Embed - src)" />
          <text-input v-model="form.alamat_jalan" :error="form.errors.alamat_jalan" class="pb-8 pr-6 w-full lg:w-1/2" label="Alamat Jalan" />
          <text-input v-model="form.instagram" :error="form.errors.instagram" class="pb-8 pr-6 w-full lg:w-1/2" label="Link Instagram" />
          <text-input v-model="form.facebook" :error="form.errors.facebook" class="pb-8 pr-6 w-full lg:w-1/2" label="Link Facebook" />
          <text-input v-model="form.tiktok" :error="form.errors.tiktok" class="pb-8 pr-6 w-full lg:w-1/2" label="Link Tiktok" />
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button v-if="form.isDirty" :loading="form.processing" class="btn-indigo ml-auto" type="submit">Perbarui Kontak</loading-button>
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

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
  },
  layout: Layout,
  props: {
    kontak: Object,
    auth: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        nomor_telepon: this.kontak.nomor_telepon,
        email: this.kontak.email,
        alamat: this.kontak.alamat,
        alamat_jalan: this.kontak.alamat_jalan,
        instagram: this.kontak.instagram,
        facebook: this.kontak.facebook,
        tiktok: this.kontak.tiktok,
        id_user: this.auth.user.id,
      }),
    }
  },
  methods: {
    update() {
      this.form.post(`/dashboard/kontak/${this.kontak.id}`)
    },
  },
}
</script>
