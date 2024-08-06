<script setup>
import { ref, computed } from "vue";
import { CarouselItem } from "@/components/ui/carousel";

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}
const articles = ref([
    {
        title: "Maior roubo já feito em bitcoin!",
        category: "BitCoin",
        date: "Apri 29, 2024",
        author: "img/autor_bitcoin.jpg",
        image: "img/bitcoin.jpg",
        description:
            "Explicando como aconteceu um dos maiores roubo de moeda virtual até o momento. Onde o Hacker levou 1 milhão de BitCoins, veja detalhes sobre o caso. que está dando o que falar.",
        style: "bg-gray-400/50 border-blue-400 text-gray-200",
    },
    {
        title: "Notas de Elden Ring: Shadow of the Erdtree",
        category: "Games",
        date: "Jun 18, 2024",
        author: "img/autor.jpg",
        image: "img/autor_games.jpg",
        description:
            "Hidetaka Miyazaki já havia dito que o Reino das Sombras, o novo mapa da DLC de Elden Ring, focaria em verticalidade e isso está muito enfatizado ao jogar. É possível ir muito baixo no cenário e também chegar bem alto, com o caminho se conectando de forma muito inteligente e desafiador, às vezes mais difícil que os chefes.",
        style: "bg-emerald-400/50 border-emerald-400 text-gray-200",
    },
    {
        title: "Roteadores da ASUS",
        category: "Hardware",
        date: "Jun 18, 2024",
        image: "img/rotedor.jpg",
        author: "img/autor_hardware.jpg",
        description:
            "Roteador da Asus apresentam problemas de vunerabilidade de segundo especialistas em segurança. A empresa já está ciente do problema e está trabalhando para corrigir o problema.",
        style: "bg-yellow-400/90 border-yellow-400 text-gray-200",
    },
    {
        title: "Galaxy Ring da Samsung é o anel inteligente mais confortável do mercado",
        category: "Tech",
        date: "June 29, 2024",
        author: "img/autor_games.jpg",
        image: "img/ring.jpg",
        description:
            "A Samsung lançou seu primeiro anel inteligente, o Galaxy Ring, na manhã desta quarta-feira (10) em evento realizado em Paris, na França.",
        style: "bg-blue-400/50 border-blue-400 text-gray-200",
    },
    {
        title: "Review RTX 4070 ASUS Dual",
        category: "Analysis",
        date: "July 4, 2024",
        author: "img/autor_hardware.jpg",
        image: "img/placa_video.jpg",
        description:
            "Antes bem escasso e mais caro, o segmento de placas de vídeo para rodar games em 1440p ficou recheado nos últimos anos. Com foco em rodar games a uma alta taxa de quadros, a NVIDIA lançou a GeForce RTX 4070 há algum tempo, mas só agora tivemos a oportunidade de enfim testar esse cobiçado modelo.",
        style: "bg-red-400 border-blue-400 text-gray-200",
    },
    {
        title: "DreamWorks anuncia Shrek 5 para 2026 e confirma elenco",
        category: "Movie",
        date: "July 10, 2024",
        author: "img/autor_bitcoin.jpg",
        image: "img/movie.jpg",
        description:
            "Agora é oficial, foi dada a largada para Shrek 5. Na terça-feira (9), a DreamWorks Animation confirmou que a quinta parcela dos filmes do ogro verde está em desenvolvimento e anunciou seu lançamento nos cinemas",
        style: "bg-violet-400 border-blue-400 text-gray-200",
    },
]);
const shuffledArticles = computed(() => shuffleArray([...articles.value]));
</script>
<template>
    <CarouselItem
        v-for="article in shuffledArticles"
        class="space-y-2 sm:basis-1/1 md:basis-1/1 "
    >
        <div class="flex items-center justify-between gap-4">
            <time
                class="text-xs bg-gray-200/50 rounded-lg p-1 border-gray-400 text-gray-800"
                >{{ article.date }}</time
            >
            <div
                class="px-2 py-1 text-xs font-medium border rounded-full"
                :class="article.style"
            >
                <span>{{ article.category }}</span>
            </div>
        </div>
        <div>
            <img
                :src="article.image"
                alt="Imagem da notícia"
                class="rounded-xl w-full object-cover"
            />
        </div>
        <div class="space-y-4">
            <h3 class="text-xl truncate font-semibold text-gray-100">
                {{ article.title }}
            </h3>
            <p class="mt-2 text-sm text-gray-400 flex flex-wrap overflow-hidden max-h-80 sm:max-h-none">
                {{ article.description }}
            </p>
            <div class="relative flex items-center gap-3 text-gray-500">
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
@media screen and(max-with: 640px) {
    .background {
        background-color: green;
    }
}

.comment {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
