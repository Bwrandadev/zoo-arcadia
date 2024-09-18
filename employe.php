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

            <form method="POST" action="employee.php?action=add_service">
                <label for="nom-service">Nom du service :</label>
                <input type="text" id="nom-service" name="nom-service" required>
                
                <label for="description-service">Description :</label>
                <textarea id="description-service" name="description-service" required></textarea>
                
                <button type="submit">Ajouter Service</button>
              
                <tbody>
                        <!-- Exemple d'affichage de services -->
                       
                            <td>
                                <a href="admin.php?action=edit_service&id=1">Modifier</a> 
                                <a href="admin.php?action=delete_service&id=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">Supprimer</a>
                            </td>
                    </tbody>
                   
            </form>
        </section>

        <!-- Section Gestion des Repas -->
        <section id="gestion-repas" class="section">
            <h2>Gestion des Repas</h2>
            <form method="POST" action="employee.php?action=add_meal">
                <label for="nom-animal">Nom de l'animal :</label>
                <input type="text" id="nom-animal" name="nom-animal" required>
                
                <label for="type-repas">Type de repas :</label>
                <input type="text" id="type-repas" name="type-repas" required>
                
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

<!-- Pied de page -->
<?php include('footer.php'); ?>

<!-- Scripts JS pour la navigation -->
<script src="employe.js"></script>
</body>
</html>