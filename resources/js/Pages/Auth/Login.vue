<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Connexion" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit" class="align-self-center mt-4">
            <div class="row d-flex justify-content-center">
                <div class="col-4 my-4">
                    <img src="../../assets/atb.png" alt="" class="img-fluid">
                </div>
                <div class="d-flex flex-direction-row justify-content-center">
                    <span class="h4 text-center text-uppercase text-light">connexion</span>
                </div>
                <div class="col-md-10 mt-4 mb-5">
                    <!-- <InputLabel for="email" value="Email" class="mb-0 mt-3"/> -->
                    <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" placeholder="Email"/>
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="col-md-10 mb-5">
                    <!-- <InputLabel for="password" value="Password" class="mb-0 mt-3" /> -->
                    <TextInput id="password" type="password" v-model="form.password" required autocomplete="current-password" placeholder="Password"/>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div class="col-md-10 mb-5">
                    <PrimaryButton class="mb-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Se connecter
                    </PrimaryButton>

                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-light text-center mb-4">
                        Mot de passe oublié?
                    </Link>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>

