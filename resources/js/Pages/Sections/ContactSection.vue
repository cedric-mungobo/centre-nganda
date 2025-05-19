<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

// Message de statut
const status = ref('');
const isSubmitting = ref(false);
const showSuccess = ref(false);
const showError = ref(false);

// Formulaire avec Inertia
const form = useForm({
    name: '',
    email: '',
    message: '',
    honeypot: '' // Champ honeypot pour éviter les spams
});

// Réinitialiser les messages d'état après 5 secondes
watch([showSuccess, showError], () => {
    if (showSuccess.value || showError.value) {
        setTimeout(() => {
            showSuccess.value = false;
            showError.value = false;
        }, 5000);
    }
});

const submitForm = () => {
    isSubmitting.value = true;

    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            isSubmitting.value = false;
            showSuccess.value = true;
            status.value = 'Votre message a été envoyé avec succès!';
        },
        onError: (errors) => {
            isSubmitting.value = false;
            showError.value = true;
            status.value = 'Une erreur est survenue. Veuillez réessayer.';
            console.error(errors);
        }
    });
};
</script>

<template>
    <section
        id="contact"
        class="py-20 md:py-28 bg-gradient-to-br from-white via-blue-light/5 to-blue-medium/10 dark:from-[#0b1727] dark:to-[#0f1f35] text-zinc-900 dark:text-white relative overflow-hidden z-10"
    >
        <!-- Background pattern -->
        <div class="absolute inset-0 bg3 opacity-10"></div>

        <!-- Background shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="shape absolute top-10 right-10 w-32 h-32 rounded-full bg-blue-light/40 blur-xl"></div>
            <div class="shape absolute bottom-20 left-20 w-40 h-40 rounded-full bg-blue-medium/30 blur-xl"></div>
            <div class="shape absolute top-1/3 right-1/4 w-24 h-24 rounded-full bg-blue-dark/20 blur-lg"></div>
        </div>

        <div class="container mx-auto px-4 md:px-6 lg:px-8 relative z-10">
            <!-- Section header -->
            <div class="max-w-3xl mx-auto text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-blue-dark">Contactez-nous</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Nous sommes à votre écoute pour répondre à vos questions et vous accompagner dans votre parcours de soins.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start max-w-6xl mx-auto">
                <!-- Contact form -->
                <div
                    v-motion
                    :initial="{ opacity: 0, y: 100 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-10"
                >
                    <h3 class="text-2xl font-semibold mb-6 text-blue-dark">Envoyez-nous un message</h3>

                    <!-- Messages d'état -->
                    <div v-if="showSuccess" class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                        {{ status }}
                    </div>
                    <div v-if="showError" class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Nom complet
                            </label>
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                placeholder="Votre nom"
                                required
                            />
                            <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Email
                            </label>
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                placeholder="votre@email.com"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Message
                            </label>
                            <textarea
                                id="message"
                                v-model="form.message"
                                rows="5"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                placeholder="Comment pouvons-nous vous aider?"
                                required
                            ></textarea>
                            <div v-if="form.errors.message" class="text-red-500 text-sm mt-1">{{ form.errors.message }}</div>
                        </div>

                        <!-- Champ honeypot (invisible pour les utilisateurs, mais visible pour les bots) -->
                        <div class="hidden" aria-hidden="true">
                            <label for="honeypot">Ne pas remplir ce champ</label>
                            <input
                                id="honeypot"
                                v-model="form.honeypot"
                                type="text"
                                tabindex="-1"
                                autocomplete="off"
                            />
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-blue-dark hover:bg-blue-medium text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300 transform hover:scale-105"
                            :disabled="isSubmitting"
                        >
                            <span v-if="isSubmitting">Envoi en cours...</span>
                            <span v-else>Envoyer le message</span>
                        </button>
                    </form>
                </div>

                <!-- Contact information -->
                <div
                    v-motion
                    :initial="{ opacity: 0, y: 100 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800, delay: 200 } }"
                    class="space-y-8"
                >
                    <div>
                        <h3 class="text-2xl font-semibold mb-6 text-blue-dark">Informations de contact</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-8">
                            N'hésitez pas à nous contacter directement. Notre équipe est prête à vous aider.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 bg-blue-light/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-medium text-blue-dark mb-1">Téléphone</h4>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <a href="tel:+243897000133" class="hover:text-blue-medium transition-colors">Réception: +243 897 000 133</a>
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <a href="tel:+243897000130" class="hover:text-blue-medium transition-colors">Homecare: +243 897 000 130</a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 bg-blue-light/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-medium text-blue-dark mb-1">Email</h4>
                                <p class="text-gray-700 dark:text-gray-300">
                                    <a href="mailto:reception@centrehospitaliernganda.com" class="hover:text-blue-medium transition-colors">reception@centrehospitaliernganda.com</a>
                                </p>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 bg-blue-light/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-medium text-blue-dark mb-1">Adresse</h4>
                                <p class="text-gray-700 dark:text-gray-300">N°3816, av haute Tension/Nganda</p>
                                <p class="text-gray-700 dark:text-gray-300">C/Kintambo Kinshasa</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="mt-8 p-6 bg-blue-light/10 rounded-xl">
                        <h4 class="text-lg font-medium text-blue-dark mb-3">Heures d'ouverture</h4>
                        <ul class="space-y-2">
                            <li class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-300">Lundi - Vendredi:</span>
                                <span class="font-medium">8h00 - 18h00</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-700 dark:text-gray-300">Samedi:</span>
                                <span class="font-medium">8h00 - 14h00</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Add any component-specific styles here */
</style>
