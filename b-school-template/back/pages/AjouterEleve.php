<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");

$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Classe = isset($_GET['id_classe']) ? $_GET['id_classe'] : 0;
$nomPrenomP = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$Parent = isset($_GET['ID_PARENT']) ? $_GET['id_classeID_PARENT'] : 0;

$requeteClasse = "select * from classe";
$requeteParent = "select * from PARENT";

$resultatClasse = $pdo->query($requeteClasse);
$resultatParent = $pdo->query($requeteParent);
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeEleves.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Nouvel Eleve
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="insertEleve.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">
                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet d'enregistrer un nouvel Etudiant
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de l'Etudiant">
                </div>
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Entrer le prenom de l'Etudiant">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Filliere</label>
                    <select class="form-control" id="exampleSelect1" name="classe">
                        <?php while ($classe = $resultatClasse->fetch()) { ?>
                        <option value="<?php echo $classe['id_classe'] ?>"
                            <?php if ($classe['id_classe'] === $Classe) echo "selected" ?>>
                            <?php echo $classe['nom'] . ' ' . $classe['niveau'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Tel du parent</label>
                    <input type="text" name="parent" class="form-control" max=""
                        placeholder="Entrer le Telephone du parent de l'éleve">
                </div>
            </div>
            <div class="row">
                <div class="form-group row col-lg-6">
                    <label class="">Date de naissance</label>
                    <div class="input-group date">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleTextarea">Lieu de naissance</label>
                    <input type="text" name="lieu" class="form-control">
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