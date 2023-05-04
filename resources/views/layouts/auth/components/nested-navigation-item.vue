<script setup lang="ts">
import type { SidebarNavigationItem } from "./sidebar"
import { Link as InertiaLink } from "@inertiajs/vue3"

type Props = {
    item: SidebarNavigationItem
    iconClasses?: string[]
    classes?: string[]
}

const props = withDefaults(defineProps<Props>(), {
    iconClasses: () => [],
    classes: () => [],
})

const classNames = $computed<string[]>(() => {
    return [...props.classes, "border-s border-gray-300 dark:border-slate-700 ps-8 text-zinc-500 dark:text-zinc-400"]
})

const iconClasses = $computed<string[]>(() => {
    return [...props.iconClasses]
})
</script>
<template>
    <li>
        <div class="ps-10">
            <InertiaLink
                :href="item.url || '#'"
                :class="classNames">
                <div
                    v-if="item.icon"
                    :class="iconClasses">
                    <component
                        :is="item.icon"
                        class="h-4 w-4 shrink-0"
                        aria-hidden="true" />
                </div>
                {{ item.text }}
            </InertiaLink>
        </div>
    </li>
</template>
