# 🔧 Configuration MySQL

## Configuration actuelle

Le projet est configuré pour utiliser **MySQL** au lieu de SQLite.

### Paramètres (fichier `.env`)

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_NAME=boutique_php
DB_USER=root
DB_PASSWORD=root
```

**⚠️ Modifiez ces valeurs selon votre configuration MySQL locale.**

---

## 🚀 Initialisation de la base de données

### Option 1 : Script automatique (recommandé)

```bash
./init-mysql.sh
```

Ce script va :
1. Créer la base de données `boutique_php`
2. Charger le schéma (4 tables)
3. Insérer 30 produits de test
4. Insérer 5 clients et 5 commandes

### Option 2 : Manuellement

```bash
# 1. Créer la base de données
mysql -uroot -proot -e "CREATE DATABASE boutique_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 2. Charger le schéma
mysql -uroot -proot boutique_php < database/schema-mysql.sql

# 3. Charger les données de test
mysql -uroot -proot boutique_php < database/seeds.sql
```

---

## 🗄️ Accès à la base de données

### Via ligne de commande

```bash
mysql -uroot -proot boutique_php
```

### Via phpMyAdmin (si installé)

http://localhost/phpmyadmin

### Via Adminer (fourni dans le projet)

http://localhost:8000/adminer.php

**Configuration Adminer pour MySQL :**
- Système : `MySQL`
- Serveur : `localhost:3306`
- Utilisateur : `root`
- Mot de passe : `root`
- Base de données : `boutique_php`

---

## 🔍 Vérifier la connexion

Créez un fichier `test-db.php` :

```php
<?php
require 'vendor/autoload.php';
require 'core/helpers.php';

loadEnv();

try {
    $pdo = \Core\Database::getInstance();
    echo "✅ Connexion MySQL réussie !\n";

    // Compter les produits
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM produits");
    $result = $stmt->fetch();
    echo "📦 Produits en base : " . $result['total'] . "\n";

} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}
```

Puis lancez :
```bash
php test-db.php
```

---

## ⚠️ Erreurs courantes

### "Access denied for user"

→ Vérifiez les identifiants dans `.env`

### "Unknown database 'boutique_php'"

→ Lancez `./init-mysql.sh` pour créer la base

### "Can't connect to MySQL server"

→ Vérifiez que MySQL est démarré :
```bash
# macOS avec Homebrew
brew services start mysql

# Linux
sudo systemctl start mysql

# Vérifier le statut
mysqladmin -uroot -proot status
```

### Mot de passe root MySQL inconnu

Réinitialisez-le :
```bash
# macOS
mysql.server stop
mysqld_safe --skip-grant-tables &
mysql -uroot
mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
mysql> FLUSH PRIVILEGES;
```

---

## 🔄 Réinitialiser la base

```bash
mysql -uroot -proot -e "DROP DATABASE IF EXISTS boutique_php;"
./init-mysql.sh
```

---

## 📊 Structure des tables

| Table             | Description                                       |
| ----------------- | ------------------------------------------------- |
| `produits`        | 30 produits variés (vêtements, accessoires, etc.) |
| `clients`         | 5 clients dont 2 VIP                              |
| `commandes`       | 5 commandes avec différents statuts               |
| `lignes_commande` | Détails des produits commandés                    |

---

## 🎯 Prêt !

Une fois la base initialisée, démarrez l'application :

```bash
./start.sh
```

Puis ouvrez : http://localhost:8000
