<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");
$id=isset($_GET['id'])?$_GET['id']:0;
$reponse = $pdo->query("select*from MatieresAClasses JOIN MATIERE
                            on MATIERE.ID_MATIERE = MatieresAClasses.ID_MATIERE
                            WHERE id_classe=".$id);
$reponse2 = $pdo->query("select*from classe
                            WHERE id_classe=".$id);



// var_dump($reponse);
?>
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeClasse.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Parent
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="SupprimerMatiereAClasse.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet Supprimer une matiere
                    </div>
                </div>


            </div>
        </div>
        <?php while ($donnees2 = $reponse2->fetch()){?>
        <label>Nom des matiere de la classe de <?php echo $donnees2['nom']; ?></label>
        <?php } ?>

        <?php while ($donnees = $reponse->fetch()){?>


        <div class="row">
            <div class="form-group col-lg-1">

                <input type="hidden" name="ID_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['ID_MATIERE']; ?>">
            </div>
            <div class="form-group col-lg-8">

                <input type="text" name="NOM_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['NOM_MATIERE']; ?>">
            </div>
            <div class="form-group col-lg-3">
                <a href="SupprimerMatiereAclasse.php?id=<?php echo $donnees['ID_MATIERE'] ?>"
                    onclick="return confirm('Etes vous sur de vouloir supprimer Cette matiere de cette classe ?')">
                    <i class="fa fa-trash-alt fa-2x"></i>
                </a>
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