<script>
import { defineComponent } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";
import NavOptions from "./_Components/NavigationOptions.vue";

export default defineComponent({
    name: "News",
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
        <Menu/>
        <NavOptions class="pl-8" />
        <div class="grid grid-cols-4 mt-2">
            <div class="col-span-2">
                <div class="px-6">
                    <Main />
                </div>
            </div>
            <div class="col-span-1">
                <p class="text-white">Data</p>
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
