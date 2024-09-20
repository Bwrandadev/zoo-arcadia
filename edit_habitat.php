<?php
include('db.php'); // Connexion à la base de données
$pdo = getDBConnection();

// Récupérer l'habitat à modifier
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
    $stmt->execute([$id]);
    $habitat = $stmt->fetch();

    if (!$habitat) {
        die("Habitat non trouvé.");
    }
} else {
    die("Aucun ID d'habitat fourni.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Habitat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier l'Habitat</h1>

    <form action="admin_habitat.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $habitat['id']; ?>">
        
        <label for="nom">Nom de l'habitat :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($habitat['nom']); ?>" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($habitat['description']); ?></textarea><br>

        <label for="image_url">URL de l'image :</label>
        <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($habitat['image_url']); ?>" required><br>

        <button type="submit" name="action" value="modifier">Modifier l'habitat</button>
    </form>

    <a href="admin.php#gestion-habitats">Retour à la gestion des habitats</a>
</body>
</html>