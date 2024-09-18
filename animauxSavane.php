<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux Savane Arcadia</title>
    <link rel="stylesheet" href="style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">    
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include('header.php'); ?>
<!-- Section description animaux  -->
    <div class="container-text-center">
        <div class="row justify-content-center">
            <!-- Carte de Simba -->
            <div class="col-md-4">
                <div class="animal-card">
                    <img src="assetArcadia/Simba.jpg" alt="Lion">        
                    <button class="btn btn-success" onclick="toggleDescription('simba-desc')">Simba</button>
                    <div id="simba-desc" class="animal-description">
                        <ul>
                            <li> <strong>Espèce :</strong>
                            <p>Lion d'Afrique (Panthera leo)</p>
                        </li>
                        <li> <strong>Habitat :</strong>
                            <p>Les lions d'Afrique se trouvent principalement dans les savanes, les prairies ouvertes, et parfois dans des forêts denses à travers l'Afrique subsaharienne.</p>
                        </li>
        

                        <li> <strong>État de l'animal :</strong>
                            <p>Ce lion est en bonne santé et présente un comportement actif et curieux. Il est bien intégré dans son groupe et manifeste des interactions sociales normales, telles que le toilettage et le jeu. Les observations récentes montrent qu'il maintient un niveau d'énergie approprié pour son âge et son sexe. </p>
                        </li>
                        

                        <li> <strong>Avis du vétérinaire :</strong>
                            <p>Lors du dernier examen vétérinaire, le lion a été trouvé en excellente condition physique. Son pelage est épais et sain, ses yeux sont clairs, et ses dents sont en bon état. 
                            Des vaccinations de routine et des contrôles parasitaires sont effectués pour maintenir sa santé optimale.</p>
                        </li>
                        

                        <li> <strong>Nourriture proposé :</strong>
                            <p>Le régime alimentaire du lion se compose principalement de viande de haute qualité, incluant du bœuf, du poulet, et du lapin, pour imiter autant que possible son régime naturel de carnivore. Des jours de jeûne occasionnels sont intégrés pour simuler les périodes sans proie, comme cela se produirait dans la nature, et pour stimuler le comportement de chasse. </p>
                        </li>
                        </ul>                       
                    </div>
                </div>
            </div>

            <!-- Carte de Sophie -->
            <div class="col-md-4">
                <div class="animal-card">
                    <img src="assetArcadia/sophie.jpg" alt="Girafe">
                    <button class="btn btn-success" onclick="toggleDescription('sophie-desc')">Sophie 
                    </button>
                    <div id="sophie-desc" class="animal-description">
                    <ul>
                            <li> <strong>Espèce :</strong>
                            <p>Girafe (Giraffa camelopardalis)</p>
                        </li>
                        <li> <strong>Habitat :</strong>
                            <p>Les girafes habitent les savanes et les prairies d'Afrique de l'Est et du Sud. Elles préfèrent les zones avec une végétation clairsemée où elles peuvent atteindre facilement les feuilles des arbres grâce à leur grande taille. 
                            </p>
                        </li>
        
                        <li> <strong>État de l'animal :</strong>
                            <p>Cette girafe est en bonne santé et montre un comportement actif et curieux. Elle est bien intégrée dans son groupe social et manifeste des comportements normaux tels que le toilettage mutuel et l'exploration de son enclos. Sa posture est droite et elle se nourrit régulièrement de feuillage et de branches.</p>
                        </li>
                        
                        <li> <strong>Avis du vétérinaire :</strong>
                            <p>Lors du dernier examen vétérinaire, la girafe a été trouvée en excellent état de santé. Son pelage est propre et ses pattes sont en bonne condition. </p>
                        </li>
                        
                        <li> <strong>Nourriture proposé :</strong>
                            <p>Le régime alimentaire de la girafe comprend principalement des feuilles d'arbres tels que l'acacia, des branches, et des fruits frais. Elle reçoit également des suppléments nutritionnels pour s'assurer qu'elle obtient tous les minéraux et vitamines nécessaires.</p>
                        </li>
                        </ul>                       
                    </div>
                </div>
            </div>

            <!-- Carte de Dumbo -->
            <div class="col-md-4">
                <div class="animal-card">
                    <img src="assetArcadia/dumbo2.jpg" alt="Dumbo">
                    <button class="btn btn-success" onclick="toggleDescription('dumbo-desc')">Dumbo</button>
                    <div id="dumbo-desc" class="animal-description">
                    <ul>
                            <li> <strong>Espèce :</strong>
                            <p>Éléphant d'Afrique (Loxodonta africana)</p>
                        </li>
                        <li> <strong>Habitat :</strong>
                            <p>Les éléphants d'Afrique vivent principalement dans les savanes, les forêts clairsemées, et les zones semi-désertiques d'Afrique subsaharienne. </p>
                        </li>
        

                        <li> <strong>État de l'animal :</strong>
                            <p>Cet éléphant est en bonne santé et s'adapte bien à son environnement au zoo. Il montre des comportements sociaux typiques et interagit régulièrement avec les autres membres de son groupe.</p>
                        </li>
                        

                        <li> <strong>Avis du vétérinaire :</strong>
                            <p>L'éléphant est en excellent état physique. Ses dents et ses pieds sont surveillés régulièrement pour prévenir les problèmes courants chez les éléphants captifs. Il reçoit des soins dentaires et des bains réguliers pour entretenir sa peau. Aucune condition médicale préoccupante n'a été détectée lors des derniers examens.</p>
                        </li>
                        

                        <li> <strong>Nourriture proposé :</strong>
                            <p>L'alimentation quotidienne de l'éléphant comprend du foin, des branches, des fruits et légumes frais, ainsi que des suppléments minéraux pour garantir un apport nutritionnel équilibré. Les éléphants ont également accès à des blocs de sel pour combler leurs besoins en minéraux.</p>
                        </li>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include('footer.php'); ?>     
    
    <!-- Lien vers Bootstrap JS et Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fonction pour afficher/masquer la description de l'animal
        function toggleDescription(id) {
            const description = document.getElementById(id);
            description.style.display = description.style.display === 'block' ? 'none' : 'block';
        }
    </script>    

</body>
</html>