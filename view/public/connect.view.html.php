<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="fondGris">

    <div id="content">
        <h3 class="text-center mt-5" id="titleConnexion">Connexion à notre administration</h3>
        <?php if (isset($error)) : ?>
            <h4 id="alert" class="text-center mt-4"><?= $error ?></h4>
        <?php endif ?>
        <div class="container col-xl-10 col-xxl-8 px-4 ">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <img src="img/forgotPasswordremovebg.png" alt="">
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form method="POST" name="connexion" action="" class="p-4 p-md-5 border rounded-3" id="loginForm">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Votre login" name="username" style="background-color: #f0f0f1;">
                            <label for="username">Login</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Votre mot de passe" name="passwd" style="background-color: #f0f0f1;">
                            <label for="passwd">Mot de passe</label>
                        </div>

                        <button class="w-100 btn btn-lg  mt-4" type="submit" value="connexion" id="btnConnexion">Connexion</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</ht