<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    company: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="py-6 px-4 sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div>
                        <div class="flex">
                            <h1 class="ittalic mr-4">Name of company:</h1>
                            <p class="font-semibold">{{ company.name }}</p>
                        </div>
                        <div class="flex mt-2">
                            <h1 class="ittalic mr-4">Number of Employees:</h1>
                            <p class="font-semibold">
                                {{ company.employee_count }}
                            </p>
                        </div>
                        <div class="flex mt-2">
                            <h1 class="ittalic mr-4">Net Worth:</h1>
                            <p class="font-semibold">
                                {{
                                    new Intl.NumberFormat("en-US", {
                                        style: "currency",
                                        currency: "USD",
                                    }).format(company.worth)
                                }}
                            </p>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <h1 class="ittalic mr-4">Address:</h1>
                        <p class="font-semibold">{{ company.address }}</p>
                    </div>
                    <div class="flex mt-2">
                        <h1 class="ittalic mr-4">Owner:</h1>
                        <p class="font-semibold">{{ company.owner }}</p>
                    </div>
                    <div class="flex mt-2">
                        <h1 class="ittalic mr-4">Year Founded:</h1>
                        <p class="font-semibold">{{ company.founded_at }}</p>
                    </div>
                    <div class="flex mt-2">
                        <h1 class="ittalic mr-4">Date Added to Record:</h1>
                        <p class="font-semibold">{{ new Date(company.created_at) }}</p>
                    </div>
                    <div class="mt-10 ml-auto">
                        <Link
                            class="px-4 py-2 text-gray-100 rounded bg-yellow-500 "
                            :href="route('company.edit', company.slug)"
                        >
                            Edit
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
