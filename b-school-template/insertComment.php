<?php

require_once("back/pages/db-connect2.php");

if ($_POST) 
{

    $ma_requete = $pdo->prepare('insert into commentaires(nom,Email,comment) VALUES(:nom,:Email,:comment)');
    	$ma_requete->execute( array(
    		'nom'=>$_POST['name'],
            'Email'=>$_POST['email'],
            'comment'=>$_POST['comment'],

    	));

    //die('vous avez réussit !!! ');
    header('Location:index.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>