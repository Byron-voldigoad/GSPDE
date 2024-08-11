<?php

require_once("db-connect2.php");

if ($_POST) 
{

    $ma_requete = $pdo->prepare('insert into EvenementsDisciplinaires (N_ELEVE, TypeEvenement, DateEvenement, Description,sanction)
                         VALUES(:N_ELEVE, :TypeEvenement, :DateEvenement, :Description,:sanction)');
    	$ma_requete->execute( array(
    		'N_ELEVE'=>$_POST['choix1'],
            'TypeEvenement'=>$_POST['choix2'],
            'DateEvenement'=>$_POST['Date'],
            'Description'=>$_POST['Description'],
            'sanction'=>$_POST['Sanction']

    	));

    //die('vous avez réussit !!! ');
    header('Location:Discipline.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>