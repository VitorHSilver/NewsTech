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
    <div class="backgroundProject py-4 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 mb-8">
                <h2 class="text-3xl font-bold pl-2 sm:text-4xl text-colorFont">
                    Ultimas Notícias
                </h2>
                <p
                    class="mt-2 text-md leading-5 pl-2  sm:text-1xl sm:leading-8 text-white"
                >
                    Veja as notícias mais atualizadas sobre
                    <span class="text-customColor font-medium">tecnologia</span>
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
