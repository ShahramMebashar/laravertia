<script setup lang="ts">
import Checkbox from "@/views/components/input-checkbox.vue"
import GuestLayout from "@/views/layouts/guest-layout.vue"
import InputError from "@/views/components/input-error.vue"
import InputLabel from "@/views/components/input-label.vue"
import PrimaryButton from "@/views/components/button-primary.vue"
import TextInput from "@/views/components/input-text.vue"
import { Head, Link, useForm } from "@inertiajs/vue3"
import { route } from "@/scripts/utils/router"

defineProps<{
    canResetPassword?: boolean
    status?: string
}>()

const form = useForm({
    email: "admin@yana.test",
    password: "password",
    remember: false,
})

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    })
}
defineLayout(GuestLayout)
</script>

<template>
    <Head title="Log in" />

    <div
        v-if="status"
        class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <InputLabel
                for="email"
                value="Email" />

            <TextInput
                id="email"
                v-model="form.email"
                type="email"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="username" />

            <InputError
                class="mt-2"
                :message="form.errors.email" />
        </div>

        <div class="mt-4">
            <InputLabel
                for="password"
                value="Password" />

            <TextInput
                id="password"
                v-model="form.password"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="current-password" />

            <InputError
                class="mt-2"
                :message="form.errors.password" />
        </div>

        <div class="mt-4 block">
            <label class="flex items-center">
                <Checkbox
                    v-model:checked="form.remember"
                    name="remember" />
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800">
                Forgot your password?
            </Link>

            <PrimaryButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Log in
            </PrimaryButton>
        </div>
    </form>
</template>
