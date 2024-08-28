<script setup>
import {
    Menubar,
    MenubarContent,
    MenubarItem,
    MenubarMenu,
    MenubarSeparator,
    MenubarTrigger,
} from "@/components/ui/menubar";
import "@/Pages/Users/Index.vue";
import { Link, usePage } from "@inertiajs/vue3";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    showUserName: {
        type: Boolean,
        default: true,
    },
    urlAtual: {
        type: String,
    },
});
const { props: pageProps } = usePage();
const user = pageProps.auth.user;
</script>

<template>
    <nav class="flex justify-between backgroundProject">
        <div class="py-2">
            <div>
                <Link :href="route('home')">
                    <h1 class="text-5xl font-bold sm:text-5xl titulo p-2 pl-7">
                        TechNews
                    </h1>
                </Link>
            </div>
        </div>
        <Menubar class="header bg-#141B37 border-none mt-4">
            <span class="capitalize" v-if="user && showUserName">{{
                user.firstName
            }}</span>
            <MenubarMenu>
                <MenubarTrigger
                    ref="menuTrigger"
                    class="cursor-pointer menu-mobile"
                ></MenubarTrigger>
                <MenubarContent class="mr-4 bg-gray-50">
                    <MenubarItem v-if="!user">
                        <Link
                            :href="route('login')"
                            class="flex items-center font-medium text-gray-600 relative"
                            >Login
                            <span
                                class="material-symbols-outlined text-gray-600 px-1 absolute left-36"
                            >
                                person
                            </span></Link
                        >
                    </MenubarItem>
                    <MenubarItem v-else>
                        <Link
                            :href="route('users.show', user.id)"
                            class="flex items-center font-medium text-gray-600 relative"
                            ><span>Meu perfil</span
                            ><span
                                class="material-symbols-outlined text-gray-600 px-2 absolute left-36"
                            >
                                manage_accounts
                            </span></Link
                        >
                    </MenubarItem>
                    <MenubarItem v-if="!user && urlAtual !== '/users'">
                        <Link
                            :href="route('users.index')"
                            class="flex items-center font-medium text-gray-600 relative"
                            >Criar conta
                            <span
                                class="material-symbols-outlined px-2 text-gray-600 absolute left-36"
                            >
                                person_add
                            </span></Link
                        >
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem v-if="!user">
                        <Link
                            :href="route('login')"
                            class="flex items-center font-medium text-gray-600 relative"
                            >Publique sua notícia
                            <span
                                class="material-symbols-outlined px-2 text-gray-600 absolute left-36"
                            >
                                contextual_token_add
                            </span></Link
                        >
                    </MenubarItem>
                    <MenubarItem v-else>
                        <Link
                            :href="route('news.create')"
                            class="flex items-center font-medium text-gray-600 relative"
                            >Publique sua notícia
                            <span
                                class="material-symbols-outlined px-2 text-gray-600 absolute left-36"
                            >
                                contextual_token_add
                            </span>
                        </Link>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>
                        <Link
                            :href="route('about-us')"
                            class="flex items-center font-medium text-gray-600 hover:text-gray-800 relative"
                            >Quem Somos
                            <span
                                class="material-symbols-outlined px-2 text-gray-600 absolute left-36"
                            >
                                groups
                            </span></Link
                        >
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem v-if="user">
                        <Link
                            :href="route('users.logoff')"
                            class="flex relative items-center font-medium text-gray-600"
                            >Sair<span
                                class="material-symbols-outlined px-2 text-gray-600 absolute left-36"
                            >
                                logout
                            </span></Link
                        >
                    </MenubarItem>
                </MenubarContent>
            </MenubarMenu>
        </Menubar>
    </nav>
</template>

<style scoped>
nav {
    padding: 10px 0;
}
.header {
    display: flex;
    align-items: center; /* Alinha verticalmente */
    justify-content: space-between; /* Espaçamento entre o Menu e o título */
    padding: 10px;
    color: #fafafa;
    font-weight: bold; /* Ajuste conforme necessário */
}
& .titulo {
    color: #fafafa;
    font-family: "Fira Sans", sans-serif;
    font-weight: normal;
    letter-spacing: 1px;
    font-size: 3.5rem;
}

.menu-mobile {
    display: flex;

    background: #141b37;

    border: none;

    color: red;

    padding: 0.5rem 1rem;

    text-transform: uppercase;

    font-family: "IBM Flex Mono", monospace;

    font-weight: bold;

    color: #fff;

    cursor: pointer;

    margin: 10px;

    align-items: center;
}
.menu-mobile::before {
    content: "";

    display: inline-block;

    height: 2px;

    width: 12px;

    background: #fff;

    box-shadow: 0 4px #fff, 0 -4px #fff;

    margin-right: 4px;
}
</style>
