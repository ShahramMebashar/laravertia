<script setup lang="ts">
import SidebarMobile from "./sidebar-mobile.vue"
import SidebarDesktop from "./sidebar-desktop.vue"
import type { SidebarNavigationItem, SidebarProps } from "./sidebar"
import SidebarNavigationList from "./sidebar-navigation-list.vue"
import {
    CalendarIcon,
    ChartPieIcon,
    DocumentDuplicateIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
} from "@heroicons/vue/24/outline"
import { usePage } from "@inertiajs/vue3"

const props = defineProps<SidebarProps>()

const emit = defineEmits<{
    (e: "onClose"): void
}>()

const mainNavigation = usePage().props.menu as SidebarNavigationItem[]
const bottomNavigation = usePage().props.bottomMenu as SidebarNavigationItem[]


const handleClose = () => {
    emit("onClose")
    if (props.onClose) {
        props.onClose()
    }
}
</script>
<template>
    <SidebarMobile
        :open="open"
        @on-close="handleClose">
        <SidebarNavigationList
            class="space-y-1"
            :list="mainNavigation" />
            <SidebarNavigationList
            class="space-y-1 mt-auto"
            :list="bottomNavigation" />
    </SidebarMobile>
    <SidebarDesktop>
        <SidebarNavigationList
            class="space-y-1"
            :list="mainNavigation" />
            <SidebarNavigationList
            class="space-y-1 mt-auto"
            :list="bottomNavigation" />
    </SidebarDesktop>
</template>
