<script setup>
import { animate, stagger, inView, spring, timeline } from 'motion';
import { onMounted, ref } from 'vue';

// Références pour les éléments animés
const subtitleRef = ref(null);
const headingRef = ref(null);
const descriptionRef = ref(null);
const buttonsRef = ref(null);
const imageRef = ref(null);
const floatingElement1 = ref(null);
const floatingElement2 = ref(null);
const floatingElement3 = ref(null);
const floatingElement4 = ref(null);
const scrollIndicator = ref(null);

// Configuration des animations
onMounted(() => {
    // Animation du sous-titre
    inView(subtitleRef.value, () => {
        animate(subtitleRef.value,
            { opacity: [0, 1], y: [-50, 0] },
            { duration: 0.8, easing: [0.17, 0.55, 0.55, 1] }
        );
    });

    // Animation du titre principal
    inView(headingRef.value, () => {
        animate(headingRef.value,
            { opacity: [0, 1], scale: [0.8, 1] },
            { duration: 1, delay: 0.3, easing: spring({ stiffness: 100, damping: 15 }) }
        );
    });

    // Animation de la description et des boutons
    inView(descriptionRef.value, () => {
        timeline([
            [descriptionRef.value, { opacity: [0, 1], y: [30, 0] }, { duration: 0.8, delay: 0.5 }],
            [buttonsRef.value.children,
                { opacity: [0, 1], x: [-20, 0], scale: [0.9, 1] },
                { duration: 0.5, delay: stagger(0.1), at: "-0.3" }
            ]
        ]);
    });

    // Animation de l'image (desktop uniquement)
    inView(imageRef.value, () => {
        // Animation pour desktop
        animate(imageRef.value,
            {
                opacity: [0, 1],
                clipPath: [
                    "polygon(50% 0%, 100% 0%, 100% 100%, 50% 100%, 30% 50%)",
                    "polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%)"
                ]
            },
            { duration: 1.2, easing: [0.22, 1, 0.36, 1] }
        );
    });

    // Pas d'animation d'image sur mobile car l'image a été supprimée

    // Animation des éléments flottants
    if (floatingElement1.value) {
        animate(floatingElement1.value,
            { scale: [1, 1.05, 1], opacity: [0.5, 0.8, 0.5] },
            { duration: 6, repeat: Infinity, easing: "ease-in-out" }
        );
    }

    if (floatingElement2.value) {
        animate(floatingElement2.value,
            { scale: [1, 1.05, 1], opacity: [0.5, 0.8, 0.5] },
            { duration: 4, repeat: Infinity, easing: "ease-in-out" }
        );
    }

    if (floatingElement3.value) {
        animate(floatingElement3.value,
            { scale: [1, 1.05, 1], opacity: [0.5, 0.8, 0.5] },
            { duration: 3, repeat: Infinity, easing: "ease-in-out" }
        );
    }

    if (floatingElement4.value) {
        animate(floatingElement4.value,
            { scale: [1, 1.05, 1], opacity: [0.5, 0.8, 0.5] },
            { duration: 5, repeat: Infinity, easing: "ease-in-out" }
        );
    }

    // Animation de l'indicateur de défilement
    if (scrollIndicator.value) {
        animate(scrollIndicator.value,
            { y: [0, 10, 0] },
            { duration: 1.5, repeat: Infinity, easing: "ease-in-out" }
        );
    }
});
</script>

