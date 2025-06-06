<script setup>
import { onMounted, ref } from 'vue';
import { animate } from 'motion';

// Références pour les éléments animés
const contentRef = ref(null);
const titleRef = ref(null);
const descriptionRef = ref(null);
const categoriesRef = ref(null);
const imageRef = ref(null);

// Animation des formes d'arrière-plan
onMounted(() => {
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
    <section class="lg:py-20 py-16 lg:pl-8 h-full">
        <div
            class="rounded-2xl bg-pattern relative overflow-hidden sm:pl-5 m-5 lg:m-0 2xl:py-16 xl:py-8 lg:rounded-tl-2xl lg:rounded-bl-2xl"
        >
            <!-- Background pattern elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="shape absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-light"></div>
                <div class="shape absolute bottom-20 right-20 w-24 h-24 rounded-full bg-blue-medium"></div>
                <div class="shape absolute top-1/2 left-1/3 w-16 h-16 rounded-full bg-blue-dark"></div>
            </div>

            <div class="mx-auto max-w-7xl pl-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div
                    class="grid grid-cols-1 gap-14 md:gap-16 items-center lg:grid-cols-12 lg:gap-8"
                >
                    <div
                        v-motion
                        ref="contentRef"
                        :initial="{ opacity: 0, y: 50 }"
                        :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                        class="w-full xl:col-span-5 lg:col-span-6 2xl:-mx-5 xl:-mx-0 pr-4 px-2 sm:px-4"
                    >
                        <div class="inline-block mb-3  text-start lg:text-left">
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
                            v-motion
                            ref="titleRef"
                            :initial="{ opacity: 0, scale: 0.9 }"
                            :visible="{ opacity: 1, scale: 1, transition: { delay: 200, duration: 800 } }"
                            class="text-3xl md:text-5xl font-bold mb-8 text-start lg:text-left text-secondary"
                        >
                        Nous Offrons des Soins de Qualité Pour Tous

                        </h2>
                        <p
                            v-motion
                            ref="descriptionRef"
                            :initial="{ opacity: 0, y: 20 }"
                            :visible="{ opacity: 1, y: 0, transition: { delay: 400, duration: 800 } }"
                            class="text-lg md:text-xl text-gray-600 text-start lg:text-left max-w-2xl mx-auto lg:mx-0 px-2 sm:px-0 mb-2"
                        >
                        Nous offrons des soins primaires lorsque vous en avez besoin. Vous recevez des soins personnalisés et de haute qualité en consultant les meilleurs médecins.

                        </p>

                        <div
                            v-motion
                            ref="categoriesRef"
                            :initial="{ opacity: 0, x: -20 }"
                            :visible="{ opacity: 1, x: 0, transition: { delay: 600, duration: 800 } }"
                            class="grid grid-cols-1 md:grid-cols-3 py-8 gap-5 px-2 sm:px-0"
                        >
                            <!--  personnele  -->
                            <div
                                class="flex items-center font-semibold justify-center border border-solid border-blue-medium flex-col bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:border-blue-dark"
                            >
                                <i class="fas fa-user-md text-blue-dark text-2xl mb-3"></i>
                                <h3 class="text-lg">Personnel</h3>
                            </div>
                            <div
                                class="flex items-center font-semibold justify-center border border-solid border-blue-medium flex-col bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:border-blue-dark"
                            >
                                <i class="fas fa-users text-blue-dark text-2xl mb-3"></i>
                                <h3 class="text-lg">Familles</h3>
                            </div>
                            <div
                                class="flex items-center font-semibold justify-center border border-solid border-blue-medium flex-col bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:border-blue-dark"
                            >
                                <i class="fas fa-building text-blue-dark text-2xl mb-3"></i>
                                <h3 class="text-lg">Entreprises</h3>
                            </div>
                        </div>
                    </div>
                    <div class="w-full xl:col-span-7 lg:col-span-6 hidden md:block">
                        <div
                            v-motion
                            ref="imageRef"
                            :initial="{ opacity: 0, x: 50 }"
                            :visible="{ opacity: 1, x: 0, transition: { duration: 1000 } }"
                            class="w-full sm:w-auto lg:w-[60.8125rem] xl:ml-16"
                        >
                            <img
                                src="/assets/images/IMG_5881.jpg"
                                alt="Dashboard image"
                                class="rounded-xl object-cover w-full lg:h-auto shadow-lg"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bg-pattern {
    background-color: rgba(131, 132, 196, 0.1);
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

@media (max-width: 768px) {
    .bg-pattern {
        background-image:
            radial-gradient(rgba(28, 51, 140, 0.15) 1.5px, transparent 1.5px),
            linear-gradient(to right, rgba(104, 136, 172, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(104, 136, 172, 0.05) 1px, transparent 1px);
        background-size: 20px 20px, 40px 40px, 40px 40px;
    }

    /* Adjust shape positions for mobile */
    .shape:nth-child(1) {
        top: 5% !important;
        left: 5% !important;
        width: 60px !important;
        height: 60px !important;
    }

    .shape:nth-child(2) {
        bottom: 10% !important;
        right: 10% !important;
        width: 50px !important;
        height: 50px !important;
    }

    .shape:nth-child(3) {
        top: 40% !important;
        left: 20% !important;
        width: 40px !important;
        height: 40px !important;
    }
}
</style>
