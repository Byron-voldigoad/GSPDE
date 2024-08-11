<?php include("parcial/headear.php") ?>
<?php 
require_once("db-connect2.php");

$nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$Classe=isset($_GET['id_classe'])?$_GET['id_classe']:0;
$nomPrenomP=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$Parent=isset($_GET['ID_PARENT'])?$_GET['ID_PARENT']:0;

$requeteClasse="select * from classe";
$requeteParent="select * from PARENT";

$resultatClasse=$pdo->query($requeteClasse);
$resultatParent=$pdo->query($requeteParent);
$id=$_GET['id'];
$reponse = $pdo->query("select*from ELEVE join classe on ELEVE.id_classe=classe.id_classe WHERE N_ELEVE=".$id);
// var_dump($reponse);
while ($donnees = $reponse->fetch()){ ?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeEleves.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Nouvel Eleve
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateEleve.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">
                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de modifier les donnees d'un nouvel éleve
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php echo $donnees['n_eleve']; ?>" name="N_ELEVE" class="form-control"
                placeholder="Entrer le nom de l'éleve">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Nom</label>
                    <input type="text" value="<?php echo $donnees['NOM_ELEVE']; ?>" name="nom" class="form-control"
                        placeholder="Entrer le nom de l'éleve">
                </div>
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" value="<?php echo $donnees['PRENOM_ELEVE']; ?>" name="prenom"
                        class="form-control" placeholder="Entrer le prenom de l'éleve">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="exampleSelect1">Classe</label>
                    <select class="form-control" id="exampleSelect1" name="classe">
                        <option value="<?php echo $donnees['id_classe']; ?>">
                            <?php echo $donnees['nom'].' '.$donnees['niveau']; ?>
                        </option>
                        <?php while ($classe=$resultatClasse->fetch()) { ?>
                        <?php if($classe['id_classe']!=$donnees['id_classe']){ ?>
                        <option value="<?php echo $classe['id_classe']; ?>"
                            <?php if($classe['id_classe']===$Classe) echo "selected" ?>>
                            <?php if($classe['nom']!=$donnees['nom']){ echo $classe['nom'].' '.$classe['niveau'];}else{} ?>
                        </option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Tel du parent</label>
                    <input type="text" value="<?php echo $donnees['TEL_PARENT']; ?>" name="parent" class="form-control"
                        placeholder="Entrer le prenom de l'éleve">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Date de naissance</label>
                    <div class="input-group date">
                        <input type="date" value="<?php echo $donnees['DATE_DE_NAISSANCE_ELEVE']; ?>" name="date"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleTextarea">Lieu de naissance</label>
                    <input type="text" value="<?php echo $donnees['LIEU_DE_NAISSANCE_ELEVE']; ?>" name="lieu"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Sexe</label>
                <div class="col-9">
                    <div class="kt-radio-inline">
                        <?php if($donnees['SEXE_ELEVE']=="Masculin"){?>
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
        </div>
        <?php } ?>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-brand">Enregistrer</button>
                <a class="btn btn-secondary" href="./ListeEleves.php">Annuler</a>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>

<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>