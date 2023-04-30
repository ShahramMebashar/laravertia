<script setup lang="ts">
import { ref } from "vue"
import ApplicationLogo from "@/views/components/application-logo.vue"
import Dropdown from "@/views/components/dropdown.vue"
import DropdownLink from "@/views/components/dropdown-link.vue"
import NavLink from "@/views/components/nav-link.vue"
import ResponsiveNavLink from "@/views/components/responsive-nav-link.vue"
import { Link, usePage } from "@inertiajs/vue3"
import { route } from "@/utils/router"

const showingNavigationDropdown = ref(false)
const { user } = usePage().props
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Heading -->
            <header
                v-if="$slots.header"
                class="bg-white shadow dark:bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
