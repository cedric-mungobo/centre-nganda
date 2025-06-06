<template>
    <SeoHead page="about" />
    <GuestLayout>
        <!-- Hero Section -->
        <section class="py-16 md:py-24 bg-pattern relative overflow-hidden">
            <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 ref="titleRef" class="text-3xl md:text-5xl font-bold text-blue-dark mb-6 relative inline-block">
                        À propos du Centre Hospitalier Nganda
                        <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-medium rounded-full"></span>
                    </h1>
                    <p ref="subtitleRef" class="text-lg text-gray-600 mt-6 max-w-3xl mx-auto">
                        Découvrez l'histoire et la mission de notre centre hospitalier, pionnier dans le domaine de la radiothérapie en République Démocratique du Congo.
                    </p>
                </div>
            </div>
       
          

            <!-- Background decorative elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-light/10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-medium/5 rounded-full -ml-40 -mb-40"></div>
        </section>

        <!-- Main Content Section -->
        <section class="py-16 md:py-24 bg-white relative">
            <div class="container mx-auto px-4 md:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto">
                    <!-- Histoire Content -->
                    <div ref="historyRef" class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-100">
                        <h2 class="text-2xl md:text-3xl font-bold text-blue-dark mb-6 relative inline-block">
                            Notre histoire
                            <span class="absolute -bottom-2 left-0 w-16 h-1 bg-blue-medium rounded-full"></span>
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            En 1991, le Dr Sulu Maseb A' Mwang, après ses études en Belgique, entreprît d'ouvrir un centre médical privé dans son pays la République Démocratique du Congo (nommé Zaïre, à l'époque). En effet, suite aux multiples sollicitations de ses voisins qui se sont produites à son domicile pour des besoins de santé, le Dr Sulu a décidé, avec l'appui de son épouse Mukay, d'ouvrir un cabinet médical pour leur offrir les meilleures conditions d'accueil.

                        </p>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            N'ayant pas assez de ressources, c'est la maison familiale qui fût transformée en dispensaire. Ainsi, progressivement, le dispensaire se transforme en clinique pour devenir en 2004 : « le Centre Hospitalier Nganda » avec une capacité d'accueil de 100 lits.
                        </p>
                        <h3 class="text-xl font-bold text-blue-dark mb-3 mt-6">
                            Prônant l'innovation
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Le Centre Hospitalier Nganda est le premier centre médical privé à introduire le scanner en RDC et aujourd'hui, il est encore le premier et unique centre à offrir la radiothérapie dans son panel de soins en RDC.                        </p>
                        <h3 class="text-xl font-bold text-blue-dark mb-3 mt-6">
                            Centre de radiothérapie MUK & MASEB
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Inauguré le 8/03/2020 sous la Haute Autorité de S.E.M Félix-Antoine Tshisekedi Tshilombo, Président de la République Démocratique du Congo, le centre de radiothérapie MUK & MASEB (baptisé ainsi en l'honneur de l'abnégation du couple Sulu) est l'un des points culminants de la lutte contre le cancer en RDC.                        </p>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Le Centre Hospitalier Nganda est actuellement dirigé par le fils cadet du couple, le Dr Sulu Arnold cela depuis 2017, médecin et spécialiste en gestion des institutions de santé. Avec lui et au fil  des années, ce sont plusieurs agents qui ont rejoint cette aventure pour ne former aujourd'hui qu'une seule et grande famille : « la famille Nganda ».
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SeoHead from "@/Components/SeoHead.vue";
import { ref, onMounted } from "vue";
import { animate, inView, stagger } from "motion";
import Dropdown from '@/Components/Dropdown.vue';

// References for animation elements
const titleRef = ref(null);
const subtitleRef = ref(null);
const historyRef = ref(null);

// Configuration des animations
onMounted(() => {
    // Animation du titre
    inView(titleRef.value, () => {
        animate(titleRef.value,
            { opacity: [0, 1], y: [-30, 0] },
            { duration: 0.8, easing: 'ease-out' }
        );
    });

    // Animation du sous-titre
    if (subtitleRef.value) {
        inView(subtitleRef.value, () => {
            animate(subtitleRef.value,
                { opacity: [0, 1], y: [20, 0] },
                { duration: 0.7, delay: 0.3, easing: 'ease-out' }
            );
        });
    }

    // Animation de l'historique
    inView(historyRef.value, () => {
        const headings = historyRef.value.querySelectorAll('h2, h3');
        const paragraphs = historyRef.value.querySelectorAll('p');

        animate(headings,
            { opacity: [0, 1], x: [-20, 0] },
            { duration: 0.6, delay: stagger(0.2) }
        );

        animate(paragraphs,
            { opacity: [0, 1], y: [15, 0] },
            { duration: 0.5, delay: stagger(0.1, { start: 0.4 }) }
        );
    });
});
</script>

<style scoped>
/* Background patterns */
.bg-pattern {
    background-color: rgba(131, 132, 196, 0.05);
    background-image:
        radial-gradient(rgba(28, 51, 140, 0.1) 2px, transparent 2px),
        radial-gradient(rgba(104, 136, 172, 0.05) 1px, transparent 1px);
    background-size: 30px 30px, 15px 15px;
    background-position: 0 0, 15px 15px;
}

/* Animation for title underline */
h2, h3 {
    position: relative;
}

h2 span {
    transition: width 0.3s ease;
}

h2:hover span {
    width: 100%;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .bg-pattern {
        background-image:
            radial-gradient(rgba(28, 51, 140, 0.15) 1.5px, transparent 1.5px);
        background-size: 20px 20px;
    }
}
</style>
