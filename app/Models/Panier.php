<?php

namespace App\Models;

/**
 * Classe Panier - Gestion du panier d'achats
 *
 * EXERCICE JOUR 7 : Compléter cette classe
 *
 * @author Apprenant
 * @version 1.0
 */
class Panier
{
    // ===================================================
    // PROPRIÉTÉS
    // ===================================================

    /**
     * @var array Tableau contenant les lignes du panier
     * Format: ['produit' => Produit, 'quantite' => int]
     */
    private array $items = [];

    // ===================================================
    // MÉTHODES PRINCIPALES (JOUR 7)
    // ===================================================

    /**
     * Ajouter un produit au panier
     * Si le produit existe déjà, augmenter la quantité
     *
     * @param Produit $produit
     * @param int $quantite
     * @return void
     */
    public function ajouterProduit(Produit $produit, int $quantite = 1): void
    {
        // TODO JOUR 7: Implémenter l'ajout au panier
        // - Vérifier si le produit existe déjà
        // - Si oui, augmenter la quantité
        // - Si non, ajouter une nouvelle ligne
        // - Vérifier le stock disponible
    }

    /**
     * Retirer un produit du panier
     *
     * @param int $produitId ID du produit à retirer
     * @return void
     */
    public function retirerProduit(int $produitId): void
    {
        // TODO JOUR 7: Retirer un produit du panier
    }

    /**
     * Modifier la quantité d'un produit
     *
     * @param int $produitId ID du produit
     * @param int $quantite Nouvelle quantité
     * @return void
     */
    public function modifierQuantite(int $produitId, int $quantite): void
    {
        // TODO JOUR 7: Modifier la quantité
        // Si quantité = 0, retirer le produit
    }

    /**
     * Vider le panier
     *
     * @return void
     */
    public function vider(): void
    {
        $this->items = [];
    }

    /**
     * Obtenir tous les items du panier
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    // ===================================================
    // CALCULS (JOUR 7 - LOGIQUE MÉTIER)
    // ===================================================

    /**
     * Calculer le sous-total HT
     *
     * @return float
     */
    public function calculerSousTotal(): float
    {
        // TODO JOUR 7: Calculer le total HT
        // Parcourir tous les items et additionner (prix * quantité)
        return 0.0;
    }

    /**
     * Calculer le total TTC
     *
     * @return float
     */
    public function calculerTotal(): float
    {
        // TODO JOUR 7: Calculer le total TTC (sous-total * 1.20)
        return 0.0;
    }

    /**
     * Calculer la TVA
     *
     * @return float
     */
    public function calculerTVA(): float
    {
        // TODO JOUR 7: Calculer la TVA (total - sous-total)
        return 0.0;
    }

    /**
     * Compter le nombre total d'articles
     *
     * @return int
     */
    public function nombreArticles(): int
    {
        // TODO JOUR 7: Compter la somme des quantités
        return 0;
    }

    /**
     * Vérifier si le panier est vide
     *
     * @return bool
     */
    public function estVide(): bool
    {
        return empty($this->items);
    }
}
