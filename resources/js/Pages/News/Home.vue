<script>
import { defineComponent, onMounted, ref, watch, computed } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/HeaderMenu.vue";
import Carousel from "./_Components/CarouselComponent.vue";
import NavOptions from "./_Components/NavigationOptions.vue";
import ThumbNews from "./_Components/Thumbnails.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

export default defineComponent({
    name: "Home",
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
    props: {
        articles: {
            type: Array,
            required: true,
        },
        user: {
            type: Object,
            required: true,
        },
    },
    components: {
        Footer,
        Menu,
        Carousel,
        NavOptions,
        ThumbNews,
        Head,
    },
    setup() {
        const fetchCryptoPrices = ref([]);

        const priceBTC = async () => {
            try {
                // pegando a taxa de conversão de USD para BRL
                const exchangeResponse = await fetch(
                    "https://api.exchangerate-api.com/v4/latest/USD"
                );

                // dados da api
                const exchangeJson = await exchangeResponse.json();
                const usdToBrlRate = exchangeJson.rates.BRL;

                //dados da api de criptomoeda
                const response = await fetch(
                    "https://api.coinlore.net/api/tickers/"
                );

                // dados da api
                const json = await response.json();
                const { name: btcName, price_usd: btcPrice } = json.data[0];
                const { name: ethName, price_usd: ethPrice } = json.data[1];
                const { name: solName, price_usd: solPrice } = json.data[4];

                // conversão de preços para real
                const btcPriceBRL = (btcPrice * usdToBrlRate).toFixed(2);
                const ethPriceBRL = (ethPrice * usdToBrlRate).toFixed(2);
                const solPriceBRL = (solPrice * usdToBrlRate).toFixed(2);

                // adicionando ao array
                fetchCryptoPrices.value.push(
                    { name: btcName + " BRL:", price_usd: btcPriceBRL },
                    { name: ethName + " BRL:", price_usd: ethPriceBRL },
                    { name: solName + " BRL:", price_usd: solPriceBRL }
                );
            } catch (error) {
                console.log(error);
            }
        };

        setInterval(() => {
            priceBTC();
        }, 30000);

        const toastMessage = computed(() => {
            return usePage().props.flash.toast;
        });

        onMounted(() => {
            priceBTC();
            const toastMessage = usePage().props.flash.toast;

            if (toastMessage) {
                const { severity, message } = toastMessage;
                if (severity === "success") {
                    toast.success(message);
                } else if (severity === "error") {
                    toast.error(message);
                } else {
                    toast.info(message);
                }
            }
        });

        return {
            fetchCryptoPrices,
            toastMessage,
        };
    },
});
</script>

<template>
    <Head title="Home Page" />
    <main class="px-10">
        <Menu :user="user" />
        <NavOptions class="pl-8" />
        <div class="grid grid-cols-2 gap-14 ">
            <div class="col-span-1">
                <div class="px-4 mt-2 custom:mt-0">
                    <Carousel />
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex justify-between flex-wrap items-end">
                    <p class="text-gray-400 pl-2 text-sm capitalize pb-1">
                        {{ dateNow }}
                        <span class="text-white font-semibold pl-1">
                            {{ greeting }}
                        </span>
                    </p>
                    <div
                        class="flex flex-wrap text-sm mt-1 justify-start"
                        v-if="fetchCryptoPrices.length > 0"
                    >
                        <p
                            class="bg-gray-500/25 p-1 pl-2 flex gap-x-2 flex-wrap rounded-3xl"
                        >
                            <span>
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
                                <span class="text-yellow-500">{{
                                    fetchCryptoPrices[2].name
                                }}</span>
                                <span class="text-white ml-2">{{
                                    fetchCryptoPrices[2].price_usd
                                }}</span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="mt-2 custom:mt-8 ">
                    <ThumbNews :articles="articles" />
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
