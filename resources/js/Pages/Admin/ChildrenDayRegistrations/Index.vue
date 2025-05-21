<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, computed } from 'vue';
import { exportTableToPdf } from '@/Utils/PdfExport';

const props = defineProps({
    registrations: Array
});

// État pour la recherche et le filtrage
const search = ref('');
const statusFilter = ref('all');

// Inscriptions filtrées
const filteredRegistrations = computed(() => {
    return props.registrations.filter(registration => {
        // Filtrer par recherche
        const searchMatch = search.value === '' ||
            registration.parent_name.toLowerCase().includes(search.value.toLowerCase()) ||
            registration.department.toLowerCase().includes(search.value.toLowerCase()) ||
            registration.phone.toLowerCase().includes(search.value.toLowerCase());

        // Filtrer par statut
        const statusMatch = statusFilter.value === 'all' || registration.status === statusFilter.value;

        return searchMatch && statusMatch;
    });
});

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

// Obtenir le badge de statut
const getStatusBadgeClass = (status) => {
    switch (status) {
        case 'pending':
            return 'bg-yellow-100 text-yellow-800';
        case 'confirmed':
            return 'bg-green-100 text-green-800';
        case 'cancelled':
            return 'bg-red-100 text-red-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
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

// Fonction pour exporter la liste en PDF
const exportToPdf = () => {
    // Définir les colonnes à exporter
    const columns = [
        { key: 'parent_name', label: 'Nom du parent' },
        { key: 'department', label: 'Département' },
        { key: 'children_count', label: 'Nombre d\'enfants' },
        { key: 'children_ages', label: 'Âges des enfants', format: (value) => value.join(', ') + ' ans' },
        { key: 'phone', label: 'Téléphone' },
        { key: 'created_at', label: 'Date d\'inscription', format: (value) => formatDate(value) },
        { key: 'status', label: 'Statut', format: (value) => translateStatus(value) }
    ];

    // Exporter les données filtrées
    exportTableToPdf(
        filteredRegistrations.value,
        columns,
        'inscriptions-journee-enfants',
        'Liste des inscriptions - Journée "Amenez vos enfants au travail"'
    );
};
</script>

<template>
    <Head title="Liste des inscriptions - Journée des enfants" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des inscriptions - Journée "Amenez vos enfants au travail"
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Filtres et recherche -->
                        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex flex-col md:flex-row gap-4 w-full md:w-2/3">
                                <div class="w-full md:w-1/2">
                                    <input
                                        type="text"
                                        v-model="search"
                                        placeholder="Rechercher par nom, département ou téléphone..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    />
                                </div>
                                <div class="w-full md:w-1/3">
                                    <select
                                        v-model="statusFilter"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    >
                                        <option value="all">Tous les statuts</option>
                                        <option value="pending">En attente</option>
                                        <option value="confirmed">Confirmé</option>
                                        <option value="cancelled">Annulé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 flex justify-end">
                                <button
                                    @click="exportToPdf"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-300 flex items-center"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Exporter en PDF
                                </button>
                            </div>
                        </div>

                        <!-- Tableau des inscriptions -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Parent
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Département
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Enfants
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Téléphone
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date d'inscription
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Statut
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="registration in filteredRegistrations" :key="registration.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ registration.parent_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ registration.department }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ registration.children_count }} enfant(s)
                                                <div class="text-xs text-gray-400">
                                                    Âges: {{ registration.children_ages.join(', ') }} ans
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a :href="`tel:${registration.phone}`" class="text-sm text-indigo-600 hover:text-indigo-900">
                                                {{ registration.phone }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ formatDate(registration.created_at) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full', getStatusBadgeClass(registration.status)]">
                                                {{ translateStatus(registration.status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link :href="route('admin.children-day-registrations.show', registration.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                Détails
                                            </Link>
                                        </td>
                                    </tr>
                                    <tr v-if="filteredRegistrations.length === 0">
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Aucune inscription trouvée
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
