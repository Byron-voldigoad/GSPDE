<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM ELEVE WHERE N_ELEVE=" .$id);
header('Location:ListeEleves.php');

?>