<?php

require_once("db-connect2.php");


if ($_POST) 
{
    $id=$_POST['ID_MATIERE'];
        $nom = $_POST['nom'];
        $niveau = $_POST['niveau'];

            $pdo->query("update classe set 
                            nom='$nom',niveau='$niveau' where id_classe='$id'");
    
    	
    //die('vous avez réussit !!!   ');
    header('Location:ListeClasse.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>