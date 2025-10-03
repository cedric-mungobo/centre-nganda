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
    
    // Validation des champs obligatoires
    if (!form.value.nom || !form.value.postnom || !form.value.sexe || !form.value.age || !form.value.adresse || !form.value.telephone || !form.value.connaissance) {
        isSubmitting.value = false;
        showError.value = true;
        status.value = 'Veuillez remplir tous les champs obligatoires.';
        setTimeout(() => {
            showError.value = false;
        }, 5000);
        return;
    }
    
    // Préparer le message WhatsApp
    const message = `🏥 *DEMANDE DE RENDEZ-VOUS POUR DÉPISTAGE GRATUIT*

👤 *Informations personnelles :*
• Nom : ${form.value.nom}
• Postnom : ${form.value.postnom}
• Sexe : ${form.value.sexe === 'F' ? 'Féminin' : 'Masculin'}
• Âge : ${form.value.age} ans
• Adresse : ${form.value.adresse}
• Téléphone : ${form.value.telephone}
${form.value.email ? `• Email : ${form.value.email}` : ''}

📋 *Comment avez-vous connu le Guichet Unique :*
${form.value.connaissance}

📅 *Je souhaite prendre rendez-vous pour le dépistage gratuit des cancers.*

Merci pour votre service !`;

    // Encoder le message pour l'URL
    const encodedMessage = encodeURIComponent(message);
    
    // Numéro WhatsApp (format international)
    const phoneNumber = '243845555637';
    
    // Créer l'URL WhatsApp
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    
    // Ouvrir WhatsApp dans un nouvel onglet
    window.open(whatsappUrl, '_blank');
    
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
    
    isSubmitting.value = false;
    showSuccess.value = true;
    status.value = 'WhatsApp s\'ouvre avec votre message pré-rempli !';
    
    // Masquer le message de succès après 5 secondes
    setTimeout(() => {
        showSuccess.value = false;
    }, 5000);
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
            Formulaire de prise de rendez-vous 
        </h3>
        <p class="text-red-500 dark:text-red-400 mb-2 font-semibold">
            Faites votre dépistage, il est 100% GRATUIT !        </p>
        
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

        <form @submit.prevent="submitForm" class="bg-gray-50 rounded-xl p-6 border-l-4 border-pink-400">
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
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-full flex items-center justify-center gap-2 mb-4 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                type="submit"
            >
                <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <svg v-else class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                </svg>
                {{ isSubmitting ? 'Préparation...' : 'Envoyer par WhatsApp' }}
            </button>
        </form>
    </div>
</template>
