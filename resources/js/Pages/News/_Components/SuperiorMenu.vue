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
</script>

<template>
    <nav class="flex justify-between backgroundProject">
        <div class="p-2">
            <div>
                <h1
                    class="text-5xl font-bold pl-2 sm:text-5xl titulo"
                >
                    TechNews
                </h1>
            </div>
        </div>
        <Menubar class="header bg-#141B37">
            <MenubarMenu>
                <MenubarTrigger
                    class="cursor-pointer menu-mobile"
                ></MenubarTrigger>
                <MenubarContent>
                    <MenubarItem> Login </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>
                        <Link :href="route('users.index')">Criar conta</Link>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Publique sua notícia</MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Quem Somos</MenubarItem>
                </MenubarContent>
            </MenubarMenu>
        </Menubar>
    </nav>
</template>

<style scoped>
nav {
    padding: 10px;
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
