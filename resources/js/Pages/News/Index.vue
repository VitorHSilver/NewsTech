<script setup>
import Articles from "./_Components/Articles.vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
</script>
<template>
    <Menu />
    <div class="bg-slate-100 py-4 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2
                    class="text-5xl font-bold tracking-tight text-gray-900 sm:text-3xl"
                >
                    Novas Noticias
                </h2>
                <p class="mt-2 text-xl leading-8 text-gray-600">
                    Veja as noticias mais atualizadas sobre
                    <span class="text-sky-900/100 font-medium">tecnologia</span>
                    no dia de hoje.
                </p>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2x1 grid-cols-1 gap-x-8 gap-y-10 border-t border-gray-200 pt-10 sm:mt-2 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <Articles />
            </div>
        </div>
    </div>
    <Footer />
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
