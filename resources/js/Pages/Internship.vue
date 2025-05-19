<script setup>
import { ref } from 'vue';
import { useForm, Head } from '@inertiajs/vue3';
import { watch } from 'vue';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { MotionPlugin } from '@vueuse/motion';

// Message de statut
const status = ref('');
const isSubmitting = ref(false);
const showSuccess = ref(false);
const showError = ref(false);

// Liste des domaines de stage disponibles
const availableFields = [
    'Médecine générale',
    'Chirurgie',
    'Pédiatrie',
    'Gynécologie',
    'Radiologie',
    'Radiothérapie',
    'Laboratoire',
    'Pharmacie',
    'Administration',
    'Informatique',
    'Autre'
];

// Formulaire avec Inertia
const form = useForm({
    name: '',
    email: '',
    phone: '',
    education: '',
    field: '',
    start_date: '',
    end_date: '',
    message: '',
    cv: null,
    motivation_letter: null,
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

// Gestion des fichiers
const cvInput = ref(null);
const motivationLetterInput = ref(null);

const handleCvUpload = (event) => {
    form.cv = event.target.files[0];
};

const handleMotivationLetterUpload = (event) => {
    form.motivation_letter = event.target.files[0];
};

const clearCv = () => {
    form.cv = null;
    if (cvInput.value) {
        cvInput.value.value = '';
    }
};

const clearMotivationLetter = () => {
    form.motivation_letter = null;
    if (motivationLetterInput.value) {
        motivationLetterInput.value.value = '';
    }
};

const submitForm = () => {
    isSubmitting.value = true;

    form.post(route('internship.store'), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            form.reset();
            clearCv();
            clearMotivationLetter();
            isSubmitting.value = false;
            showSuccess.value = true;
            status.value = 'Votre demande de stage a été envoyée avec succès!';
        },
        onError: (errors) => {
            isSubmitting.value = false;
            showError.value = true;
            status.value = 'Une erreur est survenue. Veuillez vérifier les champs et réessayer.';
            console.error(errors);
        }
    });
};
</script>

