<?php

require_once("db-connect2.php");


if ($_POST) 
{
    $id=$_POST['ID_PARENT'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $sexe = $_POST['sexe'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
        $imageTemp=$_FILES['photo']['tmp_name'];
        move_uploaded_file($imageTemp,"PHP/images/".$nomPhoto);
        if(!empty($nomPhoto)){
            $pdo->query("update PARENT set 
                        TEL_PARENT='$tel', NOM_PARENT='$nom', email='$email',MOT_DE_PASSE_PARENT='$password',
                        PRENOM_PARENT='$prenom', SEXE_PARENT='$sexe', PHOTO_P='$nomPhoto' where ID_PARENT='$id'");
        }else{
            $pdo->query("update PARENT set 
                        TEL_PARENT='$tel', NOM_PARENT='$nom', email='$email',MOT_DE_PASSE_PARENT='$password',
                        PRENOM_PARENT='$prenom', SEXE_PARENT='$sexe' where ID_PARENT='$id'");
        }
    
    	
    //die('vous avez réussit !!!   ');
        header('Location:Dashboard.php');

}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>