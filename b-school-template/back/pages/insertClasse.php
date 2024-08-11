<?php

require_once("db-connect2.php");

if ($_POST) 
{

    $ma_requete = $pdo->prepare('insert into classe (nom, niveau)  
                                            VALUES(:nom,:niveau)');
    	$ma_requete->execute( array(
    		'nom'=>$_POST['nom'],
            'niveau'=>$_POST['niveau']

    	));

    //die('vous avez réussit !!! ');
    header('Location:ListeClasse.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>