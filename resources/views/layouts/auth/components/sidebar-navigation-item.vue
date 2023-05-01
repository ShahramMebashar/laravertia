<script setup lang="ts">
import { computed } from "vue"
import { ChevronRightIcon } from "@heroicons/vue/24/outline"
import type { SidebarNavigationItem } from "./sidebar"
import { Link } from "@inertiajs/vue3"
import NestedNavigationItem from "./nested-navigation-item.vue"
import SidebarNavigationList from "./sidebar-navigation-list.vue"
import { ref } from "vue"

type Props = {
    item: SidebarNavigationItem
    isNested?: boolean
    open: boolean
    parentId?: string
    onToggle?: (id: string) => void
}

const props = withDefaults(defineProps<Props>(), {
    isNested: true,
    open: false,
    onToggle: () => {},
    parentId: "parent-menu",
})

const href = computed<string>(() => {
    return props.item.href ?? "#"
})
const classNames = $computed<string[]>(() => {
    return [
        props.item.current
            ? "bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white"
            : "text-gray-800 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white",
        "group flex w-full items-center gap-x-3 py-2 px-6 text-sm font-semibold leading-6 ",
    ]
})

const iconClasses = $computed<string[]>(() => {
    return [
        "flex h-8 w-8 items-center justify-center rounded-md",
        props.item.current ? "" : "bg-gray-100 dark:bg-slate-800",
    ]
})
const hasChildren = $computed<boolean>(() => {
    return (props.item.children && props.item.children.length > 0) as boolean
})

const open = ref<boolean>(false)
</script>
<template>
    <li>
        <template v-if="!hasChildren && isNested">
            <NestedNavigationItem
                :item="item"
                :classes="classNames"
                :icon-classes="iconClasses" />
        </template>
        <template v-else>
            <button
                v-if="hasChildren"
                :class="classNames"
                @click="open = !open">
                <div
                    v-if="item.icon"
                    :class="iconClasses">
                    <component
                        :is="item.icon"
                        class="h-4 w-4 shrink-0"
                        aria-hidden="true" />
                </div>
                <span :class="{ 'ps-12': !item.icon }">
                    {{ item.name }}
                </span>
                <button class="ms-auto inline-flex h-6 w-6 shrink-0 items-center justify-center outline-none">
                    <ChevronRightIcon :class="[open ? 'rotate-90' : '', 'h-4 w-4 shrink-0 transition-transform']" />
                </button>
            </button>

            <SidebarNavigationList
                v-if="open && hasChildren"
                :is-nested="true"
                :list="item.children" />

            <Link
                v-if="!hasChildren"
                :class="classNames"
                :href="item.href || '#'">
                <div
                    v-if="item.icon"
                    :class="iconClasses">
                    <component
                        :is="item.icon"
                        class="h-4 w-4 shrink-0"
                        aria-hidden="true" />
                </div>
                {{ item.name }}
            </Link>
        </template>
    </li>
</template>
