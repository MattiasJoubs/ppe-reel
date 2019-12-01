<?php

include_once "bd.inc.php";

function connexionPDO2() {
    $login = "root";
    $mdp = "root";
    $bd = "mrbs";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

function getUtilisateurs() {
    try {
        $cnx = connexionPDO2();
        $req = $cnx->prepare("select * from mrbs_users");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMailU($mailU) {
    try {
        $cnx = connexionPDO2();
        $req = $cnx->prepare("select * from mrbs_users where email=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($mailU, $mdpU, $pseudoU) {
    try {
        $cnx = connexionPDO2();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("insert into mrbs_users (level, email, password, name) 
            values(:levelU, :mailU,:mdpU,:pseudoU)");
        $req->bindValue(':levelU', 0);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
        $req->bindValue(':pseudoU', $pseudoU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLevelByMaiU($mailU){
    try {
        $cnx = connexionPDO2();

        $req = $cnx->prepare("select level from mrbs_users where email=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateurByMailU(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getUtilisateurByMailU("mathieu.capliez@gmail.com"));

    echo "addUtilisateur('mathieu.capliez3@gmail.com', 'azerty', 'mat') : \n";
    addUtilisateur("mathieu.capliez3@gmail.com", "azerty", "mat");
}
?>