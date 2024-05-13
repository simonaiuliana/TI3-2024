<?php
// GET ONE
if (isset($_GET["action"], $_GET["item"]) && $_GET["action"] === "update" && ctype_digit($_GET["item"])) {
    $updateItem = getOneItemById ($db, $_GET["item"]);
    if($updateItem === true) {
        header('Location: ?page=adminHome&action=update');
    }
}

// GET ITEM PRE-SUPPRESSION
if (isset($_GET["action"], $_GET["item"]) && $_GET["action"] === "delete" && ctype_digit($_GET["item"])) {
    $mapDelete = getOneItemById($db,$_GET["item"]);
}

// DELETE
if (isset($_GET["action"], $_GET["item"], $_GET["confirm"]) && ctype_digit($_GET["item"]) && $_GET["action"] === "delete" && $_GET["confirm"] === "ok") {
    $deleteItem = deleteItemFromMapByID ($db, $_GET["item"]);
    if($deleteItem === true) {
        header('Location: ?page=adminHome');
    }else {
        $errorMessage = "Problème avec la suppression";
    }
    include ("../view/private/adminView.php");
    die();
}

// INSERT
                          if (isset($_POST["itemNameInp"],$_POST["itemTypeInp"],$_POST["itemAddInp"],$_POST["itemCodeInp"],$_POST["itemVilleInp"],$_POST["itemUrlInp"],$_POST["itemLatInp"],$_POST["itemLonInp"])) {    
    $insertItem = addItemToMap($db, $_POST["itemNameInp"],$_POST["itemTypeInp"],$_POST["itemAddInp"],$_POST["itemCodeInp"],$_POST["itemVilleInp"],$_POST["itemUrlInp"],$_POST["itemLatInp"],$_POST["itemLonInp"]);
    if ($insertItem === true){
        header('Location: ?page=adminHome');
    }else {
        $errorMessage = "Problème avec l'insertion";
    }
    include ("../view/private/createView.php");
    die();
}

// UPDATE
                                if (isset($_POST["updateNameInp"], $_POST["updateTypeInp"], $_POST["updateAddInp"], $_POST["updateCodeInp"], $_POST["updateVilleInp"], $_POST["updateUrlInp"], $_POST["updateLatInp"], $_POST["updateLonInp"])) {
    $updateItemById = updateItemById($db, $_POST["updateNameInp"], $_POST["updateTypeInp"], $_POST["updateAddInp"], $_POST["updateCodeInp"], $_POST["updateVilleInp"], $_POST["updateUrlInp"], $_POST["updateLatInp"], $_POST["updateLonInp"],(int) $_GET["item"]);
    if ($updateItemById === true){
        header('Location: ?page=adminHome');
    }else {
        $errorMessage = "Problème avec la mise à jour";
    }
    include ("../view/private/adminView.php");
    die();
}