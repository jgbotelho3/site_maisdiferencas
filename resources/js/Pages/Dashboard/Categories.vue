<template>
    <div class="relative min-h-screen md:flex">
        <SidebarMenu />
        <section class="flex-1 p-10 text-2xl font-bold">
            <div class="mb-9 flex justify-between">
                <h1 class="">Categorias</h1>
                <Link href="/dashboard/categories/new" class="bg-teal-500 hover:bg-teal-700 text-white text-lg font-bold py-2 px-4 rounded">
                    Criar nova categoria
                </Link>
            </div>
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            Nome da Categoria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Label 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody v-if="categories.length !== 0">
                        <tr v-for="item in categories" :key="item.category_name"  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.category_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{item.label}}
                            </td>
            
                            <td class="px-6 py-4">
                                <Link href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</Link>
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
import { Link } from '@inertiajs/vue3';
import SidebarMenu from './partials/SidebarMenu.vue';
    defineProps({
        categories: Object
    })

</script>
