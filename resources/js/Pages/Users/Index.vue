<script>
import { defineAsyncComponent } from "vue";
import Button from "@/components/ui/button/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import { Input } from "@/components/ui/input";
import axios from "axios";
import InputError from "@/Components/InputError.vue";
import { usePage } from "@inertiajs/vue3";

export default defineComponent({
    name: "Users",
    props: {},
    components: {
        SuperiorMenu: defineAsyncComponent(() =>
            import("../News/_Components/SuperiorMenu.vue")
        ),
        Button,
        Input,
        Link,
        InputError,
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

        // Pegando a URL atual
        const { url } = usePage();
        const urlAtual = url;

        // Variável para mostrar ou não a senha
        const passwordVisible = ref(false);

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
            passwordVisible,
            urlAtual,
        };
    },
});
</script>
<style scoped>
option {
    background-color: transparent;
    color: #000;
}
</style>
<template>
    <main class="px-10">
        <SuperiorMenu :url-atual="urlAtual" />
        <div
            class="flex items-center justify-center backgroundProject py-4 sm:py-14"
        >
            <form @submit.prevent="handleSubmit">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-4">
                        <h2
                            class="text-base font-semibold leading-6 text-gray-100/50"
                        >
                            Criação de conta
                        </h2>
                        <div
                            class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-4">
                                <label
                                    for="name"
                                    class="block text-sm font-medium leading-6 text-zinc-200"
                                    >Nome</label
                                >
                                <div class="mt-2">
                                    <Input
                                        type="text"
                                        name="name"
                                        id="name"
                                        autocomplete="given-name"
                                        class="h-9 capitalize bg-transparent text-gray-200 border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                        v-model="form.name"
                                    />
                                </div>
                                <span class="text-red-500 text-xs">
                                    {{ form.errors.name }}
                                </span>
                            </div>

                            <div class="sm:col-span-2 relative block w-full">
                                <label
                                    for="password"
                                    class="block text-sm font-medium leading-6 text-zinc-200"
                                    >Senha</label
                                >
                                <div class="mt-2">
                                    <Input
                                        id="password"
                                        :type="
                                            passwordVisible
                                                ? 'text'
                                                : 'password'
                                        "
                                        class="h-9 border-gray-100 bg-transparent text-gray-200 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                        v-model="form.password"
                                    />
                                </div>
                                <img
                                    :src="
                                        passwordVisible
                                            ? 'icon/visibility.svg'
                                            : 'icon/visibility_off.svg'
                                    "
                                    class="cursor-pointer absolute top-12 right-2 transform -translate-y-1/2"
                                    @click="passwordVisible = !passwordVisible"
                                />
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
                                        class="h-9 lowercase bg-transparent text-gray-200 border-gray-100 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                        v-model="form.email"
                                    />
                                </div>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
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
                                        class="h-9 bg-transparent text-gray-200 border-gray-100 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
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
                                        class="h-9 capitalize bg-transparent text-gray-200 border-gray-100 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
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
                                        class="w-full bg-transparent rounded-md border-0 py-2 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:max-w-[200px] sm:text-sm sm:leading-6 p-2"
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
                                        class="h-9 border-gray-100 bg-transparent text-gray-200 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
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
                                        class="h-9 border-gray-100 bg-transparent text-gray-200 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
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
                                        class="h-9 border-gray-100 bg-transparent text-gray-200 focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
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
                        <Button type="button" variant="secondary"
                            >Cancelar
                        </Button>
                    </Link>
                    <Button variant="success" type="submit">Criar</Button>
                </div>
            </form>
        </div>
    </main>
</template>
