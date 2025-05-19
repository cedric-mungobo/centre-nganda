<script setup>
import { ref, onMounted } from 'vue';

// Références pour les éléments animés
const titleRef = ref(null);
const descriptionRef = ref(null);
const imageRef = ref(null);
const cardsRef = ref(null);

// Tableau pour les cartes de service
const services = [
    {
        icon: 'fa-solid fa-radiation',
        title: 'Technologie avancée',
        description: 'Des équipements modernes pour des traitements précis et efficaces.'
    },
    {
        icon: 'fa-solid fa-user-md',
        title: 'Soins personnalisés',
        description: 'Un suivi individualisé pour chaque patient, adapté à ses besoins spécifiques.'
    },
    {
        icon: 'fa-solid fa-bone',
        title: 'Confort et accompagnement',
        description: 'Un accompagnement attentif à chaque étape, pour un traitement en toute sérénité.'
    }
];
</script>

<template>
    <!--  Radiotherapy Section  -->
    <section
        id="radiotherapy"
        class="py-20 md:py-24 mb-4 bg-gradient-to-b from-white to-gray-50 dark:from-[#0b1727] dark:to-[#0f1f35] text-zinc-900 dark:text-white relative overflow-hidden z-10"
    >
        <!-- Background pattern -->
        <div class="absolute inset-0 bg-pattern opacity-10"></div>

        <!-- Decorative shapes -->
        <div class="background-shapes absolute inset-0 overflow-hidden pointer-events-none">
            <div class="shape absolute top-20 left-10 w-32 h-32 rounded-full bg-blue-light/10 dark:bg-blue-light/5"></div>
            <div class="shape absolute bottom-20 right-10 w-40 h-40 rounded-full bg-blue-medium/10 dark:bg-blue-medium/5"></div>
            <div class="shape absolute top-1/3 right-1/4 w-24 h-24 rounded-full bg-blue-dark/10 dark:bg-blue-dark/5"></div>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-12 gap-8">
                <!--  heading-->
                <div class="col-span-12 lg:col-span-10 lg:col-start-2 xl:col-span-8 xl:col-start-3">
                    <div class="mb-12 text-center">
                        <div class="inline-block mb-3">
                            <span
                                v-motion
                                :initial="{ opacity: 0, y: -20 }"
                                :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                                class="inline-block py-1 px-3 rounded-full bg-blue-dark/10 text-blue-dark text-sm font-medium"
                            >
                                Centre Hospitalier Nganda
                            </span>
                        </div>
                        <h2
                            ref="titleRef"
                            v-motion
                            :initial="{ opacity: 0, scale: 0.9 }"
                            :visible="{ opacity: 1, scale: 1, transition: { duration: 800 } }"
                            class="text-3xl md:text-5xl font-bold text-blue-dark mb-6"
                        >
                            Excellence en Radiothérapie à Kinshasa
                        </h2>
                        <p
                            ref="descriptionRef"
                            v-motion
                            :initial="{ opacity: 0, y: 20 }"
                            :visible="{ opacity: 1, y: 0, transition: { duration: 800, delay: 200 } }"
                            class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto"
                        >
                            Le Centre Hospitalier Nganda offre des soins de
                            radiothérapie de pointe, alliant technologie
                            avancée et suivi personnalisé.
                        </p>
                    </div>
                </div>

                <!-- Content container -->
                <div class="col-span-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <!-- img - now visible on mobile -->
                    <div
                        ref="imageRef"
                        v-motion
                        :initial="{ opacity: 0, x: -50 }"
                        :visible="{ opacity: 1, x: 0, transition: { duration: 1000 } }"
                        class="relative order-1 lg:order-1 mb-8 lg:mb-0"
                    >
                        <div class="absolute -inset-2 bg-blue-light/10 rounded-2xl transform rotate-3 hidden sm:block"></div>
                        <div
                            class="bg-center bg-no-repeat bg-cover rounded-xl h-full min-h-[300px] md:min-h-[400px] lg:min-h-[550px] relative shadow-lg"
                            style="
                                background-image: url(/assets/images/IMG_5912.jpg);
                            "
                        ></div>
                    </div>

                    <!-- cards -->
                    <div
                        ref="cardsRef"
                        class="col-span-1 flex flex-col justify-center space-y-4 order-2 lg:order-2"
                    >
                        <!-- Dynamic cards -->
                        <div
                            v-for="(service, index) in services"
                            :key="index"
                            v-motion
                            :initial="{ opacity: 0, y: 30 }"
                            :visible="{ opacity: 1, y: 0, transition: { duration: 600, delay: 200 + (index * 150) } }"
                            class="bg-white dark:bg-[#162033] rounded-xl p-5 md:p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 dark:border-gray-800"
                        >
                            <div class="flex items-start">
                                <div
                                    class="bg-blue-dark text-white min-w-[50px] md:min-w-[60px] h-12 rounded-xl text-lg flex justify-center items-center mr-4 md:mr-6 shrink-0"
                                >
                                    <i :class="service.icon"></i>
                                </div>
                                <div>
                                    <h5 class="text-lg md:text-xl font-bold text-blue-dark dark:text-blue-light mb-2">
                                        {{ service.title }}
                                    </h5>
                                    <p class="text-sm md:text-base font-light leading-snug text-gray-600 dark:text-gray-300">
                                        {{ service.description }}
                                    </p>
                                </div>
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
    background-image: radial-gradient(rgba(28, 51, 140, 0.1) 2px, transparent 2px);
    background-size: 30px 30px;
}

/* Animation for floating shapes */
.shape {
    animation: float 6s ease-in-out infinite;
    opacity: 0.5;
}

.shape:nth-child(2) {
    animation-delay: 2s;
}

.shape:nth-child(3) {
    animation-delay: 4s;
}

@keyframes float {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
    100% {
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .bg-pattern {
        background-size: 20px 20px;
    }
}
</style>
