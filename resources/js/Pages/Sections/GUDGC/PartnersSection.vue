<script setup>
// Array des partenaires - facile à modifier
const partners = [
    { name: 'MSPHPS', fullName: 'Ministère de la Santé Publique' },
    { name: 'CNLC', fullName: 'Centre National de Lutte Contre Le Cancer' },
    { name: 'CHN', fullName: 'Centre Hospitalier Nganda' },
   
];
</script>

<template>
    <!-- Partners Section -->
    <section class="mb-16">
        <div class="border border-border-light dark:border-border-dark rounded-2xl p-8 md:p-12">
            <div class="text-center mb-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                    Partenaires
                </h2>
                <div class="w-24 h-1 bg-pink-400 mx-auto rounded-full"></div>
            </div>
            
            <!-- Logo Scroll Container -->
            <div class="relative overflow-hidden">
                <div class="flex animate-scroll space-x-8">
                    <!-- Premier set de logos -->
                    <div class="flex space-x-8 flex-shrink-0">
                        <div 
                            v-for="partner in partners" 
                            :key="`first-${partner.name}`"
                            class="w-32 h-20 bg-gray-100 rounded-lg flex items-center justify-center group relative"
                            :title="partner.fullName"
                        >
                            <span class="text-sm font-semibold text-gray-600">{{ partner.name }}</span>
                        </div>
                    </div>
                    
                    <!-- Deuxième set de logos (pour l'effet de continuité) -->
                    <div class="flex space-x-8 flex-shrink-0">
                        <div 
                            v-for="partner in partners" 
                            :key="`second-${partner.name}`"
                            class="w-32 h-20 bg-gray-100 rounded-lg flex items-center justify-center group relative"
                            :title="partner.fullName"
                        >
                            <span class="text-sm font-semibold text-gray-600">{{ partner.name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}

.animate-scroll {
    animation: scroll 20s linear infinite;
}
</style>
