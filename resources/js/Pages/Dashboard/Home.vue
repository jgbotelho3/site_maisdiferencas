<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-2xl font-bold">
            content
        </section>
    </div>

</template>


<script setup>
import SidebarMenu from './partials/SidebarMenu.vue';
    defineProps({
    })

</script>
