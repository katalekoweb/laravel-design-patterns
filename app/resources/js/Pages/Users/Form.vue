<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    name: props.user ? props.user.name : '',
    email: props.user ? props.user.email : '',
    password: '',
    password_confirmation: '',
});

const saveUser = () => {
    if (props.user?.id) {
        form.put(route('users.update', props.user.id));
    } else {
        form.post(route('users.store'));
    }
};

</script>

<template>

    <Head :title="props.user?.id ? 'Editar Usuário' : 'Criar Usuário'" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ props.user?.id ? 'Editar Usuário' : 'Criar Usuário' }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="space-y-4">
                            <div>
                                <InputLabel for="name" value="Nome" />

                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                    autofocus autocomplete="name" />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div>
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                    autofocus autocomplete="email" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div>
                                <InputLabel for="password" value="Senha" />

                                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                                    autofocus autocomplete="password" />

                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div>
                                <InputLabel for="password_confirmation" value="Confirmar Senha" />

                                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required
                                    autofocus autocomplete="password_confirmation" />

                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                            </div>

                            <div>
                                <PrimaryButton class="mt-4" @click="saveUser()">
                                    {{ props.user?.id ? 'Atualizar' : 'Criar' }}
                                </PrimaryButton>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
