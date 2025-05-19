<script setup>
import GuestLayout from "../Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

// Services de radiothérapie
const features = [
    {
        icon: "fa-solid fa-user-doctor",
        title: "Consultation Personnalisée",
        desc: "Chaque patient reçoit une consultation initiale avec un oncologue radiothérapeute afin d'établir un plan de traitement sur mesure. Cette consultation permet d'évaluer la condition du patient, de poser un diagnostic précis et de discuter des options de traitement.",
    },
    {
        icon: "fa-solid fa-radiation",
        title: "Planification de la Radiothérapie",
        desc: "Nous utilisons des techniques avancées d'imagerie (comme le scanner) pour réaliser une simulation 3D. Cela permet de cibler précisément les zones à traiter tout en minimisant les effets sur les tissus environnants.",
    },
    {
        icon: "fa-solid fa-stethoscope",
        title: "Suivi et Accompagnement",
        desc: "Après chaque traitement, un suivi est effectué pour observer la réaction de la tumeur et ajuster les prochaines séances si nécessaire. Nos patients reçoivent également un soutien psychologique pour les aider à gérer les aspects émotionnels de leur traitement.",
    },
];

// Questions fréquemment posées
const faqs = [
    {
        question: "Combien de temps dure une séance de radiothérapie ?",
        answer: "Une séance de radiothérapie dure généralement entre 15 et 30 minutes, bien que le temps passé dans la salle de traitement puisse être plus long pour la préparation. Le traitement lui-même ne prend que quelques minutes."
    },
    {
        question: "La radiothérapie est-elle douloureuse ?",
        answer: "Non, la radiothérapie est indolore pendant le traitement. Vous ne sentirez rien pendant que les rayons sont administrés, similaire à une radiographie. Certains effets secondaires peuvent apparaître après plusieurs séances."
    },
    {
        question: "Quels sont les effets secondaires courants ?",
        answer: "Les effets secondaires varient selon la zone traitée, mais peuvent inclure fatigue, irritations cutanées, et des effets spécifiques à la région traitée. Notre équipe vous accompagnera pour gérer ces effets."
    },
    {
        question: "Combien de séances de radiothérapie sont nécessaires ?",
        answer: "Le nombre de séances varie selon le type de cancer, son stade et l'objectif du traitement. Un traitement standard peut comprendre entre 1 et 40 séances, généralement réparties sur plusieurs semaines."
    }
];

