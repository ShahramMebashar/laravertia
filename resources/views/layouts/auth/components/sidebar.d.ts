import type { Component, VNode } from "vue"

export type SidebarNavigationItemIcon = Component | VNode | SVGElement | string

export interface SidebarNavigationItem {
    name: string
    href?: string | null
    icon?: SidebarNavigationItemIcon
    current: boolean
    children?: SidebarNavigationItem[]
}

export interface SidebarProps {
    navigation?: SidebarNavigationItem[]
    open: boolean
    onClose?: () => void
}
