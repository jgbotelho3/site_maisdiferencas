<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-2xl font-bold">
           <div class="text-lg">Cadastrar novo Projecto</div>
           <form @submit.prevent="handleSubmit">
            <div class="mt-9 w-full">
                <label for="name" class="block text-sm">Nome do Projeto</label>
                <input type="text" id="name" v-model="form.name" name="name"
                v-bind:class="[$page.props.flash.error ? 'bg-gray-50 border border-red-500 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="Digite o nome do projeto" />
                <small class="block w-full text-sm text-red-500" v-if="$page.props.flash.error">{{ $page.props.flash.error }}</small>

                <label for="name" class="block text-sm mt-6">Conteúdo da página</label>
                <textarea type="textarea" id="name" v-model="form.content" name="name"
                v-bind:class="[$page.props.flash.error ? 'bg-gray-50 border border-red-500 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="Digite o nome do projeto" />
                <small class="block w-full text-sm text-red-500" v-if="$page.props.flash.error">{{ $page.props.flash.error }}</small>

                <label for="name" class="block text-sm mt-6">Nome do Projeto</label>
                <input type="text" id="name" v-model="form.name" name="name"
                v-bind:class="[$page.props.flash.error ? 'bg-gray-50 border border-red-500 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="Digite o nome do projeto" />
                <small class="block w-full text-sm text-red-500" v-if="$page.props.flash.error">{{ $page.props.flash.error }}</small>

                <label for="name" class="block text-sm mt-5" v-show="categories">Categoria do projeto</label>
                <div class="flex items-center mt-2"  v-for="categorie in categories" :key="categorie.category_name">
                    <input :id="categorie.id" type="radio" v-model="form.category" :value="categorie.id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label :for="categorie.id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ categorie.category_name }}</label>
                </div>

                <button type="submit" :disabled="form.processing" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
            </div>
           </form>
        </section>
    </div>

</template>


<script setup>
import { useForm } from '@inertiajs/vue3'
import SidebarMenu from '../partials/SidebarMenu.vue';

   defineProps({
        categories: Object
    })

    const form = useForm({
        name: null,
        content: null,
        image: null,
        category: null
    })

    function handleSubmit(){
        form.post(route('project.store'), form)
    }


</script>

