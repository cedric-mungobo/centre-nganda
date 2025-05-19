<script setup>
import { onMounted, onUnmounted } from 'vue';

const props = defineProps({
    type: {
        type: String,
        required: true
    },
    data: {
        type: Object,
        required: true
    }
});

// Generate a unique ID for this structured data instance
const uniqueId = `structured-data-${props.type}-${Date.now()}`;

// Create the JSON-LD script element
const createJsonLdScript = () => {
    const script = document.createElement('script');
    script.setAttribute('type', 'application/ld+json');
    script.setAttribute('id', uniqueId);
    script.textContent = JSON.stringify({
        '@context': 'https://schema.org',
        '@type': props.type,
        ...props.data
    });
    document.head.appendChild(script);
};

// Remove the script element when component is unmounted
const removeJsonLdScript = () => {
    const script = document.getElementById(uniqueId);
    if (script) {
        document.head.removeChild(script);
    }
};

// Add script on mount, remove on unmount
onMounted(createJsonLdScript);
onUnmounted(removeJsonLdScript);
</script>

<template>
    <!-- This component doesn't render anything visible -->
</template>
