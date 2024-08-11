<?php

require_once("db-connect2.php");
require_once("../les_fonctions/fonctions.php");
$random_id = rand(time(), 10000000);
$random_pwd = rand(1000, 99999);
// $requeteAnnee = "select * from ANNEE where statut=1";
// $resultatAnnee = $pdo->query($requeteAnnee);
// while ($annee = $resultatAnnee->fetch()) {
// 	$id_annee = $annee['id_annee'];
// }

if ($_POST) {

	if (rechercher_par_email_e($_POST['email']) > 0) {
		echo 'Désolé cet email exsite deja';
		header("refresh:5;url=ListeParent.php");
	} elseif (rechercher_par_email_p($_POST['email']) > 0) {
		echo 'Désolé cet email exsite deja';

		header("refresh:5;url=ListeParent.php");
	}elseif (rechercher_par_tel_p($_POST['tel']) == 0) {
		echo "Désolé Mais ce parent ne poccede pas d'enfant enregistrer";

		header("refresh:5;url=ListeParent.php");
	}  else {

		$login = $_POST['login'];
		$status = "Offline now";
		$ma_requete = $pdo->prepare('insert into PARENT(id_unique_p,NOM_PARENT,PRENOM_PARENT,SEXE_PARENT,TEL_PARENT,MOT_DE_PASSE_PARENT,email,login,Role,statut)
    VALUES(:id_unique_p,:nom,:prenom,:sexe,:tel,:pwd,:email,:login,:role,:statut)');
		$ma_requete->execute(array(
			'id_unique_p' => $random_id,
			'nom' => $_POST['nom'],
			'prenom' => $_POST['prenom'],
			'sexe' => $_POST['sexe'],
			'tel' => $_POST['tel'],
			'pwd' => $random_pwd,
			'email' => $_POST['email'],
			'login' => $_POST['login'],
			'role' => "PARENT",
			'statut' => $status

		));

		$to = $_POST['email'];

        $objet = "Initialisation de  votre mot de passe";

        $content = "Votre Compte vient d'etre cree,Votre mot de passe est '$random_pwd' et votre login est '$login'  veuillez les modifier à la prochine ouverture de session";

        $entetes = "From: GesStag" . "\r\n" . "CC: senkuhasagere@gmail.com";

        mail($to, $objet, $content, $entetes);

		//die('vous avez réussit !!!');
		header('Location:ListeParent.php');
	}
} else {
	echo "Veuillez renseigner tous vos champs";
}