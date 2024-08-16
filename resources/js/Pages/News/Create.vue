<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import HeaderMenu from "./_Components/HeaderMenu.vue";
import Input from "@/components/ui/input/Input.vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import Button from "@/components/ui/button/Button.vue";

const props = defineProps({
    auth: {
        type: Object,
        required: true,
    },
});

const user = props.auth.user || {};
const form = useForm({
    title: "",
    content: "",
    autor: user.name,
    date: "",
    time: "",
    local: "",
    file: "",
    source: "",
});

const handleSubmit = () => {
    console.log(form.title);
};
</script>

<template>
    <Head title="Publish your news" />
    <HeaderMenu />

    <section class="items-center mx-auto max-w-6xl">
        <main class="px-4">
            <div
                class="text-black flex justify-center items-center w-full rounded-lg"
            >
                <form
                    @submit.prevent="handleSubmit"
                    class="w-full bg-gray-200/20 shadow-md shadow-gray-900/25 p-4 rounded-lg"
                >
                    <div class="mt-2 px-4">
                        <span class="flex justify-start text-md text-gray-500"
                            >Tech News</span
                        >
                    </div>
                    <div class="grid grid-cols-2 gap-x-14 p-4">
                        <div>
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="title"
                                >Titulo</label
                            >
                            <div>
                                <Input
                                    class="text-zinc-200 bg-transparent"
                                    v-model="form.title"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                :auth="auth"
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="autor"
                                >Autor:</label
                            >
                            <Input
                                class="w-80 bg-transparent text-zinc-200"
                                type="text"
                                v-model="form.autor"
                            />
                        </div>
                        <div class="mt-4">
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="local"
                                >Local:</label
                            >
                            <Input
                                class="w-full text-zinc-200 bg-transparent"
                                type="text"
                                autocomplete="street-address"
                                v-model="form.local"
                            />
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <div class="flex flex-col">
                                <label
                                    class="w-60 text-sm font-medium leading-6 text-zinc-200"
                                    for="date"
                                    >Data:</label
                                >
                                <Input
                                    class="w-50 bg-transparent text-zinc-200"
                                    type="date"
                                    v-model="form.date"
                                />
                            </div>
                            <div class="flex flex-col">
                                <label
                                    class="block text-sm font-medium leading-6 text-zinc-200"
                                    for="time"
                                    >Hora:</label
                                >
                                <Input
                                    class="w-25 bg-transparent text-white"
                                    type="time"
                                    v-model="form.time"
                                />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="text"
                                >Fonte:</label
                            >
                            <Input
                                class="w-full text-zinc-200 bg-transparent mb-2"
                                type="text"
                                v-model="form.source"
                            />
                        </div>
                        <div>
                            <div class="mt-4">
                                <label
                                    class="block text-sm font-medium leading-6 text-zinc-200"
                                    for="file"
                                    >Arquivos de imagem:</label
                                >
                                <Input
                                    class="w-80 text-zinc-200"
                                    type="file"
                                    v-model="form.file"
                                />
                            </div>
                        </div>

                        <div class="col-span-2 mt-4">
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200 mb-1"
                                for="content"
                                >Resumo da informação:</label
                            >
                            <div>
                                <QuillEditor
                                    class="w-full resize-y pb-4 mb-4 text-zinc-200"
                                    v-model="form.content"
                                />
                            </div>
                        </div>
                        <div class="mt-1 col-span-2 flex-wrap">
                            <label type="checkbox" class="text-zinc-200">
                                <input
                                    type="checkbox"
                                    class="text-zinc-200"
                                    v-model="form.terms"
                                />
                                <p class="inline text-xs">
                                    Autorizo a reprodução das informações acima
                                    e a utilização do meu nome nos créditos.
                                </p>
                            </label>
                            <div class="col-span-2 flex justify-start pt-2">
                                <Button type="submit" variant="success"
                                    >Enviar</Button
                                >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </section>
</template>
