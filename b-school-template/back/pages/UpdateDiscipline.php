<?php

require_once("db-connect2.php");


if ($_POST) 
{
    $id=$_POST['EvenementID'];
        $nom = $_POST['choix1'];
        $Description=$_POST['Description'];
        $Sanction = $_POST['Sanction'];

            $pdo->query("update EvenementsDisciplinaires set 
            N_ELEVE='$nom',Description='$Description',Sanction='$Sanction' where EvenementID='$id'");
    
    	
    //die('vous avez réussit !!!   ');
    header('Location:Discipline.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>