<?php include("parcial/headear.php") ?>

<?php 
require_once("db-connect2.php");


$Annee=isset($_GET['id_annee'])?$_GET['id_annee']:0;


$requeteAnnee="select * from ANNEE";


$resultatAnnee=$pdo->query($requeteAnnee);
$resultatAnnee2=$pdo->query($requeteAnnee);

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                </i></a>&nbsp;&nbsp;Choix de l'année Scolaire
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateAnneeScolaire.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de changer l'Année Scolaire en cour
                    </div>
                </div>


            </div>
            <div class="form-group">
                <label for="exampleSelect1">Année</label>
                <select class="form-control" id="exampleSelect1" name="id_annee">
                    <?php while ($matiere=$resultatAnnee->fetch()) { ?>
                    <option value="<?php echo $matiere['id_annee'] ?>"
                        <?php if($matiere['id_annee']===$Annee) echo "selected" ?>>
                        <?php echo $matiere['dateDebut'].'-'.$matiere['dateFin'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-brand">Enregistrer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>



<?php
$message2 ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    while ($annee=$resultatAnnee2->fetch()) {
        $AD = $annee['dateFin'];
    }
    $AF = $AD + 1;

        $ma_requete = $pdo->prepare('insert into ANNEE(dateDebut,dateFin,statut) VALUES(:dateDebut,:dateFin,:statut)');
            $ma_requete->execute( array(
                'dateDebut'=>$AD,
                'dateFin'=>$AF,
                'statut'=>0

            ));

        $message2 = "Enregistrement réussit !!! Vous venez d'ajouter l'anne scolaire ".$AD."-".$AF;

}else{

}
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                &nbsp;&nbsp;Nouvel Annee Scolaire
            </h3>
        </div>
        <div class="kt-portlet__head-label">

        </div>
    </div>

    <div class="kt-portlet__body">
        <!--begin::Form-->
        <form class="kt-form" method="POST">
            <div class="kt-portlet__body">
                <div class="form-group form-group-last">

                    <div class="alert alert-secondary" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                        <div class="alert-text">
                            Ce formulaire permet d'enregistrer une nouvelle Annee Scolaire:
                            cliquer sur le bouton pour ajouter une nouvel annee
                        </div>

                    </div>
                    <?php if ($message2 !== "")
                    {?>
                    <div class="alert alert-secondary" role="alert">
                        <div class="alert-icon"><i class="fa fa-check-circle kt-font-success"></i></div>
                        <div class="alert-text">
                            <?php echo $message2; ?>
                        </div>
                        <?php } ?>


                    </div>
                    <div class="row">
                        <div class="kt-form__actions col-lg-5">

                        </div>
                        <div class="kt-form__actions col-lg-5">
                            <button type="submit" class="btn btn-brand">Ajouter</button>
                        </div>
                    </div>

                </div>

                <div class="kt-portlet__foot">

                </div>
        </form>
        <!--end::Form-->
    </div>
</div>

<?php 


$Semmestre=isset($_GET['id_semmestre'])?$_GET['id_semmestre']:0;


$requeteSemmestre="select * from SEMMESTRE";


$resultatSemmestre=$pdo->query($requeteSemmestre);

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Coix du semmestre
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateSemestre.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de changer le semestre en cour
                    </div>
                </div>


            </div>
            <div class="form-group">
                <label for="exampleSelect1">Semestre</label>
                <select class="form-control" id="exampleSelect1" name="id_semmestre">
                    <?php while ($semmestre=$resultatSemmestre->fetch()) { ?>
                    <option value="<?php echo $semmestre['id_semmestre'] ?>"
                        <?php if($semmestre['id_semmestre']===$Semmestre) echo "selected" ?>>
                        <?php echo 'Semestre '.$semmestre['Num_semestre'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-brand">Enregistrer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>

<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>