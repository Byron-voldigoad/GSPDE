<?php

require_once("db-connect2.php");


if ($_POST) 
{
    $id=$_POST['ID_MATIERE'];
        $nom = $_POST['NOM_MATIERE'];

            $pdo->query("update MATIERE set 
                            NOM_MATIERE='$nom' where ID_MATIERE='$id'");
    
    	
    //die('vous avez réussit !!!   ');
    header('Location:ListeMatiere.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>