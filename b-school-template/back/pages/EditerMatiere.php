<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");
$id=isset($_GET['id'])?$_GET['id']:0;
$reponse = $pdo->query("select*from MATIERE WHERE ID_MATIERE=".$id);



// var_dump($reponse);
while ($donnees = $reponse->fetch()){ ?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeMatiere.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Matiere
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateMatiere.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet Modifier une matiere
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                <input type="hidden" name="ID_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['ID_MATIERE']; ?>">
            </div>
            <div class="form-group col-lg-8">
                <label>Nom</label>
                <input type="text" name="NOM_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['NOM_MATIERE']; ?>">
            </div>

        </div>

        <?php } ?>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-brand">Enregistrer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>

<!--end::Modal-->
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>