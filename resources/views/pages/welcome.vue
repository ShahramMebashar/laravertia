<script setup lang="ts">
import { Head, Link, router, usePage } from "@inertiajs/vue3"
import { route } from "momentum-trail"
import Main from "../layouts/main/main.vue"
const { user } = usePage().props
function onLoginClick() {
    router.visit(route("login"))
}
defineLayout([Main])
</script>

<template>
    <Head title="Welcome" />
    <div class="mx-auto max-w-7xl p-6 lg:p-8">
        <button @click="onLoginClick">Login</button>
    </div>
</template>
