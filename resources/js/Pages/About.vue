<script setup>
import { onMounted, ref } from "vue";
import Menu from "/resources/js/Pages/News/_Components/SuperiorMenu.vue";
import Footer from "/resources/js/Pages/News/_Components/Footer.vue";

const links = ref([
    {
        name: "Quem Somos",
        href: "#quem-somos",
    },
    {
        name: "Historia",
        href: "#nossa-historia",
    },
    {
        name: "Profissionais",
        href: "#nossos-profissionais",
    },
    {
        name: "Contato",
        href: "#contato",
    },
]);

const isImageVisible = ref(true);

onMounted(() => {
    setTimeout(() => {
        isImageVisible.value = false;
    }, 100);
});
</script>

<style scoped>
.slide-enter-active,
.slide-leave-active {
    transition: transform 1s, opacity 1s;
}
.slide-enter, .slide-leave-to /* .slide-leave-active in <2.1.8 */ {
    transform: translateX(100%);
    opacity: 0;
}
.slide-enter-to, .slide-leave /* .slide-leave-active in <2.1.8 */ {
    transform: translateX(0);
    opacity: 1;
}
</style>

<template>
    <main class="px-10">
        <Menu />
        <div>
            <ul class="flex gap-2 text-white">
                <li
                    v-for="link in links"
                    class="text-gray-100 hover:bg-slate-700/50 text-sm p-2 rounded-xl"
                >
                    <a :href="link.href">{{ link.name }}</a>
                </li>
            </ul>
        </div>
    </main>

    <section id="quem-somos" class="mt-8 bg-gray-100">
        <div class="text-gray-900 text-center m-auto p-2">
            <div class="grid grid-cols-2 m-auto mt-4">
                <div class="pl-10">
                    <span class="flex justify-start text-md text-gray-500"
                        >Tech News</span
                    >
                    <h2
                        class="text-6xl tracking-wider font-bold mt-24 text-start mb-6"
                    >
                        Quem somos
                    </h2>
                    <p
                        class="text-lg mb-16 tracking-wide w-4/5 mt-16 font-medium text-start"
                    >
                        " Somos uma empresa de Notícias direcionadas à área
                        Tech. Nosso objetivo é trazer as informações mais
                        recentes e relevantes do mundo da tecnologia para o seu
                        dia a dia. Nossa equipe de profissionais altamente
                        qualificados está sempre em busca das melhores notícias
                        e tendências, para que você esteja sempre atualizado.
                        Conte conosco para fornecer conteúdo de qualidade e
                        análises aprofundadas sobre os avanços tecnológicos,
                        startups, gadgets e muito mais. Seja bem-vindo ao mundo
                        da tecnologia com a NewsTech!"
                    </p>
                </div>
                <div class="p-10 mb-4 slide">
                    <transition name="slide">
                        <img
                            v-if="!isImageVisible"
                            class="w-full object-cover rounded-lg"
                            src="img/WhoWeAre.jpg"
                            alt=""
                        />
                    </transition>
                </div>
            </div>
        </div>
    </section>
    <section id="nossa-historia" class="bg-white mt-24">
        <h2 class="text-6xl p-6 tracking-wider font-bold text-center">
            Nossa História
        </h2>
        <div>
            <transition name="fade">
                <img
                    v-bind:class="{
                        'transition-transform duration-500 ease-in-out transform hover:scale-105': true,
                    }"
                    src="/img/business.jpg"
                    alt=""
                    class="w-full h-[28rem] object-cover mb-4 mt-4"
                />
            </transition>
        </div>
        <div class="pl-10 flex justify-center">
            <p
                class="text-center tracking-wide font-medium mt-8 mb-8 w-3/5 pl-2 text-lg"
            >
                Nossa historia começou em 2010, quando um grupo de amigos
                apaixonados por tecnologia decidiu criar um site de notícias
                sobre o assunto. Desde então, a Tech News vem crescendo e se
                consolidando como uma das principais fontes de informação sobre
                tecnologia no Brasil.
            </p>
        </div>
    </section>
    <section id="nossos-profissionais" class="bg-white mt-24">
        <div class="pr-10 grid grid-cols-2">
            <div class="px-10 py-16">
                <img
                    class="rounded-lg object-contain"
                    src="/img/team.jpg"
                    alt=""
                />
            </div>
            <div>
                <h2
                    class="text-6xl p-6 tracking-wider font-bold text-center mt-14 mb-6"
                >
                    Nossos Profissionais
                </h2>
                <p
                    class="text-end tracking-wide font-medium mt-16 pl-2 text-lg"
                >
                    Nossa equipe é formada por profissionais altamente
                    qualificados e apaixonados por tecnologia. Estamos sempre em
                    busca das melhores notícias e tendências do mundo da
                    tecnologia para trazer para você conteúdo de qualidade e
                    análises aprofundadas.
                </p>
            </div>
        </div>
    </section>
    <section id="contato" class="bg-white mt-24">
        <div class="p-10">
            <h3 class="text-6xl p-6 tracking-wider font-bold text-center">
                Contatos
            </h3>
            <div class="grid grid-cols-2">
                <div class="p-10">
                    <div class="bg-gray-100/50 rounded-lg p-4">
                        <h4 class="text-2xl font-semibold text-center mb-4">
                            Endereço
                        </h4>
                        <div class="text-center">
                            <p class="tracking-wide font-regular text-lg">
                                Rua dos Bobos, nº 0
                            </p>
                            <p>
                                Bairro dos Ingênuos, CEP: 00000-000, São Paulo -
                                SP
                            </p>
                        </div>
                        <h4
                            class="text-2xl font-semibold text-center mt-10 mb-4"
                        >
                            E-mail
                        </h4>
                        <p
                            class="text-center tracking-wide font-regular pl-2 text-lg"
                        >
                            vitor.adm@teste.com
                        </p>
                    </div>
                </div>

                <div class="p-10">
                    <div
                        class="bg-gray-100/50 rounded-lg p-4 flex flex-col justify-center h-full"
                    >
                        <h4 class="text-2xl font-semibold text-center mb-4">
                            Telefone
                        </h4>
                        <p
                            class="text-center tracking-wide font-regular pl-2 text-lg"
                        >
                            WhatsApp: (11) 00000-0000
                        </p>
                        <p
                            class="text-center tracking-wide font-regular pl-2 text-lg"
                        >
                            Instagram: @TechNews
                        </p>
                        <p
                            class="text-center tracking-wide font-regular pl-2 text-lg"
                        >
                            GitHub: @VitorHSilver
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>
