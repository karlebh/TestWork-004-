<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    address: "",
    owner: "",
    employee_count: "",
    worth: "",
    founded_at: "",
});

const addCompany = () => {
    form.post(route("company.store"), {});
};
</script>

<template>
    <div>
        <Head title="Dashboard" />

        <BreezeAuthenticatedLayout>
            <div class="py-12">
                <div
                    class="max-w-7xl mx-auto flex justify-center px-4 sm:px-6 lg:px-8"
                >
                    <form class="block flex-shrink-0 flex-grow">
                        <div class="w-full">
                            <input
                                type="text"
                                class="w-full rounded-md shadow-sm mt-4"
                                max="10"
                                v-model="form.name"
                                placeholder="Name"
                            />
                            <div class="text-red-600" v-if="errors.name">
                                {{ errors.name }}
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                type="text"
                                class="w-full rounded-md shadow-sm mt-4"
                                v-model="form.address"
                                placeholder="Address"
                            />
                            <div class="text-red-600" v-if="errors.address">
                                {{ errors.address }}
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                type="text"
                                class="w-full rounded-md shadow-sm mt-4"
                                v-model="form.owner"
                                placeholder="Owner"
                            />
                            <div class="text-red-600" v-if="errors.owner">
                                {{ errors.owner }}
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                class="w-full rounded-md shadow-sm mt-4"
                                type="number"
                                min="0"
                                v-model="form.employee_count"
                                placeholder="Number of Employees"
                            />
                            <div
                                class="text-red-600"
                                v-if="errors.employee_count"
                            >
                                {{ errors.employee_count }}
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                type="number"
                                class="w-full rounded-md shadow-sm mt-4"
                                v-model="form.worth"
                                min="0"
                                placeholder="Worth of Company"
                            />
                            <div class="text-red-600" v-if="errors.worth">
                                {{ errors.worth }}
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                type="date"
                                class="w-full rounded-md shadow-sm mt-4"
                                v-model="form.founded_at"
                            />
                            <div class="text-red-600" v-if="errors.founded_at">
                                {{ errors.founded_at }}
                            </div>
                        </div>

                        <div class="mt-4">
                            <button
                                class="bg-green-700 px-4 py-2 rounded mt-6 text-gray-100"
                                v-on:click.prevent="addCompany"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Add Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </div>
</template>
