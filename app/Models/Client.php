<?php

namespace App\Models;

/**
 * Classe Client - Entité représentant un client
 *
 * EXERCICE JOUR 7 : Compléter cette classe
 *
 * @author Apprenant
 * @version 1.0
 */
class Client
{
    // ===================================================
    // PROPRIÉTÉS
    // ===================================================

    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $typeClient = 'standard'; // 'standard' ou 'vip'

    // TODO JOUR 7: Ajouter les propriétés manquantes
    // - telephone
    // - adresse
    // - codePostal
    // - ville

    // ===================================================
    // CONSTRUCTEUR
    // ===================================================

    public function __construct(
        string $nom,
        string $prenom,
        string $email,
        string $typeClient = 'standard'
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->typeClient = $typeClient;
    }

    // ===================================================
    // GETTERS / SETTERS (À COMPLÉTER)
    // ===================================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    // TODO JOUR 7: Compléter tous les getters/setters

    /**
     * Obtenir le nom complet du client
     *
     * @return string
     */
    public function getNomComplet(): string
    {
        // TODO: Retourner "Prénom Nom"
        return '';
    }

    // ===================================================
    // MÉTHODES MÉTIER (JOUR 7)
    // ===================================================

    /**
     * Vérifier si le client est VIP
     *
     * @return bool
     */
    public function estVIP(): bool
    {
        // TODO: Vérifier si typeClient === 'vip'
        return false;
    }

    /**
     * Obtenir le taux de remise du client
     * VIP: 10% de remise, standard: 0%
     *
     * @return float Taux de remise (0.10 pour 10%)
     */
    public function obtenirRemise(): float
    {
        // TODO JOUR 7: Retourner 0.10 si VIP, 0 sinon
        return 0.0;
    }

    /**
     * Calculer le prix avec remise client
     *
     * @param float $prix Prix d'origine
     * @return float Prix après remise
     */
    public function calculerPrixAvecRemise(float $prix): float
    {
        // TODO JOUR 7: Appliquer la remise au prix
        // prix * (1 - remise)
        return 0.0;
    }
}
