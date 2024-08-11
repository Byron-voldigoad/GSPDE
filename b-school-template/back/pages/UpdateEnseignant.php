<?php
require_once('identifier.php');
require_once("db-connect2.php");



if ($_POST) {
    $id = $_POST['id_enseignant'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $Matricule = $_POST['Matricule'];
    $tel = $_POST['tel'];
    $matiere = $_POST['matiere'];
    $login = $_POST['login'];
    $role = $_POST['role'];
    $sexe = $_POST['sexe'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
    $imageTemp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp, "PHP/images/" . $nomPhoto);
    if (!empty($nomPhoto)) {
        $pdo->query("update ENSEIGNANT set 
                        TEL_ENSEIGNANT='$tel',login='$login',email='$email',MOT_DE_PASSE_enseignant='$password', MATRICULE='$Matricule', NOM_ENSEIGNANT='$nom', 
                        PRENOM_ENSEIGNANT='$prenom', ID_MATIERE='$matiere', 
                        ROLE='$role', SEXE_ENSEIGNANT='$sexe',PHOTO_E='$nomPhoto' where id_enseignant='$id'");
    } else {
        $pdo->query("update ENSEIGNANT set 
                        TEL_ENSEIGNANT='$tel',login='$login',email='$email',MOT_DE_PASSE_enseignant='$password', MATRICULE='$Matricule', NOM_ENSEIGNANT='$nom', 
                        PRENOM_ENSEIGNANT='$prenom', ID_MATIERE='$matiere', 
                        ROLE='$role', SEXE_ENSEIGNANT='$sexe' where id_enseignant='$id'");
    }


    $to = $email;

        $objet = "Initialisation de  votre mot de passe";

        $content = "Votre Compte vient d'etre Modifier,Votre mot de passe est '$password' et votre login est '$login'  veuillez les modifier à la prochine ouverture de session";

        $entetes = "From: GesStag" . "\r\n" . "CC: senkuhasagere@gmail.com";

        mail($to, $objet, $content, $entetes);
    //die('vous avez réussit !!!');
    if ($_SESSION['user']['ROLE'] == 'Admin') {
        header('Location:ListeEnseignant.php');
    }else{
        header('Location:SeDeconnecter.php');
    }
} else {
    echo "Veuillez renseigner tous vos champs";
}