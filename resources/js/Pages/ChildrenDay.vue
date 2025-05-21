<script setup>
import { ref, onMounted } from 'vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';
import { watch, computed } from 'vue';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { animate, inView } from 'motion';

// Récupérer les props de la page
const props = defineProps({
    error: {
        type: String,
        default: null
    }
});

// Références pour les éléments animés
const titleRef = ref(null);
const descriptionRef = ref(null);
const formRef = ref(null);
const programRef = ref(null);
const formTitleRef = ref(null);

// Message de statut
const status = ref('');
const isSubmitting = ref(false);
const showSuccess = ref(false);
const showError = ref(false);

// Configuration des animations
onMounted(() => {
    // Animation des formes d'arrière-plan
    setTimeout(() => {
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach((shape, index) => {
            animate(shape,
                { y: [0, -15, 0], opacity: [0.3, 0.7, 0.3] },
                {
                    duration: 3 + index,
                    repeat: Infinity,
                    delay: index * 0.5,
                    easing: 'ease-in-out'
                }
            );
        });
    }, 300);

    // Animation du titre
    inView(titleRef.value, () => {
        animate(titleRef.value,
            { opacity: [0, 1], y: [-30, 0] },
            { duration: 0.8, easing: 'ease-out' }
        );
    });

    // Animation de la description
    inView(descriptionRef.value, () => {
        animate(descriptionRef.value,
            { opacity: [0, 1], y: [20, 0] },
            { duration: 0.7, delay: 0.3, easing: 'ease-out' }
        );
    });

    // Animation du programme
    inView(programRef.value, () => {
        animate(programRef.value,
            { opacity: [0, 1], x: [-20, 0] },
            { duration: 0.7, delay: 0.5, easing: 'ease-out' }
        );
    });

    // Animation du formulaire
    inView(formRef.value, () => {
        animate(formRef.value,
            { opacity: [0, 1], y: [30, 0] },
            { duration: 0.8, delay: 0.7, easing: 'ease-out' }
        );
    });

    // Animation du titre du formulaire
    inView(formTitleRef.value, () => {
        animate(formTitleRef.value,
            { opacity: [0, 1], scale: [0.9, 1] },
            { duration: 0.6, delay: 0.9, easing: 'ease-out' }
        );
    });
});

// Liste des départements disponibles
const availableDepartments = [
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
    parent_name: '',
    department: '',
    children_count: 1,
    children_ages: [''],
    phone: '',
    notes: '',
    honeypot: '' // Champ honeypot pour éviter les spams
});

