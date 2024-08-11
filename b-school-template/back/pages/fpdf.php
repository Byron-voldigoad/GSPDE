<?php
require('../fpdf.php');
require_once('db-connect2.php');

class PDF extends FPDF
{
    function Header()
    {
        // Entête simple avec le nom des ministères à gauche et la devise du pays à droite
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, 'Ministere de l\'Education', 0, 0, 'L');
        $this->Cell(90);
        $this->Cell(50, 10, 'Devise du Pays', 0, 1, 'R');
        
        // Image au milieu de l'entête
        //$this->Image('logo.png', 70, 15, 70);
        
        // Saut de ligne
        $this->Ln(20);
        
        // Informations sur l'étudiant
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Nom de l\'etudiant: John Doe', 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Filiere: Informatique', 0, 1, 'C');
        $this->Cell(0, 10, 'Annee scolaire: 2022-2023', 0, 1, 'C');
        
        // Saut de ligne
        $this->Ln(10);
        
        // Tableau des notes
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Matiere', 1, 0, 'C');
        $this->Cell(40, 10, 'Note', 1, 1, 'C');
        
        // Données des matières et des notes (à titre d'exemple)
        $matieres = array('Mathematiques', 'Francais', 'Anglais');
        $notes = array('18', '15', '14');
        
        for ($i = 0; $i < count($matieres); $i++) {
            $this->Cell(40, 10, $matieres[$i], 1, 0, 'C');
            $this->Cell(40, 10, $notes[$i], 1, 1, 'C');
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Output();
?>