<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM classe WHERE id_classe=" .$id);
header('Location:ListeClasse.php');

?>