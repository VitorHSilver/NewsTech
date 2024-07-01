<script>
import Button from "@/components/ui/button/Button.vue";
import { router, useForm, Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import { Input } from "@/components/ui/input";
import axios from "axios";

export default defineComponent({
    name: "Users",
    props: {},
    components: {
        Button,
        Input,
        Link,
    },
    setup() {
        const form = useForm({
            name: "",
            password: "",
            email: "",
            country: "",
            streetAddress: "",
            neighborhood: "",
            city: "",
            region: "",
            postalCode: "",
        });

        const handleSubmit = () => {
            form.post(route("users.store"), {
                onSuccess: () => {
                    console.log("success");
                },
                onError: (error) => {
                    console.log("error on submit");
                    console.log("Erro:", TypeError, error);
                },
                onFinish: () => {
                    form.reset();
                },
            });
        };

        const zipCodeFormatting = (event) => {
            let value = event.target.value.replace(/\D/g, "");

            if (value.length > 5) {
                value = value.slice(0, 5) + "-" + value.slice(5);
            }
            form.postalCode = value;
            searchCEP(value);
        };

        const searchCEP = (valueCEP) => {
            axios
                .get(`https://viacep.com.br/ws/${valueCEP}/json/`)
                .then((response) => {
                    form.neighborhood = response.data.bairro;
                    form.city = response.data.localidade;
                    form.region = response.data.uf;
                    form.country = "Brazil";
                    form.streetAddress = response.data.logradouro;
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        return {
            form,
            handleSubmit,
            zipCodeFormatting,
            searchCEP,
        };
    },
});
</script>

<template>
    <h1 class="text-3xl flex justify-center m-10 text-zinc-500">Criar Conta</h1>
    <div class="flex items-center justify-center bg-slate-100 py-4 sm:py-20">
        <form @submit.prevent="handleSubmit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-4">
                    <h2 class="text-base font-semibold leading-6 text-zinc-300">
                        Criação de conta
                    </h2>
                    <div
                        class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-4">
                            <label
                                for="first-name"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Nome</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="name"
                                    id="first-name"
                                    autocomplete="given-name"
                                    class="ring-1 ring-input h-9 capitalize"
                                    v-model="form.name"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Senha</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="ring-1 ring-input h-9"
                                    v-model="form.password"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label
                                for="email"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >E-mail</label
                            >
                            <div class="mt-2">
                                <Input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    placeholder="email@email.com"
                                    class="ring-1 ring-input h-9 lowercase"
                                    v-model="form.email"
                                    @input="emailCheck"
                                />
                            </div>
                        </div>
                        <!--  -->
                        <div class="sm:col-span-2">
                            <label
                                for="postal-code"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >CEP</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="postal-code"
                                    id="postal-code"
                                    class="ring-1 ring-input h-9"
                                    v-model="form.postalCode"
                                    placeholder="00000-000"
                                    @input="zipCodeFormatting"
                                    maxlength="9"
                                />
                            </div>
                        </div>

                        <!--  -->

                        <div class="sm:col-span-4">
                            <label
                                for="street-address"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Endereço</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="street-address"
                                    id="street-address"
                                    autocomplete="street-address"
                                    class="ring-1 ring-input h-9 capitalize"
                                    v-model="form.streetAddress"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="country"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Pais</label
                            >
                            <div class="mt-2">
                                <select
                                    id="country"
                                    name="country"
                                    autocomplete="country-name"
                                    class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-black sm:max-w-[200px] sm:text-sm sm:leading-6 bg-white p-2"
                                    v-model="form.country"
                                >
                                    <option>Brazil</option>
                                    <option>Argentina</option>
                                    <option>Unites States</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label
                                for="neighborhood"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Bairro</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="neighborhood"
                                    id="neighborhood"
                                    autocomplete="address-level3"
                                    class="ring-1 ring-input h-9"
                                    v-model="form.neighborhood"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="city"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Cidade</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="city"
                                    id="city"
                                    autocomplete="address-level2"
                                    class="ring-1 ring-input h-9"
                                    v-model="form.city"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="region"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Estado</label
                            >
                            <div class="mt-2">
                                <Input
                                    type="text"
                                    name="region"
                                    id="region"
                                    autocomplete="address-level1"
                                    class="ring-1 ring-input h-9"
                                    v-model="form.region"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-4">
                <Link :href="route('home')">
                    <Button type="button" variant="secondary">Cancelar </Button>
                </Link>

                <!-- Alterar Link para home usuario -->
                <Button variant="success" type="submit">Criar</Button>
            </div>
        </form>
    </div>
</template>
