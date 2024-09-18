<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include('header.php'); ?>

    <!-- Section d'introduction -->
    <section id="hero">
        <div class="hero-content">
            <h1>BIENVENUE AU ZOO ARCADIA</h1>
            <p>Bienvenue sur le site officiel de notre zoo, un lieu où l’écologie et la protection animale sont au cœur de nos préoccupations. Ici, nous nous engageons à préserver la biodiversité et à offrir à nos résidents un environnement respectueux et naturel.  En visitant notre zoo, vous participez activement à nos efforts de conservation et de sensibilisation. Ensemble, protégeons notre planète et ses merveilles animales pour les générations futures.</p>
        </div>
    </section>

    <!-- Section habitats -->
    <section id="habitats">
        <h2>Nos Habitats</h2>
        <p>
            Découvrez trois habitats fascinants du zoo : la savane où règne le lion majestueux, la jungle dense abritant le puissant gorille, et les marais humides dominés par l'imposant alligator.<br><a href="Habitats.php">Ici</a></br>
        </p>
        <div class="habitats-container">
            <div class="habitat">
                <img src="assetArcadia/habitatSavane.jpg" alt="La Savane">
                <h3>La Savane</h3>
            </div>
            <div class="habitat">
                <img src="assetArcadia/habitatJungle.jpg" alt="La Jungle">
                <h3>La Jungle</h3>
            </div>
            <div class="habitat">
                <img src="assetArcadia/habitatMarais.jpg" alt="Les marais">
                <h3>Les marais</h3>
            </div>
        </div>
    </section>

    <!-- Section services -->
    <section id="services">
        <h2>Nos Services</h2>
        <p>
            Profitez de trois services incontournables du zoo : la restauration pour une pause gourmande, les visites guidées pour découvrir les secrets des animaux, et le petit train pour explorer le parc en toute tranquillité.
            <br><a href="Services.php">Ici</a></br>
        </p>
        <div class="services-container">
            <div class="service">
                <img src="assetArcadia/restaurant.jpg" alt="Restauration">
                <h3>Restauration</h3>
            </div>
            <div class="service">
                <img src="assetArcadia/guideTour.jpg" alt="Visite guidée">
                <h3>Visite guidée</h3>
            </div>
            <div class="service">
                <img src="assetArcadia/petitTrain3.png" alt="Petit train">
                <h3>Petit train</h3>
            </div>
        </div>
    </section>

    <!-- Section avis -->
    <section id="avis">
        <h2>Les avis du Zoo !</h2>
        <div class="avis-container">
            <div class="avis">
                <p>
                    <strong>Lisa</strong>:
                    <br> "Super Zoo, expérience inoubliable !"</br>
                </p>
            </div>
            <div class="avis">
                <p>
                    <strong>Augustine</strong>:<br> "Incroyable journée avec mes petits enfants, merci."</br>
                </p>
            </div>
            <div class="avis">
                <p>
                    <strong>Gabriel</strong>: <br>"Génial comme Zoo, je reviendrais !"</br>
                </p>
            </div>
        
  <!-- Bouton pour ouvrir la modale -->
  <button id="openModalBtn">Laisser un avis</button>

  <!-- Structure de la modale -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span> <!-- Bouton de fermeture (X) -->
      <h2>Laisser votre avis</h2>
      <form action="index.php" method="POST">
        <input type="email" name= "email" placeholder="E-mail" required />
       <!-- <input type="email" placeholder="Votre email" required /> -->
        <textarea name="message" placeholder="Votre message" required></textarea>
        <button type="submit">Envoyer</button>
      </form>
    </div>
  </div>
    </section>

    <!-- Footer -->
    <?php include('footer.php'); ?>
<!-- Script popup avis -->
<script src="popupAvis.js"></script>
</body>
</html>