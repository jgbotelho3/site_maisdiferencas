<script setup>
import { Link } from '@inertiajs/vue3';
import {PhList, PhHouse, PhUsers, PhSliders, PhProjectorScreen, PhCaretDown, PhCaretUp} from 'phosphor-vue'


    defineProps({
        isActive: false,
        showUserDropdown: false,
        showProjectsDropdown: false
    })

</script>

<template>


        <!--Mobile Menu-->
        <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
            <Link href="#" class="block p-4">
                <img src="/images/logo.png" width="150" alt="Logo Mais Diferenças"/>

            </Link>
            <button class="p-4 focus:outline-none focus:bg-gray-700" @click="isActive = !isActive">
                <ph-list :size="40" color="#fff" class="w-5 h-5" />
            </button>
        </div>
        <div v-bind:class="[!isActive? 'bg-gray-800 text-gray-100 w-64 space-y-6 px-2 py-7 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out' : 'bg-gray-800 text-gray-100 w-64 space-y-6 px-2 py-7 absolute inset-y-0 left-0 transform z-10 md:relative md:translate-x-0 transition duration-200 ease-in-out' ]">
            <Link href="#" class="flex items-center space-x-2 pl-4">
                <img src="/images/logo.png" width="150" alt="Logo Mais Diferenças"/>
            </Link>
            <nav>
                <ul>
                    <li>
                        <Link href="/dashboard/" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                            <ph-house :size="24" color="#fffafa" /><span class="pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Início</span>
                        </Link>
                    </li>
                    <li>
                        <button class="w-full flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700" @click="showUserDropdown = !showUserDropdown">
                                <ph-users :size="24" color="#fffafa" /><span class="flex pb-1 pl-2 mr-20 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Usuários </span> <div v-if="showUserDropdown"><ph-caret-up :size="24" color="#fffafa" /></div> <div v-else><ph-caret-down :size="24" color="#fffafa" /></div>
                        </button>
                        <ul v-bind:class="[showUserDropdown ? '' : 'hidden']">
                            <li>
                                <Link :href="route('user.index')" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Gerenciar usuários</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button class="w-full flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700" @click="showProjectsDropdown = !showProjectsDropdown">
                            <ph-projector-screen :size="24" color="#fffafa" /><span class="flex pb-1 pl-2 mr-20 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Projetos</span> <div v-if="showProjectsDropdown"><ph-caret-up :size="24" color="#fffafa" /></div> <div v-else><ph-caret-down :size="24" color="#fffafa" /></div>
                        </button>
                        <ul v-bind:class="[showProjectsDropdown ? '' : 'hidden']">
                            <li>
                                <Link :href="route('project.index')" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Gerenciar projetos</span>
                                </Link>
                            </li>
                            <li>
                                <Link href="#" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Notícias</span>
                                </Link>
                            </li>
                            <li>
                                <Link href="#" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Ações</span>
                                </Link>
                            </li>
                            <li>
                                <Link href="/dashboard/categories" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Categorias</span>
                                </Link>
                            </li>
                            <li>
                                <Link href="/dashboard/axis" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                                    <span class="flex pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200">Eixos de trabalho</span>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>

                <Link href="#" class="flex py-2 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <ph-sliders :size="24" color="#fffafa" /><span class="pb-1 pl-2 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Ajustes</span>
                </Link>
            </nav>
        </div>
</template>



