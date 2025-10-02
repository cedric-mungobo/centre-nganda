<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    age: '',
    gender: '',
    message: '',
    honeypot: '' // Champ anti-spam
});

const submit = () => {
    form.post(route('contact.store'), {
        onSuccess: () => {
            form.reset();
            // Afficher un message de succès
            alert('Votre message a été envoyé avec succès !');
        },
        onError: (errors) => {
            console.error('Erreurs de validation:', errors);
        }
    });
};
</script>

<template>
    <!-- Contact Form Section -->
    <section class="mb-16">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-xl p-8 md:p-12 text-white">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Contactez-nous pour le Dépistage
                </h2>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Prenez rendez-vous ou posez vos questions sur le dépistage gratuit des cancers
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <form @submit.prevent="submit" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">
                                Nom complet *
                            </label>
                            <input
                                type="text"
                                id="name"
                                v-model="form.name"
                                required
                                class="w-full px-4 py-3 rounded-lg border border-blue-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Votre nom complet"
                            />
                            <div v-if="form.errors.name" class="text-red-200 text-sm mt-1">
                                {{ form.errors.name }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">
                                Email *
                            </label>
                            <input
                                type="email"
                                id="email"
                                v-model="form.email"
                                required
                                class="w-full px-4 py-3 rounded-lg border border-blue-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="votre@email.com"
                            />
                            <div v-if="form.errors.email" class="text-red-200 text-sm mt-1">
                                {{ form.errors.email }}
                            </div>
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-white mb-2">
                                Téléphone
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                v-model="form.phone"
                                class="w-full px-4 py-3 rounded-lg border border-blue-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="+243 XXX XXX XXX"
                            />
                            <div v-if="form.errors.phone" class="text-red-200 text-sm mt-1">
                                {{ form.errors.phone }}
                            </div>
                        </div>

                        <!-- Âge -->
                        <div>
                            <label for="age" class="block text-sm font-medium text-white mb-2">
                                Âge
                            </label>
                            <input
                                type="number"
                                id="age"
                                v-model="form.age"
                                min="18"
                                max="100"
                                class="w-full px-4 py-3 rounded-lg border border-blue-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Votre âge"
                            />
                            <div v-if="form.errors.age" class="text-red-200 text-sm mt-1">
                                {{ form.errors.age }}
                            </div>
                        </div>
                    </div>

                    <!-- Genre -->
                    <div>
                        <label class="block text-sm font-medium text-white mb-3">
                            Genre
                        </label>
                        <div class="flex space-x-6">
                            <label class="flex items-center">
                                <input
                                    type="radio"
                                    v-model="form.gender"
                                    value="femme"
                                    class="w-4 h-4 text-blue-600 bg-white border-blue-300 focus:ring-blue-500"
                                />
                                <span class="ml-2 text-white">Femme</span>
                            </label>
                            <label class="flex items-center">
                                <input
                                    type="radio"
                                    v-model="form.gender"
                                    value="homme"
                                    class="w-4 h-4 text-blue-600 bg-white border-blue-300 focus:ring-blue-500"
                                />
                                <span class="ml-2 text-white">Homme</span>
                            </label>
                        </div>
                        <div v-if="form.errors.gender" class="text-red-200 text-sm mt-1">
                            {{ form.errors.gender }}
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-white mb-2">
                            Message *
                        </label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            required
                            rows="4"
                            class="w-full px-4 py-3 rounded-lg border border-blue-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Décrivez votre demande ou posez vos questions sur le dépistage..."
                        ></textarea>
                        <div v-if="form.errors.message" class="text-red-200 text-sm mt-1">
                            {{ form.errors.message }}
                        </div>
                    </div>

                    <!-- Champ honeypot (caché) -->
                    <div class="hidden">
                        <input
                            type="text"
                            v-model="form.honeypot"
                            tabindex="-1"
                            autocomplete="off"
                        />
                    </div>

                    <!-- Bouton d'envoi -->
                    <div class="text-center">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg v-else class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            {{ form.processing ? 'Envoi en cours...' : 'Envoyer le message' }}
                        </button>
                    </div>
                </form>

                <!-- Informations de contact -->
                <div class="mt-12 pt-8 border-t border-blue-400">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Téléphone</h3>
                            <p class="text-blue-100">+243 897 000 133</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Adresse</h3>
                            <p class="text-blue-100">Centre Hospitalier Nganda<br>Kinshasa, RDC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
