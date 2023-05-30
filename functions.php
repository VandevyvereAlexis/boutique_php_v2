<?php
    // fonction permaettant d'Envoyer un tableau d'article 
    function getArticles() {
        return [
            // Article 1 
            [
                'name'                => 'Apple',
                'id'                  => '1',
                'price'               => 550.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Découvrez l\'Apple Watch : une montre intelligente alliant technologie avancée et design élégant. Restez connecté, suivez votre santé et bénéficiez de fonctionnalités pratiques, le tout à votre poignet. Une expérience unique alliant style et innovation.',
                'picture'             => 'sujet.png'
            ],
            // Article 2
            [
                'name'                => 'Omega',
                'id'                  => '2',
                'price'               => 1500.90,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Plongez dans l\'univers de l\'Omega Watch : une montre d\'exception alliant artisanat d\'élite et sophistication intemporelle. Découvrez un mariage parfait entre design raffiné et précision horlogère. Une montre qui incarne l\'excellence et l\'élégance à chaque instant.',
                'picture'             => 'sujet_2.png'
            ],
            // Article 3
            [
                'name'                => 'Rolex',
                'id'                  => '3',
                'price'               => 7500.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Explorez l\'univers de la Rolex : une icône intemporelle de l\'horlogerie alliant prestige, performance et artisanat d\'exception. Plongez dans l\'élégance inégalée d\'une montre synonyme de statut et de raffinement. L\'alliance parfaite entre sophistication et fiabilité, la Rolex incarne le luxe intemporel et l\'art de l\'horlogerie à son apogée.',
                'picture'             => 'sujet_3.png'
            ],
        ];
    }
?>
