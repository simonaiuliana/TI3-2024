<?php

// si on veut se déconnecter

if (isset($_GET['disconnect'])) {
    // on se déconnecte
    disconnectAdministrator();
    header("Location: ./");
    exit();
}

//Si on veut créer un lieu
if (isset($_GET['create'])) {

    //Si on a cliqué sur insérer
    if (
        isset($_POST['nom']) &&
        isset($_POST['adresse']) &&
        isset($_POST['codepostal']) &&
        isset($_POST['ville']) &&
        isset($_POST['latitude']) &&
        isset($_POST['longitude'])
    ) {
        $title = htmlspecialchars(strip_tags(trim($_POST['nom'])), ENT_QUOTES);
        $adresse = htmlspecialchars(trim($_POST['adresse']), ENT_QUOTES);
        $codePostal = htmlspecialchars(trim($_POST['codepostal']), ENT_QUOTES);
        $ville = htmlspecialchars(trim($_POST['ville']), ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        $insert = insertOneLocation($db, $title, $adresse, $codePostal, $ville, $latitude, $longitude);

        if ($insert === true) {
            header("Location: ./");
            exit();
        }
        else { echo $insert; }
    }

    //chargement de la vue
    include "../view/private/admin.insert.view.html.php";
    exit();
}

// si on a cliqué sur supprimer un lieu
if (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {

    //conversion en int
    $idDelete = (int) $_GET['delete'];


    // si on a validé la suppression
    if (isset($_GET['ok'])) {
        $delete = deleteOneLocationById($db, $idDelete);
        if ($delete === true) {
            header("Location: ./");
            exit();
        } elseif ($delete === false) {
            $error = "Problème avec cette suppression";
        } else {
            $error = $delete;
        }
    }

    // chargement de l'article pour la suppression
    $getOneLocation = getOneLocationById($db, $idDelete);

    //chargement de la vue
    include "../view/private/admin.delete.view.html.php";
    exit();
}

//si on a cliqué sur update et qu'on'accepte que les chiffres dans le string ['update']
if (isset($_GET['update']) && ctype_digit($_GET['update'])) {
    //conversion en int
    $idUpdate = (int) $_GET['update'];

    //Si on a modifier le formulaire (pas obligatoire de vérifier tous les champs, mais dans le isset, la virgule vaut &&)
    if (
        isset($_POST['nom']) &&
        isset($_POST['adresse']) &&
        isset($_POST['codepostal']) &&
        isset($_POST['ville']) &&
        isset($_POST['latitude']) &&
        isset($_POST['longitude'])
    ){
        // vérification de valeurs
        $id = $idUpdate;
        $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])), ENT_QUOTES);
        $adresse = htmlspecialchars(trim($_POST['adresse']), ENT_QUOTES);
        $codePostal = htmlspecialchars(trim($_POST['codepostal']), ENT_QUOTES);
        $ville = htmlspecialchars(trim($_POST['ville']), ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        //fonction qui update la mise à jour
        $update =  updateOneLocationById($db, $id, $nom, $adresse, $codePostal,$ville,$latitude, $longitude);
        //var_dump($update);

        //Si l'update est bon
        if ($update === true) {
            header("Location: ./");
            exit();
        } elseif ($update === false) {
            $errorUpdate = "Cet article n'a pas été modifié";
        } else {
            $errorUpdate = $update;
        }
    }
    //Chargement de l'article pour l'update
    $getOneLocation = getOneLocationById($db, $idUpdate);
    // var_dump($getOneGeoLoc);

    //chargement de la vue
    include "../view/private/admin.update.view.html.php";
    exit();
}

// si on est sur l'accueil chargement de toutes les localisations
$datas = getAllLocations($db);
// appel de la vue de l'accueil de l'admin
include "../view/private/admin.homepage.view.html.php";