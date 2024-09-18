<?php

// Liste des animaux avec des descriptions spécifiques organisées en sections // 
$animaux = [
// ---------- Sophie card ------------------ //
    [
        'id' => 'girafe',
        'nom' => 'Sophie',
        'image' => 'assetArcadia/sophie.jpg',
        'description' => [
            'espèce' => 'Girafe (Giraffa camelopardalis)',
            'habitat' => 'Les girafes habitent les savanes et les prairies d\'Afrique de l\'Est et du Sud. Elles préfèrent les zones avec une végétation clairsemée où elles peuvent atteindre facilement les feuilles des arbres grâce à leur grande taille.',
            'etat' => 'Cette girafe est en bonne santé et montre un comportement actif et curieux. Elle est bien intégrée dans son groupe social et manifeste des comportements normaux tels que le toilettage mutuel et l\'exploration de son enclos.',
            'avis' => 'Lors du dernier examen vétérinaire, la girafe a été trouvée en excellent état de santé. Son pelage est propre et ses pattes sont en bonne condition.',
            'nourriture' => 'Le régime alimentaire de la girafe comprend principalement des feuilles d\'arbres tels que l\'acacia, des branches, et des fruits frais. Elle reçoit également des suppléments nutritionnels.'
        ]
        ],

    // ---------- Simba card ------------------ //
    [
        'id' => 'lion',
        'nom' => 'Simba',
        'image' => 'assetArcadia/Simba.jpg',
        'description' => [
            'espèce' => 'Lion (Panthera leo)',
            'habitat' => 'Les lions d\'Afrique se trouvent principalement dans les savanes, les prairies ouvertes, et parfois dans des forêts denses à travers l\'Afrique subsaharienne.',
            'etat' => 'Ce lion est en bonne santé et présente un comportement actif et curieux. Il est bien intégré dans son groupe et manifeste des interactions sociales normales, telles que le toilettage et le jeu. Les observations récentes montrent qu\il maintient un niveau d\'énergie approprié pour son âge et son sexe.',
            'avis' => 'Lors du dernier examen vétérinaire, le lion a été trouvé en excellente condition physique. Son pelage est épais et sain, ses yeux sont clairs, et ses dents sont en bon état. 
            Des vaccinations de routine et des contrôles parasitaires sont effectués pour maintenir sa santé optimale.',
            'nourriture' => 'Le régime alimentaire du lion se compose principalement de viande de haute qualité, incluant du bœuf, du poulet, et du lapin, pour imiter autant que possible son régime naturel de carnivore. Des jours de jeûne occasionnels sont intégrés pour simuler les périodes sans proie, comme cela se produirait dans la nature, et pour stimuler le comportement de chasse. Des os charnus sont é',
        ]
    ],
     // ----------- Dumbo card (Éléphant) ---------------
     [
        'id' => 'elephant',
        'nom' => 'Dumbo',
        'image' => 'assetArcadia/dumbo2.jpg',
        'description' => [
            'espèce' => 'Éléphant d\'Afrique (Loxodonta africana)',
            'habitat' => 'Les éléphants d\'Afrique vivent principalement dans les savanes, les forêts clairsemées, et les zones semi-désertiques d\'Afrique subsaharienne. ',
            'etat' => 'Cet éléphant est en bonne santé et s\'adapte bien à son environnement au zoo. Il montre des comportements sociaux typiques et interagit régulièrement avec les autres membres de son groupe.',
            'avis' => 'L\'éléphant est en excellent état physique. Ses dents et ses pieds sont surveillés régulièrement pour prévenir les problèmes courants chez les éléphants captifs. Il reçoit des soins dentaires et des bains réguliers pour entretenir sa peau. Aucune condition médicale préoccupante n\'a été détectée lors des derniers examens.',
            'nourriture' => 'L\'alimentation quotidienne de l\'éléphant comprend du foin, des branches, des fruits et légumes frais, ainsi que des suppléments minéraux pour garantir un apport nutritionnel équilibré. Les éléphants ont également accès à des blocs de sel pour combler leurs besoins en minéraux.',
        ]
    ]
];

include 'templateAnimaux.php';
?>