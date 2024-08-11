<?php

require_once("db-connect2.php");
$random_id = rand(time(), 10000000);
$requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
        $id_annee = $annee['id_annee'];
    }
    


if ($_POST) 
{
	$status = "Offline now";
	$login = $_POST['login'];
	$pwd = $random_pwd = rand(1000, 99999);
    $ma_requete = $pdo->prepare('insert into ENSEIGNANT(id_annee,id_unique_E,MOT_DE_PASSE_enseignant,login,email,ID_MATIERE,NOM_ENSEIGNANT,PRENOM_ENSEIGNANT,SEXE_ENSEIGNANT,TEL_ENSEIGNANT,MATRICULE,ROLE,statut)
        VALUES(:id_annee,:unique_id_e,:pwd,:login,:email,:ID_MATIERE,:nom,:prenom,:sexe,:tel,:matricule,:role,:statut)');
    	$ma_requete->execute( array(
			'id_annee'=>$id_annee,
    		'unique_id_e'=>$random_id,
			'pwd'=>$pwd,
			'login'=>$login,
			'email'=>$_POST['email'],
            'nom'=>$_POST['nom'],
    		'prenom'=>$_POST['prenom'],
    		'sexe'=>$_POST['sexe'],
			'ID_MATIERE'=>$_POST['matiere'],
    		'tel'=>$_POST['tel'], 
    		'matricule'=>$_POST['Matricule'],
    		'role'=>$_POST['role'],
			'statut'=>$status

    	));

		$to = $_POST['email'];

        $objet = "Initialisation de  votre mot de passe";

        $content = "Votre Compte vient d'etre cree,Votre mot de passe est '$pwd' et votre login est '$login'  veuillez les modifier à la prochine ouverture de session";

        $entetes = "From: GesStag" . "\r\n" . "CC: senkuhasagere@gmail.com";

        mail($to, $objet, $content, $entetes);
		
    //die('vous avez réussit !!!');
    header('Location:ListeEnseignant.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}

?>