<template>
    <Head title="Demande de stage" />

    <GuestLayout>
        <section
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
                <div
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800 } }"
                    class="max-w-3xl mx-auto text-center mb-12 md:mb-16"
                >
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-blue-dark">Demande de stage</h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        Vous souhaitez effectuer un stage au Centre Hospitalier Nganda ? Remplissez ce formulaire pour nous faire part de votre demande.
                    </p>
                </div>

                <div
                    v-motion
                    :initial="{ opacity: 0, y: 100 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800, delay: 200 } }"
                    class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 md:p-10"
                >
                    <!-- Messages d'état -->
                    <div v-if="showSuccess" class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                        {{ status }}
                    </div>
                    <div v-if="showError" class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-6">
                        <!-- Informations personnelles -->
                        <div class="space-y-6">
                            <h2 class="text-xl font-semibold text-blue-dark border-b border-gray-200 pb-2">Informations personnelles</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Nom complet <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        type="text"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                        placeholder="Votre nom complet"
                                        required
                                    />
                                    <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Email <span class="text-red-500">*</span>
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
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Téléphone
                                </label>
                                <input
                                    id="phone"
                                    v-model="form.phone"
                                    type="tel"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                    placeholder="+243 ..."
                                />
                                <div v-if="form.errors.phone" class="text-red-500 text-sm mt-1">{{ form.errors.phone }}</div>
                            </div>
                        </div>

                        <!-- Informations sur le stage -->
                        <div class="space-y-6 pt-4">
                            <h2 class="text-xl font-semibold text-blue-dark border-b border-gray-200 pb-2">Informations sur le stage</h2>

                            <div>
                                <label for="education" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Formation actuelle <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="education"
                                    v-model="form.education"
                                    type="text"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                    placeholder="Ex: Médecine 3ème année, Infirmier, etc."
                                    required
                                />
                                <div v-if="form.errors.education" class="text-red-500 text-sm mt-1">{{ form.errors.education }}</div>
                            </div>

                            <div>
                                <label for="field" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Domaine souhaité <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="field"
                                    v-model="form.field"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                    required
                                >
                                    <option value="" disabled selected>Sélectionnez un domaine</option>
                                    <option v-for="field in availableFields" :key="field" :value="field">
                                        {{ field }}
                                    </option>
                                </select>
                                <div v-if="form.errors.field" class="text-red-500 text-sm mt-1">{{ form.errors.field }}</div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Date de début <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        id="start_date"
                                        v-model="form.start_date"
                                        type="date"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                        required
                                    />
                                    <div v-if="form.errors.start_date" class="text-red-500 text-sm mt-1">{{ form.errors.start_date }}</div>
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Date de fin <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        id="end_date"
                                        v-model="form.end_date"
                                        type="date"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                        required
                                    />
                                    <div v-if="form.errors.end_date" class="text-red-500 text-sm mt-1">{{ form.errors.end_date }}</div>
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Message / Informations complémentaires
                                </label>
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    rows="4"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-medium focus:border-blue-medium transition-colors"
                                    placeholder="Précisez vos motivations, vos attentes, etc."
                                ></textarea>
                                <div v-if="form.errors.message" class="text-red-500 text-sm mt-1">{{ form.errors.message }}</div>
                            </div>
                        </div>

                        <!-- Documents -->
                        <div class="space-y-6 pt-4">
                            <h2 class="text-xl font-semibold text-blue-dark border-b border-gray-200 pb-2">Documents</h2>

                            <div>
                                <label for="cv" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    CV (PDF, DOC, DOCX - max 2Mo)
                                </label>
                                <div class="flex items-center space-x-4">
                                    <input
                                        id="cv"
                                        ref="cvInput"
                                        type="file"
                                        class="hidden"
                                        accept=".pdf,.doc,.docx"
                                        @change="handleCvUpload"
                                    />
                                    <button
                                        type="button"
                                        @click="() => cvInput.click()"
                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition-colors"
                                    >
                                        Choisir un fichier
                                    </button>
                                    <span v-if="form.cv" class="text-sm text-gray-600 flex items-center">
                                        {{ form.cv.name }}
                                        <button
                                            type="button"
                                            @click="clearCv"
                                            class="ml-2 text-red-500 hover:text-red-700"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                    <span v-else class="text-sm text-gray-500">Aucun fichier sélectionné</span>
                                </div>
                                <div v-if="form.errors.cv" class="text-red-500 text-sm mt-1">{{ form.errors.cv }}</div>
                            </div>

                            <div>
                                <label for="motivation_letter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Lettre de motivation (PDF, DOC, DOCX - max 2Mo)
                                </label>
                                <div class="flex items-center space-x-4">
                                    <input
                                        id="motivation_letter"
                                        ref="motivationLetterInput"
                                        type="file"
                                        class="hidden"
                                        accept=".pdf,.doc,.docx"
                                        @change="handleMotivationLetterUpload"
                                    />
                                    <button
                                        type="button"
                                        @click="() => motivationLetterInput.click()"
                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition-colors"
                                    >
                                        Choisir un fichier
                                    </button>
                                    <span v-if="form.motivation_letter" class="text-sm text-gray-600 flex items-center">
                                        {{ form.motivation_letter.name }}
                                        <button
                                            type="button"
                                            @click="clearMotivationLetter"
                                            class="ml-2 text-red-500 hover:text-red-700"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                    <span v-else class="text-sm text-gray-500">Aucun fichier sélectionné</span>
                                </div>
                                <div v-if="form.errors.motivation_letter" class="text-red-500 text-sm mt-1">{{ form.errors.motivation_letter }}</div>
                            </div>
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

                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-dark hover:bg-blue-medium text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300 transform hover:scale-105"
                                :disabled="isSubmitting"
                            >
                                <span v-if="isSubmitting">Envoi en cours...</span>
                                <span v-else>Envoyer ma demande de stage</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div
                    v-motion
                    :initial="{ opacity: 0, y: 50 }"
                    :visible="{ opacity: 1, y: 0, transition: { duration: 800, delay: 400 } }"
                    class="max-w-3xl mx-auto mt-12 text-center"
                >
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Pour toute question concernant les stages, vous pouvez nous contacter par email à
                        <a href="mailto:reception@centrehospitaliernganda.com" class="text-blue-dark hover:text-blue-medium">reception@centrehospitaliernganda.com</a>
                        ou par téléphone au
                        <a href="tel:+243897000133" class="text-blue-dark hover:text-blue-medium">+243 897 000 133</a>.
                    </p>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
/* Add any component-specific styles here */
</style>
