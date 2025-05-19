<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, computed } from "vue";

const props = defineProps({
    posts: Object,
});

// Format date to readable format
const formatDate = (dateString) => {
    if (!dateString) return 'Non publié';
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

// Get image URL with storage path
const getImageUrl = (path) => {
    if (!path) return '/assets/images/default-post.jpg';
    return `/storage/${path}`;
};

// Truncate text to a specific length
const truncate = (text, length = 100) => {
    if (!text) return '';
    return text.length > length ? text.substring(0, length) + '...' : text;
};

// Compute if there are posts
const hasPosts = computed(() => {
    return props.posts && props.posts.data && props.posts.data.length > 0;
});

// Status badge color
const getStatusColor = (status) => {
    return status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
};
</script>

<template>
    <Head title="Gestion des articles" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des articles</h2>
                <Link :href="route('admin.posts.create')" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    Nouvel article
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- No posts message -->
                        <div v-if="!hasPosts" class="text-center py-8">
                            <p class="text-lg text-gray-600">Aucun article n'est disponible pour le moment.</p>
                            <Link :href="route('admin.posts.create')" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Créer un article
                            </Link>
                        </div>

                        <!-- Posts table -->
                        <div v-else class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Titre
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Auteur
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Statut
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date de publication
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="post in posts.data" :key="post.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="h-12 w-12 overflow-hidden rounded-md">
                                                <img v-if="post.featured_image" :src="getImageUrl(post.featured_image)" :alt="post.title" class="h-full w-full object-cover" />
                                                <div v-else class="h-full w-full bg-gray-200 flex items-center justify-center text-gray-500">
                                                    <span class="text-xs">No image</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ post.title }}</div>
                                            <div class="text-sm text-gray-500">{{ truncate(post.excerpt || '') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ post.user.name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span :class="[getStatusColor(post.status), 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full']">
                                                {{ post.status === 'published' ? 'Publié' : 'Brouillon' }}
                                            </span>
                                            <span v-if="post.featured" class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                À la une
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ formatDate(post.published_at) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <Link :href="`/blog/${post.slug}`" target="_blank" class="text-indigo-600 hover:text-indigo-900">
                                                    Voir
                                                </Link>
                                                <Link :href="route('admin.posts.edit', post.id)" class="text-blue-600 hover:text-blue-900">
                                                    Modifier
                                                </Link>
                                                <Link :href="route('admin.posts.destroy', post.id)" method="delete" as="button" type="button" class="text-red-600 hover:text-red-900" @click.prevent="confirm('Êtes-vous sûr de vouloir supprimer cet article ?') && $inertia.delete(route('admin.posts.destroy', post.id))">
                                                    Supprimer
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div v-if="hasPosts && posts.links && posts.links.length > 3" class="mt-6 flex justify-center">
                            <nav class="flex items-center justify-between">
                                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-center">
                                    <div>
                                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                            <Link v-if="posts.prev_page_url" :href="posts.prev_page_url" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Précédent</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                </svg>
                                            </Link>
                                            
                                            <template v-for="(link, i) in posts.links" :key="i">
                                                <Link v-if="i > 0 && i < posts.links.length - 1" :href="link.url" :class="[
                                                    link.active ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600' : 
                                                    'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                                                ]">
                                                    {{ link.label.replace('&laquo;', '').replace('&raquo;', '') }}
                                                </Link>
                                            </template>
                                            
                                            <Link v-if="posts.next_page_url" :href="posts.next_page_url" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                                <span class="sr-only">Suivant</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                </svg>
                                            </Link>
                                        </nav>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
