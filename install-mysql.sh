#!/bin/bash

echo "🗄️  Installation de la base de données MySQL..."

# Créer la base de données
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS boutique_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

echo "✅ Base de données 'boutique_php' créée"

# Importer le schéma
mysql -u root -p boutique_php < database/schema.sql

echo "✅ Tables créées"
echo ""
echo "Base de données prête ! 🎉"
echo "Vous pouvez maintenant démarrer le serveur avec ./start.sh"
