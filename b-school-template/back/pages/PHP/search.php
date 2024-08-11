<?php
session_start();
    include_once "../db-connect2.php";
    if ($_SESSION['user']['ROLE']=='PARENT') {
        $searchTern = $_POST['searchTern'];
        $outgoing_id = $_SESSION['user']['id_unique_p'];
        $output = "";
        $resultatUser = $pdo->query("SELECT * FROM ENSEIGNANT WHERE (NOM_ENSEIGNANT LIKE '%{$searchTern}%' OR PRENOM_ENSEIGNANT LIKE '%{$searchTern}%')");
        if($resultatUser->fetch()) {
            include "data.php";
        }else{
            $output .= "No user found related to your search tern";
        }
    }else{
        $searchTern = $_POST['searchTern'];
        $outgoing_id = $_SESSION['user']['id_unique_E'];
        $output = "";
        $resultatUser = $pdo->query("SELECT * FROM PARENT WHERE (NOM_PARENT LIKE '%{$searchTern}%' OR PRENOM_PARENT LIKE '%{$searchTern}%')");
        if($resultatUser->fetch()) {
            include "data.php";
        }else{
            $output .= "No user found related to your search tern";
        }

    }
    echo $output;
?>