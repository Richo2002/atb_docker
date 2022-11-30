<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="d-flex direction-column justify-content-center admin-form-section">
        <slot />
    </div>
</template>

<style>
    .admin-form-section {
        min-height: 100vh;
    }

    .admin-form-section form {
        background: linear-gradient(180deg, rgba(70, 163, 157, 0.25), rgba(70, 163, 157, 0.25), rgba(16, 31, 38, 0.25));
        max-width: 500px !important;
        margin: 30px;
    }

    .admin-form-section form div div > .h4 {
        display: inline-block;
        width: fit-content;
        padding: 0;
        border-bottom: 3px solid #46A39D;
    }

    .admin-form-section form input {
        height: 40px !important;
        background: none;
        width: 100%;
        border: none;
        border-bottom: 3px solid white;
        color: white;
    }

    .admin-form-section form input:focus {
        outline: none;
    }

    .admin-form-section form button {
        background-color: #46A39D;
        border: none;
        display: block;
        width: 100%;
    }

    .admin-form-section form a {
        display: block;
        width: fit-content;
        margin: auto;
    }
</style>
