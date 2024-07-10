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
    <div>
        
    </div>
    <div class="py-10">
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
