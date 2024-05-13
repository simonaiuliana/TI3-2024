<?php

//Contrôleur Frontal

//Lancement de la session

session_start();

//Appel des dépendances

//Configuration
require_once "../config.php";

//Modèles
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";

//connexion à la db

try {
    // instanciation de notre connexion PDO
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
} catch (Exception $e) {
    die($e->getMessage());
}
//JSON pour l'API
if (isset($_GET['json'])) {
    $datas = getLocations($db);
    if (!is_string($datas)) {
        echo json_encode($datas);
    }
    exit();
}

if(isset($_SESSION['username'])){
    //On appelle l'adminController
    require_once "../controller/privateController.php";
}else{
    //On appelle le contrôleur public
    require_once "../controller/publicController.php";
}

//Fermeture de la connexion

$db = null;