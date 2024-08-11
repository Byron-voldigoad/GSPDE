<?php

function rechercher_par_matiere_et_eleve($ideleve,$idmatiere){
    global $pdo;
    $requete=$pdo->prepare("select * from notes where N_ELEVE =? and ID_MATIERE =?");
    $requete->execute(array($ideleve,$idmatiere));
    return $requete->rowCount();
}

function rechercher_par_email_e($email){
    global $pdo;
    $requete=$pdo->prepare("select * from ENSEIGNANT where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}
function rechercher_par_email_p($email){
    global $pdo;
    $requete=$pdo->prepare("select * from PARENT where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_par_tel_p($tel){
    global $pdo;
    $requete=$pdo->prepare("select * from ELEVE where TEL_PARENT =?");
    $requete->execute(array($tel));
    return $requete->rowCount();
}

function rechercher_user_par_email_p($email){
    global $pdo;

    $requete=$pdo->prepare("select * from PARENT where email =?");

    $requete->execute(array($email));

    $user=$requete->fetch();

    if($user)
        return $user;
    else
        return null;
}

function rechercher_user_par_email_e($email){
    global $pdo;

    $requete=$pdo->prepare("select * from ENSEIGNANT where email =?");

    $requete->execute(array($email));

    $user=$requete->fetch();

    if($user)
        return $user;
    else
        return null;
}