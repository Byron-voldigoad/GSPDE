<?php include("parcial/headear.php") ?>

<?php
    require_once("db-connect2.php");
    
    
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $Classe=isset($_GET['id_classe'])?$_GET['id_classe']:0;
    $Matiere=isset($_GET['ID_MATIERE'])?$_GET['ID_MATIERE']:0;

    $requeteClasse="select * from classe";
    $requeteMatiere="select * from Matiere";
    $requeteMatiere2="select * from Matiere";

    $resultatClasse=$pdo->query($requeteClasse);
    $resultatMatiere=$pdo->query($requeteMatiere);
    $resultatMatiere2=$pdo->query($requeteMatiere2);

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Nouvelle classe
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="InsertMatieresAClasses.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">
                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet d'attribuer une des matieres a des classe
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Selectionner la classe</label>
                <select name="choix1" class="form-control" id="">
                    <option value="Val1"
                        <?php if(isset($_POST['choix1']) && $_POST['choix1'] == "Val1") echo "selected";?>>
                        -----</option>
                    <?php while ($classe=$resultatClasse->fetch()) { ?>
                    <option value="<?php echo $classe['id_classe'] ?>" <?php if($classe['id_classe']===$Classe)?>
                        <?php if(isset($_POST['choix1']) && $_POST['choix1'] == $classe['id_classe']) echo "selected";?>>
                        <?php echo $classe['nom']." ".$classe['niveau']   ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Selectionner la Matiere</label>
                <select name="choix2" class="form-control" id="choix2">
                    <option value="Val2">------</option
                        <?php if(isset($_POST['choix2']) && $_POST['choix2'] == "Val2") echo "selected";?>>
                    <?php while ($matiere=$resultatMatiere->fetch()) { ?>
                    <option value="<?php echo $matiere['ID_MATIERE'] ?>"
                        <?php if($matiere['ID_MATIERE']===$Matiere) echo "selected" ?>
                        <?php if(isset($_POST['choix2']) && $_POST['choix2'] == $matiere['ID_MATIERE']) echo "selected";?>>
                        <?php echo $matiere['NOM_MATIERE']?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Nombre de credit</label>
                <input type="number" name="credit" class="form-control">
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

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                <div class="alert-text">
                                    Ce formulaire permet Verifier votre enregistrement
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nom:</label>
                            <p class="form-control-static">IGL</p>
                        </div>
                        <div class="form-group">
                            <label>Niveau:</label>
                            <p class="form-control-static">II</p>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Modifier</button>
                <button type="button" class="btn btn-primary">Continuer</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>