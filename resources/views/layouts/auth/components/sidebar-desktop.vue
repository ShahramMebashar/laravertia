<script setup lang="ts">
import SidebarHeader from "./sidebar-header.vue"
</script>
<template>
    <div class="hidden overflow-x-hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto overflow-x-hidden border-e pb-4 dark:border-gray-800">
            <SidebarHeader />
            <div
                role="list"
                class="flex flex-1 flex-col gap-y-7">
                <slot />
            </div>
        </div>
    </div>
</template>
