<script setup lang="ts">
import SidebarNavigationItem from "./sidebar-navigation-item.vue"
import type { SidebarProps } from "./sidebar"
import { ref } from "vue"

const props = withDefaults(
    defineProps<{
        list: SidebarProps["navigation"]
        isNested?: boolean
        initiallyOpen: boolean
    }>(),
    {
        isNested: false,
        initiallyOpen: true,
    }
)

const open = ref<boolean>(props.initiallyOpen)

const onToggle = () => {
    open.value = !open.value
}
</script>
<template>
    <ul role="list">
        <template
            v-for="item in list"
            :key="item.name">
            <template v-if="item.children && item.children.length > 0">
                <SidebarNavigationItem
                    :open="open"
                    :is-nested="isNested"
                    :item="item"
                    :on-toggle="onToggle" />
                <sidebar-navigation-list
                    v-if="open"
                    :is-nested="true"
                    :list="item.children" />
            </template>
            <template v-else>
                <SidebarNavigationItem
                    :is-nested="isNested"
                    :item="item" />
            </template>
        </template>
    </ul>
</template>
