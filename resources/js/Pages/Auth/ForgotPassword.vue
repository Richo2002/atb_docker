<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Mot de passe oublié" />

        <!-- <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div> -->

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="align-self-center mt-4">
            <div class="row d-flex justify-content-center">
                <div class="col-4 my-4">
                    <img src="../../assets/atb.png" alt="" class="img-fluid">
                </div>
                <div class="d-flex flex-direction-row justify-content-center">
                    <span class="d-block text-center text-uppercase text-light">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </span>
                </div>
                <div class="col-md-10 mt-4 mb-5">
                    <!-- <InputLabel for="email" value="Email" /> -->
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" placeholder="Email"/>
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="col-md-10 mb-5">
                    <PrimaryButton class="mb-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Email Password Reset Link
                    </PrimaryButton>
                    <Link href="/login" class="underline text-light text-center mb-4">
                        Retour à la page précédente
                    </Link>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
