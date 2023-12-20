<script setup>
  import axios from 'axios';
  import { ref, onMounted } from 'vue';
  import { Link } from '@inertiajs/inertia-vue3';
  import { FwbPagination, FwbModal } from 'flowbite-vue'
  
  const list = ref({});
  const view = ref({});
  const page = ref(1);
  const isShowModal = ref(false)

  const callList = async () => {
    const { data } = await axios.get(`https://digi-api.com/api/v1/digimon?pageSize=18&page=${page.value}`);
    list.value = data;
  }
  const viewDigimon = async (e) => {
    const { data } = await axios.get(`${e}`);
    view.value = data;
    isShowModal.value = true;
  }

  onMounted(() => {
      callList()
  })
</script>
<template>
  <TitleHead  :title="'Digimones'"/>
  <nav class="bg-gray-700 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <div class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-sm font-semibold whitespace-nowrap cursor-auto text-white">Hola {{ $page.props.auth.user.name }}</span>
      </div>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <Link href="/auth/logout" method="post" as="button" class="block py-2 bg-gray-700 text-white text-sm">Cerrar sesión</Link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mx-auto mt-10">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
      <div class="w-full rounded overflow-hidden shadow-lg cursor-pointer transition duration-150 ease-out hover:ease-in" @click="viewDigimon(i.href)" v-for="i in list.content">
        <img class="w-full" :src="i.image ? i.image : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg'" style="max-height:15rem;width:100%" :alt="i.name ? i.name : ''">
        <div class="px-6 py-4">
          <div class="font-bold text-sm mb-2 text-center">{{ i.name ? i.name : '' }}</div>
        </div>
      </div>
    </div>
    <div class="text-center mt-3">
      <fwb-pagination v-model="page" @click="callList" class="pagination" v-if="list.pageable" :total-pages="list.pageable.totalPages" :slice-length="4" large></fwb-pagination>
    </div>
    <fwb-modal v-if="isShowModal" @close="isShowModal = false">
      <template #header>
        <div class="flex items-center text-lg text-gray-900">
          Digimon | {{ view.name }}
        </div>
      </template>
      <template #body v-if="view && view.name">
        <p class="leading-relaxed text-3xl mb-3 text-center text-gray-900 underline">
          {{ view.name }}
        </p>
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
          <img class="w-full px-10" :src="view.images[0].href" style="max-height:20rem;width:100%" :alt="view.name">
        </p>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3">
          <div>
            <div class="text-gray-900 mt-3 text-center text-xl">Level</div>
            <div class="text-gray-900 mt-3 text-center text-lg">{{ view.levels && view.levels[0] && view.levels[0].level ? view.levels[0].level : 'N/A' }}</div>
          </div>
          <div>
            <div class="text-gray-900 mt-3 text-center text-xl">Attribute</div>
            <div class="text-gray-900 mt-3 text-center text-lg">{{ view.attributes && view.attributes[0] && view.attributes[0].attribute ? view.attributes[0].attribute : 'N/A' }}</div>
          </div>
          <div>
            <div class="text-gray-900 mt-3 text-center text-xl">Type</div>
            <div class="text-gray-900 mt-3 text-center text-lg">{{ view.types && view.types[0] && view.types[0].type ? view.types[0].type : 'N/A' }}</div>
          </div>
        </div>
        <div class="text-center mt-10">
          <div class="text-gray-900 mt-3 text-center text-xl">Fields</div>
          <div class="text-gray-900 mt-3 text-center text-lg align-middle inline-flex" v-if="view.fields && view.fields[0] && view.fields[0].image">
            <img class="w-full" :src="view.fields[0].image" style="max-height:3rem;width:3rem" :alt="view.fields[0].field">
          </div>
          <div class="text-white mt-3 text-center text-lg align-middle inline-flex" v-else>
            N/A
          </div>
        </div>
      </template>
    </fwb-modal>
  </div>
</template>