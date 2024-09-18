<?php
// Inclure le fichier de connexion à la base de données
include('db.php');
$pdo = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    // Valider les données (tu peux ajouter plus de validation si nécessaire)
    if (!empty($email) && !empty($titre) && !empty($message)) {
        try {
            // Insérer les données dans la base de données
            $stmt = $pdo->prepare("INSERT INTO contact_messages (email, titre, message) VALUES (?, ?, ?)");
            $stmt->execute([$email, $titre, $message]);

            echo "Message envoyé avec succès !";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi du message : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
 <!-- Header -->
     <?php include('header.php'); ?>
<!-- Section contact -->
<div class="contact-container">
    <div class="form-container">
        <h2>Formulaire de contact</h2>
        
        <!-- Début du formulaire -->
        <form action="traitement.php" method="POST">
            <!-- Champ E-mail -->
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre adresse mail" required>
            
            <!-- Champ Titre -->
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" placeholder="Ajoutez un titre à votre demande" required>
            
            <!-- Champ Message -->
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Tapez votre message" required></textarea>
            
            <!-- Bouton d'envoi -->
            <button type="submit">Envoyer</button>
        </form>
    </div>
    </div>
 <!-- footer -->
     <?php include('footer.php'); ?>     
</body>
</html>