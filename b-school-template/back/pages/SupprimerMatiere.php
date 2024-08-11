<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM MATIERE WHERE ID_MATIERE=" .$id);
header('Location:ListeMatiere.php');

?>