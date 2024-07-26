<script>
import { defineComponent, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import SuperiorMenu from "../News/_Components/SuperiorMenu.vue";

export default defineComponent({
    name: "Users",
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    components: {
        Head,
        SuperiorMenu,
    },
    setup() {
        return {};
    },
});
</script>

<template>
    <Head title="Profile"></Head>
    <SuperiorMenu :user="user" :showUserName="false"></SuperiorMenu>
    <main class="px-10">
        <div class="flex justify-center mt-24">
            <div>
                <h1 class="text-gray-100 text-5xl font-regular uppercase">
                    {{ user.name }}
                </h1>
                <p class="pl-1 text-md text-gray-600 capitalize">
                    <span v-if="user.city">{{ user.city }},</span>
                    <span v-else>Cidade não informada</span>
                    <span class="p-1" v-if="user.country">{{
                        user.country
                    }}</span>
                    <span v-else>País não informado</span>
                </p>
                <div v-if="user" class="text-white"></div>

                <div v-else class="text-white text-center">
                    <p>Usuário não encontrado.</p>
                </div>
                <div class="flex justify-around gap-x-6 mt-16 text-gray-200">
                    <div class="p-2 px-6 bg-emerald-700 text-white rounded-lg">
                        <a :href="route('users.edit', user.id)">
                            <h1>Editar</h1>
                        </a>
                    </div>
                    <div class="p-2 px-6 bg-blue-500 text-white rounded-lg">
                        <a :href="route('news.create')">
                            <h1>Publicar nova notícia</h1>
                        </a>
                    </div>
                    <div class="p-2 px-6 bg-red-500 text-white rounded-lg">
                        <a :href="route('users.destroy', user.id)">
                            <h1>Excluir Conta</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
