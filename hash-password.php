<?php
// Le mot de passe en clair que tu veux hacher
$mot_de_passe_clair = 'zooadmin';

// Utilisation de password_hash pour créer un mot de passe haché
$mot_de_passe_hache = password_hash($mot_de_passe_clair, PASSWORD_DEFAULT);

// Afficher ou stocker le mot de passe haché dans la base de données
echo $mot_de_passe_hache;
?>