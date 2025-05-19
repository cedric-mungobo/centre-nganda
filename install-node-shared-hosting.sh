#!/bin/bash

# Script pour installer Node.js dans un environnement d'hébergement mutualisé
# Ce script installe Node.js localement sans nécessiter de droits d'administrateur

echo "Installation de Node.js pour Centre Hospitalier Nganda dans un environnement mutualisé"
echo "--------------------------------------------------------------------------------"

# Définir les variables
NODE_VERSION="20"  # LTS version
INSTALL_DIR="$HOME/nodejs"
NODE_DOWNLOAD_URL="https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz"
NODE_TARBALL="node-v$NODE_VERSION-linux-x64.tar.gz"
NODE_EXTRACT_DIR="node-v$NODE_VERSION-linux-x64"
PROJECT_DIR="$(pwd)"

# Vérifier si Node.js est déjà installé
if command -v node &> /dev/null; then
    CURRENT_VERSION=$(node -v)
    echo "Node.js est déjà installé (version $CURRENT_VERSION)"
    echo "Voulez-vous continuer l'installation? (o/n)"
    read -r response
    if [[ "$response" != "o" && "$response" != "O" ]]; then
        echo "Installation annulée."
        exit 0
    fi
fi

# Créer le répertoire d'installation s'il n'existe pas
mkdir -p "$INSTALL_DIR"
cd "$INSTALL_DIR" || { echo "Impossible d'accéder au répertoire d'installation"; exit 1; }

echo "Téléchargement de Node.js v$NODE_VERSION..."
# Utiliser curl ou wget selon ce qui est disponible
if command -v curl &> /dev/null; then
    curl -O "$NODE_DOWNLOAD_URL"
elif command -v wget &> /dev/null; then
    wget "$NODE_DOWNLOAD_URL"
else
    echo "Erreur: ni curl ni wget n'est disponible. Veuillez installer l'un d'eux."
    exit 1
fi

# Vérifier si le téléchargement a réussi
if [ ! -f "$NODE_TARBALL" ]; then
    echo "Erreur: Le téléchargement de Node.js a échoué."
    exit 1
fi

echo "Extraction des fichiers..."
tar -xzf "$NODE_TARBALL"

# Vérifier si l'extraction a réussi
if [ ! -d "$NODE_EXTRACT_DIR" ]; then
    echo "Erreur: L'extraction a échoué."
    exit 1
fi

# Nettoyer l'installation précédente si elle existe
if [ -d "$INSTALL_DIR/bin" ]; then
    rm -rf "$INSTALL_DIR/bin" "$INSTALL_DIR/lib" "$INSTALL_DIR/include" "$INSTALL_DIR/share"
fi

# Déplacer les fichiers extraits vers le répertoire d'installation
mv "$NODE_EXTRACT_DIR"/* .
rm -rf "$NODE_EXTRACT_DIR" "$NODE_TARBALL"

echo "Configuration des variables d'environnement..."

# Créer ou mettre à jour le fichier .bashrc
BASHRC_FILE="$HOME/.bashrc"
PROFILE_FILE="$HOME/.profile"

# Fonction pour ajouter les variables d'environnement à un fichier
add_env_vars() {
    local file=$1
    
    # Vérifier si les variables sont déjà définies
    if grep -q "PATH=.*nodejs/bin" "$file"; then
        # Mettre à jour le chemin existant
        sed -i '/PATH=.*nodejs\/bin/d' "$file"
    fi
    
    # Ajouter les nouvelles variables
    echo "" >> "$file"
    echo "# Node.js environment variables" >> "$file"
    echo "export PATH=\"$INSTALL_DIR/bin:\$PATH\"" >> "$file"
    echo "export NODE_PATH=\"$INSTALL_DIR/lib/node_modules\"" >> "$file"
}

# Ajouter les variables d'environnement aux fichiers de configuration
add_env_vars "$BASHRC_FILE"
add_env_vars "$PROFILE_FILE"

# Créer un fichier .htaccess pour PHP-FPM si nécessaire
if [ -d "$PROJECT_DIR/public" ]; then
    HTACCESS_FILE="$PROJECT_DIR/public/.htaccess"
    
    # Ajouter des variables d'environnement pour PHP
    if [ -f "$HTACCESS_FILE" ]; then
        if ! grep -q "SetEnv PATH" "$HTACCESS_FILE"; then
            echo "" >> "$HTACCESS_FILE"
            echo "# Node.js environment variables for PHP" >> "$HTACCESS_FILE"
            echo "SetEnv PATH \"$INSTALL_DIR/bin:\$PATH\"" >> "$HTACCESS_FILE"
            echo "SetEnv NODE_PATH \"$INSTALL_DIR/lib/node_modules\"" >> "$HTACCESS_FILE"
        fi
    fi
fi

echo "Installation de npm packages globaux essentiels..."
"$INSTALL_DIR/bin/npm" install -g npm@latest

# Retourner au répertoire du projet
cd "$PROJECT_DIR" || { echo "Impossible de retourner au répertoire du projet"; exit 1; }

echo "Installation des dépendances du projet..."
"$INSTALL_DIR/bin/npm" install

echo "Compilation des assets..."
"$INSTALL_DIR/bin/npm" run build

echo ""
echo "Installation de Node.js v$NODE_VERSION terminée!"
echo ""
echo "Pour utiliser Node.js dans cette session, exécutez:"
echo "  source ~/.bashrc"
echo ""
echo "Vérification de l'installation:"
echo "  Node.js: $("$INSTALL_DIR/bin/node" -v)"
echo "  npm: $("$INSTALL_DIR/bin/npm" -v)"
echo ""
echo "Vous pouvez maintenant utiliser Node.js et npm dans votre hébergement mutualisé."
echo "Les dépendances du projet ont été installées et les assets compilés."
echo ""
echo "Note: Si vous rencontrez des problèmes avec les permissions, vous devrez peut-être"
echo "      ajuster les permissions des fichiers ou contacter votre hébergeur."
