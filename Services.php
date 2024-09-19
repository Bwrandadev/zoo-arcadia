<?php
include('db.php');
$pdo = getDBConnection();

$stmt = $pdo->prepare("SELECT * FROM services");
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
     <!-- Header -->
     <?php include('header.php'); ?>

<!-- Section services -->
<section id="services-section">
        <?php foreach ($services as $service): ?>
        <section class="services-descript">
            <!-- Affichage dynamique de l'image -->
            <img src="<?= htmlspecialchars($service['image_url']); ?>" alt="<?= htmlspecialchars($service['name']); ?>" class="services-descript-img">
            <div class="bloc-services">
                <!-- Affichage dynamique du titre et de la description -->
                <h1 class="services-title"><?= htmlspecialchars($service['name']); ?></h1>
                <p class="services-descript-text"><?= htmlspecialchars($service['description']); ?></p>
            </div>
        </section>
        <?php endforeach; ?>
    </section>
      <!-- Footer -->
      <?php include('footer.php'); ?>
</body>
</html>