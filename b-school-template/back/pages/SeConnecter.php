<?php
    session_start();
    require_once('db-connect2.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['password'])?$_POST['password']:"";

    $requete="select*from ENSEIGNANT where login='$login' 
                and MOT_DE_PASSE_enseignant='$pwd'";

    $requeteParent="select*from PARENT where login='$login' 
                and MOT_DE_PASSE_PARENT='$pwd'";
    
    $resultat=$pdo->query($requete);
    $resultatParent=$pdo->query($requeteParent);

    if($user=$resultat->fetch()){
        
        $_SESSION['user']=$user;
        $id_unique_E = $_SESSION['user']['id_unique_E'];
        $status = "Active now";
        
            $conectStatus = $pdo->query("update ENSEIGNANT set 
            statut='$status' where id_unique_E='$id_unique_E'");
            $conectStatus->fetch();      
        
          header('location:Dashboard.php');
          
    }elseif($user=$resultatParent->fetch()){
        $_SESSION['user']=$user;
        $id_unique_p = $_SESSION['user']['id_unique_p'];
        $status = "Active now";
        $conectStatus = $pdo->query("update PARENT set 
            statut='$status' where id_unique_p='$id_unique_p'");
            $conectStatus->fetch();
        
            header('location:Dashboard.php');
}else{
        $_SESSION['erreurLogin']="<strong>Erreur!! </strong> Login ou mot de passe incorrecte!!!";
        
        header('location:login.php');
    }

?>