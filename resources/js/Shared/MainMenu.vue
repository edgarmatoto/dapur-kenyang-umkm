<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard">
        <icon name="dashboard" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Dashboard</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/users">
        <icon name="users" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/users') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/users') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Admin</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/produk">
        <icon name="produk" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/produk') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/produk') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Produk</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/testimoni">
        <icon name="testimoni" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/testimoni') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/testimoni') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Testimoni</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/kontak/1/edit">
        <icon name="kontak" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/kontak') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/kontak') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Kontak</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/header-website">
        <icon name="header-website" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/header-website') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/header-website') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Header</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/tentang-kami">
        <icon name="tentang-kami" class="mr-2 w-4 h-4"
              :class="isUrl('dashboard/tentang-kami') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'"
        />
        <div :class="isUrl('dashboard/tentang-kami') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Tentang Kami</div>
      </Link>
    </div>
  </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === 'dashboard') {
        return currentUrl === 'dashboard'
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
