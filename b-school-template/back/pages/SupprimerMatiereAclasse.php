<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM MatieresAClasses WHERE ID_MATIERE=" .$id);
header('Location:ListeClasse.php');

?>