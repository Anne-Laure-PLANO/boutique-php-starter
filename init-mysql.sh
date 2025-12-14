#!/bin/bash

# Script d'initialisation de la base de données MySQL
# Usage: ./init-mysql.sh

echo "🗄️  Initialisation de la base de données MySQL..."

# Couleurs
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Charger les variables depuis .env
if [ -f .env ]; then
    export $(cat .env | grep -v '^#' | xargs)
fi

# Variables par défaut
DB_HOST=${DB_HOST:-localhost}
DB_PORT=${DB_PORT:-3306}
DB_NAME=${DB_NAME:-boutique_php}
DB_USER=${DB_USER:-root}
DB_PASSWORD=${DB_PASSWORD:-root}

echo "Configuration:"
echo "  Host: $DB_HOST:$DB_PORT"
echo "  Database: $DB_NAME"
echo "  User: $DB_USER"
echo ""

# Vérifier si MySQL est installé
if ! command -v mysql &> /dev/null; then
    echo -e "${RED}❌ MySQL n'est pas installé ou n'est pas dans le PATH${NC}"
    echo "Installez MySQL ou MariaDB"
    exit 1
fi

# Créer la base de données
echo -e "${YELLOW}Création de la base de données...${NC}"
mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>/dev/null

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Base de données créée ou existe déjà${NC}"
else
    echo -e "${RED}❌ Erreur lors de la création de la base de données${NC}"
    echo "Vérifiez vos identifiants MySQL dans le fichier .env"
    exit 1
fi

# Charger le schéma
echo -e "${YELLOW}Chargement du schéma...${NC}"
mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < database/schema-mysql.sql

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Schéma chargé${NC}"
else
    echo -e "${RED}❌ Erreur lors du chargement du schéma${NC}"
    exit 1
fi

# Charger les données de test
echo -e "${YELLOW}Chargement des données de test...${NC}"
mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < database/seeds.sql

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Données de test chargées${NC}"
else
    echo -e "${RED}❌ Erreur lors du chargement des données${NC}"
    exit 1
fi

echo ""
echo -e "${GREEN}🎉 Base de données initialisée avec succès !${NC}"
echo ""
echo "Vous pouvez maintenant démarrer l'application avec:"
echo "  ./start.sh"
echo ""
echo "Ou accéder à la base avec:"
echo "  mysql -h$DB_HOST -P$DB_PORT -u$DB_USER -p$DB_PASSWORD $DB_NAME"
