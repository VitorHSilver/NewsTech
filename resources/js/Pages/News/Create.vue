<script setup>
import { useForm } from "@inertiajs/vue3";
import HeaderMenu from "./_Components/HeaderMenu.vue";
import Input from "@/components/ui/input/Input.vue";

const form = useForm({
    title: "",
    content: "",
    image: "",
});

const handleSubmit = () => {
    console.log(form.title);
};
</script>

<template>
    <HeaderMenu />
    <section class="items-center mx-auto max-w-6xl">
        <div
            class="text-black bg-gray-200/50 flex justify-center items-center w-full rounded-lg"
        >
            <form form @submit.prevent="handleSubmit">
                <div class="flex flex-col gap-2">
                    <div>
                        <label for="title">Titulo</label>
                        <div>
                            <Input
                                class="w-80 text-black"
                                v-model="form.title"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="image">image url</label>
                        <div>
                            <Input
                                class="w-80 text-black"
                                type="text"
                                v-model="form.image"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="content">Conteudo:</label>
                        <div>
                            <textarea
                                class="w-80 resize-y rounded mb-4 text-black"
                                v-model="form.content"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</template>
