<script setup>
import {
    Carousel,
    CarouselContent,
    CarouselNext,
    CarouselPrevious,
} from "@/components/ui/carousel";
import NavOption from "./NavigationOptions.vue";
import Articles from "./Articles.vue";
</script>
<template>
    <NavOption />
    <div class="p-10">
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
</template>