<template>
    <!--  home hero -->
    <section class="w-full min-h-screen flex flex-col md:flex-row  bg-blue-dark relative overflow-hidden">
        <!-- Background pattern with responsive design -->
        <div class="absolute inset-0 opacity-10 md:opacity-10 bg-pattern"></div>

        <!-- Content area - full width on mobile, half width on desktop -->
        <div class="w-full md:w-1/2 md:pt-52 pt-28 sm:pt-32 md:px-16 px-6 text-white z-10 relative">
            <div class="max-w-2xl mx-auto md:mx-0">
                <!-- Subtitle with animation -->
                <div ref="subtitleRef" class="flex items-center mb-4 opacity-0">
                    <div class="w-10 h-1 bg-primary mr-3 rounded-full"></div>
                    <h2 class="text-primary text-sm sm:text-base md:text-xl font-medium tracking-wider uppercase">
                        Votre santé, Notre priorité
                    </h2>
                </div>

                <!-- Main heading with responsive sizing -->
                <h1 ref="headingRef" class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold mb-8 sm:mb-10 leading-tight opacity-0">
                    Notre expertise médicale à votre service
                </h1>

                <div>
                    <!-- Description text with better mobile sizing -->
                    <p ref="descriptionRef" class="text-base sm:text-lg text-gray-200 mb-8 sm:mb-10 leading-relaxed opacity-0">
                        L'équipe du Centre Hospitalier Nganda s'engage à vous
                        offrir les meilleurs soins de santé à Kinshasa avec une approche
                        personnalisée et des technologies de pointe.
                    </p>

                    <!-- Mobile-friendly button layout -->
                    <div ref="buttonsRef" class="flex flex-col sm:flex-row gap-4 sm:gap-5 mt-8 sm:mt-12">
                        <a
                            href="/contact"
                            class="w-full sm:w-auto px-6 sm:px-8 py-4 sm:py-4 text-base bg-primary text-secondary font-bold rounded-lg transform transition-all duration-300 hover:scale-105 hover:shadow-lg focus:outline-none opacity-0 inline-flex items-center justify-center"
                        >
                            Contactez-nous
                        </a>

                        <a
                            href="#services"
                            class="w-full sm:w-auto px-6 sm:px-8 py-4 sm:py-4 text-base bg-transparent border-2 border-primary text-primary font-bold rounded-lg transform transition-all duration-300 hover:bg-primary/10 focus:outline-none opacity-0 inline-flex items-center justify-center"
                        >
                            Nos services
                        </a>
                    </div>

                    <!-- Mobile scroll indicator -->
                    <div ref="scrollIndicator" class="flex justify-center mt-16 md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image area - only visible on desktop -->
        <div class="hidden md:block md:w-1/2 md:h-screen relative">
            <!-- Gradient overlay for desktop -->

            <!-- Desktop image with clip-path -->
            <div class="relative w-full h-full">
                <img
                    ref="imageRef"
                    src="/assets/images/BRU_9885.jpg"
                    class="curve-enhanced object-cover object-center w-full h-full opacity-0"
                    alt="Centre Hospitalier Nganda"
                />
                <!-- Overlay effect for the image -->
                <div class="absolute inset-0 bg-primary/10 mask-overlay hidden lg:block"></div>
            </div>
        </div>

        <!-- Mobile background pattern enhancement - replaces image -->
        <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-pattern-enhanced opacity-5 md:hidden"></div>

        <!-- Desktop floating elements -->
        <div ref="floatingElement1" class="absolute bottom-10 left-10 w-20 h-20 rounded-full bg-primary/10 hidden lg:block"></div>
        <div ref="floatingElement2" class="absolute top-20 right-1/4 w-12 h-12 rounded-full bg-primary/10 hidden lg:block"></div>
    </section>
</template>

<style scoped>
.curve-enhanced {
    border-radius: 58px 0px 10px 58px;
    height: 100%;
    object-fit: cover;
    padding: 0;
    margin: 0;
    -webkit-clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
    clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
    transition: clip-path 0.5s ease-out;
}

/* Mobile-friendly clip path */
@media (max-width: 640px) {
    .curve-enhanced {
        -webkit-clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 15% 100%, 0% 50%);
        clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 15% 100%, 0% 50%);
    }
}

/* Hover effect for desktop */
@media (min-width: 1024px) {
    .curve-enhanced:hover {
        -webkit-clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 20% 100%, 5% 50%);
        clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 20% 100%, 5% 50%);
    }
}

.bg-pattern {
    background-image: radial-gradient(rgba(226, 232, 240, 0.1) 2px, transparent 2px);
    background-size: 30px 30px;
}

