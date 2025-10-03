<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <!-- Section de redirection vers GUDGC -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-pink-50 to-pinks-50 relative overflow-hidden">
        <!-- Formes décoratives d'arrière-plan -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-32 h-32 rounded-full bg-pink-500/10 blur-xl"></div>
            <div class="absolute bottom-10 right-10 w-40 h-40 rounded-full bg-pink-500/10 blur-xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 rounded-full bg-pink-500/10 blur-xl"></div>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class=" border border-border-light dark:border-border-darks rounded-2xl  p-8 md:p-12 text-center">
                    <!-- Icône -->
                    <div class="mb-6">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-pink-500 to-pink-500 rounded-full text-white text-3xl shadow-lg">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                    </div>

                    <!-- Titre -->
                    <h2 
                        v-motion
                        :initial="{ opacity: 0, y: -30 }"
                        :visible="{ opacity: 1, y: 0, transition: { delay: 100, duration: 800 } }"
                        class="text-3xl md:text-4xl font-bold text-pink-800 mb-4"
                    >
                        Dépistage Gratuit des Cancers
                    </h2>

                    <!-- Sous-titre -->
                    <p 
                        v-motion
                        :initial="{ opacity: 0, y: 20 }"
                        :visible="{ opacity: 1, y: 0, transition: { delay: 300, duration: 800 } }"
                        class="text-lg md:text-xl text-gray-600 mb-6"
                    >
                        Le Guichet Unique pour le Dépistage Gratuit des Cancers (GUDGC) vous offre un accès facile et gratuit au dépistage des cancers du sein, du col, du foie et du colorectal.
                    </p>

                    <!-- Points clés -->
                    <div 
                        v-motion
                        :initial="{ opacity: 0, y: 20 }"
                        :visible="{ opacity: 1, y: 0, transition: { delay: 500, duration: 800 } }"
                        class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8"
                    >
                        <div class="flex items-center justify-center space-x-2 text-green-600">
                            <i class="fas fa-check-circle text-xl"></i>
                            <span class="font-medium">100% Gratuit</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2 text-blue-600">
                            <i class="fas fa-clock text-xl"></i>
                            <span class="font-medium">Rendez-vous rapide</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2 text-purple-600">
                            <i class="fas fa-shield-alt text-xl"></i>
                            <span class="font-medium">Diagnostic précoce</span>
                        </div>
                    </div>

                    <!-- Bouton d'action -->
                    <div 
                        v-motion
                        :initial="{ opacity: 0, scale: 0.9 }"
                        :visible="{ opacity: 1, scale: 1, transition: { delay: 700, duration: 600 } }"
                        class="flex flex-col sm:flex-row gap-4 justify-center items-center"
                    >
                        <Link
                            :href="route('GUDGC')"
                            class="group bg-gradient-to-r from-pink-500 to-pink-500 hover:from-pink-600 hover:to-pink-600 text-white font-semibold py-4 px-8 rounded-full transition-all duration-300 hover:shadow-lg transform hover:scale-105 inline-flex items-center"
                        >
                            <i class="fas fa-calendar-plus mr-2"></i>
                            <span>Prendre rendez-vous</span>
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </Link>
                        
                        <Link
                            :href="route('GUDGC')"
                            class="group text-pink-600 hover:text-pink-800 font-medium py-4 px-6 rounded-full border-2 border-pink-300 hover:border-gray-400 transition-all duration-300 inline-flex items-center"
                        >
                            <i class="fas fa-info-circle mr-2"></i>
                            <span>En savoir plus</span>
                        </Link>
                    </div>

                    <!-- Message d'urgence -->
                    <div 
                        v-motion
                        :initial="{ opacity: 0, y: 20 }"
                        :visible="{ opacity: 1, y: 0, transition: { delay: 900, duration: 800 } }"
                        class="mt-8 p-4 bg-pink-50 border-l-4 border-pink-400 rounded-lg"
                    >
                        <div class="flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-pink-500 mr-2"></i>
                            <p class="text-pink-700 font-medium">
                                <strong>Important :</strong> Le dépistage précoce peut sauver des vies. N'attendez pas !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Animation des formes d'arrière-plan */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.absolute .w-32,
.absolute .w-40,
.absolute .w-24 {
    animation: float 6s ease-in-out infinite;
}

.absolute .w-40 {
    animation-delay: 2s;
}

.absolute .w-24 {
    animation-delay: 4s;
}

/* Effet de survol sur le bouton principal */
.group:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
</style>
