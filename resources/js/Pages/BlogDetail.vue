<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SeoHead from "@/Components/SeoHead.vue";
import { computed } from "vue";

const props = defineProps({
    post: Object,
    relatedPosts: Array,
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

// Compute if there are related posts
const hasRelatedPosts = computed(() => {
    return props.relatedPosts && props.relatedPosts.length > 0;
});
</script>

<template>
    <SeoHead :post="post" />
    <GuestLayout>
        <!-- Hero section with post title and metadata -->
        <section class="relative pt-24 pb-16 bg-primary">
            <div class="w-full max-w-4xl px-5 lg:px-8 mx-auto">
                <h1 class=" font-semibold text-4xl sm:text-5xl leading-tight mb-8">
                    {{ post.title }}
                </h1>
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="data">
                        <p class="font-medium text-xl leading-8  mb-1">
                            {{ post.featured ? 'Article à la une' : 'Article' }}
                        </p>
                        <p class="font-normal text-lg leading-7 ">
                            {{ post.user.name }} - {{ formatDate(post.published_at) }}
                        </p>
                    </div>
                    <div class="flex items-center gap-5">
                        <!-- Social sharing buttons could go here -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content section -->
        <section class="py-12">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <!-- Featured image -->
                <div v-if="post.featured_image" class="mb-10">
                    <img :src="getImageUrl(post.featured_image)" :alt="post.title" class="w-full h-auto rounded-lg shadow-md" />
                </div>

                <!-- Post content -->
                <div class="prose prose-lg max-w-none" v-html="post.content"></div>
            </div>
        </section>

        <!-- Related posts section -->
        <section v-if="hasRelatedPosts" class="py-12 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                    Articles similaires
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="relatedPost in relatedPosts" :key="relatedPost.id"
                        class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div v-if="relatedPost.featured_image" class="h-48 overflow-hidden">
                            <img :src="getImageUrl(relatedPost.featured_image)" :alt="relatedPost.title" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <Link :href="`/blog/${relatedPost.slug}`" class="hover:text-primary">
                                    {{ relatedPost.title }}
                                </Link>
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ relatedPost.excerpt ? relatedPost.excerpt.substring(0, 100) + '...' : '' }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ formatDate(relatedPost.published_at) }}</span>
                                <Link :href="`/blog/${relatedPost.slug}`" class="text-primary hover:underline">Lire plus</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
