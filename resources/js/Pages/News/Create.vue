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
    },
});

const form = useForm({
    title: "",
    content: "",
    autor: props.auth.user ? props.auth.user.name : "",
    date: "",
});

const handleSubmit = () => {
    console.log(form.title);
};
</script>

<template>
    <Head title="Publish your news" />
    <HeaderMenu />
    <section class="items-center mx-auto max-w-6xl">
        <div
            class="text-black flex justify-center items-center w-full rounded-lg"
        >
            <form
                @submit.prevent="handleSubmit"
                class="w-full bg-gray-200/20 shadow-md shadow-gray-900/25 p-4 rounded-lg"
            >
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
                            class="w-96 bg-transparent text-zinc-200"
                            type="text"
                            v-model="form.autor"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium leading-6 text-zinc-200"
                            for="local"
                            >Local:</label
                        >
                        <Input
                            class="w-80 text-zinc-200 bg-transparent"
                            type="text"
                            v-model="form.local"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium leading-6 text-zinc-200"
                            for="date"
                            >Data:</label
                        >
                        <Input
                            class="w-50 bg-transparent text-zinc-200"
                            type="date"
                            v-model="form.date"
                        />
                    </div>
                    <div class="col-span-2">
                        <label
                            class="block text-sm font-medium leading-6 text-zinc-200"
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
                </div>
                <div class="col-span-2 flex justify-end pt-2 pr-4">
                    <Button type="submit" variant="success">Submit</Button>
                </div>
            </form>
        </div>
    </section>
</template>
