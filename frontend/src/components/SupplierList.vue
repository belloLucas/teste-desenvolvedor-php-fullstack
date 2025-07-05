<script setup>
import SupplierTable from "./SupplierTable.vue";
import Pagination from "./Pagination.vue";
</script>

<template>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="px-6 py-4 border-b border-gray-200">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">
          Fornecedores Cadastrados
        </h2>
        <span
          class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-gray-100 text-gray-800"
        >
          10 fornecedores
        </span>
      </div>
    </div>

    <div class="p-6">
      <SupplierTable />

      <Pagination />
    </div>
  </div>
</template>

<style scoped></style>
