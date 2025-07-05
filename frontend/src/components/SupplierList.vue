<script setup>
import SupplierTable from "./SupplierTable.vue";
import Pagination from "./Pagination.vue";
import axios from "axios";

import { onMounted, ref } from "vue";

const suppliers = ref([]);
const pagination = ref({});
const loading = ref(true);

const fetchSuppliers = async (url = "http://localhost:8000/api/suppliers") => {
  loading.value = true;
  try {
    const response = await axios.get(url);
    suppliers.value = response.data.data;

    delete response.data.data;
    pagination.value = response.data;
  } catch (error) {
    console.error("Erro ao buscar fornecedores:", error);
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchSuppliers();
});
</script>

<template>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="px-6 py-4 border-b border-gray-200">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">
          Fornecedores Cadastrados
        </h2>
        <span
          v-if="pagination.total"
          class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-gray-100 text-gray-800"
        >
          {{ pagination.total }} fornecedores
        </span>
      </div>
    </div>

    <div class="p-6">
      <SupplierTable :suppliers="suppliers" :loading="loading" />

      <Pagination :pagination="pagination" @change-page="fetchSuppliers" />
    </div>
  </div>
</template>

<style scoped></style>
