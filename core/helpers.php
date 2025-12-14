<?php

/**
 * Fichier de fonctions helper - Inspiré de Laravel
 * Ces fonctions facilitent le développement
 */

/**
 * Charger les variables d'environnement depuis .env
 */
function loadEnv(): void
{
    static $loaded = false;

    if ($loaded) {
        return;
    }

    $envPath = __DIR__ . '/../.env';

    if (!file_exists($envPath)) {
        return;
    }

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_ENV)) {
            $_ENV[$key] = $value;
            putenv("{$key}={$value}");
        }
    }

    $loaded = true;
}

/**
 * Obtenir une variable d'environnement
 */
function env(string $key, mixed $default = null): mixed
{
    loadEnv();

    return $_ENV[$key] ?? getenv($key) ?: $default;
}

/**
 * Dump and Die - Afficher une variable et arrêter l'exécution
 */
function dd(...$vars): void
{
    echo '<pre style="background: #1e1e1e; color: #d4d4d4; padding: 20px; border-radius: 8px; overflow: auto;">';

    foreach ($vars as $var) {
        var_dump($var);
        echo "\n---\n\n";
    }

    echo '</pre>';
    die();
}

/**
 * Dump - Afficher une variable sans arrêter
 */
function dump(...$vars): void
{
    echo '<pre style="background: #1e1e1e; color: #d4d4d4; padding: 20px; border-radius: 8px; overflow: auto;">';

    foreach ($vars as $var) {
        var_dump($var);
        echo "\n";
    }

    echo '</pre>';
}

/**
 * Afficher une vue
 */
function view(string $viewName, array $data = []): void
{
    extract($data);

    $viewPath = __DIR__ . '/../views/' . str_replace('.', '/', $viewName) . '.php';

    if (!file_exists($viewPath)) {
        throw new Exception("Vue non trouvée : {$viewName}");
    }

    require $viewPath;
}

/**
 * Rediriger vers une URL
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

/**
 * Rediriger vers la page précédente
 */
function back(): void
{
    $referer = $_SERVER['HTTP_REFERER'] ?? '/';
    redirect($referer);
}

/**
 * Échapper une chaîne HTML
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Obtenir une valeur de session
 */
function session(string $key, mixed $default = null): mixed
{
    if (!isset($_SESSION)) {
        session_start();
    }

    return $_SESSION[$key] ?? $default;
}

/**
 * Définir une valeur de session
 */
function setSession(string $key, mixed $value): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION[$key] = $value;
}

/**
 * Message flash (stocké en session pour un seul affichage)
 */
function flash(string $key, mixed $value = null): mixed
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($value === null) {
        // Récupérer et supprimer
        $message = $_SESSION["flash_{$key}"] ?? null;
        unset($_SESSION["flash_{$key}"]);
        return $message;
    }

    // Stocker
    $_SESSION["flash_{$key}"] = $value;
    return null;
}

/**
 * Obtenir l'URL de base de l'application
 */
function url(string $path = ''): string
{
    $baseUrl = env('APP_URL', 'http://localhost:8000');
    return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}

/**
 * Obtenir l'URL d'un asset (CSS, JS, images)
 */
function asset(string $path): string
{
    return url($path);
}

/**
 * Obtenir la valeur d'un input (old value)
 */
function old(string $key, mixed $default = ''): mixed
{
    return session("old_{$key}", $default);
}

/**
 * Valider des données (simple)
 */
function validate(array $data, array $rules): array
{
    $errors = [];

    foreach ($rules as $field => $rule) {
        $rulesParts = explode('|', $rule);
        $value = $data[$field] ?? null;

        foreach ($rulesParts as $r) {
            if ($r === 'required' && empty($value)) {
                $errors[$field][] = "Le champ {$field} est requis.";
            }

            if (str_starts_with($r, 'min:')) {
                $min = (int) substr($r, 4);
                if (strlen($value) < $min) {
                    $errors[$field][] = "Le champ {$field} doit contenir au moins {$min} caractères.";
                }
            }

            if (str_starts_with($r, 'max:')) {
                $max = (int) substr($r, 4);
                if (strlen($value) > $max) {
                    $errors[$field][] = "Le champ {$field} ne doit pas dépasser {$max} caractères.";
                }
            }

            if ($r === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field][] = "Le champ {$field} doit être une adresse email valide.";
            }

            if ($r === 'numeric' && !is_numeric($value)) {
                $errors[$field][] = "Le champ {$field} doit être un nombre.";
            }
        }
    }

    return $errors;
}

/**
 * Formater un prix
 */
function formatPrice(float $price): string
{
    return number_format($price, 2, ',', ' ') . ' €';
}

/**
 * Obtenir la valeur d'un input POST/GET
 */
function input(string $key, mixed $default = null): mixed
{
    return $_POST[$key] ?? $_GET[$key] ?? $default;
}

/**
 * Vérifier si la requête est POST
 */
function isPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Vérifier si la requête est GET
 */
function isGet(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * Générer un token CSRF
 */
function csrf(): string
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Vérifier un token CSRF
 */
function verifyCsrf(string $token): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Obtenir une valeur de configuration
 */
function config(string $key, mixed $default = null): mixed
{
    static $config = [];

    if (empty($config)) {
        $configFiles = glob(__DIR__ . '/../config/*.php');
        foreach ($configFiles as $file) {
            $name = basename($file, '.php');
            $config[$name] = require $file;
        }
    }

    $keys = explode('.', $key);
    $value = $config;

    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return $default;
        }
        $value = $value[$k];
    }

    return $value;
}
