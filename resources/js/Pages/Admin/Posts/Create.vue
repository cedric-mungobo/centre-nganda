<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import PrimeEditor from "@/Components/PrimeEditor.vue";

const form = useForm({
    title: '',
    excerpt: '',
    content: '',
    featured_image: null,
    status: 'draft',
    featured: false,
    published_at: null,
});

const preview = ref(null);
const imageInput = ref(null);
const fileInput = ref(null);

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

const submit = () => {
    form.post(route('admin.posts.store'), {
        onSuccess: () => {
            form.reset();
            preview.value = null;
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
    <Head title="Créer un article" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Créer un article</h2>
                <Link :href="route('admin.posts.index')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                    Retour à la liste
                </Link>
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
                                    v-model="form.content"
                                    class="mt-1"
                                />
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
                                    Créer l'article
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
