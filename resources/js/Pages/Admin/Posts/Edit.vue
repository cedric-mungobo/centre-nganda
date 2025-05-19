<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import PrimeEditor from "@/Components/PrimeEditor.vue";

const props = defineProps({
    post: Object,
});

// Initialiser le contenu de l'éditeur avec la valeur de l'article
// Important : initialiser directement avec la valeur HTML comme dans l'exemple
// Utiliser un exemple simple pour l'éditeur visuel
const editorContent = ref(props.post.content || '<div><br></div>');
// Activer l'éditeur HTML par défaut puisque l'éditeur visuel ne fonctionne pas correctement
const showHtmlEditor = ref(true);
const htmlContent = ref(props.post.content || '');

// Initialiser le formulaire avec les données de l'article
const form = useForm({
    title: props.post.title,
    excerpt: props.post.excerpt || '',
    content: props.post.content || '',
    // content: props.post.content || '',
    featured_image: null,
    status: props.post.status,
    featured: props.post.featured,
    published_at: props.post.published_at ? new Date(props.post.published_at).toISOString().slice(0, 16) : null,
    _method: 'PUT',
});

const preview = ref(props.post.featured_image ? `/storage/${props.post.featured_image}` : null);
const imageInput = ref(null);
const fileInput = ref(null);

// Nous n'avons plus besoin d'initialiser le contenu dans onMounted
// car nous l'avons déjà fait lors de la déclaration des refs
onMounted(() => {
    // Juste pour vérifier que le contenu est bien chargé
    console.log('Contenu initial de l\'éditeur:', editorContent.value);
});

// Fonction pour basculer entre l'éditeur visuel et l'éditeur HTML
const toggleHtmlEditor = () => {
    showHtmlEditor.value = !showHtmlEditor.value;

    if (showHtmlEditor.value) {
        // Si on passe à l'éditeur HTML, on met à jour le contenu HTML
        htmlContent.value = editorContent.value || props.post.content || '';
    } else {
        // Si on revient à l'éditeur visuel, on met à jour le contenu de l'éditeur
        editorContent.value = htmlContent.value;
        form.content = htmlContent.value;
    }
};

