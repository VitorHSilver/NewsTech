<script setup>
import Label from "@/components/ui/label/Label.vue";
import Checkbox from "@/components/ui/checkbox/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Input from "@/components/ui/input/Input.vue";
import Button from "@/components/ui/button/Button.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout class="backgroundProject">
        <Head title="Login" />
        <div class="grid grid-cols-2 h-screen gap-10 bg-blue-900">
            <div class="flex flex-col items-center justify-center">
                <div>
                <h1 class="text-7xl  text-white font-medium mb-10">Tech News</h1>
                <h2 class="text-4xl font-light text-white mb-2">Seu canal de noticias</h2>
                <h2 class="text-4xl font-light text-white ">sobre tecnologia</h2>
            </div>
            </div>
            <div class="flex justify-center items-center backgroundProject">
                <div
                v-if="status"
                class="mb-4 font-medium text-sm text-green-600"
                >
                {{ status }}
            </div>
            
            <form @submit.prevent="submit" class="max-w-lg w-full ">
                    <div>
                        <span class="text-gray-100/40 text-sm">Voltar para home</span>
                    </div>
                    <div>
                        <span class="text-gray-100 text-6xl ">Bem vindo!</span>
                    </div>
                    <div>
                        <Label for="email" value="Email" />

                        <Input
                            id="email"
                            type="email"
                            class="mt-1 block w-full border-gray-400"
                            v-model="form.email"
                            placeholder="Email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <Label for="password" value="Password" />

                        <Input
                            id="password"
                            type="password"
                            class="mt-1 block w-full border-gray-400"
                            placeholder="Senha"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                            />
                            <span class="ms-2 text-sm text-gray-600"
                                >Lembrar-se de mim</span
                            >
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Esqueceu sua senha?
                        </Link>

                        <Button
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            variant="info"
                        >
                            Logar
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
