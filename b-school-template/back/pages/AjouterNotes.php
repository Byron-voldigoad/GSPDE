<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");

$requeteAnnee = "select * from ANNEE where statut=1";
$resultatAnnee = $pdo->query($requeteAnnee);
while ($annee = $resultatAnnee->fetch()) {
    $id_annee = $annee['id_annee'];
}


$name = [];
$note = [];
$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Matiere = isset($_GET['ID_MATIERE']) ? $_GET['ID_MATIERE'] : 0;

$nomPrenom2 = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Classe = isset($_POST['id_classe']) ? $_POST['id_classe'] : 0;

$nomPrenom3 = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Eleve = isset($_GET['N_ELEVE']) ? $_GET['N_ELEVE'] : 0;
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

$requeteEleve = "select*from vue_notes_eleves where ID_MATIERE=$Cl and ID_CLASSE=$Cl2";
$requeteEleve2 = "select*from vue_notes_eleves where ID_CLASSE=0";


$resultatEleve = $pdo->query($requeteEleve2);
if (isset($_POST['choix1'])) {
    $valeurChoix = $_POST['choix1'];
    $valeurChoix2 = $_POST['choix2'];
    if ($valeurChoix == "Val1") {
    } else {

        if ($valeurChoix2 == "Val2") {
            $resultatEleve = $pdo->query($requeteEleve3);
        } else {
            $resultatEleve = $pdo->query($requeteEleve3);
        }
    }
}
$resultatClasse = $pdo->query($requeteClasse);
$resultatMatiere = $pdo->query($requeteMatiere);
$resultatMatiere2 = $pdo->query($requeteMatiere2);

?>
<!-- <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
            <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                <span><i class="flaticon2-search-1"></i></span>
            </span>
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker"
                data-toggle="kt-tooltip" title="" data-placement="left"
                data-original-title="Select dashboard daterange">
                <span class="kt-subheader__btn-daterange-title"
                    id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                <i class="flaticon2-calendar-1"></i>
            </a>

        </div>
    </div>
</div> -->
<div class="kt-portlet">

    <div style="height:90px;" class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
        <form method="post" action="" id="form1" action="insertNotes.php">
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="exampleSelect1">Selectionner la Filliere</label>
                    <select name="choix1" class="form-control" id="" onchange="this.form.submit()">
                        <option value="Val1" <?php if (isset($_POST['choix1']) && $_POST['choix1'] == "Val1") echo "selected"; ?>>
                            -----</option>
                        <?php while ($classe = $resultatClasse->fetch()) { ?>
                            <option value="<?php echo $classe['id_classe'] ?>" <?php if ($classe['id_classe'] === $Classe) ?> <?php if (isset($_POST['choix1']) && $_POST['choix1'] == $classe['id_classe']) echo "selected"; ?>>
                                <?php echo $classe['nom'] . " " . $classe['niveau'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-lg-6">
                    <label for="exampleSelect1">Selectionner la Matiere</label>
                    <select name="choix2" class="form-control" id="choix2" onchange="this.form.submit()">
                        <option value="Val2">------</option <?php if (isset($_POST['choix2']) && $_POST['choix2'] == "Val2") echo "selected"; ?>>
                        <?php while ($matiere = $resultatMatiere->fetch()) { ?>
                            <option value="<?php echo $matiere['ID_MATIERE'] ?>" <?php if ($matiere['ID_MATIERE'] === $Matiere) echo "selected" ?> <?php if (isset($_POST['choix2']) && $_POST['choix2'] == $matiere['ID_MATIERE']) echo "selected"; ?>>
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
                    Gestion des notes
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form" method="POST" action="insertNotes.php" id="form2">
            <div class="kt-portlet__body">
                <div class="form-group form-group-last">
                    <div class="alert alert-secondary" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                        <div class="alert-text">
                            Ce formulaire permet d'attribuer des notes au etudiants
                        </div>
                    </div>
                </div>
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Notes</th>

                                </tr>
                            </thead>
                            <tbody>


                                <?php while ($eleve = $resultatEleve->fetch()) { ?>
                                    <tr>
                                        <td><?php echo $eleve['NOM_ELEVE'] ?></td>
                                        <td><?php echo $eleve['PRENOM_ELEVE'] ?></td>
                                        <td>
                                            <div style="display:flex;">
                                                <input name="<?php echo $eleve['n_eleve'] ?>" type="text" class="form-control" placeholder="Entrer la note de <?php echo $eleve['NOM_ELEVE'] ?>">&nbsp;

                                            </div>
                                            <?php
                                            $name[] = $eleve['n_eleve'];

                                            ?>

                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php

                            foreach ($name as $value) {

                                echo ' <input name="value[]" type="hidden" value="' . $value . '">';
                            }
                            ?>
                        </table>
                        <input name="matiere" type="hidden" value="<?php echo isset($_POST['choix2']) ? $_POST['choix2'] : ''; ?>">
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-brand">Enregistrer</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
        </form>

    </div>


    <!--end::Form-->
</div>


<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>