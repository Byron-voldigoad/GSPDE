<?php

require_once("db-connect2.php");

if ($_POST) 
{

    $ma_requete = $pdo->prepare('insert into MatieresAClasses(id_classe,ID_MATIERE,credit) VALUES(:id_classe,:ID_MATIERE,:credit)');
    	$ma_requete->execute( array(
    		'id_classe'=>$_POST['choix1'],
            'ID_MATIERE'=>$_POST['choix2'],
            'credit'=>$_POST['credit']

    	));

    //die('vous avez réussit !!! ');
    header('Location:ListeClasse.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>