<script>
import { defineComponent } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";
import NavOptions from "./_Components/NavigationOptions.vue";

export default defineComponent({
    name: "News",
    data() {
        return {
            dateNow: new Date()
                .toLocaleString("pt-BR", {
                    day: "2-digit",
                    weekday: "long",
                    month: "long",
                    year: "numeric",
                })
                .replace("de", ""),
        };
    },
    computed: {
        greeting() {
            const hour = new Date().getHours();
            if (hour < 12) {
                return "Bom dia!";
            } else if (hour < 18) {
                return "Boa tarde!";
            } else if (hour < 24) {
                return "Boa noite!";
            } else {
                return "Boa madrugada!";
            }
        },
    },
    props: {},
    components: {
        Footer,
        Menu,
        Main,
        NavOptions,
    },
});
</script>

<template>
    <main class="px-10">
        <Menu />
        <div class="grid grid-cols-4 mt-2 gap-6">
            <div class="col-span-2">
                <NavOptions class="pl-8" />
                <div>
                    <h2 class="pl-9 text-white text-4xl mt-2 mb-2" >Ultimas Noticias</h2>
                </div>
                <div class="px-6">
                    <Main />
                </div>
            </div>
            <div class="col-span-1">
                <p class="text-gray-400 capitalize pb-2">{{ dateNow }}</p>
                <p class="text-white font-semibold">
                    {{ greeting }}
                </p>
            </div>
            <div class="col-span-1">
                <p class="text-white">Bitcoin</p>
            </div>
        </div>
    </main>
    <Footer />
</template>

<style scoped>
body {
    background-color: #f3f4f6;
}
</style>
