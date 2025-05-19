<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SeoHead from "@/Components/SeoHead.vue";
import { computed } from "vue";

const props = defineProps({
    posts: Object,
});

// Format date to readable format
const formatDate = (dateString) => {
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
const truncate = (text, length = 150) => {
    if (!text) return '';
    return text.length > length ? text.substring(0, length) + '...' : text;
};

// Compute if there are posts
const hasPosts = computed(() => {
    return props.posts && props.posts.data && props.posts.data.length > 0;
});
</script>

<template>
    <SeoHead page="blog" />
    <GuestLayout>
        <div class="bg-white py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                        Blog et Actualités
                    </h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">
                        Restez informé et connecté avec nous pour un bien-être optimal.
                    </p>
                </div>
                
                <!-- No posts message -->
                <div v-if="!hasPosts" class="mt-16 text-center">
                    <p class="text-lg text-gray-600">Aucun article n'est disponible pour le moment.</p>
                </div>
                
                <!-- Posts grid -->
                <div v-else class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <article v-for="post in posts.data" :key="post.id" class="flex max-w-xl flex-col items-start justify-between">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time :datetime="post.published_at" class="text-gray-500">
                                {{ formatDate(post.published_at) }}
                            </time>
                            <span v-if="post.featured" class="relative z-10 rounded-full bg-blue-50 px-3 py-1.5 font-medium text-blue-600 hover:bg-blue-100">
                                À la une
                            </span>
                        </div>
                        
                        <!-- Featured image -->
                        <div v-if="post.featured_image" class="group relative w-full mt-3 overflow-hidden rounded-lg">
                            <img :src="getImageUrl(post.featured_image)" :alt="post.title" class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
                        </div>
                        
                        <div class="group relative mt-3">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <Link :href="`/blog/${post.slug}`" class="hover:underline">
                                    <span class="absolute inset-0"></span>
                                    {{ post.title }}
                                </Link>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                                {{ post.excerpt ? post.excerpt : truncate(post.content.replace(/<[^>]*>/g, '')) }}
                            </p>
                        </div>
                        
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                                <span class="text-lg font-semibold">{{ post.user.name.charAt(0) }}</span>
                            </div>
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    {{ post.user.name }}
                                </p>
                                <p class="text-gray-600">Auteur</p>
                            </div>
                        </div>
                    </article>
                </div>
                
                <!-- Pagination -->
                <div v-if="hasPosts && posts.links && posts.links.length > 3" class="mt-16 flex justify-center">
                    <nav class="flex items-center justify-between">
                        <div class="flex flex-1 justify-between sm:hidden">
                            <Link v-if="posts.prev_page_url" :href="posts.prev_page_url" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Précédent
                            </Link>
                            <Link v-if="posts.next_page_url" :href="posts.next_page_url" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Suivant
                            </Link>
                        </div>
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
    </GuestLayout>
</template>
