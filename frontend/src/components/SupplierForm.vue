<script setup>
import { X } from "lucide-vue-next";
import { ref } from "vue";
import axios from "axios";
import { useToasts } from "./toast/useToasts";

const emit = defineEmits(["close-form"]);
const { addToast } = useToasts();

const supplier = ref({
  document_type: "",
  document_number: "",
  name: "",
  phone: "",
  address: {
    street: "",
    house_number: "",
    neighborhood: "",
    city: "",
    state: "",
  },
});

const handleSubmit = async (event) => {
  event.preventDefault();
  try {
    await axios.post("http://localhost:8000/api/suppliers", supplier.value);
    addToast("Fornecedor cadastrado com sucesso!", "success");
    emit("close-form");
  } catch (error) {
    console.error("Erro ao cadastrar fornecedor:", error);
    addToast("Erro ao cadastrar fornecedor. Tente novamente.", "error");
  }
};
</script>

<template>
  <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
    <div class="px-6 py-4 border-b border-gray-200">
      <div class="flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-900">Novo Fornecedor</h2>
        <button
          @click="emit('close-form')"
          class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-md transition-colors cursor-pointer"
        >
          <X class="h-4 w-4" />
        </button>
      </div>
    </div>

    <div class="p-6">
      <form class="space-y-6" @submit="handleSubmit">
        <div>
          <label class="block text-base font-medium text-gray-700 mb-2"
            >Tipo de Documento</label
          >
          <div class="flex gap-4">
            <label
              class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-md cursor-pointer"
            >
              <input
                type="radio"
                name="document_type"
                value="CNPJ"
                class="form-radio h-4 w-4 text-blue-600"
                v-model="supplier.document_type"
                required
              />
              <span>Pessoa Jurídica (CNPJ)</span>
            </label>
            <label
              class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-md cursor-pointer"
            >
              <input
                type="radio"
                name="document_type"
                value="CPF"
                class="form-radio h-4 w-4 text-blue-600"
                v-model="supplier.document_type"
                required
              />
              <span>Pessoa Física (CPF)</span>
            </label>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Numero do Documento</label
            >
            <input
              type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-md"
              v-model="supplier.document_number"
              required
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Nome</label
            >
            <input
              type="text"
              class="w-full px-3 py-2 border border-gray-300 rounded-md"
              v-model="supplier.name"
              required
            />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Telefone</label
            >
            <input
              type="tel"
              class="w-full px-3 py-2 border border-gray-300 rounded-md"
              v-model="supplier.phone"
              required
            />
          </div>
        </div>

        <div class="pt-6 border-t border-gray-200">
          <h3 class="text-base font-medium text-gray-900 mb-4">Endereço</h3>
          <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
            <div class="md:col-span-4">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Rua</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md"
                v-model="supplier.address.street"
                required
              />
            </div>
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Número</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md"
                v-model="supplier.address.house_number"
                required
              />
            </div>
            <div class="md:col-span-3">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Bairro</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md"
                v-model="supplier.address.neighborhood"
                required
              />
            </div>
            <div class="md:col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Cidade</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md"
                v-model="supplier.address.city"
                required
              />
            </div>
            <div class="md:col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >UF</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md"
                v-model="supplier.address.state"
                required
              />
            </div>
          </div>
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
          <button
            class="px-4 py-2 border border-gray-300 rounded-md bg-transparent hover:bg-gray-50 text-gray-700 cursor-pointer"
          >
            Cancelar
          </button>
          <button
            class="px-4 py-2 bg-zinc-800 hover:bg-zinc-900 text-white rounded-md cursor-pointer"
          >
            Cadastrar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped></style>
