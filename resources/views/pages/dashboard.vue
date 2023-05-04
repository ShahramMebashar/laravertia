<script setup lang="ts">
import { Head, usePage } from "@inertiajs/vue3"
import AuthLayout from "@/views/layouts/auth/auth.vue"

const {user} = usePage<App.DataTransferObjects.SharedData>().props;

defineLayout(AuthLayout)
</script>

<template>
    <Head title="Dashboard" />

    <div class="mx-auto max-w-4xl p-6 lg:p-8">
        <div>
            <label
                for="username"
                class="block text-sm font-medium leading-6 text-gray-900"
                >Username</label
            >
            {{  user?.phone }}
            <div class="mt-2">
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:bg-white/5 dark:ring-gray-300/10 sm:max-w-md">
                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">workcation.com/</span>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        autocomplete="username"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 dark:text-white sm:text-sm sm:leading-6"
                        placeholder="janesmith" />
                </div>
            </div>
        </div>
    </div>
</template>
