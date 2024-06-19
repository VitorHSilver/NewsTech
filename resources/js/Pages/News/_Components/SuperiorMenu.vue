<script setup>
import {
    Menubar,
    MenubarContent,
    MenubarItem,
    MenubarMenu,
    MenubarSeparator,
    MenubarShortcut,
    MenubarTrigger,
} from "@/components/ui/menubar";
</script>

<template>
    <nav class="flex justify-between">
        <div class="p-2">
            <div>
                <h1 class="text-4xl font-medium">TechNews</h1>
            </div>
        </div>
        <Menubar>
            <MenubarMenu>
                <MenubarTrigger class="cursor-pointer">Menu</MenubarTrigger>
                <MenubarContent>
                    <MenubarItem>
                        Login <MenubarShortcut></MenubarShortcut>
                    </MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Criar nova conta</MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Publique sua notícia</MenubarItem>
                    <MenubarSeparator />
                    <MenubarItem>Quem Somos</MenubarItem>
                </MenubarContent>
            </MenubarMenu>
        </Menubar>
    </nav>
</template>

<style scoped></style>
