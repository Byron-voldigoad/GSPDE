<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM ENSEIGNANT WHERE id_enseignant=" .$id);
header('Location:ListeEnseignant.php');

?>