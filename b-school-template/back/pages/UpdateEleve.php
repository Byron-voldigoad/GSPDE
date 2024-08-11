<?php

require_once("db-connect2.php");


if ($_POST) {

    $id = $_POST['N_ELEVE'];

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe = $_POST['classe'];
    $parent = $_POST['parent'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $sexe = $_POST['sexe'];

    $pdo->query("update ELEVE set 
                        TEL_PARENT='$parent', id_classe='$classe', NOM_ELEVE='$nom', 
                        PRENOM_ELEVE='$prenom', DATE_DE_NAISSANCE_ELEVE='$date', 
                        LIEU_DE_NAISSANCE_ELEVE='$lieu', SEXE_ELEVE='$sexe' where n_eleve='$id'");

    //die('vous avez réussit !!!   ');
    header('Location:ListeEleves.php');
} else {
    echo "Veuillez renseigner tous vos champs";
}