<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Lien bootstrap-table-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <title>Accueil Admin</title>
</head>

<body class="fondGris">
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg" aria-label="Twelfth navbar example" id="navbarStyle">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?create">Ajouter un lieu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?disconnect">Déconnexion</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!--Fin NAVBAR-->
    <div id="content">
        <h3 class="text-center  titleStyle">Administration des datas</h3>
        <?php
        // datas est une chaîne de caractère : erreur SQL !
        if (is_string($datas)) :
        ?>
            <h3 id="alert"><?= $datas ?></h3>
        <?php
        // Pas encore de `geoloc`
        elseif (empty($datas)) :
        ?>
            <h3 id="comment">Pas encore de lieu.</h3>
        <?php
        // Nous avons des lieux
        else :
            // on compte le nombre de données 
            $nb = count($datas);
        ?>
            <p class="text-center mt-5">Il y a <span id="nbLieu"><?= $nb ?></span> <?= $nb > 1 ? "lieux" : "lieu" ?> dans la base de données</p>
            <section class="container">
                <div class="row">
                    <div class="col-auto" id="tableau">
                        <div class="table-responsive">
                            <table class="table table-bordered" data-toggle="table" data-show-columns="true" data-search="true" data-pagination="true" data-checkbox-header="true">
                                <thead>
                                    <tr>
                                        <th data-checkbox="true"></th>
                                        <th data-click-to-select="true">Id</th>
                                        <th class="text-center">Nom</th>
                                        <th class="text-center">Adresse</th>
                                        <th class="text-center">Code postal</th>
                                        <th class="text-center">Ville</th>
                                        <th class="text-center">Latitude</th>
                                        <th class="text-center">Longitude</th>
                                        <th class="text-center">Modifier</th>
                                        <th class="text-center">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // tant qu'on a des données
                                    // var_dump($datas);

                                    foreach ($datas as $data) :
                                    ?>

                                        <tr>
                                            <td></td>
                                            <td><?= $data['id'] ?></td>
                                            <td><?= $data['nom'] ?></td>
                                            <td><?= $data['adresse'] ?></td>
                                            <td><?= $data['codepostal'] ?></td>
                                            <td><?= $data['ville'] ?></td>
                                            <td><?= $data['latitude'] ?></td>
                                            <td><?= $data['longitude'] ?></td>
                                            <td class="text-center"><a href="?update=<?= $data['id'] ?>"><button type="button" class="btn btn-primary">Modifier</button></a></td>
                                            <td class="text-center"><a href="?delete=<?= $data['id'] ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                                            

                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </section>
        <?php endif ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Insérer cette balise "script" après celle de Bootstrap -->
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
    <script src="js/carteJSON.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</body>

</html>
