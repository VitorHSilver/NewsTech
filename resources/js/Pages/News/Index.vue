<script setup>
import Articles from "./_Components/Articles.vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";
</script>

<template>
    <Menu />
    <Main />
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
