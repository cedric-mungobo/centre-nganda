<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

// Define props to receive featured posts
const props = defineProps({
    featuredPosts: {
        type: Array,
        default: () => [],
    },
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

// Truncate text for excerpts
const truncate = (text, length = 120) => {
    if (!text) return '';
    return text.length > length ? text.substring(0, length) + '...' : text;
};

// Check if we have posts to display
const hasPosts = computed(() => {
    return props.featuredPosts && props.featuredPosts.length > 0;
});
</script>

<template>
    <section class="px-5">
        <!--  blog -->

        <!-- Card Blog -->
        <div
            class="max-w-screen-xl px-3 py-10 sm:px-6 lg:px-0 lg:py-14 mx-auto"
        >
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2
                    class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white"
                >
                    Blog et Actualités
                </h2>
                <p class="mt-1 text-gray-600">
                    Restez informé et connecté avec nous pour un bien-être
                    optimal.
                </p>
            </div>
            <!-- End Title -->

          

            <!-- No posts message -->
            <div v-if="!hasPosts" class="text-center mb-8">
                <p class="text-lg text-gray-600">Aucun article à la une n'est disponible pour le moment.</p>

                <!-- Appointment card as fallback -->
                <div class="max-w-md mx-auto mt-8">
                    <div
                        class="group relative flex flex-col w-full min-h-80 bg-[url('/assets/images/BRU99781.png')] bg-center bg-cover rounded-custom hover:shadow-lg transition"
                    >
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-70 rounded-custom"
                        ></div>
                        <div
                            class="absolute inset-0 flex-auto p-4 md:p-6 flex items-center justify-center"
                        >
                            <h3
                                class="text-xl text-white group-hover:text-white"
                            >
                                <span class="font-bold"
                                    >Prendre Rendez-vous en Ligne</span
                                >
                                <br />
                                <br />
                                Pour vous faciliter la vie, le Centre
                                Hospitalier Nganda vous propose de prendre
                                rendez-vous en ligne.
                            </h3>
                        </div>
                      
                    </div>
                </div>
            </div>

            
            <!-- Featured Posts Grid -->
            <div v-else class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Post Card -->
                <article
                    v-for="post in featuredPosts"
                    :key="post.id"
                    class="flex flex-col bg-white rounded-custom shadow-sm hover:shadow-lg transition duration-300"
                >
                    <!-- Featured image -->
                    <div class="relative overflow-hidden rounded-t-custom h-48">
                        <img
                            :src="getImageUrl(post.featured_image)"
                            :alt="post.title"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                        />
                        <div class="absolute top-2 right-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-500 text-white">
                                À la une
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col flex-1 p-4 md:p-5">
                        <!-- Date -->
                        <p class="text-xs text-gray-500 mb-2">
                            {{ formatDate(post.published_at) }}
                        </p>

                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            <Link :href="`/blog/${post.slug}`" class="hover:text-primary transition">
                                {{ post.title }}
                            </Link>
                        </h3>

                        <!-- Excerpt -->
                        <p class="text-sm text-gray-600 mb-4 flex-1">
                            {{ post.excerpt ? truncate(post.excerpt) : truncate(post.content.replace(/<[^>]*>/g, '')) }}
                        </p>

                        <!-- Read more link -->
                        <Link
                            :href="`/blog/${post.slug}`"
                            class="inline-flex items-center gap-2 text-sm font-medium hover:text-primary-dark mt-auto"
                        >
                            Lire la suite
                            <svg
                                class="flex-shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </Link>
                    </div>
                </article>
                <!-- End Post Card -->
            </div>
            <!-- End Grid -->

            <!-- View all posts link -->
            <div class="text-center mt-8">
                <Link
                    href="/blog"
                    class="inline-flex items-center gap-2 bg-secondary hover:bg-primary-dark text-white font-medium py-2 px-6 rounded-custom transition-colors"
                >
                    Voir tous les articles
                    <svg
                        class="flex-shrink-0 size-4"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </Link>
            </div>
        </div>
        <!-- End Card Blog -->
    </section>
</template>
