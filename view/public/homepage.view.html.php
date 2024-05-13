<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Accueil</title>

</head>

<body class="fondGris">
    <div id="content">
        <h1 class="titreHomepage">Carte interactive</h1>
        <h3 class="titreHomepage">Théâtres à Bruxelles</h3>

        <div>
            <a href="?connect"> <button class="btnConnect"><i class="animation"></i>Connexion à l'administration<i class="animation"></i>
                </button></a>
        </div>
        </a>
        <!-- <a href="?connect" id="btnHomepage">Connexion à l'administration</a>-->
        <?php
        /*
        // datas est une chaine de caractère : erreur SQL ! 
        if (is_string($datas)) :

        ?>
            <h3 id="alert"><?= $datas ?></h3>
        <?php
        // Pas encore de `localisations`
        elseif (empty($datas)) :
        ?>
            <h3 id="comment">Pas encore de lieu.</h3>
        <?php
        // Nous avons des lieux
        else :
            // on compte le nombre de données 
            $nb = count($datas);
        ?>
            <h3>Il y a <?= $nb ?> <?= $nb > 1 ? "lieux" : "lieu" ?></h3>

            <?php
            // tant qu'on a des données
            // var_dump($datas);
            foreach ($datas as $data) :
            ?>
                <h4><?= $data['nom'] ?></h4>
                <p><?= $data['rue'] ?></p>
                <p><?= $data['latitude'] ?> | <?= $data['longitude'] ?></p>
                <hr>
        <?php
            endforeach;
        endif;
        */

        ?>

        <div id="resultat">
            <div id="map"></div>
            <div id="liste">
                <h2 class="titreHomepage">Listes des théâtres</h2>
                <p class="titreHomepage">Cliquez sur un élément dans la liste ci-dessous pour le situer sur la carte</p>
                <hr>
            </div>
        </div>

    </div>

    <!--JS de Leaflet-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!--Mon JS-->
    <script src="js/carteJSON.js"></script>
</body>

</html>