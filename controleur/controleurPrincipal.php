<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "inscription.php";
    $lesActions["accueil"] = "accueil.php";
    $lesActions["salle"] = "listeSalles.php";
    $lesActions["detail"] = "detailSalle.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["creer"] = "creerPoste.php";
    $lesActions["modifier"] = "modifierPoste.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>