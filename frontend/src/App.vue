<script setup>
import Header from "./components/Header.vue";
import SupplierFilters from "./components/SupplierFilters.vue";
import SupplierList from "./components/SupplierList.vue";
import SupplierForm from "./components/SupplierForm.vue";

import { ref } from "vue";

const showForm = ref(false);

const openForm = () => {
  showForm.value = true;
};

const closeForm = () => {
  showForm.value = false;
};
</script>

<template>
  <main class="min-h-screen bg-gray-50">
    <Header @open-form="openForm" />

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
  </main>
</template>

<style scoped></style>
