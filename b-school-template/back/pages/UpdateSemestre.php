<?php

require_once("db-connect2.php");


if ($_POST) 
{
    $id=$_POST['id_semmestre'];
        
        $pdo->query("update SEMMESTRE set 
            statut=0");
        $pdo->query("update SEMMESTRE set 
            statut=1 where id_semmestre='$id'");
    
    	
    //die('vous avez réussit !!!   ');
    header('Location:Dashboard.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>