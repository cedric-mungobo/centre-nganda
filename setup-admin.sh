#!/bin/bash

# Script pour configurer l'utilisateur administrateur par défaut et bloquer les inscriptions

echo "Configuration de l'utilisateur administrateur par défaut pour Centre Hospitalier Nganda"
echo "----------------------------------------------------------------------"

# Vérifier si PHP est installé
if ! command -v php &> /dev/null; then
    echo "PHP n'est pas installé. Veuillez installer PHP avant de continuer."
    exit 1
fi

# Vérifier si le fichier .env existe
if [ ! -f .env ]; then
    echo "Le fichier .env n'existe pas. Veuillez créer un fichier .env avant de continuer."
    exit 1
fi

echo "Exécution des migrations de la base de données..."
php artisan migrate:fresh --seed

echo "----------------------------------------------------------------------"
echo "Configuration terminée avec succès!"
echo ""
echo "Un utilisateur administrateur a été créé avec les identifiants suivants :"
echo "Email : admin@centrenganda.com"
echo "Mot de passe : CentreNganda@2024"
echo ""
echo "Vous pouvez maintenant vous connecter à l'administration en visitant :"
echo "http://votre-site.com/login"
echo ""
echo "N'oubliez pas de changer le mot de passe par défaut après votre première connexion!"
