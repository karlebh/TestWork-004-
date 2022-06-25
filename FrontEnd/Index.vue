<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "@/Components/Pagination";

const props = defineProps({
    usersList: Object,
    name: String,
    companies: Object,
    user_id: Number,
});

const deleteCompany = (company) => {
    if (props.user_id !== company.user_id) {
        return alert("You can't delete another user's company");
    }

    if (confirm("Are you sure? This action cannot be reversed.")) {
        Inertia.delete(route("company.destroy", company.slug));
    }
};
</script>

<template>
    <div>
        <Head title="Dashboard" />

        <BreezeAuthenticatedLayout>
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm rounded-lg"
                    >
                        <div
                            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 justify-items-center bg-gray-400 py-3 text-gray-100"
                        >
                            <div>ID</div>
                            <div>Name</div>
                            <div>No of Employees</div>
                            <div>Worth</div>
                            <div>Year Founded</div>
                            <div>Action</div>
                        </div>
                        <div v-for="company in companies.data">
                            <div
                                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 justify-items-center border-y"
                            >
                                <div class="py-4">
                                    {{ company.id }}
                                </div>

                                <div class="py-4">
                                    <Link
                                        :href="
                                            route('company.show', company.slug)
                                        "
                                    >
                                        {{ company.name }}
                                    </Link>
                                </div>

                                <div class="py-4">
                                    {{ company.employee_count }}
                                </div>

                                <div class="py-4">
                                    {{
                                        new Intl.NumberFormat("en-US", {
                                            style: "currency",
                                            currency: "USD",
                                        }).format(company.worth)
                                    }}
                                </div>

                                <div class="py-4">{{ company.founded_at }}</div>

                                <div class="space-x-2 py-3">
                                    <Link
                                        class="px-4 py-2 bg-yellow-500 rounded text-gray-50"
                                        :href="
                                            route('company.edit', company.slug)
                                        "
                                        :disabled="user_id != company.user_id"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        class="bg-red-500 px-2 py-2 rounded text-gray-50"
                                        v-on:click="deleteCompany(company)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <pagination class="mt-6" :links="companies.links" />
                    </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </div>
</template>
