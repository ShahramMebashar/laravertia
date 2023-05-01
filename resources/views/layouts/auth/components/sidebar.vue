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

const props = defineProps<SidebarProps>()

const emit = defineEmits<{
    (e: "onClose"): void
}>()

const navigation: SidebarNavigationItem[] = [
    { name: "Dashboard", href: "#", icon: HomeIcon, current: true },
    { name: "Team", href: "#", icon: UsersIcon, current: false },
    {
        name: "Projects",
        href: "#",
        icon: FolderIcon,
        current: false,
        children: [
            { name: "Nested 01", href: "#", current: false },
            { name: "Nested 01", href: "#", current: false },
            {
                name: "Nested 01",
                href: "#",
                current: false,
            },
            { name: "Nested 01", href: "#", current: false },
        ],
    },
    { name: "Calendar", href: "#", icon: CalendarIcon, current: false },
    {
        name: "Reports",
        icon: ChartPieIcon,
        current: false,
        children: [
            { name: "Nested 01", href: "#", current: false },
            { name: "Nested 01", href: "#", current: false },
            { name: "Nested 01", href: "#", current: false },
            { name: "Nested 01", href: "#", current: false },
        ],
    },
    { name: "Documents", href: "#", icon: DocumentDuplicateIcon, current: false },
]

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
            :list="navigation" />
    </SidebarMobile>
    <SidebarDesktop>
        <SidebarNavigationList
            class="space-y-1"
            :list="navigation" />
    </SidebarDesktop>
</template>
