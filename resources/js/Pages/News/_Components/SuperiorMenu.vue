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
    <nav class="flex justify-between">
        <div class="p-2">
            <div>
                <h1 class="text-5xl font-bold pl-2 -tracking-wider sm:text-5xl">
                    TechNews
                </h1>
            </div>
        </div>
        <Menubar>
            <MenubarMenu>
                <MenubarTrigger class="cursor-pointer">Menu</MenubarTrigger>
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
    color: black;
    padding: 10px;
    background-color: #fff;
}
</style>
