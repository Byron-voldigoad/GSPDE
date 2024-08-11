<?php

require_once("db-connect2.php");
$requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
        $id_annee = $annee['id_annee'];
    }

if ($_POST) 
{
    $ma_requete = $pdo->prepare('insert into ELEVE(id_annee,TEL_PARENT, id_classe, NOM_ELEVE, PRENOM_ELEVE, DATE_DE_NAISSANCE_ELEVE, LIEU_DE_NAISSANCE_ELEVE, SEXE_ELEVE)
        VALUES(:id_annee,:TEL_PARENT, :id_classe, :NOM_ELEVE, :PRENOM_ELEVE, :DATE_DE_NAISSANCE_ELEVE, :LIEU_DE_NAISSANCE_ELEVE, :SEXE_ELEVE)');
    	$ma_requete->execute( array(
			'id_annee'=>$id_annee,
    		'TEL_PARENT'=>$_POST['parent'],
			'id_classe'=>$_POST['classe'],
            'NOM_ELEVE'=>$_POST['nom'],
    		'PRENOM_ELEVE'=>$_POST['prenom'],
    		'DATE_DE_NAISSANCE_ELEVE'=>$_POST['date'], 
    		'LIEU_DE_NAISSANCE_ELEVE'=>$_POST['lieu'],
			'SEXE_ELEVE'=>$_POST['sexe']

    	));

    //die('vous avez réussit !!! ');
    header('Location:ListeEleves.php');
}
else{
    echo "Veuillez renseigner tous vos champs";
}
?>