<?php
if(isset($_GET["page"])) {
    switch($_GET["page"]) {
        case "home" :
            $title = "Bienvenue à nouveau";
            include("../view/public/homeView.php");
            break;
            case "create" :
                $title = "Ajoute un lieu à la table";
                include("../view/private/createView.php");
                break;  
                case "adminHome" :
                    $title = "Ajoute un lieu à la table";
                    include("../view/private/adminView.php");
                    break;
                    case "refuse" :
                        $title = "Nice try, fool :p";
                        include("../view/public/refuseView.php");
                        break;
                        case "showmap" :
                            $title = "Voir la Carte";
                            include("../view/public/mapView.php");
                            break;                                          
                            case "homeBS" :
                                $title = "Bienvenue à nouveau";
                                include("../view/public/homeViewBS.php");
                                break;
                        
                        default :
                        $title = "Page Introuvable";
                        include("../view/public/error404View.php");         
                    }
                }else if (isset($_GET["logout"])) {
                    include_once("../model/logoutModel.php");
                    
                }else {
                    $title = "Bienvenue à mon Projet";
                    include("../view/public/homeView.php");
                }