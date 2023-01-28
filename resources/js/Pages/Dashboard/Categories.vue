<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-xl font-bold">
            <div class="mb-9 flex justify-between">
                <h1 class="">Categorias</h1>
                <Link :href="route('category.create')" class="bg-teal-500 hover:bg-teal-700 text-white text-lg font-bold py-2 px-4 rounded">
                    Criar nova categoria
                </Link>
            </div>
            <!-- <div v-if="message">
                <div role="alert"> 
                    <div class="border rounded border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                        <p>{{ message }}</p>
                    </div>
                </div>
            </div> -->

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            Nome da Categoria
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="categories">
                        <tr v-for="item in categories" :key="item.category_name"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.category_name }}
                            </td>
            
                            <td class="flex px-6 py-4">
                                <div class="mr-4">
                                    <Link :href="route('category.update.show', item.id )" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <ph-pencil-line :size="24" color="#000" />
                                    </Link>
                                </div>
                                <div class="ml-2">
                                    <form @submit.prevent="handleSubmitDelete(item.id)">
                                        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <ph-trash :size="24" color="#000" />
                                        </button>
                                    </form>
                                </div>
                                
                               
                            </td>

                        </tr>
                    </tbody>
                    <div v-else>Nenhuma categoria cadastrada</div>
                </table>
            </div>
        </section>
    </div>
</template>


<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import {PhPencilLine, PhTrash} from 'phosphor-vue'
import SidebarMenu from './partials/SidebarMenu.vue';
    const props = defineProps({
        categories: Object,
        message: String
    })

    const form = useForm({})


    function handleSubmitDelete(item){
        if(confirm('Tem certeza que deseja excluir essa categoria?')){

            form.delete(route('category.destroy', item))
        }
    }

</script>
