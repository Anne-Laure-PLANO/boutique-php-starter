<?php

namespace Core;

use PDO;
use PDOException;

/**
 * Classe Database - Pattern Singleton
 * Gère la connexion PDO unique à la base de données
 *
 * @author Formation PHP
 * @version 1.0
 */
class Database
{
    private static ?PDO $instance = null;

    /**
     * Constructeur privé pour empêcher l'instanciation directe
     */
    private function __construct() {}

    /**
     * Empêche le clonage de l'instance
     */
    private function __clone() {}

    /**
     * Obtenir l'instance unique de PDO
     *
     * @return PDO Instance PDO configurée
     * @throws PDOException Si la connexion échoue
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = self::createConnection();
        }

        return self::$instance;
    }

    /**
     * Créer une nouvelle connexion PDO
     *
     * @return PDO
     * @throws PDOException
     */
    private static function createConnection(): PDO
    {
        // Charger les variables d'environnement
        $dbConnection = env('DB_CONNECTION', 'mysql');

        try {
            if ($dbConnection === 'mysql') {
                // Configuration MySQL
                $dsn = "mysql:host=" . env('DB_HOST', 'localhost')
                    . ";port=" . env('DB_PORT', '3306')
                    . ";dbname=" . env('DB_NAME', 'boutique_php')
                    . ";charset=utf8mb4";

                $pdo = new PDO(
                    $dsn,
                    env('DB_USER', 'root'),
                    env('DB_PASSWORD', 'root'),
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
                    ]
                );
            } elseif ($dbConnection === 'sqlite') {
                // Support SQLite (fallback)
                $dbDatabase = env('DB_DATABASE', 'database/boutique.db');
                $dbDir = dirname($dbDatabase);
                if (!is_dir($dbDir)) {
                    mkdir($dbDir, 0755, true);
                }
                $dbPath = realpath(__DIR__ . '/../') . '/' . $dbDatabase;
                $pdo = new PDO("sqlite:{$dbPath}");
                self::initializeDatabase($pdo, $dbPath);
            } else {
                throw new PDOException("Type de base de données non supporté : {$dbConnection}");
            }

            // Configuration PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;
        } catch (PDOException $e) {
            // En production, logger l'erreur au lieu de l'afficher
            if (env('APP_DEBUG', true)) {
                dd("Erreur de connexion à la base de données : " . $e->getMessage());
            }
            throw $e;
        }
    }

    /**
     * (Utilisé uniquement pour SQLite)
     *
     * @param PDO $pdo
     * @param string $dbPath
     */
    private static function initializeDatabase(PDO $pdo, string $dbPath): void
    {
        // Vérifier si la base est déjà initialisée (SQLite uniquement)
        $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll();

        if (count($tables) > 0) {
            return; // Base déjà initialisée
        }

        // Charger et exécuter le schéma SQLite
        // Charger et exécuter le schéma
        $schemaPath = realpath(__DIR__ . '/../database/schema.sql');
        if (file_exists($schemaPath)) {
            $schema = file_get_contents($schemaPath);
            $pdo->exec($schema);

            // Charger les données de test
            $seedsPath = realpath(__DIR__ . '/../database/seeds.sql');
            if (file_exists($seedsPath)) {
                $seeds = file_get_contents($seedsPath);
                $pdo->exec($seeds);
            }

            if (env('APP_DEBUG', true)) {
                echo "✅ Base de données initialisée avec succès !<br>";
            }
        }
    }

    /**
     * Réinitialiser la base de données (utile pour les tests)
     */
    public static function reset(): void
    {
        self::$instance = null;
    }
}
