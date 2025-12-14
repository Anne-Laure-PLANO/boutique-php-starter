# 🛍️ Boutique PHP - VERSION STARTER

## 📝 Description

Projet e-commerce pour apprendre la POO en PHP (Jours 6 à 10).

**Ce qui est fourni :**
- ✅ Front-end HTML/CSS/JS complet et fonctionnel
- ✅ Structure de dossiers vide
- ✅ Base de données MySQL (schéma uniquement)
- ✅ Squelettes de classes avec TODO

**Ce que VOUS devez créer :**
- ❌ Classes Models (Jour 6-7)
- ❌ Helpers (Jour 7)
- ❌ Database & Repositories (Jour 8)
- ❌ Controllers & Router (Jour 9)

---

## 🚀 Installation

### 1. Prérequis

- PHP 8.1+
- MySQL 5.7+ ou MariaDB
- Composer

### 2. Installer la base de données

```bash
# Créer la base de données et importer le schéma
./install-mysql.sh
```

OU manuellement :

```bash
mysql -u root -p
CREATE DATABASE boutique_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE boutique_php;
SOURCE database/schema.sql;
```

### 3. Configuration

Le fichier `.env` est déjà configuré pour MySQL local :

```env
DB_HOST=localhost
DB_NAME=boutique_php
DB_USER=root
DB_PASSWORD=
```

**Modifier si nécessaire** selon votre configuration MySQL.

### 4. Installer les dépendances

```bash
composer install
```

### 5. Démarrer le serveur

```bash
./start.sh
```

Ouvrir : **http://localhost:8000**

---

## 📚 Progression des exercices

### **Jour 6 : Classe Produit**

**Fichier :** `app/Models/Produit.php`

**Créer :**
1. Propriétés privées : id, nom, description, prix, stock, categorie, image, actif
2. Constructeur avec tous les paramètres
3. Getters et setters pour toutes les propriétés
4. Méthodes métier :
   - `calculerPrixTTC()` → prix × 1.20
   - `estDisponible()` → stock > 0
   - `stockFaible()` → stock < 10
   - `appliquerRemise($pourcentage)`

---

### **Jour 7 : Panier, Client et Helpers**

**Fichiers :**
- `app/Models/Panier.php`
- `app/Models/Client.php`
- `core/helpers.php`

**Classe Panier :**
- `ajouterProduit(Produit $produit, int $quantite)`
- `retirerProduit(int $produitId)`
- `calculerSousTotal()`, `calculerTotal()`, `calculerTVA()`

**Classe Client :**
- Propriétés : nom, prenom, email, typeClient, etc.
- `estVIP()`, `obtenirRemise()`

**Helpers :**
Créer des fonctions utiles : `dd()`, `dump()`, `view()`, `redirect()`, `formatPrice()`

---

### **Jour 8 : Database & Repository**

**Fichiers :**
- `core/Database.php` → Pattern Singleton PDO
- `app/Repositories/ProduitRepository.php` → CRUD complet

**Database :**
```php
$pdo = Database::getInstance(); // Connexion MySQL unique
```

**ProduitRepository :**
- `save(Produit $produit)` → INSERT
- `findAll()` → SELECT *
- `findById(int $id)` → SELECT WHERE id
- `update(Produit $produit)` → UPDATE
- `delete(int $id)` → DELETE

---

### **Jour 9 : MVC (Contrôleurs)**

**Fichiers à créer :**
- `core/Router.php` → Gestion des routes
- `app/Controllers/HomeController.php`
- `app/Controllers/ProduitController.php`
- `app/Controllers/PanierController.php`
- `app/Controllers/Admin/AdminProduitController.php`

**Important :** 
Remplacer le switch du `public/index.php` par le vrai routeur.

---

### **Jour 10 : Qualité du code**

```bash
composer analyse    # PHPStan
composer format     # Pint
```

---

## 🌐 Pages disponibles (front-end)

- **/** → Accueil
- **/catalogue** → Liste des produits
- **/panier** → Panier d'achats
- **/admin** → Administration

**Actuellement**, ce sont des pages HTML statiques.  
**Votre mission :** Les rendre dynamiques avec PHP !

---

## 🗄️ Base de données

### Tables créées

- **produits** : Produits de la boutique
- **clients** : Clients (standard ou VIP)
- **commandes** : Commandes passées
- **lignes_commande** : Détails des commandes

### Accès phpMyAdmin

Si vous avez phpMyAdmin installé :
- URL : http://localhost/phpmyadmin
- Base : `boutique_php`

---

## 📖 Structure du projet

```
boutique-php/
├── app/
│   ├── Models/              # Classes métier (à créer)
│   ├── Repositories/        # Accès BDD (à créer)
│   └── Controllers/         # Contrôleurs MVC (à créer)
│
├── core/
│   ├── Database.php         # Connexion PDO (à créer)
│   ├── Router.php           # Routeur (à créer Jour 9)
│   └── helpers.php          # Fonctions utiles (à créer)
│
├── public/                  # Point d'entrée web
│   ├── index.php            # Front controller (simplifié)
│   ├── pages/               # Pages HTML statiques (fournies)
│   ├── css/                 # Styles (fournis)
│   └── js/                  # JavaScript (fourni)
│
├── database/
│   └── schema.sql           # Structure MySQL
│
├── config/
│   └── routes.php           # Définition des routes (à créer)
│
└── .env                     # Configuration MySQL
```

---

## ❓ FAQ

### Le serveur affiche les pages HTML statiques ?

**C'est normal !** C'est la version STARTER.  
Vous devez implémenter le backend pour rendre les pages dynamiques.

### Comment tester ma classe Produit ?

Créer un fichier `test.php` :

```php
<?php
require 'vendor/autoload.php';

$produit = new App\Models\Produit(
    nom: "T-shirt",
    prix: 29.99,
    stock: 100
);

echo $produit->calculerPrixTTC(); // Doit afficher 35.99
```

### Erreur "Class not found" ?

```bash
composer dump-autoload
```

### Réinitialiser la base de données ?

```bash
mysql -u root -p boutique_php < database/schema.sql
```

---

## 🎯 Objectifs pédagogiques

À la fin de ce projet, vous maîtriserez :

- ✅ La POO en PHP (classes, objets, encapsulation)
- ✅ Le pattern Repository/DAO
- ✅ L'architecture MVC
- ✅ PDO et requêtes préparées
- ✅ Les bonnes pratiques PHP modernes

---

**Bon courage ! 🚀**
