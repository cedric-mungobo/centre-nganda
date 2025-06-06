<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-indigo-50 to-blue-100 py-6">
      <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <div class="flex flex-col items-center mb-6">
          <!-- Remplacez src par le chemin de votre logo si besoin -->
          <img src="/logo.png" alt="Logo" class="h-16 mb-2" v-if="false" />
          <h2 class="text-2xl font-bold text-gray-800 mb-1">Bienvenue !</h2>
          <p class="text-gray-500 text-sm">Connectez-vous à votre compte</p>
        </div>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 text-center">
          {{ status }}
        </div>
        <form @submit.prevent="submit" class="space-y-5">
          <div>
            <InputLabel for="email" value="Email" class="text-gray-700 font-semibold" />
            <TextInput
              id="email"
              type="email"
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
              v-model="form.email"
              required
              autofocus
              autocomplete="username"
            />
            <InputError class="mt-2" :message="form.errors.email" />
          </div>
          <div>
            <InputLabel for="password" value="Mot de passe" class="text-gray-700 font-semibold" />
            <TextInput
              id="password"
              type="password"
              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
              v-model="form.password"
              required
              autocomplete="current-password"
            />
            <InputError class="mt-2" :message="form.errors.password" />
          </div>
          <div class="flex items-center justify-between">
            <label class="flex items-center select-none">
              <Checkbox name="remember" v-model:checked="form.remember" />
              <span class="ms-2 text-sm text-gray-600">Se souvenir de moi</span>
            </label>
            <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="text-xs text-indigo-500 hover:underline focus:outline-none"
            >
              Mot de passe oublié ?
            </Link>
          </div>
          <PrimaryButton
            class="w-full py-3 mt-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-md transition disabled:opacity-50"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Connexion
          </PrimaryButton>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>

