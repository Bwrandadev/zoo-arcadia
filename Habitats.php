<?php
include('db.php');
$pdo = getDBConnection();

// Récupérer tous les habitats
$stmt = $pdo->prepare("SELECT * FROM habitats");
$stmt->execute();
$habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer tous les animaux
$stmt = $pdo->prepare("SELECT * FROM animals");
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Organiser les animaux par habitat
$animals_by_habitat = [];
foreach ($animals as $animal) {
    $animals_by_habitat[$animal['habitat_id']][] = $animal;
}
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Habitats Zoo Arcadia</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <!-- Header -->
        <?php include('header.php'); ?>
    <!-- Section images habitats-->
    <div class="habitat-title">
            <h1>Nos Habitats</h1>
        </div>
        
    <section class="habitats-section">
    <?php foreach ($habitats as $habitat): ?>
    <div class="habitat">
        <h2><?php echo htmlspecialchars($habitat['nom']); ?></h2>
        <p><?php echo htmlspecialchars($habitat['description']); ?></p>
        <img src="<?php echo htmlspecialchars($habitat['image_url']); ?>" alt="<?php echo htmlspecialchars($habitat['nom']); ?>" class="habitat-image">

        <p class="intro">"Découvrez votre animal préféré !"</p>
        <div class="animal-icons">
            <?php if (!empty($animals_by_habitat[$habitat['id']])): ?>
                <?php foreach ($animals_by_habitat[$habitat['id']] as $animal): ?>
                <a href="animal_detail.php?id=<?php echo $animal['id']; ?>">
                    <img src="<?php echo htmlspecialchars($animal['image_url']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
                </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun animal dans cet habitat pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
</section>
    <!-- Footer -->
    <?php include('footer.php'); ?>
    </body>
    </html>
