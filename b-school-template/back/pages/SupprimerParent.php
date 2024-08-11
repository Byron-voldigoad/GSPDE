<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM PARENT WHERE ID_PARENT=" .$id);
header('Location:ListeParent.php');

?>