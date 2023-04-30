<script setup lang="ts">
import GuestLayout from "@/views/layouts/guest-layout.vue"
import InputError from "@/views/components/input-error.vue"
import InputLabel from "@/views/components/input-label.vue"
import PrimaryButton from "@/views/components/button-primary.vue"
import TextInput from "@/views/components/input-text.vue"
import { Head, useForm } from "@inertiajs/vue3"
import { route } from "@/scripts/utils/router"

defineProps<{
    status?: string
}>()

const form = useForm({
    email: "",
})

const submit = () => {
    form.post(route("password.email"))
}
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <div
            v-if="status"
            class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
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

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
