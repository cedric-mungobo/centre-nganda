<template>
    <!-- Hero Section -->
    <section class="relative  bg-gradient-to-b from-pink-300 via-pink-300 to-pink-300 text-white py-20">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mt-10">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">
                    Guichet Unique pour le Dépistage Gratuit  des Cancers
                </h1>
                <p class="text-xs md:text-base text-rose-100  font-semibold smax-w-3xl mx-auto animate-fade-in-delay">
                    Le Guichet unique de dépistage gratuit des cancers (GUDGC) est une initiative du Centre National de Lutte contre le Cancer (CNLC), en partenariat avec le Centre Hospitalier Nganda (CHN), sous l'autorité du Ministère de Santé Publique, Hygiène et Prévoyance Sociale (MSPHPS).                </p>
            </div>
        </div>
    </section>
</template>

<style scoped>
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-delay {
    animation: fadeIn 1s ease-out 0.3s both;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
