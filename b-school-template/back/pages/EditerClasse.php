<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");
$id=isset($_GET['id'])?$_GET['id']:0;
$reponse = $pdo->query("select*from classe WHERE id_classe=".$id);



// var_dump($reponse);
while ($donnees = $reponse->fetch()){ ?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeClasse.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Filliere
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateClasse.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de Modifier une Filliere
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                <input type="hidden" name="ID_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['id_classe']; ?>">
            </div>
            <div class="form-group col-lg-5">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de la clasee"
                    value="<?php echo $donnees['nom']; ?>">
            </div>
            <div class="form-group col-lg-5">
                <label>Niveau</label>
                <input type="text" name="niveau" class="form-control" placeholder="Entrer le niveau de la classe"
                    value="<?php echo $donnees['niveau']; ?>">
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