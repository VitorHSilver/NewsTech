<script>
import axios from "axios";
import { ref } from "vue";

export default {
    name: "Thumbnails",
    props: {
        posts: {
            type: Array,
            required: true,
        },
    },

    setup() {
        const posts = ref([
            {
                title: "Galaxy Ring da Samsung é o anel inteligente mais confortável do mercado",
                category: "Tech",
                date: "June 29, 2024",
                author: "img/autor_games.jpg",
                image: "img/ring.jpg",
                description:
                    "A Samsung lançou seu primeiro anel inteligente, o Galaxy Ring, na manhã desta quarta-feira (10) em evento realizado em Paris, na França.",
            },
            {
                title: "Roteadores da ASUS",
                category: "Hardware",
                date: "Jun 18, 2024",
                image: "img/rotedor.jpg",
                author: "img/autor_hardware.jpg",
                description:
                    "Roteador da Asus apresentam problemas de vunerabilidade de segundo especialistas em segurança. A empresa já está ciente do problema e está trabalhando para corrigir o problema.",
            },
            {
                title: "Novo jogo da Ubisoft é anunciado",
                category: "Games",
                date: "Jun 15, 2024",
                image: "img/autor_bitcoin.jpg",
                author: "img/autor_hardware.jpg",
                description:
                    "Ubisoft anuncia novo jogo da franquia Assassin's Creed, o jogo se passará na era medieval e terá um novo protagonista.",
            },
        ]);
        return {
            posts,
            newsAPI,
        };
    },
};
const newsAPI = () => {
    try {
        axios
            .get(
                "https://newsapi.org/v2/everything?q=keyword&apiKey=91741c87c30748579e5c1760d57dbfd4"
            )
            .then((response) => {
                console.log(response);
            });
    } catch (error) {
        console.log(error);
    }
};
</script>
<template>
    <div class="space-y-5 mt-6">
        <div
            class="bg-sky-100/10 rounded-lg flex gap-3 p-3"
            v-for="post in posts"
        >
            <div>
                <img
                    :src="post.image"
                    alt="Imagem do post"
                    class="size-32 object-cover rounded-md"
                />
            </div>
            <div>
                <h1 class="text-white max-w-lg text-lg font-medium comment">
                    {{ post.title }}
                </h1>
                <p class="text-gray-200 text-sm mt-2 comment">
                    {{ post.description }}
                </p>
            </div>
        </div>
    </div>
</template>
<style scoped>
.comment {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
