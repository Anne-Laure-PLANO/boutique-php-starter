<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev", "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    echo "✅ Connexion réussie !";
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

$sql= "CREATE DATABASE IF NOT EXISTS boutique 
CHARACTER SET utf8mb4 # définit le type de caractère autorisé (ici accents émojis et toutes les langues)
COLLATE utf8mb4_unicode_ci"; # explique comment comparer les mots : unicode -> règles internationales ; ci -> casse insensible (maj=min)

$pdo->exec($sql);


$pdo -> exec("USE boutique"); # on se positionne dans la table boutique
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL, # name = nom produit ; VARCHAR = texte ; (255)= 255 caractères max ; NOT NULL = obligatoire
    description TEXT, #facultatif, texte long.
    price DECIMAL(10,2) NOT NULL, # decimal(10,2) = 10 chiffres au total, 2 décimales
    stock INT DEFAULT 0, # si on ne précise rien, quantité = 0
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP #date et heure = quand le produit est créé
)";
$pdo->exec($sql);

//$pdo->exec("TRUNCATE TABLE products"); // vide la table

#vérifie que la table n'est pas déjà créée, sinon ajoute les produits.
$count = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
if ($count == 0) {
   $sql="INSERT INTO products (name, description, price, stock, category) VALUES
('T-shirt Blanc', 'T-shirt 100% coton', 29.99, 50, 'Vêtements'),
('Jean Slim', 'Jean stretch confortable', 79.99, 30, 'Vêtements'),
('Casquette NY', 'Casquette brodée', 19.99, 100, 'Accessoires'),
('Baskets Sport', 'Chaussures de running', 89.99, 25, 'Chaussures'),
('Sac à dos', 'Sac 20L étanche', 49.99, 15, 'Accessoires')";
    $pdo->exec($sql);
}

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$product= $stmt->fetchall($pdo::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <?php foreach ($product as $item):?>
        <div>
            <h2><?=$item["name"] ?></h2>  
            <p><?=$item["description"]?></p>
            <p><?=$item["category"]?></p>
            <p><?=$item["price"]?>€</p>
            <p><?=($item["stock"])? "En stock (".$item["stock"].")": "En rupture";?></p>  

        </div>
    <?php endforeach ?>
    
    
    
</body>
</html>