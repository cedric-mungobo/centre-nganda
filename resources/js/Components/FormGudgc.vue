<script setup>
import { ref } from 'vue';

// État du formulaire
const form = ref({
    nom: '',
    postnom: '',
    sexe: '',
    age: '',
    adresse: '',
    email: '',
    telephone: '',
    connaissance: ''
});

// État de soumission
const isSubmitting = ref(false);
const showSuccess = ref(false);
const showError = ref(false);
const status = ref('');

// Fonction de soumission du formulaire
const submitForm = () => {
    isSubmitting.value = true;
    
    // Simulation de soumission (à remplacer par l'appel API réel)
    setTimeout(() => {
        isSubmitting.value = false;
        showSuccess.value = true;
        status.value = 'Votre demande de rendez-vous a été envoyée avec succès !';
        
        // Réinitialiser le formulaire
        form.value = {
            nom: '',
            postnom: '',
            sexe: '',
            age: '',
            adresse: '',
            email: '',
            telephone: '',
            connaissance: ''
        };
        
        // Masquer le message de succès après 5 secondes
        setTimeout(() => {
            showSuccess.value = false;
        }, 5000);
    }, 2000);
};

// Réinitialiser les messages d'état
const resetStatus = () => {
    showSuccess.value = false;
    showError.value = false;
    status.value = '';
};
</script>

<template>
    <div class="w-full max-w-4xl mx-auto">
        <h3 class="text-3xl font-bold text-text-light dark:text-text-dark mb-4">
            Formulaire pour prendre rendez-vous de dépistage
        </h3>
        <p class="text-reds-500 dark:text-red-400 mb-2 font-semibold">
            faite votre dépistage et C'est 100% GRATUIT !
        </p>
        
        <!-- Messages de statut -->
        <div v-if="showSuccess" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ status }}
            </div>
        </div>

        <div v-if="showError" class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                {{ status }}
            </div>
        </div>

        <form @submit.prevent="submitForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        for="nom"
                        >Nom *</label
                    >
                    <input
                        v-model="form.nom"
                        class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                        id="nom"
                        name="nom"
                        placeholder="Votre nom"
                        type="text"
                        required
                    />
                </div>
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        for="postnom"
                        >Postnom *</label
                    >
                    <input
                        v-model="form.postnom"
                        class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                        id="postnom"
                        name="postnom"
                        placeholder="Votre postnom"
                        type="text"
                        required
                    />
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        for="sexe"
                        >Sexe *</label
                    >
                    <select
                        v-model="form.sexe"
                        class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                        id="sexe"
                        name="sexe"
                        required
                    >
                        <option value="">Sélectionnez votre sexe</option>
                        <option value="F">Féminin</option>
                        <option value="M">Masculin</option>
                    </select>
                </div>
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                        for="age"
                        >Âge *</label
                    >
                    <input
                        v-model="form.age"
                        class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                        id="age"
                        name="age"
                        placeholder="Votre âge"
                        type="number"
                        min="18"
                        max="100"
                        required
                    />
                </div>
            </div>

            <div class="mb-4">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    for="adresse"
                    >Adresse *</label
                >
                <input
                    v-model="form.adresse"
                    class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                    id="adresse"
                    name="adresse"
                    placeholder="Votre adresse complète"
                    type="text"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    for="email"
                    >Email</label
                >
                <input
                    v-model="form.email"
                    class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                    id="email"
                    name="email"
                    placeholder="votre@email.com"
                    type="email"
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    for="telephone"
                    >Numéro de téléphone *</label
                >
                <input
                    v-model="form.telephone"
                    class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                    id="telephone"
                    name="telephone"
                    placeholder="+243 XXX XXX XXX"
                    type="tel"
                    required
                />
            </div>

            <div class="mb-6">
                <label
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
                    for="connaissance"
                    >Comment avez-vous connu le Guichet Unique ? *</label
                >
                <select
                    v-model="form.connaissance"
                    class="w-full bg-background-light dark:bg-card-dark text-text-light dark:text-text-dark border border-border-light dark:border-border-dark rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary"
                    id="connaissance"
                    name="connaissance"
                    required
                >
                    <option value="">Sélectionnez une option</option>
                    <option value="internet">Internet / Site web</option>
                    <option value="reseau_social">Réseaux sociaux</option>
                    <option value="ami_famille">Ami / Famille</option>
                    <option value="medecin">Médecin / Professionnel de santé</option>
                    <option value="affiche">Affiche / Publicité</option>
                    <option value="radio">Radio</option>
                    <option value="television">Télévision</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <button
                :disabled="isSubmitting"
                class="w-full bg-black dark:bg-white text-white dark:text-black font-semibold py-3 px-6 rounded-full flex items-center justify-center gap-2 mb-4 hover:bg-black/90 dark:hover:bg-white/90 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                type="submit"
            >
                <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white dark:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <svg v-else class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ isSubmitting ? 'Envoi en cours...' : 'Prendre rendez-vous' }}
            </button>
        </form>
    </div>
</template>
