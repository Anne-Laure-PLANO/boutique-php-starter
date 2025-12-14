# 📘 Guide Formateur - Boutique PHP

## 🎯 Présentation du projet

Ce projet est conçu pour enseigner la **POO en PHP** sur 5 jours (Jours 6 à 10).

### Principe pédagogique

- ✅ **Front-end 100% fonctionnel fourni** : Les apprenants ne touchent pas au HTML/CSS/JS
- ✅ **Backend à compléter progressivement** : Commentaires TODO guidant les apprenants
- ✅ **Architecture professionnelle** : MVC, Repository Pattern, helpers Laravel-like
- ✅ **Base de données préchargée** : 30 produits de test, clients, commandes
- ✅ **Outils modernes** : SQLite, Adminer, PHPStan, Rector, Pint

---

## 🚀 Installation formateur

```bash
cd boutique-php
chmod +x start.sh
./start.sh
```

Le projet démarre sur **http://localhost:8000**

---

## 📅 Planning pédagogique recommandé

### **Jour 6 (3h) - POO Fondamentaux**

**Objectifs :**
- Comprendre classes, objets, propriétés, méthodes
- Créer la classe `Produit` complète
- Utiliser getters/setters et encapsulation

**Fichiers à compléter :**
- `app/Models/Produit.php`

**Test :**
```bash
php test-jour6.php
```

**Points clés à enseigner :**
- Différence classe/objet
- `$this` pour accéder aux propriétés
- Visibilité (public/private/protected)
- Pattern constructeur promoted properties (PHP 8)

---

### **Jour 7 (3-4h) - Interactions entre objets**

**Objectifs :**
- Créer classes `Panier` et `Client`
- Faire interagir les objets (composition/agrégation)
- Implémenter la logique métier complexe

**Fichiers à compléter :**
- `app/Models/Panier.php`
- `app/Models/Client.php`

**Exercices pratiques :**
1. Ajouter un produit au panier
2. Calculer le total avec TVA
3. Appliquer une remise VIP (10%)
4. Gérer les quantités et le stock

**Points clés à enseigner :**
- Composition : "A un / Contient"
- Agrégation : "Utilise"
- Passer des objets en paramètres
- Tableaux d'objets

---

### **Jour 8 (4h) - Repository Pattern & BDD**

**Objectifs :**
- Comprendre l'architecture en couches
- Implémenter le CRUD complet
- Hydrater des objets depuis la BDD

**Fichiers à compléter :**
- `app/Repositories/ProduitRepository.php`

**Étapes recommandées :**
1. **Lire** : `findAll()`, `findById()`
2. **Créer** : `save()`
3. **Modifier** : `update()`
4. **Supprimer** : `delete()`
5. **Bonus** : `search()`, `findByCategorie()`

**Points clés à enseigner :**
- Pattern Singleton (classe Database)
- Requêtes préparées PDO
- Hydratation d'objets avec `fromArray()`
- Séparation logique métier / accès données

**Utiliser Adminer :**
- Montrer la structure des tables
- Exécuter des requêtes SQL en live
- Insérer/modifier des données manuellement

---

### **Jour 9 (4h) - Architecture MVC**

**Objectifs :**
- Comprendre le pattern MVC
- Créer des contrôleurs fonctionnels
- Utiliser le routeur
- Créer des vues

**Fichiers à compléter :**
- `app/Controllers/HomeController.php`
- `app/Controllers/ProduitController.php`
- `app/Controllers/PanierController.php`
- `app/Controllers/Admin/AdminProduitController.php`

**Workflow recommandé :**
1. Expliquer le flux : Route → Controller → Model → View
2. Compléter `HomeController->index()`
3. Implémenter le catalogue (ProduitController)
4. Gérer le panier (session + localStorage)
5. Créer l'admin CRUD

**Points clés à enseigner :**
- Rôle de chaque composant MVC
- Helper `view()` pour rendre des templates
- `redirect()` et `back()` pour la navigation
- `flash()` pour les messages temporaires
- Validation des formulaires

---

### **Jour 10 (2-3h) - Outils de qualité**

**Objectifs :**
- Analyser le code avec PHPStan
- Formater avec Pint
- Moderniser avec Rector
- Workflow professionnel

**Commandes :**
```bash
composer analyse    # PHPStan niveau 5
composer format     # Pint (Laravel style)
composer refactor   # Rector (modernisation)
```

**Exercices pratiques :**
1. Lancer PHPStan et corriger les erreurs
2. Formater tout le code
3. Ajouter des PHPDoc manquants
4. Activer le niveau 6 de PHPStan

