# 🛍️ Boutique PHP - Projet de Formation

## 📝 Description

Projet e-commerce complet en PHP orienté objet (POO) destiné à la formation des apprenants du **Jour 6 au Jour 10**.

Le **front-end est déjà fourni** (HTML/CSS/JS fonctionnel), les apprenants doivent **implémenter le backend** en suivant les exercices des cours.

---

## 🎯 Objectifs pédagogiques

### **Jour 6 - Introduction à la POO**
- Créer et compléter la classe `Produit`
- Implémenter les getters, setters et méthodes métier
- Comprendre l'encapsulation et les concepts POO

### **Jour 7 - Classes avancées et interactions**
- Créer les classes `Panier`, `Client` et `Commande`
- Faire interagir les objets entre eux
- Implémenter la logique métier (calculs, remises, etc.)

### **Jour 8 - Architecture en couches (Repository Pattern)**
- Créer le `ProduitRepository` pour gérer la persistence
- Implémenter le CRUD complet (Create, Read, Update, Delete)
- Hydrater des objets depuis la base de données

### **Jour 9 - Architecture MVC**
- Compléter les contrôleurs (HomeController, ProduitController, etc.)
- Créer des vues (templates)
- Comprendre le flux de données Model-View-Controller

### **Jour 10 - Outils de qualité**
- Utiliser PHPStan pour analyser le code
- Formater avec Pint
- Moderniser avec Rector

---

## 🚀 Installation et démarrage

### Prérequis

- **PHP 8.1+** avec extensions PDO et JSON
- **Composer** (gestionnaire de dépendances PHP)
- **FrankenPHP** (recommandé) ou serveur PHP intégré

### Installation rapide

```bash
# 1. Cloner ou télécharger le projet
cd boutique-php

# 2. Rendre le script exécutable
chmod +x start.sh

# 3. Lancer le projet (tout automatique !)
./start.sh
```

Le script `start.sh` va automatiquement :
- ✅ Installer les dépendances Composer
- ✅ Créer les dossiers nécessaires
- ✅ Créer le fichier `.env`
- ✅ Initialiser la base de données SQLite
- ✅ Démarrer le serveur (FrankenPHP ou PHP intégré)

### Accès à l'application

- **Site web** : http://localhost:8000
- **Adminer** (gestion BDD) : http://localhost:8000/adminer.php
  - Système : SQLite 3
  - Base de données : `../database/boutique.db`
  - Laissez vides les champs utilisateur et mot de passe

---

## 📁 Structure du projet

```
boutique-php/
├── app/                      # Code applicatif (à compléter par les apprenants)
│   ├── Controllers/          # Contrôleurs MVC (Jour 9)
│   ├── Models/              # Entités métier (Jour 6-7)
│   └── Repositories/        # Accès données (Jour 8)
│
├── core/                     # Framework maison (déjà fourni)
│   ├── Database.php         # Singleton PDO
│   ├── Router.php           # Routeur simple
│   └── helpers.php          # Fonctions utiles (Laravel-like)
│
├── public/                   # Point d'entrée web
│   ├── index.php            # Front controller
│   ├── css/                 # Styles CSS (déjà fourni)
│   ├── js/                  # JavaScript (déjà fourni)
│   └── adminer.php          # Interface de gestion BDD
│
├── views/                    # Templates (à créer Jour 9)
│   ├── layouts/             # Layouts principaux
│   ├── home/                # Vues page d'accueil
│   ├── produits/            # Vues produits
│   └── admin/               # Vues admin
│
├── config/                   # Configuration
│   ├── routes.php           # Définition des routes
│   ├── database.php         # Config BDD
│   └── app.php              # Config application
│
├── database/                 # Base de données
│   ├── schema.sql           # Structure des tables
│   ├── seeds.sql            # Données de test (30 produits)
│   └── boutique.db          # Base SQLite (créée automatiquement)
│
├── storage/                  # Fichiers générés
│   └── logs/                # Logs d'erreurs
│
├── .env                      # Variables d'environnement
├── composer.json            # Dépendances PHP
├── start.sh                 # Script de démarrage
└── README.md                # Ce fichier
```

---

## 📚 Guide de progression pour les apprenants

### **Jour 6 : Compléter la classe Produit**

Fichier : `app/Models/Produit.php`

**Tâches :**
1. Ajouter toutes les propriétés privées
2. Créer le constructeur
3. Implémenter tous les getters/setters
4. Coder les méthodes métier :
   - `calculerPrixTTC()` : prix HT × 1.20
   - `estDisponible()` : vérifier si stock > 0
   - `stockFaible()` : vérifier si stock < 10
   - `appliquerRemise($pourcentage)` : calculer prix avec remise

**Test :**
Créer un fichier `test-jour6.php` :
```php
require 'vendor/autoload.php';
$produit = new App\Models\Produit(...);
echo $produit->calculerPrixTTC();
```

---

### **Jour 7 : Classes Panier et Client**

Fichiers :
- `app/Models/Panier.php`
- `app/Models/Client.php`

**Tâches Panier :**
- `ajouterProduit()` : ajouter/incrémenter
- `retirerProduit()` : retirer du panier
- `calculerSousTotal()` : total HT
- `calculerTotal()` : total TTC
- `calculerTVA()` : montant TVA

