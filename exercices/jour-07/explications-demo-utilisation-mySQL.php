<?php
$host = "localhost";
$dbname = "ecole";
$user = "dev";
$password = "dev";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );
    echo "Connexion réussie 🎉";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$sql= "CREATE DATABASE IF NOT EXISTS universite 
CHARACTER SET utf8mb4 # définit le type de caractère autorisé (ici accents émojis et toutes les langues)
COLLATE utf8mb4_unicode_ci"; # explique comment comparer les mots : unicode -> règles internationales ; ci -> casse insensible (maj=min)

$pdo->exec($sql);

# créer une table :
$sql = "
    CREATE TABLE eleves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    age INT
    )";

$pdo->exec($sql);
echo "Table créée ✅";


#Ajouter des données : 
$sql = "INSERT INTO eleves (nom, age) VALUES (?, ?)"; # déclaration des "colones" et des valeurs contenues. Les ? protègent contre les hackers.
$stmt = $pdo->prepare($sql);
$stmt->execute(["Lucas", 12]);

echo "Élève ajouté 👍";

# Lire des données :
$sql = "SELECT * FROM eleves";
$stmt = $pdo->query($sql);

$eleves = $stmt->fetchAll();

foreach ($eleves as $eleve) {
    echo $eleve["nom"] . " a " . $eleve["age"] . " ans<br>";
}

#Modifier des données :
$sql = "UPDATE eleves SET age = ? WHERE nom = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([13, "Lucas"]);

echo "Âge modifié ✏️";

# Supprimer une donnée :
// $sql = "DELETE FROM eleves WHERE nom = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["Lucas"]);

// echo "Élève supprimé 🗑️";



?>

