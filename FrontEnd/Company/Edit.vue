<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

const props = defineProps({
    company: Object,
    errors: Object,
});

const form = useForm({
    // id: props.company.id,
    name: props.company.name,
    address: props.company.address,
    owner: props.company.owner,
    employee_count: props.company.employee_count,
    worth: props.company.worth,
    founded_at: props.company.founded_at,
});

const updateCompany = () => {
    form.put(route("company.update", props.company.slug), {});
};
</script>

<template>
    <div>
        <Head title="Dashboard" />

        <BreezeAuthenticatedLayout>
            <div class="py-12">
                <div
                    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center w-full"
                >
                    <form class="block flex-shrink-0 flex-grow">
                        <div class="w-full">
                            <input
                                type="text"
                                class="w-full rounded-md shadow-sm mt-4"
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
                                max="10"
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

                        <div>
                            <button
                                class="px-4 py-2 mt-6 rounded bg-zinc-600 text-gray-100"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                v-on:click.prevent="updateCompany"
                            >
                                Update Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </div>
</template>
