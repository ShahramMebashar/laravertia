<script setup lang="ts">
import ApplicationLogo from "@/views/components/application-logo.vue"
import { MoonIcon, SunIcon } from "@heroicons/vue/24/outline"
import { useDark, useToggle } from "@vueuse/core"

const isDark = useDark()
const toggleDark = useToggle(isDark)
</script>
<template>
    <div class="flex h-16 shrink-0 items-center justify-between border-b border-gray-200 px-6 dark:border-gray-800">
        <ApplicationLogo class="h-8 w-8 text-primary-500" />
        <button
            type="button"
            class="group rounded-md border border-zinc-200 p-1 text-white shadow-sm hover:border-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 dark:border-slate-500 dark:hover:border-primary-500"
            @click="toggleDark()">
            <MoonIcon
                class="h-5 w-5 text-zinc-500 group-hover:text-primary-500 dark:text-slate-400"
                aria-hidden="true" />
        </button>
    </div>
</template>
