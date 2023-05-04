<script setup lang="ts">
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from "@headlessui/vue"
import { XMarkIcon } from "@heroicons/vue/24/outline"
import type { SidebarProps } from "./sidebar"
import SidebarHeader from "./sidebar-header.vue"

const props = defineProps<SidebarProps>()

const emit = defineEmits<{
    (e: "onClose"): void
}>()

const handleClose = () => {
    emit("onClose")
    if (props.onClose) {
        props.onClose()
    }
}
</script>
<template>
    <TransitionRoot
        as="template"
        :show="open">
        <Dialog
            as="div"
            class="relative z-50 lg:hidden"
            @close="handleClose">
            <TransitionChild
                as="template"
                enter="transition-opacity ease-linear duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="transition-opacity ease-linear duration-300"
                leave-from="opacity-100"
                leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-900/80" />
            </TransitionChild>

            <div class="fixed inset-0 flex">
                <TransitionChild
                    as="template"
                    enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full"
                    enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform"
                    leave-from="translate-x-0"
                    leave-to="-translate-x-full">
                    <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                        <TransitionChild
                            as="template"
                            enter="ease-in-out duration-300"
                            enter-from="opacity-0"
                            enter-to="opacity-100"
                            leave="ease-in-out duration-300"
                            leave-from="opacity-100"
                            leave-to="opacity-0">
                            <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                <button
                                    type="button"
                                    class="-m-2.5 p-2.5"
                                    @click="handleClose">
                                    <span class="sr-only">Close sidebar</span>
                                    <XMarkIcon
                                        class="h-6 w-6 text-white"
                                        aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <!-- Sidebar component -->
                        <div
                            class="flex grow flex-col gap-y-5 overflow-y-auto overflow-x-hidden border-e px-6 pb-4 ring-1 ring-white/10 dark:border-gray-800 dark:bg-gray-950">
                            <SidebarHeader />
                            <div
                                role="list"
                                class="flex flex-1 flex-col gap-y-7">
                                <slot />
                            </div>
                        </div>
                    </DialogPanel>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
