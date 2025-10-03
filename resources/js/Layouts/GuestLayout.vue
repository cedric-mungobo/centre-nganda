<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import FooterNav from "@/Components/FooterNav.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";



const isMenuOpen = ref(false);
const routes = [
    {
        name: "Accueil",
        href: "home",
    },
    {
        name: "À propos",
        href: "about",
    },
    {
        name: "Services",
        href: "services",
    },
    {
        name: "Radiothérapie",
        href: "radiotherapie",
    },
    // {
    //     name: "Guichet unique dépistage",
    //     href: "GUDGC",
    // },
    {
        name: "Blog",
        href: "blog",
    },
    {
        name: "Demande de stage",
        href: "internship",
    },
];


</script>

<template>
    <div class="min-h-screen overflow-y-auto bg-white">
        <header class="px-10 ">
            <div
                class="ease-in-out transition-all duration-500 fixed top-2 left-3 right-3 md:left-10 md:right-10 z-50 header"
            >
                <div
                    class="mx-auto flex max-w-screen-xl items-center justify-between md:py-2 py-3 px-3 sm:px-8 lg:px-0"
                >
                    <div class="flex items-center">
                        <Link :href="route('home')">
                            <span class="sr-only"
                                >Centre Hospitalier Nganda</span
                            >
                            <ApplicationLogo
                                class="block h-7 sm:h-10 w-auto fill-current text-gray-800"
                            />
                        </Link>
                    </div>

                    <!-- Navigation desktop -->
                    <nav class="hidden space-x-10 lg:flex lg:flex-1 lg:justify-center">
                        <Link
                            v-for="(item, index) in routes"
                            :href="item.hash ? route(item.href) + item.hash : route(item.href)"
                            :key="index"
                            :class="[
                                'text-base font-medium transition-all duration-300',
                                route().current(item.href) || route().current(item.href + '.*')
                                    ? 'text-blue-dark font-semibold border-b-2 border-blue-dark pb-1'
                                    : 'text-gray-800 hover:text-blue-dark'
                            ]"
                            >{{ item.name }}</Link
                        >
                    </nav>

                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <!-- Bouton Contactez-nous (visible sur tous les écrans) -->
                        <Link
                            :href="route().current('home') ? '#contact' : route('home') + '#contact'"
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-custom bg-blue-dark px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-white shadow-md hover:shadow-lg hover:bg-blue-medium transition-all duration-300 transform hover:scale-105"
                            >Contactez-nous</Link
                        >

                        <!-- Bouton menu mobile -->
                        <div class="flex lg:hidden">
                            <button
                                @click="isMenuOpen = !isMenuOpen"
                                data-collapse-toggle="navbar-default"
                                type="button"
                                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                aria-controls="navbar-default"
                                aria-expanded="false"
                            >
                                <span class="sr-only">Open main menu</span>
                                <svg
                                    class="w-6 h-6"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-200 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->

                <transition
                    v-show="isMenuOpen"
                    name="menu"
                    mode="out-in"
                    appear
                    enter-active-class="ease-out duration-1000"
                    enter-from-class="opacity-0 translate-y-4 translate-y-0 scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-1000"
                    leave-from-class="opacity-100 translate-x-0 scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 scale-95"
                >
                    <div
                        class="absolute inset-x-0 top-0 z-30 origin-top-right transform ease-in-out transition-all duration-500 p-2 lg:hidden"
                    >
                        <div
                            class="divide-y-2 divide-gray-50  border rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5"
                        >
                            <div class="px-5 pb-6 pt-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <Link :href="route('home')">
                                            <span class="sr-only"
                                                >Your Company</span
                                            >
                                            <ApplicationLogo
                                                class="block h-8 sm:h-10 w-auto fill-current text-gray-800"
                                            />
                                        </Link>
                                    </div>
                                    <div class="-mr-2">
                                        <button
                                            @click="isMenuOpen = !isMenuOpen"
                                            type="button"
                                            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-blue-dark focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-dark"
                                        >
                                            <span
                                                class="absolute -inset-0.5"
                                            ></span>
                                            <span class="sr-only"
                                                >Close menu</span
                                            >
                                            <svg
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <nav class="grid grid-cols-1 gap-7">
                                        <Link
                                            v-for="(item, index) in routes"
                                            :href="item.hash ? route(item.href) + item.hash : route(item.href)"
                                            :key="index"
                                            :class="[
                                                '-m-3 flex items-center rounded-lg p-3 transition-all duration-300',
                                                route().current(item.href) || route().current(item.href + '.*')
                                                    ? 'bg-blue-dark/10'
                                                    : 'hover:bg-gray-50'
                                            ]"
                                        >
                                            <div
                                                :class="[
                                                    'ml-4 text-base font-medium',
                                                    route().current(item.href) || route().current(item.href + '.*')
                                                        ? 'text-blue-dark'
                                                        : 'text-gray-900'
                                                ]"
                                            >
                                                {{ item.name }}
                                            </div>
                                        </Link>
                                    </nav>
                                </div>
                            </div>
                            <!-- Suppression du bouton Contactez-nous du menu mobile car il est déjà dans l'en-tête -->
                        </div>
                    </div>
                </transition>
            </div>
        </header>

        <main class="w-full">
            <slot></slot>
        </main>
        <FooterNav />

        <!-- Floating Call Button -->
        <a href="tel:+243897000133" class="fixed bottom-6 right-6 bg-blue-dark border border-gray-50 hover:bg-blue-medium text-white rounded-full p-4 shadow-lg transition-all duration-300 z-50 flex items-center justify-center group hover:pr-6 animate-pulse hover:animate-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <span class="hidden group-hover:inline ml-2 whitespace-nowrap font-medium">+243 897 000 133</span>
        </a>
    </div>
</template>

<style>
.header {
    /* background-color: red; */
    background: white;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(15px);
    /* border: 1px solid rgba(255, 255, 255, 0.45); */
    padding: 0 10px;
    border-radius: 15px;
}
</style>
