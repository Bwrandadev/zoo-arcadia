<?php
session_start();

if (!isset($_SESSION['users_id']) || $_SESSION['role_id'] != 2) {
    header("Location: connexion.php");
    exit();
}

// Inclure le fichier de connexion à la base de données
include('db.php');
$pdo = getDBConnection();
// Vérifier si le formulaire a été soumis pour ajouter un repas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'add_meal') {
    $animal_id = $_POST['animal_id']; // ID de l'animal sélectionné
    $food_type = $_POST['food_type']; // Type de nourriture
    $quantite = $_POST['quantite']; // Quantité de nourriture donnée
    $feeding_time = $_POST['feeding_time']; // Heure du repas
    $user_id = $_SESSION['users_id']; // Utilisateur connecté (employé)

    // Insertion des données du repas dans la base de données
    $stmt = $pdo->prepare("INSERT INTO meal (animal_id, user_id, food_type, quantite, feeding_time) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$animal_id, $user_id, $food_type, $quantite, $feeding_time])) {
        echo "Repas ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du repas.";
    }
} 

// Traitement de la validation ou du rejet d'un avis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['avis_id'])) {
    $avis_id = $_POST['avis_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        // Valider l'avis
        $stmt = $pdo->prepare("UPDATE avis SET status = 'approved', validated_by = ? WHERE id = ?");
        $stmt->execute([$_SESSION['users_id'], $avis_id]);
    } elseif ($action == 'reject') {
        // Rejeter l'avis
        $stmt = $pdo->prepare("UPDATE avis SET status = 'rejected', validated_by = ? WHERE id = ?");
        $stmt->execute([$_SESSION['users_id'], $avis_id]);
    }
    header("Location: employe.php");
    exit();
}

// Récupérer les avis en attente de validation
$stmt = $pdo->prepare("SELECT * FROM avis WHERE status = 'pending'");
$stmt->execute();
$avis_en_attente = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employe - Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
 <!-- Header -->
 <?php include('header.php'); ?>
 
<div class="employee-container">
    <aside class="sidebar">
        <h2>Employé</h2>
        <ul>
            <li><a href="#gestion-services" class="nav-link" data-section="gestion-services">Gestion des Services</a></li>
            <li><a href="#gestion-repas" class="nav-link" data-section="gestion-repas">Gestion des Repas</a></li>
            <li><a href="#validation-avis" class="nav-link" data-section="validation-avis">Validation des Avis</a></li>
        </ul>
        <button class="logout-btn"><a href="logout.php">Déconnexion</a></button>
    </aside>

    <!-- Contenu principal pour chaque section -->
    <main class="main-content">

        <!-- Section Gestion des Services -->
        <section id="gestion-services" class="section active">
            <h2>Gestion des Services</h2>

            <form method="POST" action="employe.php?action=add_service">
                <label for="nom-service">Nom du service :</label>
                <input type="text" id="nom-service" name="nom-service" required>
                
                <label for="description-service">Description :</label>
                <textarea id="description-service" name="description-service" required></textarea>
                
                <button type="submit">Ajouter Service</button>
              
                <tbody>
                <?php
        $stmt = $pdo->prepare("SELECT * FROM services");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($services as $service) {
            echo "<tr>
                    <td>{$service['name']}</td>
                    <td>{$service['description']}</td>
                    <td><img src='{$service['image_url']}' alt='{$service['name']}' width='100'></td>
                    <td>
                        <a href='admin_services.php?action=edit_service&id={$service['id']}'>Modifier</a> |
                        <a href='admin_services.php?action=delete_service&id={$service['id']}' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce service ?\");'>Supprimer</a>
                    </td>
                  </tr>";
        }
        ?>
                    </tbody>                   
            </form>
        </section>

        <!--Section Gestion des Repas -->
        <section id="gestion-repas" class="section">
    <h2>Gestion des Repas</h2>
    <form method="POST" action="employe.php?action=add_meal">
        <label for="animal_id">Sélectionner l'animal :</label>
        <select id="animal_id" name="animal_id" required>
            <?php
            // Récupérer les animaux depuis la base de données pour les afficher dans la liste déroulante
            $stmt = $pdo->prepare("SELECT id, name FROM animals");
            $stmt->execute();
            $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($animals as $animal) {
                echo "<option value=\"{$animal['id']}\">{$animal['name']}</option>";
            }
            ?>
        </select>

        <label for="food_type">Type de nourriture :</label>
        <input type="text" id="food_type" name="food_type" required>

        <label for="quantite">Quantité:</label>
        <input type="number" step="0.01" id="quantite" name="quantite" required>

        <label for="feeding_time">Heure du repas :</label>
        <input type="datetime-local" id="feeding_time" name="feeding_time" required>

        <button type="submit">Ajouter Repas</button>
    </form>
</section>

        <!-- Section Validation des Avis -->
        <section id="validation-avis" class="section">
    <h2>Validation des Avis</h2>

    <!-- Afficher les avis en attente -->
    <?php if (count($avis_en_attente) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date de soumission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avis_en_attente as $avis): ?>
                    <tr>
                        <td><?= $avis['id']; ?></td>
                        <td><?= $avis['email']; ?></td>
                        <td><?= $avis['message']; ?></td>
                        <td><?= $avis['created_at']; ?></td>
                        <td>
                            <form method="POST" action="employe.php?action=validate_review">
                                <input type="hidden" name="avis_id" value="<?= $avis['id']; ?>">
                                <button type="submit" name="action" value="approve">Valider</button>
                                <button type="submit" name="action" value="reject">Invalider</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun avis en attente de validation.</p>
    <?php endif; ?>
</section>
    </main>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>

<!-- Scripts JS pour la navigation -->
<script src="employe.js"></script>
</body>
</html>