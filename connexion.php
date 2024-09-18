<?php
session_start();
ob_start(); // Démarre le buffering

// Inclure le fichier de connexion à la base de données
include('db.php');

// Vérifier si le formulaire est soumis via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Débogage pour vérifier les résultats de la requête SQL
        var_dump($user);  // Cela affichera les données récupérées pour l'utilisateur

        // Vérification des informations utilisateur
        if ($user && password_verify($password, $user['password'])) {
            // Stocker les informations dans la session
            $_SESSION['users_id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];
        
            // Afficher les informations stockées dans la session
            var_dump($_SESSION);
        
            // Redirection selon le rôle
            if ($user['role_id'] == 1) {
                header("Location: admin.php");
                exit();
            } elseif ($user['role_id'] == 2) {
                header("Location: employe.php");
                exit();
            } elseif ($user['role_id'] == 5) {
                header("Location: veterinaire.php");
                exit();
            }
        } else {
            echo "Identifiants incorrects.";
        }
    } catch (Exception $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
ob_end_flush(); // Arrêter le buffering
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Section connexion -->
    <div class="connexion-container">
        <div class="login-container">
            <h2>Espace de connexion</h2>
            
            <!-- Début du formulaire -->
            <form action="connexion.php" method="POST">
                <!-- Champ E-mail -->
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre adresse mail" required>
                
                <!-- Champ Mot de passe -->
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                
                <!-- Bouton d'envoi -->
                <button type="submit">Connexion</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>