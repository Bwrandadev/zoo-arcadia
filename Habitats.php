<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitats Zoo Arcadia</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
     <!-- Header -->
     <?php include('header.php'); ?>
<!-- Section images habitats-->
<div class="habitat-title">
        <h1>Nos Habitats</h1>
    </div>
 <section class="habitats-section">
 <div class="habitat">
        <img src="assetArcadia/habitatSavane.jpg" alt="La savane" class="habitat-image">
        <p class="habitat-description">
            La savane est une vaste étendue de prairies et d'arbres épars. C'est le royaume des grands mammifères tels que les éléphants, les lions et les girafes, qui y cohabitent en harmonie avec des herbivores de toutes tailles.
        </p>
        <p class="intro">"Découvrez votre animal préféré !"</p>
        <div class="animal-icons">
            <a href="savane.php">
            <img src="assetArcadia/sophie.jpg" alt="Girafe">
            </a>
            <a href="savane.php">
            <img src="assetArcadia/Simba.jpg" alt="Lion">
            </a>
            <a href="savane.php">
            <img src="assetArcadia/dumbo2.jpg" alt="Elephanteau">
            </a>
        </div>
    </div>

    <div class="habitat">
        <img src="assetArcadia/habitatJungle.jpg" alt="La jungle" class="habitat-image">
        <p class="habitat-description">
            La jungle est un habitat luxuriant et dense, abritant une incroyable diversité d'animaux. Les singes, les oiseaux colorés et les serpents y vivent au milieu d'une végétation épaisse, où ils trouvent refuge et nourriture.
        </p>
        <p class="intro">"Découvrez votre animal préféré !"</p>
        <div class="animal-icons">
            <a href="jungle.php">
            <img src="assetArcadia/pepito.jpg" alt="Ara jaune et bleu">
            </a>
            <a href="jungle.php">
            <img src="assetArcadia/kaa.jpg" alt="Python vert">
            </a>
            <a href="jungle.php">
            <img src="assetArcadia/kala.jpg" alt="Gorille">
            </a>
        </div>
    </div>

    <div class="habitat">
        <img src="assetArcadia/habitatMarais.jpg" alt="Les marais" class="habitat-image">
        <p class="habitat-description">
            Les marais sont des zones humides regorgeant de vie. Vous y rencontrerez des oiseaux aquatiques,des des reptiles, des amphibiens et des rongeurs qui prospèrent dans cet environnement riche en eau et végétation.
        </p>
        <p class="intro">"Découvrez votre animal préféré !"</p>
        <div class="animal-icons">
            <a href="marais.php">
            <img src="assetArcadia/donatello.jpg" alt="Tortue">
            </a>
            <a href="marais.php">
            <img src="assetArcadia/flamingo.jpg" alt="Flamant rose">
            </a>
            <a href="marais.php">
            <img src="assetArcadia/gator.jpg" alt="Alligator">
            </a>
        </div>
    </div>
 </section>
 <!-- Footer -->
  <?php include('footer.php')?>
</body>
</html>
