<script setup lang="ts">
import { Head } from "@inertiajs/vue3"
import Main from "../layouts/main/main.vue"

defineLayout([Main])
</script>

<template>
    <Head title="Welcome" />
    <div class="mx-auto max-w-4xl p-6 lg:p-8">Welcome</div>
</template>
