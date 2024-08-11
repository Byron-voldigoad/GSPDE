<?php include("parcial/headear.php") ?>
<?php 
require_once("db-connect2.php");

$nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$Matiere=isset($_GET['ID_MATIERE'])?$_GET['ID_MATIERE']:0;


$requeteMatiere="select * from Matiere";


$resultatMatiere=$pdo->query($requeteMatiere);

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeEnseignant.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Nouvel Enseignant
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="insertEnseignant.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">
                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet d'enregistrer un nouvel Enseignant
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de l'Enseignant"
                        required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" name="prenom" class="form-control"
                        placeholder="Entrer le prenom de l'Enseignant">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrer le email de l'Enseignant"
                        required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Login</label>
                    <input type="text" name="login" class="form-control" placeholder="Entrer le login de l'Enseignant">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Matricule</label>
                    <input type="text" name="Matricule" class="form-control"
                        placeholder="Entrer le Matricule de l'Enseignant" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Telephone</label>
                    <input type="text" name="tel" maxlength="9" minlength="9" class="form-control"
                        placeholder="Entrer le Telephone de l'Enseignant" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label">Sexe</label>
                <div class="col-9">
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Masculin" checked> M
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Feminin"> F
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Matiere</label>
                    <select class="form-control" id="exampleSelect1" name="matiere">
                        <?php while ($matiere=$resultatMatiere->fetch()) { ?>
                        <option value="<?php echo $matiere['ID_MATIERE'] ?>"
                            <?php if($matiere['ID_MATIERE']===$Matiere) echo "selected" ?>>
                            <?php echo $matiere['NOM_MATIERE'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Role</label>
                    <select class="form-control" id="exampleSelect1" name="role">
                        <option value="Admin">Admin</option>
                        <option value="user" selected>User</option>
                    </select>
                </div>
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


    <script src="JS/Date.js"></script>
    <?php include("parcial/script.php") ?>