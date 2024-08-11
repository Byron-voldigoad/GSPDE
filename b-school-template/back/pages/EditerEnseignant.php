<?php include("parcial/headear.php") ?>
<?php 
require_once("db-connect2.php");

$requeteMatiere="select * from Matiere";

$resultatMatiere=$pdo->query($requeteMatiere);

$id=$_GET['id'];
$reponse = $pdo->query("select*from ENSEIGNANT join MATIERE on ENSEIGNANT.ID_MATIERE=MATIERE.ID_MATIERE WHERE id_enseignant=".$id);
// var_dump($reponse);
while ($donnees = $reponse->fetch()){
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeEnseignant.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Enseignant
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateEnseignant.php" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">
                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de modifier le profil d'un nouvel Enseignant
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <input type="hidden" value="<?php echo $id ?>" name="id_enseignant" class="form-control"
                        placeholder="Entrer le nom de l'éleve">
                    <label>Nom</label>
                    <input type="text" value="<?php echo $donnees['NOM_ENSEIGNANT']; ?>" name="nom" class="form-control"
                        placeholder="Entrer le nom de l'Enseignant" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" value="<?php echo $donnees['PRENOM_ENSEIGNANT']; ?>" name="prenom"
                        class="form-control" placeholder="Entrer le prenom de l'Enseignant">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Matricule</label>
                    <input type="text" value="<?php echo $donnees['MATRICULE']; ?>" name="Matricule"
                        class="form-control" placeholder="Entrer le Matricule de l'Enseignant" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Telephone</label>
                    <input type="text" value="<?php echo $donnees['TEL_ENSEIGNANT']; ?>" name="tel" class="form-control"
                        placeholder="Entrer le Telephone de l'Enseignant" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Mot de passe</label>
                    <input type="text" value="<?php echo $donnees['MOT_DE_PASSE_enseignant']; ?>" name="password"
                        class="form-control" placeholder="Entrer le mot de passe de l'Enseignant" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>email</label>
                    <input type="email" value="<?php echo $donnees['email']; ?>" name="email" class="form-control"
                        placeholder="Entrer le Login de l'Enseignant" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Sexe</label>
                <div class="col-3">
                    <div class="kt-radio-inline">
                        <?php if($donnees['SEXE_ENSEIGNANT']=="Masculin"){?>
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

                <div class="form-group col-lg-6">
                    <label>Login</label>
                    <input type="login" value="<?php echo $donnees['login']; ?>" name="login" class="form-control"
                        placeholder="Entrer le Login de l'Enseignant" required>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Matiere</label>
                    <select class="form-control" id="exampleSelect1" name="matiere">
                        <option value="<?php echo $donnees['ID_MATIERE']; ?>">
                            <?php echo $donnees['NOM_MATIERE']; ?>
                        </option>
                        <?php while ($matiere=$resultatMatiere->fetch()) { ?>
                        <?php if($matiere['ID_MATIERE']!=$donnees['ID_MATIERE']){?>
                        <option value="<?php echo $matiere['ID_MATIERE']; ?>"
                            <?php if($matiere['ID_MATIERE']===$Matiere) echo "selected" ?>>
                            <?php if($matiere['NOM_MATIERE']!=$donnees['NOM_MATIERE']){ echo $matiere['NOM_MATIERE'];}else{} ?>
                        </option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Role</label>
                    <select class="form-control" id="exampleSelect1" name="role">
                        <option value="<?php echo $donnees['ROLE']; ?>" selected><?php echo $donnees['ROLE']; ?>
                        </option>
                        <?php if($donnees['ROLE']=="user"){?>
                        <option value="Admin">Admin</option>
                        <?php }else{?>
                        <option value="user">User</option>
                        <?php }?>
                    </select>
                </div>
                <?php } ?>
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


    <script src="JS/Date.js"></script>
    <?php include("parcial/script.php") ?>