// État pour les FAQs
const activeIndex = ref(null);
const toggleFAQ = (index) => {
    activeIndex.value = activeIndex.value === index ? null : index;
};
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
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-b from-blue-light/5 to-white py-16 md:py-24 overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-blue-light/10 rounded-br-full opacity-70"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-medium/10 rounded-tl-full opacity-70"></div>
            <div class="absolute top-1/4 right-10 w-16 h-16 bg-blue-dark/10 rounded-full opacity-50"></div>
            <div class="absolute bottom-1/4 left-10 w-16 h-16 bg-blue-medium/10 rounded-full opacity-50"></div>
            
            <div class="container max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                    <!-- Content Section -->
                    <div class="w-full lg:w-1/2 order-2 lg:order-1">
                        <div class="inline-block mb-4">
                            <span class="inline-block py-1.5 px-5 rounded-full bg-blue-dark/10 text-blue-dark text-sm font-medium">
                                Centre de Radiothérapie à Kinshasa
                            </span>
                        </div>
                        
                        <h1 class="text-3xl md:text-5xl font-bold text-blue-dark mb-6">
                            Traitement Innovant et Efficace Contre le Cancer
                        </h1>
                        
                        <div class="text-lg text-gray-600 mb-8">
                            <p class="mb-4">
                                La radiothérapie est une méthode moderne de traitement des tumeurs qui utilise des rayonnements
                                ionisants pour détruire les cellules cancéreuses. Ce traitement est locorégional, c'est-à-dire qu'il est
                                limité à une zone spécifique du corps.
                            </p>
                            <p>
                                Notre approche vise à bloquer la capacité des cellules cancéreuses à se
                                multiplier tout en préservant autant que possible les tissus sains et les organes avoisinants.
                            </p>
                        </div>
                        
                        <div class="mt-8">
                            <h2 class="text-xl font-bold text-blue-dark mb-6">
                                Pourquoi Choisir Notre Centre de Radiothérapie à Kinshasa ?
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-dark">
                                    <p>
                                        Nous sommes fiers d'être l'un des centres de radiothérapie les plus
                                        performants de Kinshasa. Nos équipements à la pointe de la technologie et nos
                                        professionnels de santé expérimentés nous permettent de fournir des soins de
                                        qualité.
                                    </p>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-medium">
                                    <p>
                                        Plus de la moitié des patients atteints de cancer bénéficient d'un traitement
                                        par radiothérapie au cours de leur parcours de soin. Nous offrons un cadre
                                        optimal pour cette thérapie essentielle, avec un suivi personnalisé.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/2 order-1 lg:order-2 relative">
                        <div class="relative">
                            <!-- Decorative elements -->
                            <div class="absolute -top-6 -left-6 w-32 h-32 bg-blue-dark/10 rounded-tl-[50px] z-0 transform rotate-6"></div>
                            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-medium/10 rounded-br-[50px] z-0 transform -rotate-6"></div>
                            
                            <img
                                class="w-full h-auto rounded-2xl shadow-xl relative z-10 object-cover"
                                src="/assets/images/BRU_9337.jpg"
                                alt="Centre de radiothérapie à Kinshasa"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-dark mb-4">
                        Nos Services de Radiothérapie
                    </h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Notre équipe d'experts propose une gamme complète de services pour assurer un traitement efficace et personnalisé.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                    <div 
                        v-for="(item, idx) in features" 
                        :key="idx"
                        class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-100"
                    >
                        <div class="flex items-start mb-4">
                            <div class="bg-blue-dark text-white w-12 h-12 rounded-xl text-lg flex justify-center items-center mr-4 shrink-0">
                                <i :class="item.icon"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-dark">
                                {{ item.title }}
                            </h3>
                        </div>
                        <p class="text-gray-600">
                            {{ item.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Indications Section -->
        <section class="py-16 md:py-24 bg-gradient-to-b from-white to-blue-light/10">
            <div class="container max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-dark mb-4">
                        Indications de la Radiothérapie
                    </h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        La radiothérapie est indiquée pour plusieurs types de cancers et dans divers contextes médicaux. 
                        Parmi ses principales utilisations, on peut citer:
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                    <div class="bg-white rounded-xl shadow-md p-8 border-t-4 border-blue-dark">
                        <h3 class="text-xl font-bold text-blue-dark mb-4">Traitement curatif</h3>
                        <p class="text-gray-600">
                            Élimination complète des cellules cancéreuses pour guérir le patient de sa maladie.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-8 border-t-4 border-blue-medium">
                        <h3 class="text-xl font-bold text-blue-dark mb-4">Traitement palliatif</h3>
                        <p class="text-gray-600">
                            Soulagement des symptômes liés à des tumeurs avancées, améliorant ainsi la qualité de vie des patients.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-8 border-t-4 border-blue-light">
                        <h3 class="text-xl font-bold text-blue-dark mb-4">Traitement combiné</h3>
                        <p class="text-gray-600">
                            Elle peut être combinée à d'autres thérapies comme la chimiothérapie ou la chirurgie, pour maximiser l'efficacité des soins.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-dark mb-4">
                        Questions Fréquemment Posées
                    </h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Nous avons rassemblé les questions les plus courantes concernant la radiothérapie pour vous aider à mieux comprendre ce traitement.
                    </p>
                </div>
                
                <div class="max-w-3xl mx-auto mt-12">
                    <div 
                        v-for="(faq, index) in faqs" 
                        :key="index"
                        class="mb-6"
                    >
                        <button 
                            @click="toggleFAQ(index)"
                            class="flex justify-between items-center w-full p-5 bg-gray-50 hover:bg-gray-100 rounded-xl text-left transition-all duration-300"
                        >
                            <h3 class="text-lg font-semibold text-blue-dark">{{ faq.question }}</h3>
                            <span class="text-blue-dark text-xl">
                                <i :class="activeIndex === index ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                            </span>
                        </button>
                        <div 
                            v-show="activeIndex === index"
                            class="p-5 bg-white border border-gray-100 rounded-b-xl mt-1"
                        >
                            <p class="text-gray-600">{{ faq.answer }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 md:py-24 bg-blue-dark text-white">
            <div class="container max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Prendre Rendez-vous</h2>
                    <p class="text-lg text-gray-200 mb-8">
                        Notre équipe d'experts est prête à vous accompagner dans votre parcours de soins. 
                        N'hésitez pas à nous contacter pour prendre rendez-vous ou pour toute question concernant nos services.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a 
                            href="tel:+243897000130" 
                            class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-dark font-medium rounded-xl shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:-translate-y-1"
                        >
                            <i class="fas fa-phone-alt mr-2"></i>
                            <span>+243 897 000 130</span>
                        </a>
                        <a 
                            href="#contact" 
                            class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-medium rounded-xl shadow-lg hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1"
                        >
                            <i class="fas fa-envelope mr-2"></i>
                            <span>Nous Contacter</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
/* Add any specific styles here */
</style>
