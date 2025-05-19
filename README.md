<p align="center"><img src="public/assets/images/logo.png" width="200" alt="Centre Hospitalier Nganda Logo"></p>

<h1 align="center">Centre Hospitalier Nganda</h1>

<p align="center">
Site web officiel du Centre Hospitalier Nganda, établissement médical de référence à Kinshasa, RDC
</p>

## À propos du Centre Hospitalier Nganda

Le Centre Hospitalier Nganda est un établissement médical privé de Kinshasa, en République Démocratique du Congo, reconnu pour son expertise dans le diagnostic et le traitement du cancer. Fondé en 1991 par Dr. Sulu Maseb A'Mwang, il est devenu un hôpital en 2004 et est maintenant dirigé par Dr. Sulu Arnold depuis 2017.

Points clés :
- Premier centre médical privé à introduire le scanner en RDC
- Premier et unique centre à offrir la radiothérapie en RDC
- Plus de 30 ans d'expérience dans les soins médicaux spécialisés

## Services médicaux

Le Centre Hospitalier Nganda propose une gamme complète de services médicaux spécialisés, incluant :
- Oncologie et radiothérapie
- Pédiatrie
- Cardiologie
- Neurologie
- Chirurgie
- Médecine interne
- Et bien d'autres services

## Technologies utilisées

Ce site web est développé avec les technologies suivantes :

### Backend
- [Laravel 11](https://laravel.com) - Framework PHP moderne
- [Inertia.js](https://inertiajs.com) - Pour créer des applications monopages sans API

### Frontend
- [Vue.js 3](https://vuejs.org) - Framework JavaScript progressif
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS utilitaire
- [PrimeVue](https://primevue.org) - Bibliothèque de composants UI pour Vue
- [VueUse Motion](https://motion.vueuse.org) - Bibliothèque d'animations pour Vue

## Installation

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- SQLite ou autre base de données supportée par Laravel

### Étapes d'installation

1. Cloner le dépôt
   ```bash
   git clone https://github.com/votre-utilisateur/centre-nganda.git
   cd centre-nganda
   ```

2. Installer les dépendances PHP
   ```bash
   composer install
   ```

3. Installer les dépendances JavaScript
   ```bash
   npm install
   ```

4. Copier le fichier d'environnement
   ```bash
   cp .env.example .env
   ```

5. Générer la clé d'application
   ```bash
   php artisan key:generate
   ```

6. Configurer la base de données dans le fichier .env

7. Exécuter les migrations
   ```bash
   php artisan migrate
   ```

8. Configurer l'utilisateur administrateur
   ```bash
   ./setup-admin.sh
   ```

9. Compiler les assets
   ```bash
   npm run build
   ```

10. Démarrer le serveur de développement
    ```bash
    php artisan serve
    ```

## Licence

Ce projet est sous licence propriétaire. Tous droits réservés au Centre Hospitalier Nganda.
