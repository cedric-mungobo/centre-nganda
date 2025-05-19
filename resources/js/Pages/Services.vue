<script setup>
import GuestLayout from "../Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/vue3";
import SeoHead from "@/Components/SeoHead.vue";
import StructuredData from "@/Components/StructuredData.vue";

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
    <SeoHead
        page="services"
        :customMeta="{
            description: 'Centre Nganda propose des services médicaux spécialisés incluant l\'oncologie, la radiothérapie, la pédiatrie, la cardiologie, la neurologie, la chirurgie, et plus encore. Premier centre médical privé à introduire le scanner et la radiothérapie en RDC.'
        }"
    />
    <StructuredData
        type="MedicalOrganization"
        :data="{
            name: 'Centre Hospitalier Nganda',
            url: 'https://centrenganda.com/services',
            logo: 'https://centrenganda.com/assets/images/logo.png',
            description: 'Centre Nganda offre une gamme complète de services médicaux spécialisés, incluant la radiothérapie, l\'oncologie, la pédiatrie, la cardiologie, la neurologie et plus encore à Kinshasa.',
            address: {
                '@type': 'PostalAddress',
                streetAddress: 'N°3816, av haute Tension/Nganda',
                addressLocality: 'Kintambo, Kinshasa',
                addressCountry: 'CD'
            },
            telephone: '+243897000133',
            medicalSpecialty: services.map(service => service.title),
            availableService: services.map(service => ({
                '@type': 'MedicalProcedure',
                name: service.title,
                description: service.description
            }))
        }"
    />
    <GuestLayout>
        <div
            class="bg-white h-full bg-[radial-gradient(100%_50%_at_50%_0%,rgba(0,163,255,0.13)_0,rgba(0,163,255,0)_50%,rgba(0,163,255,0)_100%)]"
        >
            <!-- Hero Section -->
            <div
                class="max-w-7xl mx-auto py-12 md:py-24 px-4 md:px-6 lg:px-8"
            >
                <div
                    v-motion
                    :initial="{ opacity: 0, y: -50 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                    class="overflow-hidden shadow-md sm:shadow-lg rounded-lg bg-white bg-opacity-90 backdrop-blur-sm"
                >
                    <div class="px-4 sm:px-6 py-6 sm:py-8 border-b border-gray-100 text-center">
                        <h1 class="hero-title text-2xl sm:text-3xl md:text-4xl font-bold text-blue-dark mb-2 relative inline-block">
                            Découvrez Nos Spécialités et Services de Santé
                        </h1>
                        <p class="text-sm sm:text-base text-gray-600 max-w-3xl mx-auto mt-3">
                            Le Centre Hospitalier Nganda offre une gamme complète de services médicaux spécialisés pour répondre à tous vos besoins de santé.
                        </p>
                    </div>
                </div>
            </div>

            <section id="specialites" class="py-16 md:py-24 bg-pattern">
                <div class="container mx-auto px-4 md:px-6 lg:px-8">
                    <h2
                        v-motion
                        :initial="{ opacity: 0, scale: 0.9 }"
                        :visible="{ opacity: 1, scale: 1, transition: { duration: 700 } }"
                        class="section-title text-2xl sm:text-3xl font-bold text-center text-blue-dark mb-6 md:mb-12 relative inline-block mx-auto"
                    >Nos Services Médicaux Spécialisés</h2>
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6"
                    >
                        <div
                            v-for="service in services"
                            :key="service.title"
                            v-motion
                            :initial="{ opacity: 0, y: 50 }"
                            :visible="{ opacity: 1, y: 0, transition: { duration: 600, delay: 100 } }"
                            class="service-card bg-white rounded-lg border-blue-dark border-b shadow-lg p-4 md:p-6 transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:bg-blue-50"
                        >
                            <div class="flex items-center mb-4">
                                <i
                                    :class="
                                        service.icon +
                                        ' service-icon text-blue-dark text-2xl sm:text-3xl mr-2 sm:mr-3 transition-all duration-300'
                                    "
                                ></i>
                                <h3 class="text-lg sm:text-xl font-bold text-blue-dark mb-2 transition-all duration-300">
                                    {{ service.title }}
                                </h3>
                            </div>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed transition-all duration-300">{{ service.description }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </GuestLayout>
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

/* Service card hover effects */
.service-card {
    position: relative;
    overflow: hidden;
    z-index: 1;
    border-bottom-width: 3px;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(131, 132, 196, 0.1) 0%, rgba(28, 51, 140, 0.05) 100%);
    z-index: -1;
    opacity: 0;
    transition: all 0.5s ease;
}

.service-card::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(131, 132, 196, 0.05) 0%, transparent 50%);
    z-index: -2;
    opacity: 0;
    transform: scale(0.5);
    transition: all 0.5s ease;
}

.service-card:hover {
    border-color: #8384c4;
    box-shadow: 0 10px 25px -5px rgba(28, 51, 140, 0.1), 0 10px 10px -5px rgba(28, 51, 140, 0.04);
}

.service-card:hover::before {
    opacity: 1;
}

.service-card:hover::after {
    opacity: 1;
    transform: scale(1);
    animation: pulse 3s infinite;
}

.service-card:hover .service-icon {
    color: #1c338c;
    transform: scale(1.2) rotate(5deg);
}

.service-card:hover h3 {
    color: #1c338c;
    transform: translateX(5px);
}

.service-card:hover p {
    color: #4b5563;
}

/* Title hover effects */
.hero-title, .section-title {
    transition: all 0.3s ease;
}

.hero-title::after, .section-title::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 50%;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #1c338c, #8384c4);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.hero-title:hover, .section-title:hover {
    text-shadow: 0 0 1px rgba(28, 51, 140, 0.3);
}

.hero-title:hover::after, .section-title:hover::after {
    width: 100%;
}

/* Section title specific styles */
.section-title {
    display: table;
}

.section-title::before {
    content: '';
    position: absolute;
    top: 50%;
    left: -15px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: #8384c4;
    opacity: 0;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}

.section-title::after {
    height: 2px;
}

.section-title:hover::before {
    opacity: 1;
    left: -25px;
}

/* Pulse animation for service cards */
@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.8;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Responsive adjustments for mobile */
@media (max-width: 768px) {
    .bg-pattern {
        background-image:
            radial-gradient(rgba(28, 51, 140, 0.15) 1.5px, transparent 1.5px),
            linear-gradient(to right, rgba(104, 136, 172, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(104, 136, 172, 0.05) 1px, transparent 1px);
        background-size: 20px 20px, 40px 40px, 40px 40px;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1);
    }

    .service-card:hover h3 {
        transform: translateX(3px);
    }

    .hero-title::after {
        height: 2px;
    }
}
</style>
