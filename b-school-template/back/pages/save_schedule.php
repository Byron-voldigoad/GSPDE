<?php 
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: Aucune valeur a sauvegarder.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `CALENDRIER` (`id_enseignant`,`title`,`description`,`start_datetime`,`end_datetime`) VALUES (1,'$title','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `CALENDRIER` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Enregistrement reusit.'); location.replace('./calendrier.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>