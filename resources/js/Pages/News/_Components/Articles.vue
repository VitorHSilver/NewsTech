<script setup>
import { ref } from "vue";
import { CarouselItem } from "@/components/ui/carousel";

const articles = ref([
    {
        title: "Maior roubo já feito em bitcoin!",
        category: "BitCoin",
        date: "Apri 29, 2024",
        author: "img/autor_bitcoin.jpg",
        image: "img/bitcoin.jpg",
        description:
            "Explicando como aconteceu um dos maiores roubo de moeda virtual até o momento. Onde o Hacker levou 1 milhão de BitCoins, veja detalhes sobre o caso. que está dando o que falar.",
        style: "bg-blue-400/50 border-blue-400 text-blue-800",
        styleDate:
            "bg-gray-200/50 rounded-sm p-1 border-gray-400 text-gray-800",
    },
    {
        title: "Notas de Elden Ring: Shadow of the Erdtree",
        category: "Games",
        date: "Jun 18, 2024",
        author: "img/autor.jpg",
        image: "img/autor_games.jpg",
        description:
            "Hidetaka Miyazaki já havia dito que o Reino das Sombras, o novo mapa da DLC de Elden Ring, focaria em verticalidade e isso está muito enfatizado ao jogar. É possível ir muito baixo no cenário e também chegar bem alto, com o caminho se conectando de forma muito inteligente e desafiador, às vezes mais difícil que os chefes.",
        style: "bg-emerald-400/50 border-emerald-400 text-emerald-800",
    },
    {
        title: "Roteadores da ASUS",
        category: "Hardware",
        date: "Jun 18, 2024",
        image: "img/rotedor.jpg",
        author: "img/autor_hardware.jpg",
        description:
            "Roteador da Asus apresentam problemas de vunerabilidade de segundo especialistas em segurança. A empresa já está ciente do problema e está trabalhando para corrigir o problema.",
        style: "bg-yellow-400/50 border-yellow-400 text-yellow-800",
    },
    {
        title: "Maior roubo já feito em bitcoin!",
        category: "BitCoin",
        date: "Apri 29, 2024",
        author: "img/autor_bitcoin.jpg",
        image: "img/bitcoin.jpg",
        description:
            "Explicando como aconteceu um dos maiores roubo de moeda virtual até o momento. Onde o Hacker levou 1 milhão de BitCoins, veja detalhes sobre o caso. que está dando o que falar.",
        style: "bg-blue-400/50 border-blue-400 text-blue-800",
        styleDate:
            "bg-gray-200/50 rounded-sm p-1 border-gray-400 text-gray-800",
    },
]);
</script>
<template>
    <CarouselItem
        v-for="article in articles"
        class="space-y-2 sm:basis-1/1 md:basis-1/2 lg:basis-1/3"
    >
        <div class="flex items-center justify-between gap-4">
            <time
                class="text-sm bg-gray-200/50 rounded-lg p-1 border-gray-400 text-gray-800"
                >{{ article.date }}</time
            >
            <div
                class="px-2 py-1 text-xs font-medium border rounded-full"
                :class="article.style"
            >
                <span>{{ article.category }}</span>
            </div>
        </div>
        <img :src="article.image" alt="Imagem da notícia" class="rounded-xl w-full" />
        <div class="space-y-4">
            <h3 class="text-xl truncate font-semibold text-gray-900">
                {{ article.title }}
            </h3>
            <p class="mt-2 text-sm text-gray-600 comment f">
                {{ article.description }}
            </p>
            <div class="relative flex items-center gap-3">
                <img
                    :src="article.author"
                    alt=""
                    class="h-10 object-cover w-10 rounded-full"
                />
                <span class="leading-none">Autor</span>
            </div>
        </div>
    </CarouselItem>
</template>
<style scoped>
.comment {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
body {
    font-family: "Roboto", sans-serif;
}
</style>
