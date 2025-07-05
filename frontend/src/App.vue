<script setup>
import Header from "./components/Header.vue";
import SupplierFilters from "./components/SupplierFilters.vue";
import SupplierList from "./components/SupplierList.vue";
import SupplierForm from "./components/SupplierForm.vue";
import DocSearch from "./components/DocSearch.vue";
import Toast from "./components/toast/Toast.vue";

import { ref } from "vue";

const showForm = ref(false);
const showDocSearch = ref(false);

const openForm = () => {
  showForm.value = true;
};

const closeForm = () => {
  showForm.value = false;
};

const openDocSearch = () => {
  showDocSearch.value = true;
};

const closeDocSearch = () => {
  showDocSearch.value = false;
};
</script>

<template>
  <main class="min-h-screen bg-gray-50">
    <Header @open-form="openForm" @open-doc-search="openDocSearch" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <SupplierFilters />
      <SupplierList />
    </div>

    <div
      v-if="showForm"
      class="fixed inset-0 bg-black bg-black/50 z-40 flex justify-center items-center"
      @click.self="closeForm"
    >
      <div class="w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <SupplierForm @close-form="closeForm" />
      </div>
    </div>

    <div
      v-if="showDocSearch"
      class="fixed inset-0 bg-black bg-black/50 z-40 flex justify-center items-center"
      @click.self="closeDocSearch"
    >
      <DocSearch @close-doc-search="closeDocSearch" />
    </div>

    <Toast />
  </main>
</template>

<style scoped></style>
