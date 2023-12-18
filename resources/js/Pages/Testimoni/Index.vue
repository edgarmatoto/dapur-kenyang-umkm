<template>
  <div>
    <Head title="Testimoni" />
    <h1 class="mb-8 text-3xl font-bold">Testimoni</h1>
    <div class="flex items-center justify-between mb-6">
      <Link v-if="auth.user.owner" class="btn-indigo" href="/dashboard/testimoni/create">
        <span>Tambah</span>
        <span class="hidden md:inline">&nbsp;Testimoni</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full leading-6 whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Nama</th>
          <th class="pb-4 pt-6 px-6">Nilai</th>
          <th class="pb-4 pt-6 px-6">Gambar</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Deskripsi</th>
        </tr>
        <tr v-for="t in testimoni" :key="t.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="auth.user.owner ? `/dashboard/testimoni/${t.id}/edit` : undefined">
              {{ t.nama }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="auth.user.owner ? `/dashboard/testimoni/${t.id}/edit` : undefined" tabindex="-1">
              {{ t.skor_bintang }}
            </Link>
          </td>
          <td class="border-t">
            <div class="flex items-center px-6" tabindex="-1">
              <div>
                <v-dialog width="500">
                  <template #activator="{ props }">
                    <button v-bind="props" class="btn-indigo focus:bg-indigo-600">Lihat</button>
                  </template>

                  <template #default="{ isActive }">
                    <v-card title="Foto Testimoni">
                      <v-card-text>
                        <img v-if="t.foto" :src="t.foto" :alt="t.nama" />
                      </v-card-text>

                      <v-card-actions>
                        <v-spacer />

                        <button
                          class="btn-indigo mr-4 bg-red-600"
                          @click="isActive.value = false"
                        >
                          Tutup
                        </button>
                      </v-card-actions>
                    </v-card>
                  </template>
                </v-dialog>
              </div>
            </div>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="auth.user.owner ? `/dashboard/testimoni/${t.id}/edit` : undefined" tabindex="-1">
              {{ t.deskripsi }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="auth.user.owner ? `/dashboard/testimoni/${t.id}/edit` : undefined" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="testimoni.length === 0">
          <td class="px-6 py-4 border-t italic text-center" colspan="4">Data testimoni tidak ditemukan.</td>
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
    testimoni: Array,
    auth: Object,
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/dashboard/testimoni', pickBy(this.form), { preserveState: true })
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
