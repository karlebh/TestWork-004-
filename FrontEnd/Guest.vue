<script setup>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-cyan-500 to-blue-500"
    >
        <div class="shrink-0 flex items-center">
            <Link :href="route('home')">
                <h1 class="text-4xl font-bold text-gray-100">CRUD</h1>
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gradient-to-r from-cyan-500 to-blue-500 overflow-hidden rounded"
        >
            <slot />
        </div>
    </div>
</template>
