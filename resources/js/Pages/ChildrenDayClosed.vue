<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { ref, onMounted } from 'vue';
import { animate, inView } from 'motion';

// Références pour les éléments animés
const titleRef = ref(null);
const contentRef = ref(null);
const buttonRef = ref(null);

// Configuration des animations
onMounted(() => {
    // Animation du titre
    inView(titleRef.value, () => {
        animate(titleRef.value,
            { opacity: [0, 1], y: [-30, 0] },
            { duration: 0.8, easing: 'ease-out' }
        );
    });

    // Animation du contenu
    inView(contentRef.value, () => {
        animate(contentRef.value,
            { opacity: [0, 1], y: [20, 0] },
            { duration: 0.7, delay: 0.3, easing: 'ease-out' }
        );
    });

    // Animation du bouton
    inView(buttonRef.value, () => {
        animate(buttonRef.value,
            { opacity: [0, 1], scale: [0.9, 1] },
            { duration: 0.6, delay: 0.6, easing: 'ease-out' }
        );
    });
});
</script>

<template>
    <Head title="Inscriptions fermées - Journée 'Amenez vos enfants au travail'" />

    <GuestLayout>
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-3xl mx-auto text-center">
                            <h1 ref="titleRef" class="text-3xl font-bold mb-6 text-center text-indigo-900">
                                Inscriptions fermées
                            </h1>

                            <div ref="contentRef" class="mb-8 bg-gray-50 p-8 rounded-lg shadow-sm">
                                <div class="flex justify-center mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                
                                <p class="text-lg mb-4">
                                    Les inscriptions pour la journée "Amenez vos enfants au travail" sont maintenant fermées.
                                </p>
                                
                                <p class="mb-4">
                                    L'événement a eu lieu le <strong>30 Juin 2025</strong>.
                                </p>
                                
                                <p class="mb-4">
                                    Nous vous remercions pour votre intérêt et espérons vous voir lors de notre prochain événement.
                                </p>
                                
                                <p class="font-semibold">
                                    Pour toute question, n'hésitez pas à contacter la réception au <a href="tel:+243897000133" class="text-indigo-600 hover:text-indigo-800">+243 897 000 133</a>.
                                </p>
                            </div>
                            
                            <div ref="buttonRef" class="mt-8">
                                <a 
                                    href="/"
                                    class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-300 inline-block"
                                >
                                    Retour à l'accueil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
