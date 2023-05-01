<script setup lang="ts">
import { ref } from "vue"
import { Head } from "@inertiajs/vue3"
import AuthLayout from "@/views/layouts/auth/auth.vue"
import VueTailwindDatepicker from "vue-tailwind-datepicker"
type datet =
    | [Date, Date]
    | { start: Date | string; end: Date | string }
    | {
          startDate: Date | string
          endDate: Date | string
      }
    | string

const dateValue = ref<datet>([] as any)

defineLayout(AuthLayout)
</script>

<template>
    <Head title="Dashboard" />

    <div class="mx-auto max-w-4xl p-6 lg:p-8">
        My Date
        <br />
        <VueTailwindDatepicker v-model="dateValue" />
    </div>
</template>
