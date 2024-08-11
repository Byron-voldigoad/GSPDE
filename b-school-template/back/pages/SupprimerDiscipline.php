<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM EvenementsDisciplinaires WHERE EvenementID=" .$id);

header('Location:Discipline.php');

?>