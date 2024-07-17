<script setup>
import { cn } from "@/lib/utils";
import { ref } from "vue";

const tabs = ref([
    {
        name: "Hardware",
        href: "#hardware",
        style: "hover:text-yellow-500",
    },
    {
        name: "Games",
        href: "#games",
        style: "hover:text-green-500",
    },
    {
        name: "Tech",
        href: "#tech",
        style: "hover:text-blue-500",
    },
    {
        name: "Bitcoin",
        href: "#bitcoin",
        style: "hover:text-gray-400",
    },
    {
        name: "Analysis",
        href: "#analysis",
        style: "hover:text-red-400",
    },
    {
        name: "Movie",
        href: "#movie",
        style: "hover:text-violet-400",
    },
]);
</script>

<template>
    <ul
        class="flex self-start top-16 flex-wrap items-center gap-8 pb-4"
    >
        <li v-for="tab in tabs">
            <a
                :href="tab.href"
                :class="
                    cn(
                        'text-gray-100 hover:bg-slate-700/50 text-sm p-2 rounded-xl',
                        tab.style
                    )
                "
                >{{ tab.name }}</a
            >
        </li>
    </ul>
</template>
