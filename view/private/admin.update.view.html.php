<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update d'un article</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
        <h3 class="text-center mt-5 mb-5">Article à modifier</h3>
        <?php
        if (isset($errorUpdate)) :
        ?>
            <h3 id="alert"><?= $errorUpdate ?></h3>
        <?php
        endif;
        // datas est une chaine de caractère : erreur SQL !
        if (is_string($getOneLocation)) :
        ?>
            <h3 id="alert"><?= $getOneGeoloc ?></h3>
        <?php
        // Pas de `geoloc` trouvée
        elseif ($getOneLocation === false) :
        ?>
            <h3 id="comment">Vous n'avez pas modifié le lieu !</h3>
        <?php
        //Nous avons un lieu
        else :
        ?>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <form method="POST" name="geo" action="">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" value="<?= $getOneLocation['nom'] ?>" class="form-control mx-auto w-25 shadow-lg" id="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="rue" class="form-label">Adresse</label>
                            <input type="text" name="rue" class="form-control mx-auto w-25 shadow-lg" id="rue" value="<?= $getOneLocation['rue'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="codepostal" class="form-label">Code Postal</label>
                            <input type="text" name="codepostal" class="form-control mx-auto w-25 shadow-lg" id="codepostal" value="<?= $getOneLocation['codepostal'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Numéro Tel</label>
                            <input type="text" name="telephone" class="form-control mx-auto w-25 shadow-lg" id="telephone" value="<?= $getOneLocation['telephone'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" name="url" class="form-control mx-auto w-25 shadow-lg" id="url" value="<?= $getOneLocation['url'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" value="<?= $getOneLocation['latitude'] ?>" name="latitude" step="0.000000001" class="form-control mx-auto w-25 shadow-lg" id="latitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" value="<?= $getOneLocation['longitude'] ?>" step="0.000000001" class="form-control mx-auto w-25 shadow-lg" id="longitude" required>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="Modifier" class="btn btn-outline-info mt-4">
                        </div>
                    </form>
                </div>
            </div>

        <?php endif ?>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>