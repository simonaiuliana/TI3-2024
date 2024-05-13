<?php


// Fonction qui récupère tous les champs de `localisations`
function getAllLocations(PDO $connection): array|string
{
    $sql = "SELECT * FROM `localisations`";
    try {
        $query = $connection->query($sql);

        // Si il n'y a pas de résultat, fetchAll sera un tableau vide
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


// Fonction qui charge tous les champs d'un élément de localisations grâce à son id
// Renvoie false en cas d'échec ou un message d'erreur sql
// Renvoie un tableau associatif si true

function getOneLocationById(PDO $db, int $id): string|bool|array
{
    $sql = "SELECT * FROM `localisations` WHERE `id` = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam("id", $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        if ($stmt->rowCount() === 0) return false;
        $results = $stmt->fetch();
        $stmt->closeCursor();
        return $results;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Fonction qui  update tous les champs d'un élément de locations grâce à son id
// En lui passant TOUTES les variables en paramètre
// nous renvoie false en cas d'échec ou le message d'erreur sql
// ou un true en cas de succès
function updateOneLocationById(PDO $db, int $id, string $nom, string $adresse, string $codePostal ,string $telephone ,string $url,float $latitude, float $longitude): string|bool
{
    $sql = "UPDATE `localisations` SET `nom`= ? , `rue`= ?,`codepostal` = ?,`telephone` = ? ,`url` = ? ,`latitude`= ?, `longitude`= ? WHERE `id`= ?";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([
            $nom,
            $adresse,
            $codePostal,
            $telephone,
            $url,
            $latitude,
            $longitude,
            $id
        ]);
        // pas de modification par la requête
        if ($stmt->rowCount() === 0) return false;

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

//Fonction qui insére un nouveau lieu

function insertOneLocation(PDO $db, string $nom, string $adresse,string $codePostal,string $telephone,string $url,float $latitude, float $longitude): bool|string
{
    $sql = "INSERT INTO `localisations` (`nom`,`rue`,`codepostal`,`telephone`,`url`,`latitude`,`longitude`) VALUES (?,?,?,?,?,?,?);";
    $prepare = $db->prepare($sql);
    try {
        $prepare->execute([
            $nom,
            $adresse,
            $codePostal,
            $telephone,
            $url,
            $latitude,
            $longitude
        ]);

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

//Fonction qui supprime un lieu

function deleteOneLocationById(PDO $db, int $id): bool|string
{
    $sql = "DELETE FROM `localisations` WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        if ($stmt->rowCount() === 0) return false;

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function getLocations(PDO $db): array
{
    $sql = "SELECT * FROM localisations ORDER BY id ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}