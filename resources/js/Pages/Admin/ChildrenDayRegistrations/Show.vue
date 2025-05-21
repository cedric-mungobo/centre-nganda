<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';

const props = defineProps({
    registration: Object
});

// Formulaire pour mettre à jour le statut
const statusForm = useForm({
    status: props.registration.status
});

// Mettre à jour le statut
const updateStatus = () => {
    statusForm.put(route('admin.children-day-registrations.update-status', props.registration.id));
};

// Supprimer l'inscription
const deleteRegistration = () => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')) {
        statusForm.delete(route('admin.children-day-registrations.destroy', props.registration.id));
    }
};

// Formater la date
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('fr-FR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }).format(date);
};

// Traduire le statut
const translateStatus = (status) => {
    switch (status) {
        case 'pending':
            return 'En attente';
        case 'confirmed':
            return 'Confirmé';
        case 'cancelled':
            return 'Annulé';
        default:
            return status;
    }
};
</script>

<template>
    <Head title="Détails de l'inscription - Journée des enfants" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Détails de l'inscription
                </h2>
                <Link :href="route('admin.children-day-registrations.index')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                    Retour à la liste
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Informations sur le parent -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold mb-4 text-indigo-800">Informations sur le parent</h3>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Nom</p>
                                    <p class="text-base font-medium">{{ registration.parent_name }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Département</p>
                                    <p class="text-base font-medium">{{ registration.department }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Téléphone</p>
                                    <p class="text-base font-medium">
                                        <a :href="`tel:${registration.phone}`" class="text-indigo-600 hover:text-indigo-900">
                                            {{ registration.phone }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Informations sur les enfants -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold mb-4 text-indigo-800">Informations sur les enfants</h3>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Nombre d'enfants</p>
                                    <p class="text-base font-medium">{{ registration.children_count }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Âges des enfants</p>
                                    <ul class="list-disc pl-5">
                                        <li v-for="(age, index) in registration.children_ages" :key="index" class="text-base font-medium">
                                            Enfant {{ index + 1 }} : {{ age }} ans
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Notes et besoins particuliers -->
                            <div class="bg-gray-50 p-6 rounded-lg md:col-span-2">
                                <h3 class="text-lg font-semibold mb-4 text-indigo-800">Notes et besoins particuliers</h3>
                                <p class="text-base" v-if="registration.notes">{{ registration.notes }}</p>
                                <p class="text-base italic text-gray-500" v-else>Aucune note spécifiée</p>
                            </div>
                            
                            <!-- Informations sur l'inscription -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold mb-4 text-indigo-800">Informations sur l'inscription</h3>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Date d'inscription</p>
                                    <p class="text-base font-medium">{{ formatDate(registration.created_at) }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Statut actuel</p>
                                    <p class="text-base font-medium">{{ translateStatus(registration.status) }}</p>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold mb-4 text-indigo-800">Actions</h3>
                                
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Modifier le statut</label>
                                    <div class="flex items-center gap-4">
                                        <select
                                            id="status"
                                            v-model="statusForm.status"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        >
                                            <option value="pending">En attente</option>
                                            <option value="confirmed">Confirmé</option>
                                            <option value="cancelled">Annulé</option>
                                        </select>
                                        <button
                                            @click="updateStatus"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors"
                                            :disabled="statusForm.processing"
                                        >
                                            Mettre à jour
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="mt-6">
                                    <button
                                        @click="deleteRegistration"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors"
                                        :disabled="statusForm.processing"
                                    >
                                        Supprimer l'inscription
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
