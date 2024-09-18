<?php

// Liste des animaux avec des descriptions spécifiques organisées en sections // 
$animaux = [
// ---------- Bolor card ------------------ //
    [
        'id' => 'alligator',
        'nom' => 'Bolor',
        'image' => 'assetArcadia/gator.jpg',
        'description' => [
            'espèce' => ' Alligator des Marais (Alligator mississippiensis)',
            'habitat' => 'Les alligators des marais habitent les zones humides du sud-est des États-Unis, telles que les marécages, les lacs et les rivières lentes. Ils préfèrent les eaux douces, mais on peut parfois les trouver dans des eaux légèrement salées.',
            'etat' => 'Les alligators des marais habitent les zones humides du sud-est des États-Unis, telles que les marécages, les lacs et les rivières lentes. Ils préfèrent les eaux douces, mais on peut parfois les trouver dans des eaux légèrement salées.',
            'avis' => 'Bien que l\'alligator montre quelques signes de vieillissement, comme un rythme plus lent et une usure de ses dents, il est globalement en bonne santé. Le vétérinaire le surveille régulièrement pour s\'assurer qu\'il reste confortable et sans douleur.',
            'nourriture' => 'L\'alligator est nourri principalement de poissons, de volailles et de petits mammifères. Son alimentation est ajustée en fonction de son âge, en privilégiant des portions adaptées et faciles à consommer.'
        ]
        ],

    // ---------- Flamingo card ------------------ //
    [
        'id' => 'flamantrose',
        'nom' => 'Flamingo',
        'image' => 'assetArcadia/flamingo.jpg',
        'description' => [
            'espèce' => 'Flamant Rose (Phoenicopterus roseus)',
            'habitat' => 'Les flamants roses vivent dans les lagunes, les marais salants et les lacs peu profonds d\'Afrique, d\'Europe du Sud et d\'Asie du Sud-Ouest. Ils préfèrent les eaux riches en micro-organismes, crustacés et algues.',
            'etat' => 'Notre flamant rose se porte bien dans son enclos, qui dispose d\'un grand bassin d\'eau peu profonde et de zones sablonneuses pour marcher et se nourrir. Il est souvent vu en groupe avec ses congénères, reflétant son comportement social naturel.',
            'avis' => 'Le vétérinaire confirme que le flamant rose est en bonne santé, avec une bonne coloration et un comportement actif. Il fait l\'objet de contrôles réguliers pour surveiller sa condition physique et prévenir d’éventuelles infections.',
            'nourriture' => 'Il est nourri avec un régime équilibré composé de granulés spéciaux pour flamants roses, enrichis en caroténoïdes, ainsi que de petits crustacés et d’algues pour simuler son alimentation naturelle.',
        ]
    ],
     // ----------- Donatello card ---------------
     [
        'id' => 'tortue',
        'nom' => 'Donatello',
        'image' => 'assetArcadia/donatello.jpg',
        'description' => [
            'espèce' => 'Tortue à Joues Rouges (Mauremys leprosa)',
            'habitat' => 'Cette espèce habite les rivières, les lacs et les étangs d\'Afrique du Nord et du sud de l\'Espagne, préférant les eaux calmes avec une végétation dense où elle peut se cacher et se nourrir.',
            'etat' => 'Notre tortue à joues rouges se porte bien dans son enclos aquatique, conçu pour imiter son habitat naturel avec des zones pour nager, se reposer et prendre le soleil.',
            'avis' => 'Le vétérinaire indique que la tortue est en bonne santé, avec un comportement actif et un appétit normal. Des examens réguliers montrent une croissance stable et aucune maladie apparente.',
            'nourriture' => 'Elle est nourrie avec un régime varié comprenant des petits poissons, des insectes, des crustacés et des végétaux aquatiques, pour refléter son alimentation naturelle.',
        ]
    ]
];

include 'templateAnimaux.php';
?>