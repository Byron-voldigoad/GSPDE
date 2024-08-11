<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");  
$id=$_GET['id'];
$reponse = $pdo->query("select*from PARENT WHERE ID_PARENT=".$id);
// var_dump($reponse);
while ($donnees = $reponse->fetch()){ ?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeParent.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Parent
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateParent.php" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de modifier les données d'un Parent
                    </div>
                </div>


            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $id ?>" name="ID_PARENT" class="form-control">
                <label>Nom</label>
                <input type="text" value="<?php echo $donnees['NOM_PARENT']; ?>" name="nom" class="form-control"
                    placeholder="Entrer votre nom" required>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" value="<?php echo $donnees['PRENOM_PARENT']; ?>" name="prenom"
                        class="form-control" placeholder="Entrer votre prenom">
                </div>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" value="<?php echo $donnees['TEL_PARENT']; ?>" name="tel" class="form-control"
                        placeholder="Entrer votre prenom">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Mot de passe</label>
                    <input type="text" value="<?php echo $donnees['MOT_DE_PASSE_PARENT']; ?>" name="password"
                        class="form-control" placeholder="Entrer le mot de passe de l'Enseignant" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" value="<?php echo $donnees['email']; ?>" name="email" class="form-control"
                        placeholder="Entrer le Login de l'Enseignant" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Sexe</label>
                <div class="col-9">
                    <div class="kt-radio-inline">
                        <?php if($donnees['SEXE_PARENT']=="Masculin"){?>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Masculin" checked> M
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Feminin"> F
                            <span></span>
                        </label>
                        <?php }else{ ?>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Masculin"> M
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Feminin" checked> F
                            <span></span>
                        </label>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" name="photo" />
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