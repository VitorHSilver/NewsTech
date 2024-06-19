<script setup>
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from "@/components/ui/carousel";
import { Card, CardContent } from "@/components/ui/card";
import Articles from "./Articles.vue";
</script>
<template>
    <div class="bg-slate-100 py-4 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2
                    class="text-5xl font-bold tracking-tight text-gray-900 sm:text-3xl"
                >
                    Novas Noticias
                </h2>
                <p class="mt-2 text-xl leading-8 text-gray-600">
                    Veja as noticias mais atualizadas sobre
                    <span class="text-sky-900/100 font-medium">tecnologia</span>
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
