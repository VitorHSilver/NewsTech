<script>
import { router, useForm } from "@inertiajs/vue3";
import { defineComponent } from "vue";

export default defineComponent({
    name: "Users",
    props: {},
    components: {
        
    },
    setup() {
        const form = useForm({
            firstName: "",
            lastName: "",
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
                    console.log(form.data);
                    router.reload({ only: ["data"] });
                },
                onError: () => {
                    console.log("error");
                },
                onFinish: () => {
                    form.reset();
                },
            });
        };

        return {
            form,
            handleSubmit,
        };
    },
});
</script>
<style></style>
<template>
    <h1 class="text-3xl flex justify-center text-zinc-500">Criar Conta</h1>
    <div class="flex items-center justify-center">
        <!-- alterar depois para @submit.prevent="form.get('user.index'))" -->
        <form @submit.prevent="handleSubmit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-10">
                    <h2 class="text-base font-semibold leading-7 text-zinc-300">
                        Criação de conta
                    </h2>
                    <div
                        class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-3">
                            <label
                                for="first-name"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Primeiro nome</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="first-name"
                                    id="first-name"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.firstName"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label
                                for="last-name"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Sobrenome</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="last-name"
                                    id="last-name"
                                    autocomplete="family-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.lastName"
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
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.email"
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
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-[200px] sm:text-sm sm:leading-6"
                                    v-model="form.country"
                                >
                                    <option>Brazil</option>
                                    <option>Argentina</option>
                                    <option>Unites States</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label
                                for="street-address"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Endereço</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="street-address"
                                    id="street-address"
                                    autocomplete="street-address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.streetAddress"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label
                                for="postal-code"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >CEP</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="postal-code"
                                    id="postal-code"
                                    autocomplete="postal-code"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.postalCode"
                                />
                            </div>
                        </div>
                        <div class="sm:col-span-2 sm:col-start-1">
                            <label
                                for="neighborhood"
                                class="block text-sm font-medium leading-6 text-zinc-900"
                                >Bairro</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="neighborhood"
                                    id="neighborhood"
                                    autocomplete="address-level3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.nieghborhood"
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
                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    autocomplete="address-level2"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                                <input
                                    type="text"
                                    name="region"
                                    id="region"
                                    autocomplete="address-level1"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.region"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button
                    type="button"
                    class="text-sm font-semibold leading-6 text-zinc-900"
                >
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="rounded-md bg-emerald-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Criar
                </button>
            </div>
        </form>
    </div>
</template>
