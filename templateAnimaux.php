<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux de l'Habitat</title>

    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<!-- Header -->
<?php include('header.php'); ?>

<body class="bg-dark text-light">
    <p><a href="Habitats.php">< Habitats</a></p>
    <div class="container text-center">
        <div class="row justify-content-center">
            <?php foreach ($animaux as $animal) : ?>
                <div class="col-md-4">
                    <div class="animal-card">
                        <!-- Image de l'animal -->
                        <img src="<?php echo $animal['image_url']; ?>" alt="<?php echo $animal['name']; ?>">

                        <!-- Bouton pour afficher la description -->
                        <button class="btn btn-success" onclick="toggleDescription('<?php echo $animal['id']; ?>')">
                            En savoir plus
                        </button>

                        <!-- Descript en plusieurs sections -->
                        <div id="<?php echo $animal['id']; ?>" class="animal-description" style="display:none;">
                            <ul>
                                <li><strong>Espèce :</strong> <?php echo $animal['espece']; ?></li>
                                <li><strong>Habitat :</strong> <?php echo $animal['habitat_id']; ?></li>
                                <li><strong>État de l'animal :</strong> <?php echo $animal['etat']; ?></li>
                                <li><strong>Avis du vétérinaire :</strong> <?php echo $animal['vet_comm']; ?></li>
                                <li><strong>Nourriture proposée :</strong> <?php echo $animal['food']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script pour afficher/masquer la description -->
    <script>
        function toggleDescription(id) {
            const description = document.getElementById(id);
            description.style.display = description.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>