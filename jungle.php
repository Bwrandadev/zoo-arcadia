<?php

// Liste des animaux avec des descriptions spécifiques organisées en sections // 
$animaux = [
// ---------- Kaa card ------------------ //
    [
        'id' => 'python',
        'nom' => 'Kaa',
        'image' => 'assetArcadia/kaa.jpg',
        'description' => [
            'espèce' => ' Python Vert (Morelia viridis)',
            'habitat' => 'Originaire des forêts tropicales de Nouvelle-Guinée et du nord de l\'Australie, il vit principalement dans les arbres, préférant les environnements humides et chauds.',
            'etat' => 'Notre python vert se porte bien et s\'adapte parfaitement à son environnement recréé au zoo, avec des branches et une humidité contrôlée pour imiter son habitat naturel.',
            'avis' => 'Le python vert est en excellente santé, avec un comportement alimentaire normal et aucune indication de stress ou de maladie.',
            'nourriture' => 'L\'alimentation quotidienne de l\'éléphant comprend du foin, des branches, des fruits et légumes frais, ainsi que des suppléments minéraux pour garantir un apport nutritionnel équilibré. Les éléphants ont également accès à des blocs de sel pour combler leurs besoins en minéraux.'
        ]
        ],

    // ---------- Pépito card ------------------ //
    [
        'id' => 'ara',
        'nom' => 'Pépito',
        'image' => 'assetArcadia/pepito.jpg',
        'description' => [
            'espèce' => 'Ara Jaune et Bleu (Ara ararauna)',
            'habitat' => 'Originaire des forêts tropicales d\'Amérique du Sud, l\'ara jaune et bleu vit dans les zones humides près des rivières et marécages, souvent en grandes volées.',
            'etat' => 'Cet ara jaune et bleu se porte très bien dans son habitat spécialement conçu, qui offre de nombreuses perches et un environnement enrichi pour encourager son comportement naturel de vol et d\'exploration.',
            'avis' => 'Le vétérinaire confirme que l\'ara est en bonne santé, avec des plumes brillantes et un comportement actif. Des examens réguliers montrent qu\'il est en excellent état général.',
            'nourriture' => 'Le vétérinaire confirme que l\'ara est en bonne santé, avec des plumes brillantes et un comportement actif. Des examens réguliers montrent qu\'il est en excellent état général.',
        ]
    ],
     // ----------- Kala card ---------------
     [
        'id' => 'gorille',
        'nom' => 'Kala',
        'image' => 'assetArcadia/kala.jpg',
        'description' => [
            'espèce' => ' Gorille Femelle (Gorilla gorilla)',
            'habitat' => 'Les gorilles vivent dans les forêts tropicales et les montagnes d\'Afrique centrale. Ils préfèrent les zones riches en végétation où ils peuvent trouver des feuilles, des fruits et des pousses à consommer.',
            'etat' => 'Notre femelle gorille est bien adaptée à son enclos, qui recrée son habitat naturel avec de nombreux espaces pour grimper et explorer. Elle s\'est récemment cassé une dent, mais cela n\'affecte pas son comportement global ni son appétit.',
            'avis' => 'Le vétérinaire a examiné la dent cassée de la gorille et a confirmé que cela ne pose pas de problème majeur pour sa santé. Un suivi est en cours pour s\'assurer qu\'il n\'y a pas de douleur ou d\'infection, et des ajustements alimentaires temporaires ont été faits pour faciliter sa mastication.',
            'nourriture' => 'Elle est nourrie principalement de fruits, de légumes, de feuilles et de pousses. Pour l’instant, son régime a été adapté avec des aliments plus tendres et découpés en morceaux plus petits pour protéger sa dent.',
        ]
    ]
];

include 'templateAnimaux.php';
?>