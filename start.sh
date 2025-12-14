#!/bin/bash

# ============================================
# Script de démarrage - Boutique PHP
# ============================================

echo "🚀 Démarrage de la boutique PHP..."
echo ""

# Couleurs pour les messages
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Vérifier si Composer est installé
if ! command -v composer &> /dev/null; then
    echo -e "${RED}❌ Composer n'est pas installé${NC}"
    echo "Installez Composer : https://getcomposer.org"
    exit 1
fi

# Vérifier si PHP est installé
if ! command -v php &> /dev/null; then
    echo -e "${RED}❌ PHP n'est pas installé${NC}"
    echo "Installez PHP 8.1 ou supérieur"
    exit 1
fi

# Vérifier la version de PHP
PHP_VERSION=$(php -r "echo PHP_VERSION;")
PHP_MAJOR=$(php -r "echo PHP_MAJOR_VERSION;")
PHP_MINOR=$(php -r "echo PHP_MINOR_VERSION;")

if [ "$PHP_MAJOR" -lt 8 ] || ([ "$PHP_MAJOR" -eq 8 ] && [ "$PHP_MINOR" -lt 1 ]); then
    echo -e "${RED}❌ PHP 8.1 ou supérieur requis (version actuelle: $PHP_VERSION)${NC}"
    exit 1
fi

echo -e "${GREEN}✅ PHP $PHP_VERSION détecté${NC}"

# Installer les dépendances Composer
if [ ! -d "vendor" ]; then
    echo -e "${YELLOW}📦 Installation des dépendances Composer...${NC}"
    composer install --no-interaction --prefer-dist --optimize-autoloader
    echo -e "${GREEN}✅ Dépendances installées${NC}"
else
    echo -e "${GREEN}✅ Dépendances déjà installées${NC}"
fi

# Créer les dossiers nécessaires
echo -e "${YELLOW}📁 Création des dossiers...${NC}"
mkdir -p storage/logs
mkdir -p database
mkdir -p public/uploads
mkdir -p public/images/produits

# Créer un fichier .gitkeep pour les uploads
touch public/uploads/.gitkeep

echo -e "${GREEN}✅ Dossiers créés${NC}"

# Copier .env.example vers .env si nécessaire
if [ ! -f ".env" ]; then
    echo -e "${YELLOW}📝 Création du fichier .env...${NC}"
    cp .env.example .env
    echo -e "${GREEN}✅ Fichier .env créé${NC}"
fi

# Créer la base de données SQLite si elle n'existe pas
if [ ! -f "database/boutique.db" ]; then
    echo -e "${YELLOW}🗄️  Création de la base de données...${NC}"
    touch database/boutique.db
    echo -e "${GREEN}✅ Base de données créée${NC}"
    echo -e "${YELLOW}   (Elle sera automatiquement initialisée au premier lancement)${NC}"
fi

# Vérifier si FrankenPHP est installé
if command -v frankenphp &> /dev/null; then
    echo -e "${GREEN}✅ FrankenPHP détecté${NC}"
    echo ""
    echo -e "${GREEN}🎉 Tout est prêt !${NC}"
    echo ""
    echo "Démarrage du serveur avec FrankenPHP..."
    echo -e "${YELLOW}URL: http://localhost:8000${NC}"
    echo -e "${YELLOW}Adminer: http://localhost:8000/adminer.php${NC}"
    echo ""
    echo "Appuyez sur Ctrl+C pour arrêter le serveur"
    echo ""

    # Démarrer FrankenPHP
    frankenphp run

else
    echo -e "${YELLOW}⚠️  FrankenPHP non détecté, utilisation du serveur PHP intégré${NC}"
    echo ""
    echo -e "${GREEN}🎉 Tout est prêt !${NC}"
    echo ""
    echo "Démarrage du serveur PHP..."
    echo -e "${YELLOW}URL: http://localhost:8000${NC}"
    echo -e "${YELLOW}Adminer: http://localhost:8000/adminer.php${NC}"
    echo ""
    echo "Appuyez sur Ctrl+C pour arrêter le serveur"
    echo ""

    # Démarrer le serveur PHP intégré
    cd public && php -S localhost:8000
fi
