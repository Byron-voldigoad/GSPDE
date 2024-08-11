<?php
  session_start();
  include("../db-connect2.php");
  $requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
        $id_annee = $annee['id_annee'];
    }
  if ($_SESSION['user']['ROLE']=='PARENT') {
    $outgoing_id = $_SESSION['user']['id_unique_p'];
    $sql = "SELECT * FROM ENSEIGNANT where id_annee='$id_annee';";
   
  }else{
    $outgoing_id = $_SESSION['user']['id_unique_E'];
    $sql = "SELECT * FROM vue_parents_eleves;";
  }
  $output = "";

  $resultatUser=$pdo->query($sql);
      
    include "data.php";
    echo $output;
?>