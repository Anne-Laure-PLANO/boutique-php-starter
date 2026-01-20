<?php
require_once("ProductRepository.php");



// Configuration
$pdo = new PDO("mysql:host=localhost;dbname=boutique", "dev", "dev");
$productRepo = new ProductRepository($pdo);

// Récupérer tous les produits
$products = $productRepo->findAll();

// Récupérer un produit
$product = $productRepo->find(1);

// Créer un produit
$newProduct = new Product(name: "Casquette", description:"blabla de description.", price: 19.99, stock: 100, category: "accessoires", id: 20);
$productRepo->save($newProduct);

// Modifier
$product->setPrice(24.99);
$productRepo->update($product);

// Supprimer
$productRepo->delete(20);



?>