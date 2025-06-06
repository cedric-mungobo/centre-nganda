<script setup>
import { animate, stagger, inView, spring, timeline, scroll } from 'motion';
import { onMounted, ref } from 'vue';

// Références pour les éléments animés
const sectionRef = ref(null);
const titleRef = ref(null);
const subtitleRef = ref(null);
const descriptionRef = ref(null);
const serviceCardsRefs = ref([]);
const ctaButtonRef = ref(null);
const backgroundShapesRef = ref(null);

// Définition des services principaux
const services = [
    {
        title: "Oncologie",
        description: "Traitement et prise en charge des patients atteints de cancer.",
        icon: "fas fa-user-md",
        color: "bg-gradient-to-br from-blue-500 to-blue-700"
    },
    {
        title: "Radiothérapie",
        description: "Utilisation de rayonnements ciblés pour traiter les tumeurs.",
        icon: "fas fa-radiation",
        color: "bg-gradient-to-br from-purple-500 to-purple-700"
    },
    {
        title: "Cardiologie",
        description: "Diagnostic et traitement des maladies du cœur et des vaisseaux sanguins.",
        icon: "fas fa-heartbeat",
        color: "bg-gradient-to-br from-red-500 to-red-700"
    },
    {
        title: "Médecine d'urgence",
        description: "Soins médicaux immédiats pour les cas critiques.",
        icon: "fas fa-ambulance",
        color: "bg-gradient-to-br from-green-500 to-green-700"
    }
];

// Configuration des animations
onMounted(() => {
    // Animation des formes d'arrière-plan
    setTimeout(() => {
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach((shape, index) => {
            animate(shape,
                { y: [0, -15, 0], opacity: [0.3, 0.7, 0.3] },
                {
                    duration: 3 + index,
                    repeat: Infinity,
                    delay: index * 0.5,
                    easing: 'ease-in-out'
                }
            );
        });
    }, 300);

    // Animation du titre avec effet de révélation
    inView(titleRef.value, () => {
        animate(titleRef.value,
            { opacity: [0, 1], y: [-30, 0] },
            { duration: 0.8, easing: spring({ stiffness: 100, damping: 15 }) }
        );
    });

    // Animation du sous-titre
    inView(subtitleRef.value, () => {
        animate(subtitleRef.value,
            { opacity: [0, 1], scale: [0.9, 1] },
            { duration: 0.7, delay: 0.2, easing: 'ease-out' }
        );
    });

    // Animation de la description
    inView(descriptionRef.value, () => {
        animate(descriptionRef.value,
            { opacity: [0, 1], y: [20, 0] },
            { duration: 0.8, delay: 0.4 }
        );
    });

    // Animation des cartes de service avec effet staggered
    setTimeout(() => {
        const cards = document.querySelectorAll('.service-card');
        if (cards.length) {
            animate(cards,
                { opacity: [0, 1], y: [50, 0], scale: [0.9, 1] },
                { duration: 0.7, delay: stagger(0.15), easing: [0.22, 1, 0.36, 1] }
            );
        }
    }, 500);

    // Animation du bouton CTA
    inView(ctaButtonRef.value, () => {
        animate(ctaButtonRef.value,
            { opacity: [0, 1], scale: [0.9, 1] },
            { duration: 0.6, delay: 0.8 }
        );
    });

    // Effet de parallaxe léger sur le scroll
    setTimeout(() => {
        const bgShapes = document.querySelector('.background-shapes');
        if (bgShapes) {
            scroll(
                animate(bgShapes, { y: [0, -50] }),
                { target: document.documentElement, offset: ["start end", "end start"] }
            );
        }
    }, 600);
});
</script>

<template>
    <!--  nos service -->
    <section
        id="services"
        ref="sectionRef"
        class="services-section py-16 md:py-24 relative overflow-hidden"
    >
        <!-- Arrière-plan avec dégradé -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-50 to-gray-100"></div>

        <!-- Formes décoratives d'arrière-plan -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none background-shapes">
            <div class="shape absolute top-[10%] left-[5%] w-32 h-32 rounded-full bg-blue-500/10 blur-xl"></div>
            <div class="shape absolute top-[40%] right-[10%] w-40 h-40 rounded-full bg-purple-500/10 blur-xl"></div>
            <div class="shape absolute bottom-[15%] left-[15%] w-36 h-36 rounded-full bg-green-500/10 blur-xl"></div>
            <div class="shape absolute top-[60%] left-[50%] w-24 h-24 rounded-full bg-red-500/10 blur-xl"></div>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <!-- En-tête de section -->
            <div class="max-w-3xl mx-auto text-center mb-16 md:mb-20">
                <div class="inline-block mb-3">
                    <span ref="subtitleRef" class="inline-block py-1 px-3 rounded-full bg-secondary/10 text-secondary text-sm font-medium opacity-0">
                        Nos spécialités
                    </span>
                </div>
                <h2
                    ref="titleRef"
                    class="text-3xl md:text-5xl font-bold mb-6 opacity-0 text-secondary"
                >
                Services médicaux spécialisés
                </h2>
                <p
                    ref="descriptionRef"
                    class="text-lg md:text-xl opacity-0 text-gray-600 max-w-2xl mx-auto"
                >
  
Nous accordons la plus grande importance à la qualité   des soins et des services médicaux offerts à nos patients.

                </p>
            </div>

            <!-- Grille de services -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-6 grid-services">
                <div
                    v-for="(service, index) in services"
                    :key="service.title"
                    :ref="el => { if(el) serviceCardsRefs[index] = el }"
                    class="service-card transform-gpu"
                >
                    <div class="relative h-full bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                        <!-- Bande colorée en haut -->
                        <div :class="service.color + ' h-2 w-full'"></div>

                        <div class="p-6 flex flex-col h-full">
                            <!-- Icône -->
                            <div class="mb-5">
                                <div :class="service.color + ' text-white w-16 h-16 rounded-xl text-2xl flex justify-center items-center shadow-md group-hover:scale-110 transition-transform duration-300'">
                                    <i :class="service.icon"></i>
                                </div>
                            </div>

                            <!-- Contenu -->
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-secondary transition-colors">
                                {{ service.title }}
                            </h3>
                            <p class="text-gray-600 mb-4 flex-grow">
                                {{ service.description }}
                            </p>

                            <!-- Lien -->
                            <div class="mt-auto pt-2">
                                <a href="/services" class="inline-flex items-center text-secondary font-medium hover:text-secondary/80 transition-colors">
                                    En savoir plus
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton CTA -->
        <div class="text-center mt-16 md:mt-20" ref="ctaButtonRef">
            <a
                href="/services"
                class="bg-secondary text-white py-4 px-10 rounded-full text-lg font-medium inline-flex items-center hover:bg-secondary/90 transition-all duration-300 hover:shadow-lg transform hover:scale-105"
            >
                <span>Voir tous les services</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </section>
</template>

<style scoped>
.services-section {
    perspective: 1000px;
}

.service-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    opacity: 0;
}

.service-card:hover {
    transform: translateY(-10px);
}

/* Animation des formes d'arrière-plan */
.shape {
    will-change: transform, opacity;
    transform-origin: center;
}

/* Effet de parallaxe */
@media (min-width: 768px) {
    .service-card:nth-child(odd):hover {
        transform: translateY(-10px) rotate(1deg);
    }

    .service-card:nth-child(even):hover {
        transform: translateY(-10px) rotate(-1deg);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .service-card:hover {
        transform: translateY(-5px);
    }

    .shape {
        opacity: 0.5;
    }
}
</style>
