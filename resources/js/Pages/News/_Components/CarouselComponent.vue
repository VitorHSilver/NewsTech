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
    <div class="py-4 ">
        <Carousel class="relative" :opts="{ align: 'start' }">
            <CarouselContent :user="user" class="-ml-2">
                <Articles />
            </CarouselContent>
            <CarouselPrevious />
            <CarouselNext />
        </Carousel>
    </div>
</template>
