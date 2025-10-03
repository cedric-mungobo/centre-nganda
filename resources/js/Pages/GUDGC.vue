<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";

import FormGudgc from "@/Components/FormGudgc.vue";
import HeroSection from "./Sections/GUDGC/HeroSection.vue";
import WhyScreenSection from "./Sections/GUDGC/WhyScreenSection.vue";
import WhoParticipateSection from "./Sections/GUDGC/WhoParticipateSection.vue";
import HowToSection from "./Sections/GUDGC/HowToSection.vue";
import PartnersSection from "./Sections/GUDGC/PartnersSection.vue";
import ContactFormSection from "./Sections/GUDGC/ContactFormSection.vue";
import { ref } from "vue";
import { Head } from '@inertiajs/vue3'


// Animation on scroll
const isVisible = ref(false);



const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};
</script>

<template>
    <Head
        title=" Guichet Unique pour le Dépistage Gratuit des Cancers (GUDGC)"
        description="Guichet Unique pour le Dépistage Gratuit des Cancers (GUDGC)"
        keywords="Guichet Unique pour le Dépistage Gratuit des Cancers (GUDGC)"
     
    />
    <GuestLayout>
        <!-- Hero Section -->
        <HeroSection />

        <main class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="relative overflow-hidden h-full ">
                <img
                    alt="Image de la mission du GUDGC"
                    class="w-full h-full object-cover aspect-square object-center"
                    src="/assets/images/cancer.JPEG"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-black/50 to-black/80"></div>
                <div
                    class="absolute inset-0 flex flex-col justify-end p-2 md:p-12 text-white"
                >
                    <h2 class="text-5xl md:text-6xl font-bold mb-4">
                    Notre mission
                    </h2>
                    <p class="text-lg mb-8 max-w-xl">
                        Réduire la mortalité liée aux cancers du sein, du col,
                        du foie (dues aux hépatites B/C) et du colorectal en
                        améliorant le diagnostic précoce de ces pathologies, la
                        qualité et le suivi des soins.
                    </p>
                   
                </div>
              
            </div>
            <div
                class="dark:bg-card-dark h-full p-2 md:p-8 rounded-large flex flex-col justify-center"
            >
                <FormGudgc />
            </div>
        </main>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
          

            
            <!-- Qui Peut Participer Section -->
            <WhoParticipateSection />
            <!-- Pourquoi Se Faire Dépister Section -->
            <WhyScreenSection />

            <!-- Comment Faire Section -->
            <HowToSection />

         

            <!-- Les Partenaires Section -->
            <PartnersSection />

            <!-- Formulaire de Contact Section -->
            <ContactFormSection />
        </div>
    </GuestLayout>
</template>
