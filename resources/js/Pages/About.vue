<script setup>
import { onMounted, ref } from "vue";
import Menu from "/resources/js/Pages/News/_Components/HeaderMenu.vue";
import Footer from "/resources/js/Pages/News/_Components/Footer.vue";
import { scroll, animate } from "motion";
import { Head } from "@inertiajs/vue3";

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
const scrollToSection = (href) => {
    const section = document.querySelector(href);
    if (section) {
        const sectionTop = section.getBoundingClientRect().top + window.scrollY;
        const sectionHeight = section.offsetHeight;
        const windowHeight = window.innerHeight;
        const scrollTo = sectionTop - windowHeight / 2 + sectionHeight / 2;
        window.scrollTo({
            top: scrollTo,
            behavior: "smooth",
        });
    }
};

const isImageVisible = ref(true);

onMounted(() => {
    isImageVisible.value = false;

    scroll(animate(".progress-bar", { scaleX: [0, 1] }));
    const progress = document.querySelector(".progress");
    if (progress) {
        scroll(({ y }) => {
            progress.innerHTML = y.progress.toFixed(2);
        });
    }
});
</script>
<style scoped>
.slide-fade-enter-active {
    transition: all 0.4s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(40px);
    opacity: 0;
}

.progress-bar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: #112fa9;
    transform: scaleX(0);
    transform-origin: 0%;
    z-index: 20;
}
</style>

<template>
    <Head title="Quem-somos" />
    <main class="px-10">
        <div class="progress-bar"></div>
        <Menu />
        <ul class="flex gap-2 fixed z-10">
            <li
                v-for="link in links"
                @click.prevent="scrollToSection(link.href)"
                class="text-gray-100 bg-slate-700/50 text-sm p-1 rounded-xl"
            >
                <a :href="link.href">{{ link.name }}</a>
            </li>
        </ul>
    </main>

    <section id="quem-somos" class="mt-8 bg-gray-100">
        <div class="text-gray-900 text-center m-auto p-2">
            <div class="grid grid-cols-2 m-auto mt-1">
                <div class="pl-10">
                    <span class="flex justify-start text-md text-gray-500"
                        >Tech News</span
                    >
                    <h2
                        class="text-6xl tracking-wider font-bold mt-12 text-start mb-4"
                    >
                        Quem somos
                    </h2>
                    <p
                        class="text-lg mb-16 tracking-wide w-4/5 font-medium text-start flex items-center"
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
                <div class="p-10">
                    <transition name="slide-fade" mode="out-in">
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
            <transition>
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
                class="text-center tracking-wide font-medium mb-8 w-2/5 pr-2 text-lg"
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
                <Transition name="slide-up">
                    <img
                        class="rounded-lg object-contain"
                        src="/img/team.jpg"
                        alt=""
                    />
                </Transition>
            </div>
            <div class="flex justify-center flex-col items-center">
                <h2
                    class="text-6xl p-2 tracking-wider font-bold text-center mb-8"
                >
                    Nossos Profissionais
                </h2>
                <p
                    class="text-end tracking-wide font-medium w-4/5 mt-4 text-lg"
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
