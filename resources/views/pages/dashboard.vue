<script setup lang="ts">
import { Head } from "@inertiajs/vue3"
import AuthLayout from "@/views/layouts/auth/auth.vue"

defineLayout(AuthLayout)
</script>

<template>
    <Head title="Dashboard" />

    <div class="mx-auto max-w-4xl p-6 lg:p-8">
        My Date
    </div>
</template>
