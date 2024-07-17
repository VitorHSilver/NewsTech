<script>
import { defineComponent, ref } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";
import NavOptions from "./_Components/NavigationOptions.vue";
import ThumbNews from "./_Components/Thumbnails.vue";
import axios from "axios";

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
            } else {
                return "Boa noite!";
            }
        },
    },
    props: {},
    components: {
        Footer,
        Menu,
        Main,
        NavOptions,
        ThumbNews,
    },
    setup() {
        const fetchCryptoPrices = ref([]);

        const priceBTC = async () => {
            try {
                const response = await fetch(
                    "https://api.coinlore.net/api/tickers/"
                );
                const json = await response.json();
                const { name: btcName, price_usd: btcPrice } = json.data[0];
                const { name: ethName, price_usd: ethPrice } = json.data[1];
                const { name: solName, price_usd: solPrice } = json.data[4];

                fetchCryptoPrices.value.push(
                    { name: btcName, price_usd: btcPrice },
                    { name: ethName, price_usd: ethPrice },
                    { name: solName, price_usd: solPrice }
                );
            } catch (error) {
                console.log(error);
            }
        };

        priceBTC();

     
        return {
            fetchCryptoPrices,
            
        };
    },
});
</script>

<template>
    <main class="px-10">
        <Menu />
        <NavOptions class="pl-8" />
        <div class="grid grid-cols-4 mt-2 gap-14">
            <div class="col-span-2">
                <div>
                    <h2 class="pl-9 text-white text-4xl mt-2 mb-2">
                        Ultimas Noticias
                    </h2>
                </div>
                <div class="px-6">
                    <Main />
                </div>
            </div>
            <div class="col-span-2">
                <p class="text-gray-400 capitalize pb-2">
                    {{ dateNow }}
                    <span class="text-white font-semibold pl-2">
                        {{ greeting }}
                    </span>
                </p>
                <div class="flex gap-4 flex-wrap">
                    <span class="text-white">
                        <span class="text-yellow-500">{{
                            fetchCryptoPrices[0].name
                        }}</span>
                        <span class="text-white ml-2">{{
                            fetchCryptoPrices[0].price_usd
                        }}</span>
                    </span>
                    <span class="text-white">
                        <span class="text-yellow-500">{{
                            fetchCryptoPrices[1].name
                        }}</span>
                        <span class="text-white ml-2">{{
                            fetchCryptoPrices[1].price_usd
                        }}</span>
                    </span>
                    <span class="text-white">
                        <span class="text-yellow-500 ml-2">{{
                            fetchCryptoPrices[2].name
                        }}</span>
                        <span class="text-white ml-2">{{
                            fetchCryptoPrices[2].price_usd
                        }}</span>
                    </span>
                </div>
                <div class="mt-14">
                    <ThumbNews />
                </div>
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