const handleImageUpload = (e) => {
    const file = e.target.files[0];
    form.featured_image = file;

    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const removeImage = () => {
    form.featured_image = null;
    preview.value = null;
    if (imageInput.value) {
        imageInput.value.value = '';
    }
};

// Fonction pour initialiser manuellement le contenu de l'éditeur
const initializeEditor = () => {
    // Vérifier si le contenu est vide et si l'article a du contenu
    if (!editorContent.value && props.post.content) {
        editorContent.value = props.post.content;
        form.content = props.post.content;
        console.log('Contenu initialisé manuellement:', editorContent.value);
    }
};

const submit = () => {
    // S'assurer que le contenu de l'éditeur est bien dans le formulaire
    if (showHtmlEditor.value) {
        // Si on utilise l'éditeur HTML, on prend le contenu HTML
        form.content = htmlContent.value;
    } else {
        // Sinon on prend le contenu de l'éditeur visuel
        form.content = editorContent.value || props.post.content || '';
    }

    form.post(route('admin.posts.update', props.post.id), {
        onSuccess: () => {
            form.featured_image = null;
        },
    });
};

// Set published_at to now if status is published
const updatePublishedAt = () => {
    if (form.status === 'published' && !form.published_at) {
        const now = new Date();
        form.published_at = now.toISOString().slice(0, 16);
    }
};


</script>

<template>
    <Head title="Modifier l'article" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier l'article</h2>
                <div class="flex space-x-2">
                    <Link :href="`/blog/${post.slug}`" target="_blank" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                        Voir l'article
                    </Link>
                    <Link :href="route('admin.posts.index')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                        Retour à la liste
                    </Link>
                </div>
            </div>
        </template>


      

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit" class="space-y-6">
                            <div>
                                <InputLabel for="title" value="Titre" />
                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>

                            <div>
                                <InputLabel for="excerpt" value="Extrait (optionnel)" />
                                <textarea
                                    id="excerpt"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.excerpt"
                                    rows="3"
                                ></textarea>
                                <InputError class="mt-2" :message="form.errors.excerpt" />
                            </div>

                            <div>
                                <InputLabel for="content" value="Contenu" />
                                <PrimeEditor
                                    v-model="editorContent"
                                    @update:modelValue="form.content = $event"
                                    class="mt-1"
                                />

                                <!-- Affichage du contenu brut pour débogage -->
                                <details class="mt-2 text-xs">
                                    <summary class="text-gray-500 cursor-pointer">Voir le HTML brut</summary>
                                    <pre class="mt-2 p-2 bg-gray-100 rounded overflow-auto max-h-40">{{ props.post.content }}</pre>
                                </details>

                                <!-- Bouton pour initialiser manuellement l'éditeur si le contenu ne s'affiche pas -->
                                <div class="mt-2 flex space-x-2">
                                    <button
                                        v-if="!editorContent && props.post.content"
                                        type="button"
                                        @click="initializeEditor"
                                        class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
                                    >
                                        Initialiser l'éditeur manuellement
                                    </button>

                                    <button
                                        type="button"
                                        @click="toggleHtmlEditor"
                                        class="px-3 py-2 text-sm font-medium bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors"
                                    >
                                        {{ showHtmlEditor ? 'Essayer l\'éditeur visuel' : 'Revenir à l\'éditeur HTML' }}
                                    </button>
                                </div>

                                <div v-if="!showHtmlEditor" class="mt-2">
                                    <p class="text-sm text-amber-600">
                                        ⚠️ L'éditeur visuel peut ne pas afficher correctement le contenu. Si vous ne voyez pas votre contenu,
                                        cliquez sur "Revenir à l'éditeur HTML" pour éditer le code HTML directement.
                                    </p>
                                </div>

                                <!-- Éditeur HTML brut (solution principale) -->
                                <div v-if="showHtmlEditor" class="mt-4">
                                    <InputLabel value="Édition HTML directe" />
                                    <textarea
                                        v-model="htmlContent"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm font-mono"
                                        rows="15"
                                        spellcheck="false"
                                    ></textarea>
                                    <div class="mt-2 text-sm text-gray-600 space-y-2">
                                        <p>
                                            <strong>Conseils pour l'édition HTML :</strong>
                                        </p>
                                        <ul class="list-disc pl-5 space-y-1">
                                            <li>Utilisez <code>&lt;p&gt;...&lt;/p&gt;</code> pour les paragraphes</li>
                                            <li>Utilisez <code>&lt;h1&gt;...&lt;/h1&gt;</code> à <code>&lt;h6&gt;...&lt;/h6&gt;</code> pour les titres</li>
                                            <li>Utilisez <code>&lt;strong&gt;...&lt;/strong&gt;</code> pour le texte en gras</li>
                                            <li>Utilisez <code>&lt;em&gt;...&lt;/em&gt;</code> pour le texte en italique</li>
                                            <li>Utilisez <code>&lt;a href="URL"&gt;...&lt;/a&gt;</code> pour les liens</li>
                                            <li>Utilisez <code>&lt;img src="URL" alt="texte alternatif"&gt;</code> pour les images</li>
                                        </ul>
                                    </div>
                                </div>
                                <InputError class="mt-2" :message="form.errors.content" />
                            </div>

                            <div>
                                <InputLabel for="featured_image" value="Image à la une (optionnel)" />
                                <div class="mt-1 flex items-center">
                                    <span v-if="preview" class="relative inline-block h-32 w-32 overflow-hidden rounded-md">
                                        <img :src="preview" class="h-full w-full object-cover" />
                                        <button
                                            type="button"
                                            @click="removeImage"
                                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                    <span v-else class="inline-block h-32 w-32 overflow-hidden rounded-md bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                    <button
                                        type="button"
                                        class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        @click="fileInput.value.click()"
                                    >
                                        Changer
                                    </button>
                                    <input
                                        ref="fileInput"
                                        :ref="el => fileInput.value = el"
                                        type="file"
                                        class="hidden"
                                        @change="handleImageUpload"
                                        accept="image/*"
                                    />
                                </div>
                                <InputError class="mt-2" :message="form.errors.featured_image" />
                            </div>

                            <div class="flex space-x-6">
                                <div>
                                    <InputLabel for="status" value="Statut" />
                                    <select
                                        id="status"
                                        v-model="form.status"
                                        @change="updatePublishedAt"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    >
                                        <option value="draft">Brouillon</option>
                                        <option value="published">Publié</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.status" />
                                </div>

                                <div v-if="form.status === 'published'">
                                    <InputLabel for="published_at" value="Date de publication" />
                                    <TextInput
                                        id="published_at"
                                        type="datetime-local"
                                        class="mt-1 block w-full"
                                        v-model="form.published_at"
                                    />
                                    <InputError class="mt-2" :message="form.errors.published_at" />
                                </div>

                                <div class="flex items-end">
                                    <div class="flex h-6 items-center">
                                        <input
                                            id="featured"
                                            type="checkbox"
                                            v-model="form.featured"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                        />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="featured" class="font-medium text-gray-700">Article à la une</label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Mettre à jour l'article
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
