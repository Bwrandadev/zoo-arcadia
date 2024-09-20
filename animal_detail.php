<?php
include('db.php'); 
$pdo = getDBConnection();

// Vérifier si l'ID de l'animal est passé dans l'URL
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$animal) {
        die("Animal non trouvé.");
    }
} else {
    die("Aucun ID d'animal fourni.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'animal - <?php echo htmlspecialchars($animal['name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Conteneur principal -->
    <div class="animal-detail-container">
        <!-- Image de l'animal -->
        <div class="animal-image">
            <img src="<?php echo htmlspecialchars($animal['image_url']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
        </div>

        <!-- Informations de l'animal -->
        <div class="animal-info">
            <h1><?php echo htmlspecialchars($animal['name']); ?></h1>
            <p><strong>Espèce :</strong> <?php echo htmlspecialchars($animal['espece']); ?></p>
            <p><strong>État :</strong> <?php echo htmlspecialchars($animal['etat']); ?></p>
            <p><strong>Nourriture :</strong> <?php echo htmlspecialchars($animal['food']); ?></p>
            <p><strong>Commentaire vétérinaire :</strong> <?php echo htmlspecialchars($animal['vet_comm']); ?></p>
        
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>