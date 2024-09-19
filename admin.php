<?php
session_start();
if (!isset($_SESSION['users_id']) || $_SESSION['role_id'] != 1) {
    header("Location: connexion.php");
    exit();
}

include('db.php');
$pdo = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] == 'add_user') {
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Définir un mot de passe aléatoire
    $password = bin2hex(random_bytes(4)); // Crée un mot de passe aléatoire de 8 caractères
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $role_id = ($role == 'employe') ? 2 : 5; 

    try {
        // Insertion du nouvel utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (email, password, role_id) VALUES (?, ?, ?)");
        $stmt->execute([$email, $hashed_password, $role_id]);

        // Envoyer l'email avec uniquement le username (email)
        $to = $email;
        $subject = "Création de votre compte utilisateur";
        $message = "Votre compte a été créé avec succès. Votre username est : $email. Veuillez contacter l'administrateur pour obtenir votre mot de passe.";
        $headers = "From: admin@zooarcadia.com";  // Change par ton adresse e-mail

        if (mail($to, $subject, $message, $headers)) {
            echo "Utilisateur créé avec succès et email envoyé.";
        } else {
            echo "Utilisateur créé mais l'envoi de l'email a échoué.";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
    }
}
// Récupérer tous les animaux depuis la table
$stmt = $pdo->prepare("SELECT * FROM animals");
$stmt->execute();
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Gestion de la suppression d'un animal
if (isset($_GET['action']) && $_GET['action'] === 'delete_animal' && isset($_GET['id'])) {
    $animal_id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM animals WHERE id = ?");
    if ($stmt->execute([$animal_id])) {
        echo "Animal supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'animal.";
    }

    header("Location: admin.php#gestion-animaux");
    exit();
}

// Gestion de la modification d'un animal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'edit_animal') {
    $animal_id = $_POST['id'];
    $name = $_POST['name'];
    $espece = $_POST['espece'];
    $habitat_id = $_POST['habitat_id'];
    $etat = $_POST['etat'];
    $vet_comm = $_POST['vet_comm'];
    $food = $_POST['food'];
    $image_url = $_POST['image_url'];

    // Mise à jour de l'animal dans la base de données
    $stmt = $pdo->prepare("UPDATE animals SET name = ?, espece = ?, habitat_id = ?, etat = ?, vet_comm = ?, food = ?, image_url = ? WHERE id = ?");
    if ($stmt->execute([$name, $espece, $habitat_id, $etat, $vet_comm, $food, $image_url, $animal_id])) {
        echo "Animal modifié avec succès.";
    } else {
        echo "Erreur lors de la modification de l'animal.";
    }

    header("Location: admin.php#gestion-animaux");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
 <!-- Header -->
 <?php include('header.php'); ?>
 <div class="admin-container">
        <aside class="sidebar">
            <h2>Administrateur</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#gestion-utilisateurs">Gestion des Utilisateurs</a></li>
                <li><a href="#gestion-services">Gestion des Services</a></li>
                <li><a href="#gestion-habitats">Gestion des Habitats</a></li>
                <li><a href="#gestion-animaux">Gestion des Animaux</a></li>
                <li><a href="#comptes-rendus-veterinaires">Compte rendu des Animaux</a></li>
            </ul>
            <button class="logout-btn"><a href="logout.php">Déconnexion</a></button>
        </aside>

        <!-- Contenu principal pour chaque section -->
        <main class="main-content">
            <!-- Section Dashboard -->
            <section id="dashboard" class="section active">
                <h2>Dashboard</h2>
                <p>Bienvenue dans le tableau de bord de gestion du Zoo. Voici les statistiques actuelles :</p>
                <!-- Statistiques simplifiées -->
                <ul>
                    <li>Nombre d'utilisateurs : 20</li>
                    <li>Nombre de services : 5</li>
                    <li>Nombre d'habitats : 8</li>
                    <li>Nombre d'animaux : 35</li>
                </ul>
            </section>

            <!-- Gestion des utilisateurs -->
            <section id="gestion-utilisateurs" class="section">
                <h2>Gestion des Utilisateurs</h2>
                <form method="POST" action="admin.php?action=add_user">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Entre l'adresse mail à ajouter"required>

                    <label for="role">Rôle :</label>
                    <select id="role" name="role">
                        <option value="employe">Employé</option>
                        <option value="veterinaire">Vétérinaire</option>
                    </select>

                    <button type="submit">Créer utilisateur</button>
                </form>
                <?php
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= ($user['role_id'] == 2) ? 'Employé' : 'Vétérinaire'; ?></td>
            <td>
                <a href="admin.php?action=edit_user&id=<?= $user['id'] ?>">Modifier</a> |
                <a href="admin.php?action=delete_user&id=<?= $user['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
            </section>

            <!-- Gestion des services -->
            <section id="gestion-services" class="section">
    <h2>Gestion des Services</h2>
    <form method="POST" action="admin_services.php?action=add_service" enctype="multipart/form-data">
        <label for="name">Nom du service :</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <label for="image">Image du service :</label>
        <input type="file" id="image" name="image" required>

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
            <!-- Gestion des habitats -->
            <section id="gestion-habitats" class="section">
                <h2>Gestion des Habitats</h2>
                <form method="POST" action="admin.php?action=add_habitat">
                    <label for="nom-habitat">Nom de l'Habitat :</label>
                    <input type="text" id="nom-habitat" name="nom-habitat" required>

                    <label for="description-habitat">Description :</label>
                    <textarea id="description-habitat" name="description-habitat" required></textarea>

                    <button type="submit">Ajouter Habitat</button>
                    
                </form>


            </section>

            <!-- Gestion des animaux -->
            <section id="gestion-animaux" class="section">
                <h2>Gestion des Animaux</h2>
                <form method="POST" action="admin.php?action=add_animal" enctype="multipart/form-data">
        <label for="name">Nom de l'animal :</label>
        <input type="text" id="name" name="name" required>

        <label for="espece">Espèce :</label>
        <input type="text" id="espece" name="espece" required>

        <label for="habitat_id">Habitat :</label>
        <select id="habitat_id" name="habitat_id" required>
            <option value="Jungle">Jungle</option>
            <option value="Marais">Marais</option>
            <option value="Savane">Savane</option>
        </select>

        <label for="etat">État de l'animal :</label>
        <textarea id="etat" name="etat" required></textarea>

        <label for="vet_comm">Commentaire du vétérinaire :</label>
        <textarea id="vet_comm" name="vet_comm" required></textarea>

        <label for="food">Nourriture :</label>
        <textarea id="food" name="food" required></textarea>

        <label for="image_url">Image :</label>
        <input type="file" id="image_url" name="image_url" required>

        <button type="submit">Ajouter Animal</button>
    </form>

    <h3>Liste des Animaux</h3>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Espèce</th>
                <th>Habitat</th>
                <th>État</th>
                <th>Commentaire Vétérinaire</th>
                <th>Nourriture</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animals as $animal) : ?>
            <tr>
                <td><?= htmlspecialchars($animal['name']); ?></td>
                <td><?= htmlspecialchars($animal['espece']); ?></td>
                <td><?= htmlspecialchars($animal['habitat_id']); ?></td>
                <td><?= htmlspecialchars($animal['etat']); ?></td>
                <td><?= htmlspecialchars($animal['vet_comm']); ?></td>
                <td><?= htmlspecialchars($animal['food']); ?></td>
                <td><img src="<?= htmlspecialchars($animal['image_url']); ?>" alt="<?= htmlspecialchars($animal['name']); ?>" width="100"></td>
                <td>
                    <a href="admin.php?action=edit_animal&id=<?= $animal['id']; ?>">Modifier</a> |
                    <a href="admin.php?action=delete_animal&id=<?= $animal['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </section>
   
     <!-- Section Comptes Rendus Vétérinaires -->
     <section id="comptes-rendus-veterinaires" class="section">
                <h2>Comptes Rendus Vétérinaires</h2>
                <form method="GET" action="admin.php?action=filter_reports">
                    <label for="filter-animal">Filtrer par animal :</label>
                    <input type="text" id="filter-animal" name="filter-animal" placeholder="Nom de l'animal">

                    <label for="filter-date">Filtrer par date :</label>
                    <input type="date" id="filter-date" name="filter-date">

                    <button type="submit">Appliquer les filtres</button>
                </form>

                <!-- Liste des comptes rendus -->
                <h3>Liste des Comptes Rendus</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Animal</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Vétérinaire</th>
                            <th>Compte Rendu</th>
                        </tr>
                    </thead>
                   <!-- <tbody>
                        <!-- Exemple d'affichage des comptes rendus -->
                        <tr>
                            <td>Simba</td>
                            <td>2024-09-01</td>
                            <td>14:24:32 s</td>
                            <td>Dr. Dupont</td>
                            <td>Examen de santé complet</td>
                        </tr>
        
                    </tbody> -->
                </table>
            </section>
       
    </div>
    </main>
 <!-- Footer -->
 <?php include('footer.php'); ?>
    <!-- Scripts JS pour la navigation -->
    <script src="admin.js"></script>
</body>
</html>