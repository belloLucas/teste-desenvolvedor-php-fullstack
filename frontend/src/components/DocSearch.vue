<script setup>
import { Search, X } from "lucide-vue-next";

const emit = defineEmits(["close-doc-search"]);
</script>

<template>
  <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
      <h2 class="text-lg font-semibold">Buscar e Visualizar Documento</h2>
      <button
        @click="emit('close-doc-search')"
        class="p-2 rounded-md hover:bg-gray-100 cursor-pointer"
      >
        <X class="h-4 w-4" />
      </button>
    </div>
    <div class="p-6 space-y-6">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          CNPJ
        </label>
        <div class="flex gap-2">
          <input
            type="text"
            placeholder="Digite o CNPJ para buscar..."
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
          />
          <button
            type="button"
            class="flex items-center gap-2 px-4 py-2 bg-white hover:bg-gray-100 border border-gray-200 text-zing-800 rounded-md cursor-pointer"
          >
            <Search class="h-4 w-4" />
            <span>Buscar</span>
          </button>
        </div>
      </div>

      <div class="border-t border-gray-200"></div>

      <div class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Razão Social</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Nome Fantasia</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >CNPJ</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Telefone</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1"
            >Logradouro</label
          >
          <input
            type="text"
            class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
            readonly
          />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Bairro</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Município</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >UF</label
            >
            <input
              type="text"
              class="w-full bg-gray-50 px-3 py-2 border border-gray-300 rounded-md"
              readonly
            />
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
        <button
          @click="emit('close-doc-search')"
          class="px-4 py-2 border border-gray-300 rounded-md bg-transparent hover:bg-gray-50 text-gray-700 cursor-pointer"
        >
          Cancelar
        </button>
        <button
          class="px-4 py-2 bg-zinc-800 hover:bg-zinc-900 text-white rounded-md cursor-pointer"
        >
          Usar Dados
        </button>
      </div>
    </div>
  </div>
</template>
