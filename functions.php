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
            // Article 3
            [
                'name'                => 'Rolex',
                'id'                  => '4',
                'price'               => 7500.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Explorez l\'univers de la Rolex : une icône intemporelle de l\'horlogerie alliant prestige, performance et artisanat d\'exception. Plongez dans l\'élégance inégalée d\'une montre synonyme de statut et de raffinement. L\'alliance parfaite entre sophistication et fiabilité, la Rolex incarne le luxe intemporel et l\'art de l\'horlogerie à son apogée.',
                'picture'             => 'sujet_3.png'
            ],
            // Article 3
            [
                'name'                => 'Rolex',
                'id'                  => '5',
                'price'               => 7500.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Explorez l\'univers de la Rolex : une icône intemporelle de l\'horlogerie alliant prestige, performance et artisanat d\'exception. Plongez dans l\'élégance inégalée d\'une montre synonyme de statut et de raffinement. L\'alliance parfaite entre sophistication et fiabilité, la Rolex incarne le luxe intemporel et l\'art de l\'horlogerie à son apogée.',
                'picture'             => 'sujet_3.png'
            ],
            // Article 3
            [
                'name'                => 'Rolex',
                'id'                  => '6',
                'price'               => 7500.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Explorez l\'univers de la Rolex : une icône intemporelle de l\'horlogerie alliant prestige, performance et artisanat d\'exception. Plongez dans l\'élégance inégalée d\'une montre synonyme de statut et de raffinement. L\'alliance parfaite entre sophistication et fiabilité, la Rolex incarne le luxe intemporel et l\'art de l\'horlogerie à son apogée.',
                'picture'             => 'sujet_3.png'
            ],// Article 3
            [
                'name'                => 'Rolex',
                'id'                  => '7',
                'price'               => 7500.99,
                'description'         => 'Moderne et élégant',
                'detailleDescription' => 'Explorez l\'univers de la Rolex : une icône intemporelle de l\'horlogerie alliant prestige, performance et artisanat d\'exception. Plongez dans l\'élégance inégalée d\'une montre synonyme de statut et de raffinement. L\'alliance parfaite entre sophistication et fiabilité, la Rolex incarne le luxe intemporel et l\'art de l\'horlogerie à son apogée.',
                'picture'             => 'sujet_3.png'
            ],
        ];
    }

    // Récupérer le produit qui correspond à l'Id fourni en paramètre
    function getArticleFromId($id) {
        //récupérer la liste des articles
        $articles = getArticles();
        // aller chercher dedans l'article qui comporte l'id en paramètre
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                // le renvoyer avce un return
                return $article;
            }
        }
        // le renvoyer avec un return
    }

    // initaliser le panier 
    function createCart() {
       if (isset($_SESSION['panier']) == false) {  // si mon panier n'existe pas encore 
        $_SESSION['panier'] = [];               // je l'initialise
        }
    }

    function addToCart($article) {
        // on attribut une quandtité de 1 ( par defaut ) à l'articel 
        $article['quantite'] = 1;
        // je verifie si l'article n'est pas déja présent
        // $i = index de la boucle
        // $i < count($_SESSION['panier]) = condition de maintien de la boucle ( évaluée AVANT chaque tour )
        // (si condition vraie => on lance la boucle)
        // $i++ = évolution d el'index $i à la FIN de chaque boucle
        for ($i = 0; 0 < count($_SESSION['panier']); $i++) {
            // si present = quantite +1
            if ($_SESSION['panier'][$i]['id'] == $article['id']) {
                $_SESSION['panier'][$i]['quantite']++;
                return; // permet de sortir de la fonction
            }
        }
        // si pas present => ajout classqiue via array_push
        array_push($_SESSION['panier'], $article);
    }
?>