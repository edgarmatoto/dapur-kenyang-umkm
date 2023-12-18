<template>
  <div>
    <Head title="Kontak" />
    <h1 class="mb-8 text-3xl font-bold">Kontak</h1>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Nomor Telepon</th>
          <th class="pb-4 pt-6 px-6">Link Instagram</th>
          <th class="pb-4 pt-6 px-6">Link Facebook</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Alamat (Gmaps Embed)</th>
        </tr>
        <tr v-for="k in kontak" :key="k.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="auth.user.owner ? `/dashboard/kontak/${k.id}/edit` : undefined">
              {{ k.nomor_telepon }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="auth.user.owner ? `/dashboard/kontak/${k.id}/edit` : undefined" tabindex="-1">
              {{ k.instagram ? k.instagram : 'Kosong' }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="auth.user.owner ? `/dashboard/kontak/${k.id}/edit` : undefined" tabindex="-1">
              {{ k.facebook ? k.facebook : 'Kosong' }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="auth.user.owner ? `/dashboard/kontak/${k.id}/edit` : undefined" tabindex="-1">
              {{ k.alamat ? k.alamat : 'Kosong' }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="auth.user.owner ? `/dashboard/kontak/${k.id}/edit` : undefined" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="kontak.length === 0">
          <td class="px-6 py-4 border-t italic text-center" colspan="4">Data kontak tidak ditemukan.</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
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
    kontak: Array,
    auth: Object,
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/dashboard/kontak', pickBy(this.form), { preserveState: true })
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
