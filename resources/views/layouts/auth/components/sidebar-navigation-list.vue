<script setup lang="ts">
import SidebarNavigationItem from "./sidebar-navigation-item.vue"
import type { SidebarProps } from "./sidebar"

const props = withDefaults(
    defineProps<{
        list: SidebarProps["navigation"]
        isNested?: boolean
    }>(),
    {
        isNested: false,
    }
)
</script>
<template>
    <ul role="list">
        <SidebarNavigationItem
            v-for="item in list"
            :key="item.text"
            :is-nested="isNested"
            :item="item" />
    </ul>
</template>
