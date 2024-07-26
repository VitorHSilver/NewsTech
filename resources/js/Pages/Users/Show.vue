<script>
import { defineComponent, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import SuperiorMenu from "../News/_Components/SuperiorMenu.vue";
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
    AlertDialogTrigger,
} from "@/components/ui/alert-dialog";
import Button from "@/components/ui/button/Button.vue";

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
        Button,
        AlertDialog,
        AlertDialogAction,
        AlertDialogCancel,
        AlertDialogContent,
        AlertDialogDescription,
        AlertDialogFooter,
        AlertDialogHeader,
        AlertDialogTitle,
        AlertDialogTrigger,
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
        <div class="flex justify-center mt-20">
            <div>
                <h1 class="text-gray-100 text-center text-5xl font-regular uppercase">
                    {{ user.name }}
                </h1>
                <p class="pl-1 text-md text-center text-gray-600 capitalize mt-2">
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
                <div
                    class="flex justify-center gap-x-8 mt-8 text-gray-200 px-8"
                >
                    <div>
                        <a :href="route('users.edit', user.id)">
                            <Button class="uppercase" variant="success"
                                >Editar Conta</Button
                            >
                        </a>
                    </div>
                    <div>
                        <a :href="route('news.create')">
                            <Button class="uppercase" variant="info"
                                >Publicar nova notícia</Button
                            >
                        </a>
                    </div>
                    <div>
                        <AlertDialog>
                            <AlertDialogTrigger>
                                <Button class="uppercase" variant="destructive"
                                    >Excluir Conta</Button
                                >
                            </AlertDialogTrigger>
                            <AlertDialogContent>
                                <AlertDialogHeader>
                                    <AlertDialogTitle>
                                        Excluir Conta
                                    </AlertDialogTitle>
                                </AlertDialogHeader>
                                <AlertDialogDescription>
                                    Tem certeza que deseja excluir sua conta?
                                </AlertDialogDescription>
                                <AlertDialogFooter>
                                    <AlertDialogCancel
                                        >Cancelar</AlertDialogCancel
                                    >
                                    <AlertDialogAction
                                        class="bg-transparent hover:bg-transparent"
                                    >
                                        <form
                                            :action="
                                                route('users.destroy', user.id)
                                            "
                                            method="POST"
                                            value="DELETE"
                                        >
                                            <Button
                                                type="submit"
                                                variant="destructive"
                                            >
                                                Excluir</Button
                                            >
                                        </form>
                                    </AlertDialogAction>
                                </AlertDialogFooter>
                            </AlertDialogContent>
                        </AlertDialog>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
