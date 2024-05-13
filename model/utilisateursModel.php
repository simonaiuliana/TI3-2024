<?php

# Connexion de l'administrateur en utilisant password_verify
function connectAdministrator(PDO $connect, string $user, string $password): bool|string
{
    // On récupère les valeurs utiles pour l'utilisateur via $user uniquement
    $sql = "SELECT * FROM `utilisateurs` WHERE username = ?";

    // on utilise une requête préparée car il y'a une entrée utilisateur
    $prepare = $connect->prepare($sql);

    try {
        $prepare->execute([$user]);

        // Si l'utilisateur n'existe pas, on quitte sans indiquer une erreur 
        if ($prepare->rowCount() === 0) return false;

        //On mets le résultat dans un tableau associatif
        $result = $prepare->fetch();

        // On vérifie la validité du mot de passe
        if (password_verify($password, $result['passwd'])) {
            
            // On met dans la session les variables récupérées dans la requête
            $_SESSION = $result;
            // on supprime la variable inutile de la session
            unset($_SESSION['passwd']);

            // si on est connecté, on renvoie true
            return true;
        }
        // Si le mot de passe est invalide, on renvoie false
        return false;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


# Déconnexion de l'administrateur

function disconnectAdministrator(): bool
{
    // la session est lancée dans le Contrôleur Frontal , sinon décommentez cette ligne
    // session_start();

    // Détruit toutes les variables de session
    $_SESSION = [];

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finalement, on détruit la session (fichier texte côté serveur)
    session_destroy();

    return true;
}