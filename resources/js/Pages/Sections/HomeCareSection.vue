<script setup>
import { ref, onMounted } from 'vue';
import { animate, inView, timeline, stagger } from 'motion';

// Références pour les éléments animés
const titleRef = ref(null);
const badgeRef = ref(null);
const descriptionRef = ref(null);
const imageRef = ref(null);
const ctaRef = ref(null);
const highlightRef = ref(null);

// Animation des éléments
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
});
</script>

<template>
    <section
        id="homecare"
        class="py-20 md:py-28 bg-gradient-to-br from-blue-light/5 via-white to-blue-medium/10 dark:from-[#0b1727] dark:to-[#0f1f35] text-zinc-900 dark:text-white relative overflow-hidden z-10"
    >
        <!-- Background pattern -->
        <div class="absolute inset-0 bg-pattern opacity-10"></div>

        <!-- Background shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="shape absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-light/40 blur-xl"></div>
            <div class="shape absolute bottom-20 right-20 w-40 h-40 rounded-full bg-blue-medium/30 blur-xl"></div>
            <div class="shape absolute top-1/3 left-1/4 w-24 h-24 rounded-full bg-blue-dark/20 blur-lg"></div>
        </div>

        <div class="container px-4 mx-auto relative z-10 max-w-7xl">
            <!-- Main Content -->
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <!-- Content Section -->
                <div
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                    class="w-full lg:w-1/2 xl:pr-12 order-2 lg:order-1"
                >
                    <div class="text-center lg:text-left">
                        <div class="inline-block mb-4">
                            <span
                                ref="badgeRef"
                                v-motion
                                :initial="{ opacity: 0, y: -20 }"
                                :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                                class="inline-block py-1.5 px-5 rounded-full bg-blue-dark/10 text-blue-dark text-sm font-medium"
                            >
                                Centre Hospitalier Nganda
                            </span>
                        </div>

                        <h2
                            ref="titleRef"
                            v-motion
                            :initial="{ opacity: 0, scale: 0.95 }"
                            :visible="{ opacity: 1, scale: 1, transition: { delay: 200, duration: 800 } }"
                            class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 text-blue-dark"
                        >
                            <span class="relative inline-block">
                                Nganda Home Care
                                <span class="absolute bottom-1 left-0 w-full h-2 bg-blue-light/30 -z-10"></span>
                            </span>
                            <span>Service de Soins à Domicile à Kinshasa</span>
                        </h2>

                        <p
                            ref="descriptionRef"
                            v-motion
                            :initial="{ opacity: 0, y: 20 }"
                            :visible="{ opacity: 1, y: 0, transition: { delay: 400, duration: 800 } }"
                            class="text-lg leading-relaxed text-gray-600 dark:text-gray-300 mb-8"
                        >
                            nous vous offrons des services de soins à domicile
                            professionnels et sur mesure à Kinshasa. Notre
                            équipe qualifiée veille au bien-être de vos proches
                            en leur fournissant des soins personnalisés, tout en
                            leur permettant de rester dans le confort et la
                            sécurité de leur propre maison.
                        </p>

                        <!-- Features -->
                        <div
                            ref="highlightRef"
                            v-motion
                            :initial="{ opacity: 0, y: 20 }"
                            :visible="{ opacity: 1, y: 0, transition: { delay: 500, duration: 800 } }"
                            class="flex flex-wrap gap-4 mb-8 justify-center lg:justify-start"
                        >
                            <div class="flex items-center bg-blue-light/10 px-4 py-2 rounded-lg">
                                <i class="fas fa-check-circle text-blue-dark mr-2"></i>
                                <span class="text-sm font-medium">Professionnels qualifiés</span>
                            </div>
                            <div class="flex items-center bg-blue-light/10 px-4 py-2 rounded-lg">
                                <i class="fas fa-check-circle text-blue-dark mr-2"></i>
                                <span class="text-sm font-medium">Disponible 24/7</span>
                            </div>
                            <div class="flex items-center bg-blue-light/10 px-4 py-2 rounded-lg">
                                <i class="fas fa-check-circle text-blue-dark mr-2"></i>
                                <span class="text-sm font-medium">Soins personnalisés</span>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div
                            ref="ctaRef"
                            v-motion
                            :initial="{ opacity: 0, y: 20 }"
                            :visible="{ opacity: 1, y: 0, transition: { delay: 600, duration: 800 } }"
                            class="mt-8"
                        >
                            <a href="#contact" class="inline-flex items-center px-8 py-4 bg-blue-dark text-white font-medium rounded-xl shadow-lg hover:bg-blue-medium transition-all duration-300 transform hover:-translate-y-1">
                                <span>Prendre Rendez-vous</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Image Section -->
                <div
                    ref="imageRef"
                    v-motion
                    :initial="{ opacity: 0, scale: 0.9 }"
                    :visible="{ opacity: 1, scale: 1, transition: { duration: 1000 } }"
                    class="w-full lg:w-1/2 relative order-1 lg:order-2"
                >
                    <div class="relative">
                        <!-- Decorative elements -->
                        <div class="absolute -top-6 -left-6 w-32 h-32 bg-blue-dark/10 rounded-tl-[50px] z-0 transform rotate-6"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-medium/10 rounded-br-[50px] z-0 transform -rotate-6"></div>

                        <!-- Decorative dots pattern -->
                        <div class="absolute top-0 right-0 w-24 h-24 z-0 dots-pattern"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 z-0 dots-pattern"></div>

                        <!-- Main image with frame -->
                        <div class="relative z-10 border-[10px] border-white shadow-2xl rounded-2xl overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-dark/30 to-transparent z-10"></div>
                            <img
                                src="/assets/images/BRU_0013.jpg"
                                alt="Nganda Home Care Service"
                                class="w-full h-[400px] md:h-[500px] object-cover"
                            />

                            <!-- Image overlay content -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-blue-dark rounded-full flex items-center justify-center mr-4 shadow-lg">
                                        <i class="fas fa-home text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white font-bold text-xl">Soins à Domicile</h3>
                                        <p class="text-white/80 text-sm">Confort et sécurité garantis</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trust badge -->
                        <div class="absolute -top-4 -right-4 bg-white rounded-full p-3 shadow-lg z-20 flex items-center justify-center">
                            <div class="bg-blue-dark rounded-full w-16 h-16 flex flex-col items-center justify-center">
                                <i class="fas fa-shield-alt text-white text-xl mb-1"></i>
                                <span class="text-white text-xs font-bold">CERTIFIÉ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bg-pattern {
    background-color: rgba(131, 132, 196, 0.05);
    background-image:
        radial-gradient(rgba(28, 51, 140, 0.1) 2px, transparent 2px),
        radial-gradient(rgba(104, 136, 172, 0.05) 1px, transparent 1px);
    background-size: 30px 30px, 15px 15px;
    background-position: 0 0, 15px 15px;
}

/* Animation for floating shapes */
.shape {
    opacity: 0.3;
    transition: all 3s ease-in-out;
}

.dots-pattern {
    background-image:
        radial-gradient(rgba(28, 51, 140, 0.2) 2px, transparent 2px);
    background-size: 10px 10px;
}

@media (max-width: 768px) {
    .shape {
        opacity: 0.2;
    }
}
</style>
