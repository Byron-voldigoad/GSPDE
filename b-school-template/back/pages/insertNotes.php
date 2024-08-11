<?php
require_once("db-connect2.php");
require_once("../les_fonctions/fonctions.php");

$matiere = isset($_POST['matiere']) ? $_POST['matiere'] : 1;
$requetesemmestre = "select * from semmestre where statut=1";
$resultatsemmestre = $pdo->query($requetesemmestre);
while ($semmestre = $resultatsemmestre->fetch()) {
    $id_semestre = $semmestre['Num_semestre'];
};



if ($_POST) {
    foreach ($_POST["value"] as $note => $eleve) {

        if ($id_semestre == 1) {
            if (rechercher_par_matiere_et_eleve($eleve, $matiere) == 0) {
                $ma_requete = $pdo->prepare('insert into notes(ID_MATIERE,N_ELEVE,note1) 
                                    VALUES(:ID_MATIERE,:N_ELEVE,:note)');

                $ma_requete->execute(array(
                    'ID_MATIERE' => $matiere,
                    'N_ELEVE' => $eleve,
                    'note' => $_POST[$eleve]
                ));

                //die('vous avez réussi !!! ');
                header('Location:ListeNotes.php');
            } else {
                echo " Cet etudiant a deja une note ";
            }
        } elseif ($id_semestre == 2) {
            if (rechercher_par_matiere_et_eleve($eleve, $matiere) == 0) {
                $ma_requete = $pdo->prepare('insert into notes(ID_MATIERE,N_ELEVE,note2) 
                VALUES(:ID_MATIERE,:N_ELEVE,:note)');

                $ma_requete->execute(array(
                    'ID_MATIERE' => $matiere,
                    'N_ELEVE' => $eleve,
                    'note' => $_POST[$eleve]
                ));
                //die('vous avez réussi !!! ');
                header('Location:ListeNotes.php');
            } else {
                $pdo->query("update notes set note2='$_POST[$eleve]' where N_ELEVE='$eleve' and ID_MATIERE='$matiere'");
                //die('vous avez réussi !!! ');
                header('Location:ListeNotes.php');
            }
        } else {
            echo "vous devez selectionner un semestre";
        }
    }
} else {
    echo "Veuillez renseigner tous vos champs";
}