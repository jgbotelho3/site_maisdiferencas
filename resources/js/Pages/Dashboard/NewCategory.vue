<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-2xl font-bold">
           <div class="text-lg">Cadastrar nova categoria</div>
           <form @submit.prevent="handleSubmit">
            <div class="mt-9 w-full">
                <label for="category_name" class="block text-sm">Nome da Categoria</label>
                <input type="text" id="category_name" v-model="form.category_name" name="category_name"
                v-bind:class="[errors.category_name ? 'bg-gray-50 border border-red-500 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="Digite o nome da categoria" />
                <small class="block w-full text-sm text-red-500" v-if="errors.category_name">{{ errors.category_name }}</small>
                <button type="submit" :disabled="form.processing" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
            </div>
           </form>
        </section>
    </div>

</template>


<script setup>
// import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3'
import SidebarMenu from './partials/SidebarMenu.vue';
    
    const form = useForm({
        category_name: null
    })

    function handleSubmit(){
        form.post(route('category.store'), form)
    }

    defineProps({ errors: Object })

</script>