/* Responsive pattern size for mobile */
@media (max-width: 768px) {
    .bg-pattern {
        background-image:
            radial-gradient(rgba(226, 232, 240, 0.15) 1.5px, transparent 1.5px),
            linear-gradient(to right, rgba(226, 232, 240, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(226, 232, 240, 0.05) 1px, transparent 1px);
        background-size: 20px 20px, 40px 40px, 40px 40px;
        animation: patternShift 30s linear infinite;
    }
}

@keyframes patternShift {
    0% {
        background-position: 0 0, 0 0, 0 0;
    }
    100% {
        background-position: 20px 20px, 40px 0, 0 40px;
    }
}

/* Mask overlay with wave effect */
.mask-overlay {
    -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' viewBox='0 0 1000 1000' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3CclipPath id='shape'%3E%3Cpath fill='currentColor' d='M833,695.5Q747,891,551.5,840Q356,789,203,644.5Q50,500,203,355.5Q356,211,551.5,160Q747,109,833,304.5Q919,500,833,695.5Z'%3E%3C/path%3E%3C/clipPath%3E%3C/defs%3E%3Cg clip-path='url(%23shape)'%3E%3Cpath fill='%23FFFFFF' d='M833,695.5Q747,891,551.5,840Q356,789,203,644.5Q50,500,203,355.5Q356,211,551.5,160Q747,109,833,304.5Q919,500,833,695.5Z' /%3E%3C/g%3E%3C/svg%3E");
    mask-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' viewBox='0 0 1000 1000' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3CclipPath id='shape'%3E%3Cpath fill='currentColor' d='M833,695.5Q747,891,551.5,840Q356,789,203,644.5Q50,500,203,355.5Q356,211,551.5,160Q747,109,833,304.5Q919,500,833,695.5Z'%3E%3C/path%3E%3C/clipPath%3E%3C/defs%3E%3Cg clip-path='url(%23shape)'%3E%3Cpath fill='%23FFFFFF' d='M833,695.5Q747,891,551.5,840Q356,789,203,644.5Q50,500,203,355.5Q356,211,551.5,160Q747,109,833,304.5Q919,500,833,695.5Z' /%3E%3C/g%3E%3C/svg%3E");
    opacity: 0;
    animation: fadeInMask 2s ease-out forwards 1s;
    pointer-events: none;
}

@keyframes fadeInMask {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Mobile mask overlay with different shape */
.mask-overlay-mobile {
    -webkit-mask-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' viewBox='0 0 1000 1000' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3CclipPath id='shape'%3E%3Cpath fill='currentColor' d='M816.5,675.5Q675,851,499.5,816.5Q324,782,162,641Q0,500,162,359Q324,218,499.5,183.5Q675,149,816.5,324.5Q958,500,816.5,675.5Z'%3E%3C/path%3E%3C/clipPath%3E%3C/defs%3E%3Cg clip-path='url(%23shape)'%3E%3Cpath fill='%23FFFFFF' d='M816.5,675.5Q675,851,499.5,816.5Q324,782,162,641Q0,500,162,359Q324,218,499.5,183.5Q675,149,816.5,324.5Q958,500,816.5,675.5Z' /%3E%3C/g%3E%3C/svg%3E");
    mask-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' viewBox='0 0 1000 1000' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3CclipPath id='shape'%3E%3Cpath fill='currentColor' d='M816.5,675.5Q675,851,499.5,816.5Q324,782,162,641Q0,500,162,359Q324,218,499.5,183.5Q675,149,816.5,324.5Q958,500,816.5,675.5Z'%3E%3C/path%3E%3C/clipPath%3E%3C/defs%3E%3Cg clip-path='url(%23shape)'%3E%3Cpath fill='%23FFFFFF' d='M816.5,675.5Q675,851,499.5,816.5Q324,782,162,641Q0,500,162,359Q324,218,499.5,183.5Q675,149,816.5,324.5Q958,500,816.5,675.5Z' /%3E%3C/g%3E%3C/svg%3E");
    opacity: 0;
    animation: fadeInMask 1.5s ease-out forwards 0.8s;
    pointer-events: none;
    z-index: 15;
}

/* Enhanced background pattern for mobile (replaces image) */
.bg-pattern-enhanced {
    background-image:
        radial-gradient(circle at 25% 25%, rgba(226, 232, 240, 0.3) 1px, transparent 1px),
        radial-gradient(circle at 75% 75%, rgba(226, 232, 240, 0.2) 1px, transparent 1px),
        linear-gradient(to right, rgba(226, 232, 240, 0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(226, 232, 240, 0.1) 1px, transparent 1px);
    background-size: 20px 20px, 15px 15px, 40px 40px, 40px 40px;
    animation: patternShiftEnhanced 40s linear infinite;
}

@keyframes patternShiftEnhanced {
    0% {
        background-position: 0 0, 0 0, 0 0, 0 0;
    }
    100% {
        background-position: 40px 40px, -30px -30px, 40px 0, 0 40px;
    }
}
</style>
