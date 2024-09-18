<?php
session_start(); // Démarre la session
// Inclure le fichier de connexion à la base de données
include('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {  // 1 pour admin
    header("Location: connexion.php");
    exit();
}

echo "Bienvenue sur la page admin !";
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

                    <tbody>

                            <td>
                                <a href="admin.php?action=edit_user&id=1">Modifier</a> |
                                <a href="admin.php?action=delete_user&id=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Gestion des services -->
            <section id="gestion-services" class="section">
                <h2>Gestion des Services</h2>
                <form method="POST" action="admin.php?action=add_service">
                    <label for="nom-service">Nom du service :</label>
                    <input type="text" id="nom-service" name="nom-service" required>

                    <label for="description-service">Description :</label>
                    <textarea id="description-service" name="description-service" required></textarea>

                    <button type="submit">Ajouter Service</button>
                </form>

                <!-- Liste des services avec actions -->
               <!-- <h3>Liste des Services</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        <!-- Exemple d'affichage de services -->
                       
                            <td>
                                <a href="admin.php?action=edit_service&id=1">Modifier</a> |
                                <a href="admin.php?action=delete_service&id=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">Supprimer</a>
                            </td>
                        
                    </tbody>
                </table>
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

                <!-- Liste des habitats avec actions 
                <h3>Liste des Habitats</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        
                            <td>
                                <a href="admin.php?action=edit_habitat&id=1">Modifier</a> |
                                <a href="admin.php?action=delete_habitat&id=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?');">Supprimer</a>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </section>

            <!-- Gestion des animaux -->
            <section id="gestion-animaux" class="section">
                <h2>Gestion des Animaux</h2>
                <form method="POST" action="admin.php?action=add_animal">
                    <label for="prenom-animal">Prénom de l'animal :</label>
                    <input type="text" id="prenom-animal" name="prenom-animal" required>

                    <label for="race-animal">Race de l'animal :</label>
                    <input type="text" id="race-animal" name="race-animal" required>

                    <label for="habitat">Habitat :</label>
                    <select id="habitat" name="habitat">
                        <!-- Liste dynamique des habitats -->
                        <option value="1">Savane</option>
                        <option value="2">Jungle</option>
                        <option value="3">Marais</option>
                    </select>

                    <button type="submit">Ajouter Animal</button>
                </form>

                    <tbody>

                            <td>
                                <a href="admin.php?action=edit_animal&id=1">Modifier</a> |
                                <a href="admin.php?action=delete_animal&id=1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">Supprimer</a>
                            </td>
                         </tr>
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
                        <!-- Plus de comptes rendus seront affichés ici avec PHP 
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
