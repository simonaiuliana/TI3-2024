<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
     <!--Lien CSS bootstrap-->
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
        <h3 class="text-center mt-5">Article à supprimer</h3>

        <?php
        if (isset($error)) :
        ?>
            <h3 id="alert"><?= $error ?></h3>
        <?php
        endif;
        // datas est une chaîne de caractère : erreur SQL !
        if (is_string($getOneLocation)) :
        ?>
            <h3 id="alert"><?= $getOneLocation ?></h3>
        <?php
        // Pas de `geoloc` trouvée
        elseif ($getOneLocation === false) :
        ?>
            <h3 id="comment">Ce le lieu n'existe plus !</h3>
        <?php
        // Nous avons un lieu
        else :
        ?>
            <h5 class="text-center mt-5 mb-3">Nom : <span class="fw-normal"> <?= $getOneLocation['nom'] ?></span></h5>
            <h5 class="text-center mb-3">Adresse : <span class="fw-normal"><?= $getOneLocation['rue'] ?></span></h5>
            <h5 class="text-center mb-3">Code Postal : <span class="fw-normal"><?= $getOneLocation['codepostal'] ?></span></h5>
            <h5 class="text-center mb-3">Téléphone : <span class="fw-normal"><?= $getOneLocation['telephone'] ?></span></h5>
            <h5 class="text-center mb-3">Url : <span class="fw-normal"><?= $getOneLocation['url'] ?></span></h5>
            <h5 class="text-center mb-3">Latitude : <span class="fw-normal"><?= $getOneLocation['latitude'] ?></span></h5>
            <h5 class="text-center mb-3">Longitude : <span class="fw-normal"><?= $getOneLocation['longitude'] ?></span></h5>
            <p class="text-center mt-4 mb-4 fw-bold">Voulez-vous vraiment supprimer ce lieu ?</p>
            <div class="text-center">
                <a href=" ?delete=<?= $idDelete ?>&ok"><button value="supprimer" class="btn btn-outline-danger ">supprimer</button></a> | <a href="./"><button value="Non" class="btn btn-outline-info">Ne pas supprimer</button></a>
            </div>

        <?php endif ?>
    </div>
     <!--Lien JS Bootstrap-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>