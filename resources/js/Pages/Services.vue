<script setup>
import GuestLayout from "../Layouts/GuestLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

//  all services

const services = [
    {
        title: "Oncologie",
        description:
            "Traitement et prise en charge des patients atteints de cancer.",
        icon: "fas fa-user-md",
    },
    {
        title: "Radiothérapie",
        description:
            "Utilisation de rayonnements ciblés pour traiter les tumeurs.",
        icon: "fas fa-radiation",
    },
    {
        title: "Pédiatrie",
        description:
            "Suivi du développement de l'enfant et traitement des maladies infantiles.",
        icon: "fas fa-baby",
    },
    {
        title: "Médecine interne",
        description:
            "Évaluation globale de la santé et prise en charge des maladies systémiques.",
        icon: "fas fa-stethoscope",
    },
    {
        title: "Chirurgie générale",
        description:
            "Interventions chirurgicales pour traiter diverses pathologies.",
        icon: "fas fa-scalpel",
    },
    {
        title: "Cardiologie",
        description:
            "Diagnostic et traitement des maladies du cœur et des vaisseaux sanguins.",
        icon: "fas fa-heartbeat",
    },
    {
        title: "Dermatologie",
        description:
            "Soins de la peau, des cheveux et des ongles, ainsi que traitement des maladies cutanées.",
        icon: "fas fa-briefcase-medical",
    },
    {
        title: "Gynécologie",
        description:
            "Suivi de la santé reproductive des femmes, y compris la grossesse et la ménopause.",
        icon: "fas fa-female",
    },
    {
        title: "Orthopédie",
        description:
            "Traitement des troubles musculo-squelettiques et des blessures.",
        icon: "fas fa-bone",
    },
    {
        title: "Neurologie",
        description:
            "Évaluation et traitement des maladies du système nerveux.",
        icon: "fas fa-brain",
    },
    // {
    //     title: "Endocrinologie",
    //     description:
    //         "Gestion des troubles hormonaux et des maladies métaboliques.",
    //     icon: "fas fa-user-md",
    // },
    {
        title: "Urologie",
        description:
            "Diagnostic et traitement des affections du système urinaire et reproducteur masculin.",
        icon: "fas fa-urinal",
    },
    {
        title: "Gastro-entérologie",
        description: "Soins des maladies du système digestif.",
        icon: "fas fa-concierge-bell",
    },
    {
        title: "Ophtalmologie",
        description:
            "Diagnostic et traitement des maladies oculaires et de la vision.",
        icon: "fas fa-eye",
    },
    // {
    //     title: "Psychiatrie",
    //     description: "Prise en charge des troubles mentaux et émotionnels.",
    //     icon: "fas fa-comments",
    // },
    {
        title: "Médecine d'urgence",
        description: "Soins médicaux immédiats pour les cas critiques.",
        icon: "fas fa-ambulance",
    },
    {
        title: "Réhabilitation",
        description:
            "Programmes de rééducation pour retrouver la mobilité et la fonction.",
        icon: "fas fa-user-injured",
    },
    {
        title: "Pharmacie",
        description: "Gestion des médicaments et conseils pharmacologiques.",
        icon: "fas fa-file-medical",
    },
];
</script>
<template>
    <Head>
        <!-- Meta Tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="Découvrez les services médicaux spécialisés du Centre Nganda : oncologie, pédiatrie, radiothérapie, médecine interne, chirurgie et bien plus encore."
        />
        <meta
            name="keywords"
            content="Centre Nganda, oncologie, pédiatrie, médecine interne, radiothérapie, chirurgie, Kinshasa, soins médicaux, services de santé"
        />
        <meta name="author" content="Centre Nganda" />

        <!-- Open Graph Meta Tags -->
        <meta
            property="og:title"
            content="Nos Services Médicaux Spécialisés - Centre Nganda"
        />
        <meta
            property="og:description"
            content="Explorez nos services spécialisés : oncologie, pédiatrie, médecine interne, radiothérapie, et bien plus au Centre Nganda."
        />
        <meta property="og:image" content="URL_DE_L'IMAGE_SERVICES.jpg" />
        <meta property="og:url" content="URL_DE_LA_PAGE" />
        <meta property="og:type" content="website" />

        <!-- Title -->
        <title>Nos Services Médicaux Spécialisés - Centre Nganda</title>
    </Head>
    <GuestLayout>
        <div
            class="bg-white h-full bg-[radial-gradient(100%_50%_at_50%_0%,rgba(0,163,255,0.13)_0,rgba(0,163,255,0)_50%,rgba(0,163,255,0)_100%)]"
        >
            <!-- Hero Section -->
            <div
                class="max-w-7xl mx-auto pt-14 md:py-10 md:pt-20 sm:px-6 lg:px-8"
            >
                <div
                    v-animate="'backInDown'"
                    class="overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 border-b border-white text-center">
                        <h1 class="text-2xl font-bold text-gray-900">
                            Découvrez Nos Spécialités et Services de Santé
                        </h1>
                    </div>
                </div>
            </div>

            <section id="specialites" class="pb-28">
                <div class="container mx-auto px-4">
                    <h2
                        class="text-3xl font-bold text-center text-gray-800 mb-8"
                    ></h2>
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
                    >
                        <div
                            v-for="service in services"
                            :key="service.title"
                            v-animate="'zoomIn'"
                            class="bg-white rounded-lg border-blue-500 border-b shadow-lg p-6 transition-transform transform hover:scale-105"
                        >
                            <div class="flex items-center mb-4">
                                <i
                                    :class="
                                        service.icon +
                                        ' text-blue-500 text-3xl mr-3'
                                    "
                                ></i>
                                <h3 class="text-xl font-semibold">
                                    {{ service.title }}
                                </h3>
                            </div>
                            <p>{{ service.description }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>

<style></style>
