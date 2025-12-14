# 🗄️ Initialisation MySQL - Guide macOS

## ⚠️ MySQL n'est pas installé

Vous avez plusieurs options pour utiliser MySQL sur macOS :

---

## Option 1 : MAMP (Le plus simple pour macOS) ✅ RECOMMANDÉ

### Installation

1. Télécharger MAMP : https://www.mamp.info/en/downloads/
2. Installer MAMP (version gratuite suffit)
3. Lancer MAMP
4. Cliquer sur "Start Servers"

### Configuration

MAMP utilise par défaut :
- **Host** : `localhost`
- **Port** : `8889` (ou 3306)
- **User** : `root`
- **Password** : `root`

**Modifiez votre `.env` :**

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=8889
DB_NAME=boutique_php
DB_USER=root
DB_PASSWORD=root
```

### Initialisation

1. Ouvrir phpMyAdmin (inclus dans MAMP) : http://localhost:8888/phpMyAdmin/
2. Créer la base `boutique_php`
3. Sélectionner la base
4. Onglet "Importer"
5. Importer `database/schema-mysql.sql`
6. Importer `database/seeds.sql`

**C'est fait ! ✅**

---

## Option 2 : Homebrew MySQL

### Installation

```bash
# Installer MySQL
brew install mysql

# Démarrer MySQL
brew services start mysql

# Sécuriser l'installation (définir le mot de passe root)
mysql_secure_installation
```

### Créer un utilisateur

```bash
mysql -uroot -p
```

```sql
CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### Initialiser la base

```bash
cd /Users/matt/Documents/sites/php_support/boutique-php
./init-mysql.sh
```

---

## Option 3 : Docker (Pour les développeurs avancés)

### Lancer MySQL avec Docker

```bash
docker run -d \
  --name mysql-boutique \
  -p 3306:3306 \
  -e MYSQL_ROOT_PASSWORD=root \
  -e MYSQL_DATABASE=boutique_php \
  mysql:8.0
```

### Initialiser la base

```bash
# Attendre que MySQL soit prêt (15 secondes)
sleep 15

# Importer le schéma
docker exec -i mysql-boutique mysql -uroot -proot boutique_php < database/schema-mysql.sql

# Importer les données
docker exec -i mysql-boutique mysql -uroot -proot boutique_php < database/seeds.sql
```

### Arrêter/Démarrer

```bash
docker stop mysql-boutique
docker start mysql-boutique
docker rm mysql-boutique  # Supprimer
```

---

## Option 4 : MariaDB (Alternative à MySQL)

```bash
# Installer
brew install mariadb

# Démarrer
brew services start mariadb

# Initialiser
mysql_secure_installation

# Puis utiliser init-mysql.sh
./init-mysql.sh
```

---

## 🔍 Vérifier l'installation

### Vérifier si MySQL est accessible

```bash
# Tester la connexion
mysql -h localhost -P 3306 -u root -proot -e "SELECT VERSION();"
```

### Vérifier le port

```bash
# MAMP utilise souvent le port 8889
mysql -h localhost -P 8889 -u root -proot -e "SELECT VERSION();"
```

---

## 📝 Initialisation manuelle (si les scripts ne marchent pas)

### 1. Créer la base

```sql
CREATE DATABASE IF NOT EXISTS boutique_php
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE boutique_php;
```

### 2. Copier/coller le contenu de `database/schema-mysql.sql`

Exécutez dans phpMyAdmin ou MySQL CLI.

### 3. Copier/coller le contenu de `database/seeds.sql`

Exécutez dans phpMyAdmin ou MySQL CLI.

---

## ✅ Une fois MySQL configuré

Modifiez votre `.env` avec les bons paramètres, puis :

```bash
./start.sh
```

Ouvrez : http://localhost:8000

---

## 🆘 Besoin d'aide ?

**Quelle est votre situation ?**

1. **J'ai MAMP installé** → Utiliser phpMyAdmin (Option 1)
2. **Je veux installer MySQL** → Homebrew (Option 2)
3. **Je connais Docker** → Docker (Option 3)
4. **Je préfère MariaDB** → MariaDB (Option 4)

**Recommandation :** MAMP est le plus simple pour macOS et fonctionne immédiatement.
