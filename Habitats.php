<?php
// Extraire les variables de DATABASE_URL
$db_url = getenv("DATABASE_URL");
$db = parse_url($db_url);

// Configuration de la connexion PostgreSQL
$host = $db["host"];
$port = $db["port"];
$user = $db["user"];
$password = $db["pass"];
$dbname = ltrim($db["path"], "/");

// Connexion à PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erreur : Impossible de se connecter à la base de données PostgreSQL.\n";
    exit;
}

// Récupération des habitats
$result = pg_query($conn, "SELECT * FROM habitats");
$habitats = pg_fetch_all($result);

// Récupération des animaux par habitat
$animals_by_habitat = [];
$animal_result = pg_query($conn, "SELECT * FROM animals");
if ($animal_result) {
    while ($animal = pg_fetch_assoc($animal_result)) {
        $animals_by_habitat[$animal['habitat_id']][] = $animal;
    }
}

// Fermeture de la connexion
pg_close($conn);
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
                        <a href="increment_click.php?id=<?php echo $animal['id']; ?>">
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
