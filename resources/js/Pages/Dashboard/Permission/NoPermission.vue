<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />

        <section class="flex-1 p-10 text-xl font-bold">
            <div role="alert">
                    <div class="border rounded border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ error }}</p>
                    </div>
                </div>
        </section>


    </div>
</template>


<script setup>
import SidebarMenu from '../partials/SidebarMenu.vue';

defineProps({
    error: String
})
</script>
