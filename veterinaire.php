<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Veterinaire - Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
 <!-- Header -->
 <?php include('header.php'); ?>

 <div class="veterinaire-container">
        <aside class="sidebar">
            <h2>Vétérinaire</h2>
            <ul>
                <li><a href="#page-bienvenue" class="nav-link">Bienvenue</a></li>
                <li><a href="#gestion-repas" class="nav-link" data-section="gestion-repas">Gestion des Repas</a></li>
                <li><a href="#comptes-rendus-animaux" class="nav-link" data-section="comptes-rendus-animaux">Compte Rendu des Animaux</a></li>
            </ul>
            <button class="logout-btn"><a href="logout.php">Déconnexion</a></button>
        </aside>

        <!-- Contenu principal pour chaque section -->
        <main class="main-content">
            <section id="page-bienvenue" class="section.active">
<h2>Bienvenue sur votre espace</h2>
            </section>
            <!-- Section Gestion des Repas -->
            <section id="gestion-repas" class="section">
                <h2>Gestion des Repas</h2>
                <form method="POST" action="veterinaire.php?action=add_meal">
                    <label for="nom-animal">Nom de l'animal :</label>
                    <input type="text" id="nom-animal" name="nom-animal" required>
                    
                    <label for="type-repas">Type de repas :</label>
                    <input type="text" id="type-repas" name="type-repas" required>
                    
                    <button type="submit">Ajouter Repas</button>
                </form>
            </section>

            <!-- Section Comptes Rendus des Animaux -->
            <section id="comptes-rendus-animaux" class="section">
                <h2>Compte Rendu des Animaux</h2>
                <form method="POST" action="veterinaire.php?action=add_report">
                    <label for="nom-animal">Nom de l'animal :</label>
                    <input type="text" id="nom-animal" name="nom-animal" required>
                    
                    <label for="compte-rendu">Compte rendu :</label>
                    <textarea id="compte-rendu" name="compte-rendu" required></textarea>
                    
                    <button type="submit">Ajouter Compte Rendu</button>
                </form>

                <!-- Liste des comptes rendus -->
                <h3>Liste des Comptes Rendus</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Animal</th>
                            <th>Date</th>
                            <th>Vétérinaire</th>
                            <th>Compte Rendu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple d'affichage des comptes rendus -->
                        <tr>
                            <td>Simba</td>
                            <td>2024-09-01</td>
                            <td>Dr. Dupont</td>
                            <td>Examen de santé complet</td>
                        </tr>
                        <!-- D'autres comptes rendus seront affichés ici dynamiquement -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
 
 <!-- Footer -->
<?php include('footer.php'); ?>

<!-- Scripts JS pour la navigation -->
<script src="veterinaire.js"></script>
</body>
</html>