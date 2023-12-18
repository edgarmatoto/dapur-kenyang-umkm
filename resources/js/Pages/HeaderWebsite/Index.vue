<template>
  <div>
    <Head title="Header Website" />
    <h1 class="mb-8 text-3xl font-bold">Header Website</h1>
    <div class="flex items-center justify-between mb-6">
      <Link v-if="auth.user.owner" class="btn-indigo" href="/dashboard/header-website/create">
        <span>Tambah</span>
        <span class="hidden md:inline">&nbsp;Header</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full leading-6 whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Produk</th>
            <th class="pb-4 pt-6 px-6">Slogan</th>
            <th class="pb-4 pt-6 px-6" colspan="2">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="h in headerWebsite" :key="h.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
            <td class="border-t">
              <Link
                class="flex items-center px-6 py-4 focus:text-indigo-500"
                :href="auth.user.owner ? `/dashboard/header-website/${h.id}/edit` : undefined"
              >
                {{ h.nama_produk }}
              </Link>
            </td>
            <td class="border-t">
              <Link
                class="flex items-center px-6 py-4"
                :href="auth.user.owner ? `/dashboard/header-website/${h.id}/edit` : undefined" tabindex="-1"
              >
                {{ h.slogan }}
              </Link>
            </td>
            <td class="border-t">
              <Link
                class="flex items-center px-6 py-4"
                :href="auth.user.owner ? `/dashboard/header-website/${h.id}/edit` : undefined" tabindex="-1"
              >
                {{ h.deskripsi }}
              </Link>
            </td>
            <td class="w-px border-t">
              <Link
                class="flex items-center px-4" :href="auth.user.owner ? `/dashboard/header-website/${h.id}/edit` : undefined"
                tabindex="-1"
              >
                <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
              </Link>
            </td>
          </tr>
          <tr v-if="headerWebsite.length === 0">
            <td class="px-6 py-4 border-t italic text-center" colspan="4">Data headerWebsite tidak ditemukan.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'

export default {
  components: {
    Head,
    Icon,
    Link,
  },
  layout: Layout,
  props: {
    headerWebsite: Array,
    auth: Object,
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/dashboard/header-website', pickBy(this.form), {preserveState: true})
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
