<?php
  session_start(); 
  include("../db-connect2.php");
  $outgoing_id = $_POST["outgoing_id"];
  $incoming_id = $_POST["incoming_id"];
  $message = $_POST["message"];
  if(isset($_SESSION['user']['id_unique_p'])){
  
    if(!empty($message)){
        $sql = "INSERT INTO message (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')" or die();
        $query = $pdo->query($sql);
        $row = $query->fetch();
    }
  }else{
    
    if(!empty($message)){
        $sql = "INSERT INTO message (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')" or die();
        $query = $pdo->query($sql);
        $row = $query->fetch();
    }
  }
  
?>