<script>
import InputError from "@/Components/InputError.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Input from "@/components/ui/input/Input.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { defineComponent } from "vue";
import Button from "@/components/ui/button/Button.vue";
import MenuSuperior from "@/Pages/News/_Components/SuperiorMenu.vue";

export default defineComponent({
    components: {
        GuestLayout,
        Head,
        InputError,
        Input,
        Button,
        TextInput,
        MenuSuperior,
    },
    props: {
        status: {
            type: String,
        },
    },
    setup() {
        const form = useForm({
            email: "",
        });

        const submit = () => {
            form.post(route("password.email"));
        };

        return {
            form,
            submit,
        };
    },
});
</script>
<style scoped>
.bloco {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />
        <main class="px-10">
        <MenuSuperior /> 
        <div class="flex items-center justify-center ">
            <div
                class="flex flex-col bloco bg-sky-900 rounded-xl max-w-xl px-4 py-6 shadow-xl w-full border"
            >
                <div class="mb-4 text-sm text-white">
                    Esqueceu sua senha? Sem problemas. Apenas nos informe seu
                    endereço de email e enviaremos um link de redefinição de
                    senha para você escolher uma nova.
                </div>

                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            variant="info"
                        >
                            Redefinir Senha
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </GuestLayout>
</template>
