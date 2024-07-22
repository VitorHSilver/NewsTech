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
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});
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
        <Menubar class="header bg-#141B37 border-none">
            <span v-if="user">{{ user.name }}</span>
            <span v-else>Realizar Login</span>
            <MenubarMenu>
                <MenubarTrigger ref="menuTrigger" class="cursor-pointer menu-mobile"></MenubarTrigger>
                <MenubarContent>
                    <MenubarItem v-if="!user">
                        <Link :href="route('login')">Login</Link>
                    </MenubarItem>
                    <MenubarItem v-else>
                        <Link :href="route('users.edit', user.id)">Editar conta</Link>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem v-if="!user">
                        <Link :href="route('users.index')">Criar conta</Link>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem v-if="!user">
                        <Link :href="route('login')">Publique sua notícia</Link>
                    </MenubarItem>
                    <MenubarItem v-else>
                        <Link :href="route('users.edit', user.id)"
                            >Publique sua notícia
                        </Link>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Quem Somos</MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem v-if="user">
                        <Link :href="route('users.logoff')">Sair</Link>
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
