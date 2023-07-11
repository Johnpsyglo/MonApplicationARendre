<?php
//$post["identifiant]; permet de identifier notre base de donnée
$_POST["Accueillet"];
$_POST["CatégorieDeChambre"];
$_POST["NouvelleSalle"];
$_POST["Page"];
$_POST["Réservation"];
$_POST["UtilisateursReg"];
$_POST["Enquête"];
$_POST["Recherche"];
$_POST["Rapports"];


//permet de inclure le fichier php connexion.php
include("./connexion.php");

// permet de faire un appelle au constructeur et un nouvelle connexion dans la base de donnée
$uneConnexion = new MaConnexion("disponibilité_des_salles
", "", "root", "localhost");
$resultat = $uneConnexion->select($_POST["Accueillet"], $_POST["CatégorieDeChambre"], $_POST["NouvelleSalle"], $_POST["Page"],
$_POST["Réservation"], $_POST["UtilisateursReg"], $_POST["Enquête"], $_POST["Recherche"], $_POST["Rapports"]);


if (!empty($resultat)) {
    echo "youpi !";
}
else{
    echo "b non !";
}



?>