<script>
import Button from "@/components/ui/button/Button.vue";
import { router, useForm, Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import { Input } from "@/components/ui/input";
import axios from "axios";
import Menu from "/resources/js/Pages/News/_Components/SuperiorMenu.vue";

export default defineComponent({
    name: "Users",
    props: {},
    components: {
        Button,
        Input,
        Link,
        Menu,
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

        // handle no Formulario
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
                    if (!form.errors) form.reset();
                },
            });
        };

        // acrecentando ' - ' no CEP e chamando a função de busca
        const zipCodeFormatting = (event) => {
            let value = event.target.value.replace(/\D/g, "");

            if (value.length > 5) {
                value = value.slice(0, 5) + "-" + value.slice(5);
            }
            form.postalCode = value;
            searchCEP(value);
        };

        // Função para buscar CEP
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
    <Menu/>
    <!-- <h1 class="text-3xl flex justify-center m-10 text-zinc-100"></h1> -->
    <div
        class="flex items-center justify-center backgroundProject py-4 sm:py-20"
    >
        <form @submit.prevent="handleSubmit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-4">
                    <h2 class="text-base font-semibold leading-6 text-zinc-700">
                        Criação de conta
                    </h2>
                    <div
                        class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-4">
                            <label
                                for="first-name"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.name }}
                            </span>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.password }}
                            </span>
                        </div>

                        <div class="sm:col-span-4 inputEmail">
                            <label
                                for="email"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                                />
                            </div>
                            <span class="text-red-500 text-xs">
                                {{ form.errors.email }}
                            </span>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="postal-code"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.postalCode }}
                            </span>
                        </div>

                        <div class="sm:col-span-4">
                            <label
                                for="street-address"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.streetAddress }}
                            </span>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="country"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.country }}
                            </span>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label
                                for="neighborhood"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.neighborhood }}
                            </span>
                        </div>

                        <div class="sm:col-span-2">
                            <label
                                for="city"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.city }}
                            </span>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="region"
                                class="block text-sm font-medium leading-6 text-zinc-200"
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
                            <span class="text-red-500 text-xs">
                                {{ form.errors.region }}
                            </span>
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
