<?php
require('db-connect2.php');

$id=$_GET['id'];
$pdo->query("DELETE FROM commentaires WHERE id_commentaire=" .$id);
header('Location:ListeComment.php');

?>