**Points clés à enseigner :**
- Importance de la qualité de code
- Types stricts (PHP 8.1+)
- Documentation avec PHPDoc
- CI/CD et automatisation

---

## 🧪 Tests et validation

### Tester manuellement

1. **Page d'accueil** : http://localhost:8000
   - Vérifier l'affichage des produits

2. **Catalogue** : http://localhost:8000/catalogue
   - Recherche fonctionnelle
   - Filtres par catégorie

3. **Détail produit** : http://localhost:8000/produit/1
   - Affichage complet
   - Bouton "Ajouter au panier"

4. **Panier** : http://localhost:8000/panier
   - Modification des quantités
   - Calculs corrects (TTC, TVA)

5. **Admin** : http://localhost:8000/admin
   - CRUD complet (Create, Read, Update, Delete)

### Tester avec PHPStan

```bash
vendor/bin/phpstan analyse
```

Objectif : **0 erreur au niveau 5**

---

## 🗄️ Base de données

### Accès Adminer

**URL** : http://localhost:8000/adminer.php

**Configuration :**
- Système : `SQLite 3`
- Base de données : `../database/boutique.db`
- Laisser vides : utilisateur et mot de passe

### Tables disponibles

| Table               | Contenu                                                           |
| ------------------- | ----------------------------------------------------------------- |
| **produits**        | 30 produits variés (vêtements, accessoires, électronique, maison) |
| **clients**         | 5 clients de test (dont 2 VIP)                                    |
| **commandes**       | 5 commandes avec différents statuts                               |
| **lignes_commande** | Détails des commandes                                             |

### Réinitialiser la base

```bash
rm database/boutique.db
./start.sh  # Recrée et réinitialise
```

---

## 🎓 Conseils pédagogiques

### Progresser par étapes

1. **Expliquer le concept** (tableau/slides)
2. **Montrer un exemple** (live coding simple)
3. **Laisser pratiquer** (TODO dans le code)
4. **Corriger ensemble** (session collective)
5. **Tester** (script de test ou navigation manuelle)

### Utiliser les helpers

Les fonctions helper simplifient le code :
- `dd($var)` au lieu de `var_dump()` et `die()`
- `view('home.index', $data)` au lieu de `require` compliqué
- `redirect('/catalogue')` au lieu de `header('Location: ...')`

Expliquer que c'est inspiré de **Laravel** (framework PHP populaire).

### Gérer les erreurs courantes

**"Class not found"**
```bash
composer dump-autoload
```

**"Call to undefined function"**
→ Vérifier que `helpers.php` est chargé dans `composer.json`

**"PDOException"**
→ Vérifier le chemin de la base dans `.env`

**Page blanche**
→ Activer `display_errors` dans `.env` : `APP_DEBUG=true`

---

## 🔧 Personnalisation

### Ajouter des produits

Modifier `database/seeds.sql` et relancer.

### Changer les couleurs

Variables CSS dans `public/css/style.css` :
```css
:root {
    --color-primary: #2563eb;
    --color-secondary: #10b981;
    /* ... */
}
```

### Ajouter des routes

Modifier `config/routes.php` :
```php
$router->get('/nouvelle-route', [Controller::class, 'method']);
```

---

## 📚 Ressources supplémentaires

### Documentation officielle

- PHP : https://www.php.net/manual/fr/
- PDO : https://www.php.net/manual/fr/book.pdo.php
- SQLite : https://www.sqlite.org/docs.html

### Aller plus loin

- **Jour 11 (bonus)** : Authentification (Login/Register)
- **Jour 12 (bonus)** : Upload d'images produits
- **Jour 13 (bonus)** : Gestion des commandes complète
- **Jour 14 (bonus)** : API REST JSON
- **Jour 15 (bonus)** : Tests unitaires (PHPUnit)

---

## ❓ FAQ Formateur

### Les apprenants n'ont jamais fait de POO ?

→ Prévoir 1h de plus sur le Jour 6 pour les concepts de base.

### Certains ont déjà des bases POO ?

→ Leur proposer les exercices bonus (pagination, recherche avancée, tests).

### Problème de performance avec SQLite ?

→ SQLite est amplement suffisant pour ce projet (<1000 produits).
Si besoin, basculer sur MySQL en modifiant `.env`.

### Ils veulent styliser le front ?

→ Encourager mais après avoir terminé le backend.
Variables CSS déjà prêtes pour personnalisation rapide.

---

## 📞 Support

Pour toute question ou amélioration du projet :
- Consulter les fichiers `Jour_X_*.md` (cours détaillés)
- Tester avec `php test-jour6.php`
- Vérifier les logs dans `storage/logs/`

---

**Bonne formation ! 🎓🚀**
