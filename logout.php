<?php
session_start(); // Démarre la session

// Détruit toutes les variables de session pour déconnecter l'utilisateur
session_destroy(); 

// Redirige l'utilisateur vers la page de connexion
header("Location: connexion.php");
exit();