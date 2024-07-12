<script>
import Label from "@/components/ui/label/Label.vue";
import Checkbox from "@/components/ui/checkbox/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Input from "@/components/ui/input/Input.vue";
import Button from "@/components/ui/button/Button.vue";
import { Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import InputError from "@/Components/InputError.vue";

export default defineComponent({
    components: {
        Label,
        Checkbox,
        GuestLayout,
        Head,
        Input,
        Button,
        Link,
        InputError,
    },
    props: {
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },
    setup() {
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
        const passwordVisible = ref(false);

        return {
            form,
            submit,
            passwordVisible,
        };
    },
});
</script>

<template>
    <GuestLayout class="backgroundProject">
        <Head title="Login" />
        <div class="grid grid-cols-2 h-screen gap-10">
            <div class="flex flex-col items-center justify-center">
                <div>
                    <h1 class="text-8xl text-white font-medium mb-8">
                        Tech <span class="text-sky-700">N</span>ews
                    </h1>
                    <h2 class="text-4xl font-light text-white mb-2">
                        Seu canal de noticias
                    </h2>
                    <h2 class="text-4xl font-light text-white">
                        sobre tecnologia
                    </h2>
                </div>
            </div>
            <div class="flex justify-center items-center relative">
                <Link :href="route('home')">
                    <div class="absolute top-12 left-54">
                        <div class="flex items-center gap-1">
                            <img src="/icon/seta_home.svg" alt="seta" />
                            <span class="text-gray-100/50 text-sm"
                                >Voltar para home</span
                            >
                        </div>
                    </div>
                </Link>
                <form @submit.prevent="submit" class="max-w-lg w-full">
                    <span class="text-gray-100 text-6xl">Bem vindo!</span>
                    <div class="mt-6">
                        <div>
                            <Label for="email" value="Email" />

                            <Input
                                id="email"
                                type="email"
                                class="mt-1 block w-full bg-transparent border-gray-100 placeholder:text-slate-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 text-gray-200"
                                v-model="form.email"
                                placeholder="Email"
                                required
                                autofocus
                                autocomplete="username"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="mt-4">
                            <Label for="password" value="Password" />

                            <div class="relative mt-1 block w-full">
                                <Input
                                    id="password"
                                    :type="
                                        passwordVisible ? 'text' : 'password'
                                    "
                                    class="mt-1 block w-full bg-transparent border-gray-100 placeholder:text-slate-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 text-gray-200"
                                    placeholder="Senha"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />
                                <div
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5"
                                >
                                    <img
                                        :src="
                                            passwordVisible
                                                ? 'icon/visibility.svg'
                                                : 'icon/visibility_off.svg'
                                        "
                                        class="cursor-pointer"
                                        @click="
                                            passwordVisible = !passwordVisible
                                        "
                                    />
                                </div>
                            </div>
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <div class="mt-4 flex justify-between">
                            <label class="flex items-center">
                                <Checkbox
                                    name="remember"
                                    v-model:checked="form.remember"
                                />
                                <span class="ms-2 text-sm text-gray-400"
                                    >Lembrar-se de mim</span
                                >
                            </label>
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-300 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Esqueceu sua senha?
                            </Link>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link :href="route('users.index')">
                                <Button variant="link">
                                    <span class="text-gray-100 hover:text-gray-400"
                                        >Criar uma conta</span
                                    >
                                </Button>
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
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
