<script setup>
import {
    Carousel,
    CarouselContent,
    CarouselNext,
    CarouselPrevious,
} from "@/components/ui/carousel";
import Articles from "./Articles.vue";
</script>
<template>
    <div class="bg-slate-100 py-4 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 mb-8">
                <h2
                    class="text-3xl font-bold pl-2 text-gray-900 sm:text-4xl font-fira italic"
                >
                    Tech Notícias
                </h2>
                <p
                    class="mt-2 text-md leading-5 pl-2 text-gray-600 sm:text-1xl sm:leading-8 font-roboto"
                >
                    Veja as notícias mais atualizadas sobre
                    <span class="text-gray-900/100 font-medium"
                        >tecnologia</span
                    >
                    no dia de hoje.
                </p>
            </div>
            <Carousel
                class="relative"
                :opts="{
                    align: 'start',
                }"
            >
                <CarouselContent class="-ml-1">
                    <Articles />
                </CarouselContent>
                <CarouselPrevious />
                <CarouselNext />
            </Carousel>
        </div>
    </div>
</template>
