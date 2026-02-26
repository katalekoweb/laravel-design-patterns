<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    expense: Object,
});

const form = useForm({
    title: props.expense ? props.expense.title : '',
    description: props.expense ? props.expense.description : '',
    amount: props.expense ? props.expense.amount : '',
});

const saveExpense = () => {
    if (props.expense?.id) {
        form.put(route('expenses.update', props.expense.id));
    } else {
        form.post(route('expenses.store'));
    }
};

</script>

<template>

    <Head :title="props.expense?.id ? 'Editar Gasto' : 'Criar Gasto'" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ props.expense?.id ? 'Editar Gasto' : 'Criar Gasto' }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="space-y-4">
                            <div>
                                <InputLabel for="title" value="Título" />

                                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                    autofocus autocomplete="title" />

                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>

                            <div>
                                <InputLabel for="amount" value="Valor" />
                                <TextInput id="amount" type="text" class="mt-1 block w-full" v-model="form.amount" required
                                    autofocus autocomplete="amount" />
                                <InputError class="mt-2" :message="form.errors.amount" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Descrição" />

                                <textarea id="description" type="text" class="mt-1 block w-full border rounded-xl border-gray-200" v-model="form.description" 
                                    autofocus autocomplete="description" />

                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div>
                                <PrimaryButton class="mt-4" @click="saveExpense()">
                                    {{ props.expense?.id ? 'Atualizar' : 'Criar' }}
                                </PrimaryButton>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
