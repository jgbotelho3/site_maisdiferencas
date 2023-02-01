<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-2xl font-bold">
            <div class="text-lg">Editar Eixo de Trabalho</div>
            <form @submit.prevent="handleSubmit">
            <div class="mt-9 w-full">
                <label for="axis" class="block text-sm">Nome do Eixo</label>
                <input type="text" id="axis" v-model="form.word" name="axis"
                v-bind:class="[$page.props.flash.error ? 'bg-gray-50 border border-red-500 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="Digite o nome da categoria" />
                <small class="block w-full text-sm text-red-500" v-if="$page.props.flash.error">{{ $page.props.flash.error }}</small>
                <button type="submit" :disabled="form.processing" class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar</button>
            </div>
           </form>
        </section>
    </div>

</template>


<script setup>
import { useForm } from '@inertiajs/vue3'
import SidebarMenu from '../partials/SidebarMenu.vue';

const props = defineProps({ axis: Object, errors: Object})

    const form = useForm({
        id: props.axis.id,
        word:props.axis.word
    })

    function handleSubmit(){
        form.put(route('axis.update', form.id), form)
    }


</script>