// Fonction pour mettre à jour le nombre d'enfants
const updateChildrenCount = (count) => {
    const newCount = parseInt(count);
    form.children_count = newCount;

    // Ajuster le tableau des âges en fonction du nombre d'enfants
    if (newCount > form.children_ages.length) {
        // Ajouter des entrées si le nombre augmente
        while (form.children_ages.length < newCount) {
            form.children_ages.push('');
        }
    } else if (newCount < form.children_ages.length) {
        // Supprimer des entrées si le nombre diminue
        form.children_ages = form.children_ages.slice(0, newCount);
    }
};

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

    form.post(route('children-day.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            isSubmitting.value = false;
            showSuccess.value = true;
            status.value = 'Votre inscription a été enregistrée avec succès!';
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
    <Head title="Journée 'Amenez vos enfants au travail'" />

    <GuestLayout>
        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 ref="titleRef" class="text-3xl font-bold mb-6 text-center text-indigo-900">Journée "Amenez vos enfants au travail"</h1>

                        <div ref="descriptionRef" class="mb-8 max-w-3xl mx-auto">
                            <p class="mb-4">
                                En cette période d'évolution et de renforcement de la cohésion au sein de notre
                                établissement hospitalier, nous avons le plaisir de vous annoncer une initiative qui témoigne
                                de notre engagement à favoriser un environnement de travail inclusif et ouvert : la journée
                                "Amenez vos enfants au travail", prévue pour le <strong>30 Juin, de 9h à 12h</strong>.
                            </p>

                            <p class="mb-4">
                                Cette journée spéciale a pour objectif de permettre à vos enfants de découvrir
                                l'environnement dans lequel vous évoluez quotidiennement, d'apprendre davantage sur ce
                                que vous faites pour contribuer au bien-être et à la santé de nos patients, et surtout, de
                                renforcer les liens familiaux à travers une expérience unique et éducative au sein de notre
                                hôpital.
                            </p>

                            <h2 ref="programRef" class="text-xl font-semibold mb-2 mt-6 text-indigo-800">Programme de la journée :</h2>
                            <ul class="list-disc pl-6 mb-6">
                                <li class="mb-2">Accueil des enfants avec un petit goûter à la réception de l'hôpital : 9h00 à 10h00.</li>
                                <li class="mb-2">Visite guidée des départements : 10h00 à 11h00. Une occasion pour vos enfants de
                                    découvrir les différents services de notre hôpital, accompagnés d'un stagiaire et une
                                    infirmière. Certaines zones sensibles ne seront pas accessibles pour des raisons de
                                    sécurité et de confidentialité.</li>
                                <li class="mb-2">Ateliers découverte : 11h00 à 12h00. Des ateliers éducatifs seront organisés par
                                    département pour initier les enfants de manière ludique aux métiers de la santé.</li>
                                <li class="mb-2">Photos des familles : 12h00</li>
                            </ul>

                            <p class="font-semibold mb-6">
                                Pour une organisation optimale, nous vous prions de bien vouloir confirmer la participation
                                de votre enfant avant le <strong>20 Juin</strong>, en remplissant le formulaire ci-dessous.
                            </p>
                        </div>

                        <!-- Formulaire d'inscription -->
                        <div ref="formRef" class="max-w-2xl mx-auto bg-gray-50 p-8 rounded-lg shadow">
                            <h2 ref="formTitleRef" class="text-2xl font-semibold mb-6 text-indigo-800">Formulaire d'inscription</h2>

                            <!-- Messages de statut -->
                            <div v-if="showSuccess" class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                                {{ status }}
                            </div>
                            <div v-if="showError" class="mb-6 p-4 bg-red-100 text-red-800 rounded">
                                {{ status }}
                            </div>

                            <form @submit.prevent="submitForm">
                                <!-- Champ honeypot (invisible pour les utilisateurs) -->
                                <div class="hidden">
                                    <input type="text" v-model="form.honeypot" />
                                </div>

                                <!-- Informations sur le parent -->
                                <div class="mb-6">
                                    <label for="parent_name" class="block text-sm font-medium text-gray-700 mb-1">Nom du parent *</label>
                                    <input
                                        id="parent_name"
                                        type="text"
                                        v-model="form.parent_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required
                                    />
                                    <div v-if="form.errors.parent_name" class="text-red-500 text-sm mt-1">{{ form.errors.parent_name }}</div>
                                </div>

                                <div class="mb-6">
                                    <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Poste ou département *</label>
                                    <select
                                        id="department"
                                        v-model="form.department"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required
                                    >
                                        <option value="" disabled>Sélectionnez votre département</option>
                                        <option v-for="dept in availableDepartments" :key="dept" :value="dept">{{ dept }}</option>
                                    </select>
                                    <div v-if="form.errors.department" class="text-red-500 text-sm mt-1">{{ form.errors.department }}</div>
                                </div>

                                <div class="mb-6">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Numéro de téléphone *</label>
                                    <input
                                        id="phone"
                                        type="tel"
                                        v-model="form.phone"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required
                                    />
                                    <div v-if="form.errors.phone" class="text-red-500 text-sm mt-1">{{ form.errors.phone }}</div>
                                </div>

                                <!-- Informations sur les enfants -->
                                <div class="mb-6">
                                    <label for="children_count" class="block text-sm font-medium text-gray-700 mb-1">Nombre d'enfants *</label>
                                    <input
                                        id="children_count"
                                        type="number"
                                        v-model="form.children_count"
                                        min="1"
                                        max="10"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required
                                        @change="updateChildrenCount($event.target.value)"
                                    />
                                    <div v-if="form.errors.children_count" class="text-red-500 text-sm mt-1">{{ form.errors.children_count }}</div>
                                </div>

                                <div v-for="(_, index) in form.children_ages" :key="index" class="mb-6">
                                    <label :for="'child_age_' + index" class="block text-sm font-medium text-gray-700 mb-1">
                                        Âge de l'enfant {{ index + 1 }} *
                                    </label>
                                    <input
                                        :id="'child_age_' + index"
                                        type="number"
                                        v-model="form.children_ages[index]"
                                        min="1"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        required
                                    />
                                    <div v-if="form.errors['children_ages.' + index]" class="text-red-500 text-sm mt-1">
                                        {{ form.errors['children_ages.' + index] }}
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes ou besoins particuliers</label>
                                    <textarea
                                        id="notes"
                                        v-model="form.notes"
                                        rows="3"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Précisez ici tout besoin particulier ou information supplémentaire"
                                    ></textarea>
                                    <div v-if="form.errors.notes" class="text-red-500 text-sm mt-1">{{ form.errors.notes }}</div>
                                </div>

                                <div class="flex justify-center">
                                    <button
                                        type="submit"
                                        class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-300"
                                        :disabled="isSubmitting"
                                    >
                                        <span v-if="isSubmitting">Envoi en cours...</span>
                                        <span v-else>Inscrire mes enfants</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
