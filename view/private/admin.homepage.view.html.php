<?php

// Si vous n'êtes pas de niveau administrateur, il est impossible d'accéder à cette page (la même chose pour toutes les pages qui ne sont pas destinées à être consultées par le public).

if (!isset($_SESSION) || $_SESSION["monID"] != session_id()) {
    header ("Location: ?page=refuse");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <?php
                    include("../view/incShared/cdnCSS.php");
                ?>
                <link rel="stylesheet" href="css/style.css">
            <title><?=$title?></title>
        </head>
    <body>
        <div class="container-fluid px-5" id="timeToGo"> 
        
        <?php
    $_SESSION['pageCount']++;
    if ($_SESSION["pageCount"] < 3) {
        include("inc/header.php");
    }else {
        include("inc/header-static.php");
    }
    ?>

    <div class="container-fluid h-25 text-center">
        <p class="h2 text-center">Bonjour, <?=$_SESSION["username"]?>. Ici vous pouvez modifier ou changer des entrées</p>
        <?php
          if(isset($errorMessage)): ?>
                <h4 class="text-danger"><?=$errorMessage?></h4>
            <?php endif ?>
    
    <?php
       
       ?>
    <?php
        if (isset($_GET["action"]) && $_GET["action"] === "delete") {
            include("inc/delete-table.php");
        }else if (isset($_GET["action"]) && $_GET["action"] === "update") {
            include("inc/update-form.php");
        }else {
            include("inc/admin-table.php");
        }
        ?>

    </div> 

<?php
        include("../view/incShared/footer.php");
        ?>
    
<?php
                    include("../view/incShared/cdnJS.php");
                ?>
<script src="js/colour-script.js"></script>
<script src="js/checkbox-script.js"></script>
<script src="js/insertScript.js"></script>

</body>
</html>