<script>
import { Head, useForm } from "@inertiajs/vue3";
import HeaderMenu from "./_Components/HeaderMenu.vue";
import Input from "@/components/ui/input/Input.vue";
import Button from "@/components/ui/button/Button.vue";
import { defineComponent } from "vue";
import { MdEditor } from "md-editor-v3";
import FileUpload from "primevue/fileupload";

export default defineComponent({
    components: {
        Head,
        HeaderMenu,
        Input,
        Button,
        MdEditor,
        FileUpload,
    },
    props: {
        auth: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const user = props.auth.user || {};

        const getCurrentDate = () => {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, "0");
            const day = String(today.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        };

        const form = useForm({
            title: "",
            content: "",
            author: user.firstName,
            publish_date: getCurrentDate(),
            // publish_time: "",
            // location: "",
            file: "",
            source_url: "",
            terms_accepted: false,
        });

        const handleSubmit = () => {
            form.post(route("news.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset();
                },
                onError: (error) => {
                    console.log("error =>", error);
                },
                onFinish: () => {
                    if (!form.errors) form.reset();
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

<template>
    <Head title="Publish your news" />
    <main class="px-10">
    <HeaderMenu :user="user"/>
    <section class="items-center mx-auto max-w-6xl">
            <div
                class="text-black flex justify-center items-center w-full rounded-lg"
            >
                <form
                    @submit.prevent="handleSubmit"
                    class="w-full bg-gray-100/20 shadow-md shadow-gray-900/25 p-4 rounded-lg"
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
                            <Input
                                type="text"
                                name="title"
                                id="title"
                                class="text-zinc-200 bg-transparent capitalize border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                v-model="form.title"
                            />
                            <span class="text-red-500 text-xs">
                                {{ form.errors.title }}
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <div class="flex flex-col">
                                <label
                                    class="text-sm font-medium leading-6 text-zinc-200"
                                    for="date"
                                    >Data:</label
                                >
                                <Input
                                    class="w-40 bg-transparent text-zinc-200 border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                    type="date"
                                    name="date"
                                    id="date"
                                    v-model="form.publish_date"
                                />
                                <span class="text-red-500 text-xs">
                                    {{ form.errors.publish_date }}
                                </span>
                            </div>
                        </div>
                    <div class="mt-4">
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="source"
                                >Fonte:</label
                            >
                            <Input
                                class="w-full text-zinc-200 bg-transparent mb-2 border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                type="text"
                                name="source"
                                id="source"
                                v-model="form.source_url"
                            />
                        </div>
                        <div class="mt-4">
                            <label
                                class="block text-sm font-medium leading-6 text-zinc-200"
                                for="autor"
                                >Autor:</label
                            >
                            <Input
                                tye="text"
                                name="autor"
                                id="autor"
                                class="w-50 bg-transparent text-zinc-200 capitalize border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1"
                                v-model="form.author"
                            />
                            <span class="text-red-500 text-xs">
                                {{ form.errors.author }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            <div class="mt-4 justify-center gap-4">
                                <label
                                    class="block text-sm font-medium leading-6 text-zinc-200"
                                    for="file-upload"
                                    >Thumbnail:</label
                                >
                                <FileUpload
                                    class="flex px-2 text-zinc-200 border-gray-100 focus:outline-none focus:border-sky-500 focus:ring-sky-500 hover:text-lg"
                                    focus:ring-1
                                    id="file-upload"
                                    mode="basic"
                                    name="demo[]"
                                    chooseLabel="&nbsp;"
                                    url="/api/upload"
                                    severity="info"
                                    accept="image/*"
                                    maxFileSize="1000000"
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
                                <MdEditor
                                    v-model="form.content"
                                    theme="dark"
                                    codeTheme="github"
                                    language="en-US"
                                    placeholder="Digite aqui o conteúdo da notícia"
                                    noUploadImg="false"
                                />
                            </div>
                            <span class="text-red-500 text-xs">
                                {{ form.errors.content }}
                            </span>
                        </div>
                        <div class="mt-1 col-span-2 flex-wrap">
                            <label type="checkbox" class="text-zinc-200">
                                <input
                                    type="checkbox"
                                    class="text-zinc-200"
                                    v-model="form.terms_accepted"
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
        </section>
    </main>
</template>
