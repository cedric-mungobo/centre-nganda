<script lang="ts" setup>
import GuestLayout from "../Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";

const features = [
    {
        title: "Consultation Personnalisée",
        desc: "Chaque patient reçoit une consultation initiale avec un oncologue radiothérapeute afin d'établir un plan de traitement sur mesure. Cette consultation permet d'évaluer la condition du patient, de poser un diagnostic précis et de discuter des options de traitement.",
    },
    {
        title: "Planification de la Radiothérapie",
        desc: "Nous utilisons des techniques avancées d'imagerie (comme le scanner) pour réaliser une simulation 3D. Cela permet de cibler précisément les zones à traiter tout en minimisant les effets sur les tissus environnants.",
    },
    {
        title: "Suivi et Accompagnement",
        desc: "Après chaque traitement, un suivi est effectué pour observer la réaction de la tumeur et ajuster les prochaines séances si nécessaire. Nos patients reçoivent également un soutien psychologique pour les aider à gérer les aspects émotionnels de leur traitement.",
    },
];
</script>
<template>
    <Head>
        <!-- Meta Tags -->

        <meta
            name="description"
            content="Découvrez notre centre de radiothérapie à Kinshasa, offrant des traitements innovants contre le cancer avec des technologies de pointe et un suivi personnalisé."
        />
        <meta
            name="keywords"
            content="radiothérapie, traitement du cancer, oncologie, Kinshasa, soins contre le cancer, rayons ionisants, centre médical, soins de santé, traitement tumeurs"
        />
        <meta name="author" content="Centre Nganda" />

        <!-- Open Graph Meta Tags -->
        <meta
            property="og:title"
            content="Centre de Radiothérapie à Kinshasa - Traitement Innovant Contre le Cancer"
        />
        <meta
            property="og:description"
            content="Notre centre de radiothérapie à Kinshasa offre des soins personnalisés, utilisant les technologies de pointe pour un traitement efficace contre le cancer."
        />
        <meta property="og:image" content="URL_DE_L'IMAGE_RADIOTHERAPIE.jpg" />
        <meta property="og:url" content="URL_DE_LA_PAGE" />
        <meta property="og:type" content="website" />

        <!-- Title -->
        <title>Centre de Radiothérapie à Kinshasa - Centre Nganda</title>
    </Head>
    <GuestLayout>
        <div>
            <div
                class="relative bg-indigo-100 flex flex-col-reverse py-16 min-h-[100vh] lg:pt-0 lg:flex-col lg:pb-0"
            >
                <div
                    class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0"
                >
                    <svg
                        class="absolute left-0 hidden h-full text-blue-100 transform -translate-x-1/2 lg:block"
                        viewBox="0 0 100 100"
                        fill="currentColor"
                        preserveAspectRatio="none slice"
                    >
                        <path d="M50 0H100L50 100H0L50 0Z"></path>
                    </svg>
                    <img
                        class="object-cover w-full max-sm:rounded-md rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
                        src="/assets/images/BRU_9337.jpg"
                        alt=""
                    />
                </div>
                <div
                    class="relative flex flex-col items-start w-full max-w-4xl px-4 md:px-0 lg:px-10"
                >
                    <div class="mb-10 mt-6 lg:my-40 w-full lg:pr-5">
                        <p
                            class="inline-block px-3 mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400"
                        >
                            Centre de Radiothérapie à Kinshasa
                        </p>
                        <h2
                            v-animate="'zoomIn'"
                            class="mb-5 font-sans text-3xl md:text-6xl font-bold text-gray-900 sm:text-4xl"
                        >
                            Traitement Innovant et Efficace Contre le Cancer
                        </h2>
                        <p
                            v-animate="'backInLeft'"
                            class="pr-5 mb-5 text-base text-gray-700 md:text-lg"
                        >
                            La radiothérapie est une méthode moderne de
                            traitement des tumeurs qui utilise des rayonnements
                            ionisants pour détruire les cellules cancéreuses. Ce
                            traitement est locorégional, c’est-à-dire qu’il est
                            limité à une zone spécifique du corps, visant à
                            bloquer la capacité des cellules cancéreuses à se
                            multiplier tout en préservant autant que possible
                            les tissus sains et les organes avoisinants.
                        </p>

                        <div class="" v-animate="'backInRight'">
                            <h1 class="font-bold md:text-xl mb-10">
                                Pourquoi Choisir Notre Centre de Radiothérapie à
                                Kinshasa ?
                            </h1>

                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl"
                            >
                                <div
                                    class="bg-white p-2 rounded-md border-b-2 border-blue-600"
                                >
                                    <p>
                                        Nous sommes fiers d’être l’un des
                                        centres de radiothérapie les plus
                                        performants de Kinshasa. Nos équipements
                                        à la pointe de la technologie et nos
                                        professionnels de santé expérimentés
                                        nous permettent de fournir des soins de
                                        qualité, adaptés aux besoins de chaque
                                        patient.
                                    </p>
                                </div>
                                <div
                                    class="bg-white p-2 rounded-md border-b-2 border-blue-600"
                                >
                                    <p>
                                        Plus de la moitié des patients atteints
                                        de cancer bénéficient d’un traitement
                                        par radiothérapie au cours de leur
                                        parcours de soin. Nous offrons un cadre
                                        optimal pour cette thérapie essentielle,
                                        avec un suivi personnalisé et un
                                        accompagnement tout au long du
                                        traitement.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class="max-w-xl space-y-3">
                    <p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                        Nos Services de Radiothérapie
                    </p>
                </div>
                <div class="mt-12">
                    <ul
                        class="grid gap-x-12 divide-y [&>.feature-1]:pl-0 sm:grid-cols-2 sm:gap-y-8 sm:divide-y-0 lg:divide-x lg:grid-cols-3 lg:gap-x-0"
                    >
                        <li
                            v-for="(item, idx) in features"
                            :key="idx"
                            :class="`feature-${
                                idx + 1
                            } space-y-3 py-8 lg:px-12 sm:py-0`"
                            v-animate="'zoomIn'"
                        >
                            <h4 class="text-lg text-gray-800 font-semibold">
                                {{ item.title }}
                            </h4>
                            <p>
                                {{ item.desc }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="py-14 p-2">
            <div
                class="max-w-7xl p-10 rounded-xl h-full mx-auto px-4 md:px-8 bg-blue-600"
            >
                <div class="max-w-xl sm:text-center md:mx-auto">
                    <h3
                        class="text-gray-100 text-3xl font-semibold sm:text-4xl"
                    >
                        Indications de la Radiothérapie
                    </h3>
                    <p class="mt-3 text-gray-200">
                        La radiothérapie est indiquée pour plusieurs types de
                        cancers et dans divers contextes médicaux. Parmi ses
                        principales utilisations, on peut citer
                    </p>
                </div>
                <div class="mt-12">
                    <ul
                        class="grid items-center gap-6 sm:grid-cols-2 lg:grid-cols-3"
                    >
                        <!-- Testimonial 1 -->
                        <li
                            class="bg-white rounded-xl border shadow-md p-5"
                            v-animate="'backInLeft'"
                        >
                            <h1 class="font-bold py-2 text-3xl">
                                Traitement curatif
                            </h1>
                            <hr class="py-2" />
                            <p class="md:text-xl">
                                Élimination complète des cellules cancéreuses.
                            </p>
                        </li>
                        <li
                            class="bg-white rounded-xl border shadow-md p-5"
                            v-animate="'backInLeft'"
                        >
                            <h1 class="font-bold py-2 text-3xl">
                                Traitement palliatif
                            </h1>
                            <hr class="py-2" />
                            <p class="md:text-xl">
                                Soulagement des symptômes liés à des tumeurs
                                avancées, améliorant ainsi la qualité de vie des
                                patients.
                            </p>
                        </li>
                        <li
                            class="bg-white rounded-xl border shadow-md p-5"
                            v-animate="'backInLeft'"
                        >
                            <h1 class="font-bold py-2 text-3xl">
                                Traitement combiné
                            </h1>
                            <hr class="py-2" />
                            <p class="md:text-xl">
                                Elle peut être combinée à d’autres thérapies
                                comme la chimiothérapie ou la chirurgie, pour
                                maximiser l'efficacité des soins.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style></style>
