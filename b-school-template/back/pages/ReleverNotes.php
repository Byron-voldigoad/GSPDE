<?php
require('../fpdf.php');
require_once('db-connect2.php');

$requeteAnnee = "select * from ANNEE where statut=1";
$resultatAnnee = $pdo->query($requeteAnnee);
while ($annee = $resultatAnnee->fetch()) {
    $id_annee = $annee['id_annee'];
}
 
$id = $_GET['id'];

$requeteEtudiant = "select * from vue_notes_eleves3 where n_eleve=$id";

$resultatEtudiant = $pdo->query($requeteEtudiant);


class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        try {

            $pdo = new PDO("mysql:host=localhost;dbname=GSPDE","root", "");
        
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        
            //die('Erreur : impossible de se connecter à la base de donnée');
        }

        global $semestre;
        $id = $_GET['id'];
        //nom de l'etudiant
        $requeteEtudiantNom = "select * from vue_notes_eleves3 where n_eleve=$id";
        $resultatEtudiantNom = $pdo->query($requeteEtudiantNom);
        while ($etudiant = $resultatEtudiantNom->fetch()) {
            $nomPrenom = $etudiant['NOM_ELEVE'].' '.$etudiant['PRENOM_ELEVE'];
            $filiere = $etudiant['id_classe'];
            //$semestre = $etudiant['id_semmestre'];
        }
        $requetesemmestre = "select * from semmestre where statut=1";
$resultatsemmestre = $pdo->query($requetesemmestre);
while ($semmestre = $resultatsemmestre->fetch()) {
    $semestre = $semmestre['Num_semestre'];
};


        $requeteEtudiantNom2 = "select * from eleve where n_eleve=$id";
        $resultatEtudiantNom2 = $pdo->query($requeteEtudiantNom2);
        while ($etudiant = $resultatEtudiantNom2->fetch()) {
            $dateN = $etudiant['DATE_DE_NAISSANCE_ELEVE'];
            $lieuN = $etudiant['LIEU_DE_NAISSANCE_ELEVE'];
            $filiere = $etudiant['id_classe'];
        }


        //filliere de l'etudiant 
        $requeteFilliere = "select * from classe where id_classe=$filiere";
        $resultatFilliere = $pdo->query($requeteFilliere);
        while ($filliere = $resultatFilliere->fetch()) {
            $filiere = $filliere['nom'].' '.$filliere['niveau'];
        }

        //annee scolaire
        $requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
            $annee = $annee['dateDebut'].' / '.$annee['dateFin'];
        }
        
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 12);
        // Décalage à droite
        //$this->Cell(80);
        $this->Image('../header.jpg', 13, 5, 180);
       
        // Saut de ligne
        $this->Ln(40);
        
        $this->Cell(50);
        $this->Cell(0, 10, 'RELEVE DE NOTE / TRANSCRIPT', 0, 1, 'L');
        $this->Ln(10);
        // Informations sur l'étudiant
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Nom de l\'etudiant: '.$nomPrenom.'                                                                            Semestre: '.$semestre, 0, 1, 'L');
        $this->SetFont('Arial', '', 10);

        $this->Cell(0, 10, 'Ne le : '.$dateN.'    A :'.$lieuN, 0, 1, 'L');
        $this->Cell(0, 10, 'Specialite: '.$filiere, 0, 1, 'L');
        
          //annee scolaire
          $requeteAnnee="select * from ANNEE where statut=1";
          $resultatAnnee=$pdo->query($requeteAnnee);
          while($annee=$resultatAnnee->fetch()){
                  $annee = $annee['dateDebut'].' / '.$annee['dateFin'];
                  $this->Cell(0, 10, 'Annee scolaire: '.$annee, 0, 1, 'L');
              }
        
    }

    

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Créer l'objet de tableau

$pdf->Cell(80, 10, 'Matiere', 1);
$pdf->Cell(40, 10, 'Note/20', 1);
$pdf->Cell(40, 10, 'Note/5', 1);
$pdf->Cell(20, 10, 'credit', 1);
// $pdf->Cell(80, 10, 'Matiere', 1);
// $pdf->Cell(20, 10, 'Note', 1);
$pdf->Ln();
$ms=0;
$i=0;
$cred=0;

//Insérer des valeurs dans le tableau
while ($etudiant = $resultatEtudiant->fetch()) {
    // $pdf->Cell(40, 10, $etudiant['NOM_ELEVE'], 1);
    // $pdf->Cell(40, 10, $etudiant['PRENOM_ELEVE'], 1);
    $pdf->Cell(80, 10, $etudiant['NOM_MATIERE'], 1);
    if($semestre==1){
        $pdf->Cell(40, 10, $etudiant['note1'], 1);
        $pdf->Cell(40, 10, $etudiant['note1']/4, 1);
        $pdf->Cell(20, 10, $etudiant['credit'], 1);
        $ms = $ms + $etudiant['note1'];
        $i++;
        if($etudiant['note1']>10){
            $cred= $cred + $etudiant['credit'];
        }
    }else{
        $pdf->Cell(40, 10, $etudiant['note2'], 1);
        $pdf->Cell(40, 10, $etudiant['note2']/4, 1);
        $pdf->Cell(20, 10, $etudiant['credit'], 1);
        $ms = $ms + $etudiant['note1'];
        $i++;
        if($etudiant['note1']>10){
            $cred= $cred + $etudiant['credit'];
        }
    }
    
    $pdf->Ln();
}
$ms=$ms/$i;
$n=$ms/5;
$n=number_format($n,2);
$ms=number_format($ms,2);
$pdf->Ln(5);
$pdf->Cell(100, 10, 'Moyenne Semestre: '.$ms.'/20', 1);
$pdf->Cell(40, 10, 'Note: '.$n.'/5', 1);
$pdf->Cell(40, 10, 'Credit: '.$cred, 1);
$pdf->Ln();

//Générer le PDF
$pdf->Output();