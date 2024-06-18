<script  setup>
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
                <MenubarTrigger>Menu</MenubarTrigger>
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
    <!-- Main Componnent -->
    <div class="bg-slate-100 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2
                    class="text-3xl font-bold tracking-tight text-gray-900 sm:text-3xl"
                >
                    Materias sobre tecnologia
                </h2>
                <p class="mt-2 text-base leading-8 text-gray-600">
                    Veja as noticias mais atualizadas sobre
                    <span class="text-sky-800 font-medium">tecnologia</span>
                    no dia de hoje.
                </p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2x1 grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <!-- Puxa a data -->
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >BitCoin</a
                        >
                        <!-- Categoria -->
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Maior roubo já feito!
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Resumo da noticia, explicando como aconteu o maior
                            roubo de todos os tempos, Onde o ladrão levou 1
                            milhão de BitCoin. E a policia ainda não conseguiu
                            captura-lo.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Autor
                                    <!-- Pegará o autor via PHP -->
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
                <!-- More posts... -->
                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                        <!-- Categoria -->
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Maior roubo já feito!
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Resumo da noticia, explicando como aconteu o maior
                            roubo de todos os tempos, Onde o ladrão levou 1
                            milhão de reais. E a policia ainda não conseguiu
                            captura-lo.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Autor
                                    <!-- Pegará o autor via PHP -->
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                        <!-- Categoria -->
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Maior roubo já feito!
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Resumo da noticia, explicando como aconteu o maior
                            roubo de todos os tempos, Onde o ladrão levou 1
                            milhão de reais. E a policia ainda não conseguiu
                            captura-lo.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Autor
                                    <!-- Pegará o autor via PHP -->
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <!-- /Main Componnent -->
</template>
<style scoped>
body {
    background-color: #f3f4f6;
}
nav {
    color: black;
    padding: 10px;
    background-color: #fff;
}
</style>
