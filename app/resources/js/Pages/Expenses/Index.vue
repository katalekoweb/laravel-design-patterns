<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    expenses: Object,
    default: () => ({}),
});

const form = useForm();

</script>

<template>

    <Head title="Controle de Gastos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Controle de Gastos
                </h2>
                <div>
                    <Link :href="route('expenses.create')" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25 transition">Adicionar Gasto</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3">Título</th>
                                        <th class="px-4 py-3">Valor</th>
                                        <th class="px-4 py-3">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="expense in expenses" :key="expense.id"
                                        class=" odd:bg-slate-100 even:bg-slate-200">
                                        <td class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">{{
                                            expense.title }}
                                        </td>
                                        <td class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">{{
                                            expense.amount }}
                                        </td>
                                        <td class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                            <Link :href="route('expenses.edit', expense.id)"
                                                class="text-blue-500 hover:text-blue-700">Editar</Link>
                                            <PrimaryButton @click="form.delete(route('expenses.destroy', expense.id))"
                                                class="ml-2">Excluir</PrimaryButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
