<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");

$requeteAnnee="select * from ANNEE where statut=1";
$resultatAnnee=$pdo->query($requeteAnnee);
while($annee=$resultatAnnee->fetch()){
    $id_annee = $annee['id_annee'];
}

$requetesemmestre="select * from semmestre where statut=1";
$resultatsemmestre=$pdo->query($requetesemmestre);
while($semmestre=$resultatsemmestre->fetch()){
    $id_semestre = $semmestre['Num_semestre'];
};


$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Classe = isset($_GET['id_classe']) ? $_GET['id_classe'] : 0;
$Matiere = isset($_GET['ID_MATIERE']) ? $_GET['ID_MATIERE'] : 0;

if (isset($_POST['choix2'])) {
    $Cl = $_POST['choix2'];
} else {
    $Cl = 0;
}
if (isset($_POST['choix1'])) {
    $Cl2 = $_POST['choix1'];
} else {
    $Cl2 = 0;
}
$requeteClasse = "select * from classe where id_annee='$id_annee'";
$requeteMatiere = "select * from vue_matiereclassenote where ID_CLASSE=$Cl2";
$requeteMatiere2 = "select * from Matiere";
$requeteEleve2 = "select * from ELEVE where N_ELEVE=0";
$requeteEleve3 = "select * from ELEVE where ID_CLASSE=$Cl2";

$requeteEleve = "select*from vue_notes_eleves3 where ID_MATIERE=$Cl and id_classe=$Cl2";
$requeteEleve2 = "select*from vue_notes_eleves3 where id_classe=0";


$resultatEleve = $pdo->query($requeteEleve2);
if (isset($_POST['choix1'])) {
    $valeurChoix = $_POST['choix1'];
    $valeurChoix2 = $_POST['choix2'];
    if ($valeurChoix == "Val1") {
    } else {

        if ($valeurChoix2 == "Val2") {
            $resultatEleve = $pdo->query($requeteEleve3);
        } else {
            $resultatEleve = $pdo->query($requeteEleve);
        }
    }
}
$resultatClasse = $pdo->query($requeteClasse);
$resultatMatiere = $pdo->query($requeteMatiere);
$resultatMatiere2 = $pdo->query($requeteMatiere2);

?>
<div class="kt-portlet">

    <div style="height:90px;" class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
        <form method="post">
            <div class=" form-group row">
                <div class="col-lg-6">
                    <label for="exampleSelect1">Selectionner la Filliere</label>
                    <select name="choix1" class="form-control" id="" onchange="this.form.submit()">
                        <option value="Val1"
                            <?php if (isset($_POST['choix1']) && $_POST['choix1'] == "Val1") echo "selected"; ?>>
                            -----</option>
                        <?php while ($classe = $resultatClasse->fetch()) { ?>
                        <option value="<?php echo $classe['id_classe'] ?>"
                            <?php if ($classe['id_classe'] === $Classe) ?>
                            <?php if (isset($_POST['choix1']) && $_POST['choix1'] == $classe['id_classe']) echo "selected"; ?>>
                            <?php echo $classe['nom'] . " " . $classe['niveau'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="exampleSelect1">Selectionner la Matiere</label>
                    <select name="choix2" class="form-control" id="choix2" onchange="this.form.submit()">
                        <option value="Val2">------</option
                            <?php if (isset($_POST['choix2']) && $_POST['choix2'] == "Val2") echo "selected"; ?>>
                        <?php while ($matiere = $resultatMatiere->fetch()) { ?>
                        <option value="<?php echo $matiere['ID_MATIERE'] ?>"
                            <?php if ($matiere['ID_MATIERE'] === $Matiere) echo "selected" ?>
                            <?php if (isset($_POST['choix2']) && $_POST['choix2'] == $matiere['ID_MATIERE']) echo "selected"; ?>>
                            <?php echo $matiere['NOM_MATIERE'] ?>
                        </option>
                        <?php } ?>
                    </select>

                </div>
            </div>
        </form>
    </div>
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Liste des Notes
                </h3>
            </div>
            <div class="kt-portlet__head-label">
                <?php if ($_SESSION['user']['ROLE'] != 'PARENT') { ?>
                <?php if ($_SESSION['user']['id_annee'] == $id_annee  || $_SESSION['user']['ROLE'] == "Admin") { ?>
                <h3 class="kt-portlet__head-title">
                    <a href="AjouterNotes.php">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Inserer des notes
                    </a>
                    <?php } ?>
                    <?php } ?>
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__info">
                    Cette page vous affiche la liste des performances.
                </div>
                <div class="kt-section__content">
                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>

                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Notes (Semestre 1)</th>
                                    <?php if($id_semestre==2){?>
                                    <th>Notes (Semestre 2)</th>
                                    <?php } ?>
                                </tr>

                            </thead>

                            <tbody>
                                <?php while ($eleves = $resultatEleve->fetch()) { ?>
                                <tr>
                                    <th scope="row"><?php echo $eleves['n_eleve'] ?></th>
                                    <td><?php echo $eleves['NOM_ELEVE'] ?></td>
                                    <td><?php echo $eleves['PRENOM_ELEVE'] ?></td>
                                    <td><?php if ($valeurChoix2 !== "Val2") {
                                               
                                                echo $eleves['note1'];
                                            
                                            } ?>
                                    </td>
                                    <?php if($id_semestre==2){?>
                                    <td><?php if ($valeurChoix2 !== "Val2") {
                                        
                                            echo $eleves['note2'];
                                        
                                            } ?>
                                    </td>
                                    <?php } ?>
                                </tr>

                            </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>

            <!--end::Section-->
        </div>

        <!--end::Form-->
    </div>
</div>


<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>