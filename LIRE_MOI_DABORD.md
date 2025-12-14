# 🚀 DÉMARRAGE RAPIDE - Boutique PHP

## ✅ CORRECTIONS EFFECTUÉES

1. **Erreur Router corrigée** : Le fichier `public/index.php` a été réparé
2. **MySQL configuré** : Le projet utilise maintenant MySQL au lieu de SQLite

---

## 📋 AVANT DE DÉMARRER

### Vous devez installer MySQL

**⚠️ MySQL n'est PAS installé sur votre Mac**

Choisissez **UNE** de ces options :

### 🟢 Option 1 : MAMP (RECOMMANDÉ - Le plus simple)

1. **Télécharger** : https://www.mamp.info/en/downloads/
2. **Installer** MAMP (gratuit)
3. **Démarrer** MAMP → Cliquer "Start Servers"
4. **phpMyAdmin** : http://localhost:8888/phpMyAdmin/
   - Créer la base : `boutique_php`
   - Importer : `database/schema-mysql.sql`
   - Importer : `database/seeds.sql`

5. **Modifier `.env`** :
   ```env
   DB_PORT=8889
   ```
   (MAMP utilise le port 8889 au lieu de 3306)

6. **Démarrer** :
   ```bash
   ./start.sh
   ```

---

### 🟠 Option 2 : Homebrew MySQL

```bash
# Installer MySQL
brew install mysql

# Démarrer
brew services start mysql

# Sécuriser (mot de passe : root)
mysql_secure_installation

# Initialiser la base
cd /Users/matt/Documents/sites/php_support/boutique-php
./init-mysql.sh
```

---

### 🔵 Option 3 : Docker

```bash
# Lancer MySQL
docker run -d \
  --name mysql-boutique \
  -p 3306:3306 \
  -e MYSQL_ROOT_PASSWORD=root \
  -e MYSQL_DATABASE=boutique_php \
  mysql:8.0

# Attendre 15 secondes
sleep 15

# Importer le schéma
docker exec -i mysql-boutique mysql -uroot -proot boutique_php < database/schema-mysql.sql

# Importer les données
docker exec -i mysql-boutique mysql -uroot -proot boutique_php < database/seeds.sql
```

---

## 🧪 TESTER LA CONNEXION

Une fois MySQL installé :

```bash
php test-mysql.php
```

Si tout fonctionne, vous verrez :
```
✅ Connexion MySQL réussie !
✅ produits : 30 enregistrement(s)
✅ clients : 5 enregistrement(s)
...
```

---

## 🎯 DÉMARRER L'APPLICATION

```bash
./start.sh
```

Puis ouvrir : **http://localhost:8000**

---

## 📁 FICHIERS IMPORTANTS

| Fichier                       | Description                         |
| ----------------------------- | ----------------------------------- |
| `CORRECTIONS.md`              | Liste des corrections effectuées    |
| `INSTALLATION_MYSQL_MACOS.md` | Guide complet d'installation MySQL  |
| `MYSQL_CONFIG.md`             | Configuration et dépannage MySQL    |
| `test-mysql.php`              | Script de test de la connexion      |
| `init-mysql.sh`               | Script d'initialisation automatique |
| `.env`                        | Configuration (identifiants MySQL)  |

---

## ⚙️ CONFIGURATION

### Fichier `.env` actuel

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306          # Changer en 8889 pour MAMP
DB_NAME=boutique_php
DB_USER=root
DB_PASSWORD=root      # Modifier si différent
```

### Si vous utilisez MAMP

Modifier uniquement le port dans `.env` :
```env
DB_PORT=8889
```

---

## 🆘 PROBLÈMES COURANTS

### "Can't connect to MySQL server"

→ MySQL n'est pas démarré

**Solution :**
```bash
# Homebrew
brew services start mysql

# Docker
docker start mysql-boutique

# MAMP
Ouvrir MAMP et cliquer "Start Servers"
```

### "Access denied for user"

→ Mauvais identifiants dans `.env`

**Solution :**
Vérifiez votre mot de passe MySQL et mettez-le à jour dans `.env`

### "Unknown database 'boutique_php'"

→ Base non créée

**Solution :**
```bash
# Créer manuellement
mysql -uroot -proot -e "CREATE DATABASE boutique_php;"

# Ou lancer le script
./init-mysql.sh
```

### Port 3306 ou 8889 ?

- **MySQL standard / Homebrew** : Port 3306
- **MAMP** : Port 8889
- **Docker** : Port que vous avez défini (généralement 3306)

---

## ✅ CHECKLIST

- [ ] MySQL installé (MAMP, Homebrew ou Docker)
- [ ] MySQL démarré
- [ ] Base `boutique_php` créée
- [ ] `schema-mysql.sql` importé
- [ ] `seeds.sql` importé (30 produits)
- [ ] `.env` configuré (port correct)
- [ ] `php test-mysql.php` → ✅ Connexion réussie
- [ ] `./start.sh` → Serveur démarré
- [ ] http://localhost:8000 → Page visible

---

## 📞 BESOIN D'AIDE ?

1. **Pour installer MySQL** → Consultez `INSTALLATION_MYSQL_MACOS.md`
2. **Pour configurer** → Consultez `MYSQL_CONFIG.md`
3. **Pour dépanner** → Consultez `CORRECTIONS.md`

---

## 🎉 PRÊT À CODER !

Une fois MySQL configuré, tout devrait fonctionner.

Les apprenants peuvent commencer les exercices :
- **Jour 6** : Classe Produit (`app/Models/Produit.php`)
- **Jour 7** : Panier et Client
- **Jour 8** : Repository
- **Jour 9** : Contrôleurs MVC

**Bon courage ! 🚀**
