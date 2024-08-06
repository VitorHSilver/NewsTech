<script>
import { ref } from "vue";

export default {
    name: "Thumbnails",
    props: {
        articles: {
            type: Array,
            required: true,
        },
    },

    setup({ articles }) {
        const limit = 3; // Limit the number of articles to show

        // Função para embaralhar um array
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]]; // Troca de elementos
            }
            return array;
        }
        // Filtra os artigos para remover os específicos e depois seleciona os 10 primeiros
        const filteredArticles = articles
            .filter(
                (article) =>
                    article.title !==
                        "昔のグーグル検索に戻りたい--AI要約や動画のないシンプルな検索結果にする方法" &&
                    article.description !== "Comments"
            )
            .slice(0, 10);

        // Embaralha e pega os 3 primeiros artigos
        const selectedArticles = shuffleArray(filteredArticles).slice(0, limit);

        const posts = ref(
            selectedArticles.map((article) => ({
                title: article.title,
                category: "Tech",
                date: new Date(article.publishedAt).toLocaleDateString(
                    "en-US",
                    {
                        day: "2-digit",
                        month: "long",
                        year: "numeric",
                    }
                ),

                author: article.author,
                image: article.urlToImage || "img/logo.png",
                description: article.description,
                href: article.url,
                style: "width: 200px; height: 120px;",
            }))
        );

        return {
            posts,
        };
    },
};
</script>

<template>
    <div class="space-y-0 custom:space-y-5 mt-2 py-1">
        <h2 class="mt-2 mb-2 pl-2 text-lg  custom:text-2xl font-semibold text-gray-100">
            Artigos em destaque
        </h2>
        <div class="pl-2 flex items-start" v-for="post in posts">
            <div
                class="w-24 custom:w-44 h-24 custom:h-32 overflow-hidden relative flex-shrink-0"
            >
                <img
                    :src="post.image"
                    alt="img do post"
                    :style="post.style"
                    class="object-cover rounded-lg"
                />
            </div>
            <div class="ml-3 flex flex-col justify-between">
                <a :href="post.href">
                    <h1
                        class="text-white max-w-lg text-md custom:text-xl font-medium truncate-title"
                    >
                        {{ post.title }}
                    </h1>
                    <p class="text-gray-400 mt-1 text-xs custom:text-sm">
                        {{ post.description }}
                    </p>
                </a>
            </div>
            <p class="relative">
                <span
                    class="text-gray-400/50 text-xs w-32 h-32 flex justify-end items-start px-4"
                >
                    {{ post.date }}
                </span>
            </p>
        </div>
    </div>
</template>
<style scoped>
.truncate-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