**Tâches Client :**
- Ajouter propriétés (téléphone, adresse, etc.)
- `estVIP()` : vérifier le type
- `obtenirRemise()` : 10% pour VIP, 0% sinon
- `calculerPrixAvecRemise()` : appliquer remise

---

### **Jour 8 : ProduitRepository (CRUD)**

Fichier : `app/Repositories/ProduitRepository.php`

**Tâches :**
- `save()` : INSERT nouveau produit
- `findAll()` : SELECT tous les produits
- `findById()` : SELECT un produit par ID
- `update()` : UPDATE un produit
- `delete()` : DELETE un produit
- `search()` : Recherche avec LIKE
- `findByCategorie()` : Filtrer par catégorie

**Important :** Utiliser `Produit::fromArray()` pour hydrater les objets.

---

### **Jour 9 : Contrôleurs MVC**

Fichiers :
- `app/Controllers/HomeController.php`
- `app/Controllers/ProduitController.php`
- `app/Controllers/PanierController.php`
- `app/Controllers/Admin/AdminProduitController.php`

**Tâches :**
- Récupérer les données depuis les Repositories
- Traiter les requêtes GET/POST
- Passer les données aux vues avec `view()`
- Gérer les redirections avec `redirect()`

**Créer les vues correspondantes dans `views/`**

---

### **Jour 10 : Outils de qualité**

**Analyser le code :**
```bash
composer analyse    # PHPStan
```

**Formater le code :**
```bash
composer format     # Pint
```

**Moderniser le code :**
```bash
composer refactor   # Rector
```

---

## 🗄️ Base de données

### Schéma

- **produits** : id, nom, description, prix, stock, categorie, image, actif
- **clients** : id, nom, prenom, email, telephone, adresse, type_client
- **commandes** : id, client_id, montant_total, statut
- **lignes_commande** : id, commande_id, produit_id, quantite, prix_unitaire

### Gestion avec Adminer

Accédez à **http://localhost:8000/adminer.php** pour :
- Visualiser les tables
- Insérer/modifier des données
- Exécuter des requêtes SQL
- Exporter la base

**Configuration Adminer :**
- Système : `SQLite 3`
- Base de données : `../database/boutique.db`
- Laisser vide : utilisateur et mot de passe

---

## 🔧 Fonctions helper disponibles

Le fichier `core/helpers.php` fournit des fonctions utiles (inspirées de Laravel) :

```php
// Environnement
env('APP_NAME', 'default');

// Debug
dd($variable);           // Dump and die
dump($variable);         // Dump sans arrêter

// Vues
view('home.index', ['data' => $value]);

// Redirection
redirect('/catalogue');
back();                  // Retour à la page précédente

// Session
session('user_id');
setSession('user_id', 123);
flash('success', 'Message');

// Validation
$errors = validate($_POST, [
    'nom' => 'required|min:3|max:255',
    'email' => 'required|email'
]);

// Utilitaires
e($html);                // Échapper HTML
formatPrice(29.99);      // "29,99 €"
input('nom', 'default'); // $_POST['nom'] ou $_GET['nom']
isPost();                // Vérifier si POST
```

---

## 🎨 Front-end (déjà fourni)

Le front-end est **complet et fonctionnel** :
- Design moderne et responsive (mobile-first)
- CSS avec variables CSS et grid/flexbox
- JavaScript pour le panier dynamique
- Notifications toast
- LocalStorage pour le panier côté client

**Aucune modification du front n'est nécessaire.**
Les apprenants se concentrent uniquement sur le backend.

---

## 📖 Documentation des exercices

Les fichiers de cours complets sont disponibles :
- `Jour_6_Introduction_POO.md`
- `Jour_7_Classes_Avancees_Interactions.md`
- `Jour_8_Architecture_Couches_Repository.md`
- `Jour_9_Architecture_MVC_Complete.md`
- `Jour_10_Outils_Qualite_IA.md`

---

## ❓ FAQ

### Le serveur ne démarre pas ?

**Vérifier PHP :**
```bash
php -v    # Doit afficher 8.1 ou supérieur
```

**Installer Composer :**
```bash
composer --version
```

### La base de données est vide ?

Elle s'initialise automatiquement au premier accès.
Si problème, supprimer `database/boutique.db` et relancer.

### Erreur "Class not found" ?

```bash
composer dump-autoload
```

### Comment réinitialiser le projet ?

```bash
rm -rf database/boutique.db vendor
./start.sh
```

---

## 🤝 Contribution

Ce projet est destiné à la **formation**. Les apprenants doivent :
1. Compléter les TODO dans le code
2. Tester chaque fonctionnalité
3. Utiliser les outils de qualité (PHPStan, Pint)
4. Documenter leur code avec PHPDoc

---

## 📜 Licence

Projet éducatif - Formation PHP POO 2025

---

## 📞 Support

En cas de problème, vérifiez :
1. Version de PHP (>= 8.1)
2. Extensions PHP activées (PDO, JSON)
3. Composer installé
4. Logs dans `storage/logs/`

**Bon courage et bon apprentissage ! 🚀**
