<script setup>
defineProps(["message"]);
</script>

<template>
    <div v-show="message" class="flex flex-row justify-end">
        <p class="text-sm text-red-600 dark:text-red-400">
            {{ message }}
        </p>
    </div>
</template>
