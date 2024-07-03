<script>
import { defineComponent } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";

export default defineComponent({
    name: "News",
    props: {},
    components: {
        Footer,
        Menu,
        Main,
    },
});
</script>

<template>
    <Menu />
    <div class="px-6">
        <Main />
    </div>
    <Footer />
</template>

<style scoped>
body {
    background-color: #f3f4f6;
}
</style>
