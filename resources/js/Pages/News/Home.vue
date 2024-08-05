<script>
import { defineComponent, onMounted, ref, watch, computed } from "vue";
import Footer from "./_Components/Footer.vue";
import Menu from "./_Components/SuperiorMenu.vue";
import Main from "./_Components/MainComponent.vue";
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
        Main,
        NavOptions,
        ThumbNews,
        Head,
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
        <div class="grid grid-cols-4 mt-2 gap-14">
            <div class="col-span-2">
                <div class="px-6">
                    <Main />
                </div>
            </div>
            <div class="col-span-2">
                <div class="flex justify-between items-end">
                    <p class="text-gray-400 capitalize pb-2">
                        {{ dateNow }}
                        <span class="text-white font-semibold pl-1">
                            {{ greeting }}
                        </span>
                    </p>
                    <div
                        class="flex gap-x-2 flex-wrap justify-start"
                        v-if="fetchCryptoPrices.length > 0"
                    >
                        <p
                            class="bg-gray-500/50 p-2 flex gap-x-2 flex-wrap rounded-3xl"
                        >
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
                <div class="mt-8">
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
