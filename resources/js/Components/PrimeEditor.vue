<template>
    <div class="card">
        <Editor v-model="value" editorStyle="height: 320px" />
    </div>
</template>

<script setup>
import { ref } from "vue";
import Editor from 'primevue/editor';

const value = ref('');
</script>
