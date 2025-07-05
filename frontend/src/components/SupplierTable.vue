<script setup>
import { Edit, Trash2 } from "lucide-vue-next";
</script>

<template>
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Nome/Razão Social
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Documento
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Contato
          </th>
          <th
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Cidade/Estado
          </th>
          <th
            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Ações
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap">
            <div>
              <div class="text-sm font-medium text-gray-900">
                Nome do Fornecedor
              </div>
              <div class="text-sm text-gray-500">Nome Fantasia</div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">00.000.000/0000-00</div>
            <span
              class="inline-flex px-2 py-1 text-xs font-medium rounded-md border border-gray-300 text-gray-700 bg-white"
            >
              CNPJ
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">fornecedor@email.com</div>
            <div class="text-sm text-gray-500">(00) 00000-0000</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            Cidade/UF
          </td>
          <td
            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
          >
            <div class="flex justify-end gap-2">
              <button title="Editar" class="cursor-pointer">
                <Edit class="h-4 w-4 text-blue-600" />
              </button>
              <button title="Excluir" class="cursor-pointer">
                <Trash2 class="h-4 w-4 text-red-600" />
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped></style>
