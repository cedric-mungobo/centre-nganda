<script setup>
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import { getSeoMeta, getPostSeoMeta } from '@/seo';

const props = defineProps({
    page: {
        type: String,
        default: 'home'
    },
    post: {
        type: Object,
        default: null
    },
    customMeta: {
        type: Object,
        default: () => ({})
    }
});

const meta = computed(() => {
    if (props.post) {
        return getPostSeoMeta(props.post);
    }
    return getSeoMeta(props.page, props.customMeta);
});
</script>

<template>
    <Head>
        <title>{{ meta.title }}</title>
        <meta name="description" :content="meta.description">
        <meta name="keywords" :content="meta.keywords">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" :content="meta.type">
        <meta property="og:url" :content="meta.url">
        <meta property="og:title" :content="meta.title">
        <meta property="og:description" :content="meta.description">
        <meta property="og:image" :content="meta.image">
        <meta property="og:site_name" :content="meta.siteName">
        <meta property="og:locale" :content="meta.locale">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" :content="meta.url">
        <meta property="twitter:title" :content="meta.title">
        <meta property="twitter:description" :content="meta.description">
        <meta property="twitter:image" :content="meta.image">
        
        <!-- Article specific meta (if applicable) -->
        <template v-if="meta.type === 'article' && meta.article">
            <meta property="article:published_time" :content="meta.article.publishedTime">
            <meta property="article:modified_time" :content="meta.article.modifiedTime">
            <meta property="article:author" :content="meta.article.author">
        </template>
        
        <!-- Canonical URL -->
        <link rel="canonical" :href="meta.url">
    </Head>
</template>
