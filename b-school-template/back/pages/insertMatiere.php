<?php

require_once("db-connect2.php");

if ($_POST) 
{

    $ma_requete = $pdo->prepare('insert into MATIERE(NOM_MATIERE) VALUES(:NOM_MATIERE)');
    	$ma_requete->execute( array(
    		'NOM_MATIERE'=>$_POST['nom']

    	));

    //die('vous avez réussit !!! ');
    header('Location:ListeMatiere.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>