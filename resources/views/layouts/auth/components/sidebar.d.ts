import type { Component, VNode } from "vue"

export type SidebarNavigationItemIcon = Component | VNode | SVGElement | string

export interface SidebarNavigationItem {
    text: string
    url?: string | null
    icon?: SidebarNavigationItemIcon
    isActive: boolean
    children?: SidebarNavigationItem[]
}

export interface SidebarProps {
    navigation?: SidebarNavigationItem[]
    open: boolean
    onClose?: () => void
}
