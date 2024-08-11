<?php

    session_start();
    require_once('db-connect2.php');
    $status = "Offline now";
    
        

        if ($_SESSION['user']['ROLE']=='PARENT') {
            $id_unique_p = $_SESSION['user']['id_unique_p'];
            $conectStatusParent = $pdo->query("update PARENT set 
                statut='$status' where id_unique_p='$id_unique_p'");
            $conectStatusParent->fetch();
                
    session_destroy();
    
    header('location:../../');
        }else{
            $id_unique_E = $_SESSION['user']['id_unique_E'];
            $conectStatus = $pdo->query("update ENSEIGNANT set 
        statut='$status' where id_unique_E='$id_unique_E'");
            $conectStatus->fetch();
            
    session_destroy();
    
    header('location:../../');
        }

   
?>