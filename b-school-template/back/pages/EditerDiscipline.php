<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");
$id=isset($_GET['id'])?$_GET['id']:0;
$reponse = $pdo->query("select*from vue_event WHERE EvenementID=".$id);

$requeteEleve="select * from Eleve";
$resultatEleve=$pdo->query($requeteEleve);



// var_dump($reponse);
while ($donnees = $reponse->fetch()){ ?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="Discipline.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Classe
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="UpdateDiscipline.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet de Modifier les evenement disciplinaire d'un etudiant
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                <input type="hidden" name="EvenementID" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['EvenementID']; ?>">
            </div>
            <div class="form-group col-lg-10">
                <label>Nom et Prenom</label>
                <select name="choix1" class="form-control" id="choix1">
                    <option value="<?php echo $donnees['n_eleve'] ?>">
                        <?php echo $donnees['NOM_ELEVE'].' '.$donnees['PRENOM_ELEVE'] ?></option>
                    <?php while ($eleve=$resultatEleve->fetch()) { ?>
                    <?php if($eleve['N_ELEVE']!==$donnees['n_eleve']) {?>
                    <option value="<?php echo $eleve['N_ELEVE'] ?>" <?php if($eleve['N_ELEVE']===$eleve)?>
                        <?php if(isset($_POST['choix1']) && $_POST['choix1'] == $eleve['n_eleve']) echo "selected";?>>
                        <?php echo $eleve['NOM_ELEVE'].' '.$eleve['PRENOM_ELEVE'] ?> </option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </div>


        </div>
        <div class="row">
            <div class="form-group col-lg-1">
                <input type="hidden" name="EvenementID" class="form-control" placeholder="Entrer le nom de la matiere"
                    value="<?php echo $donnees['EvenementID']; ?>">
            </div>
            <div class="form-group col-lg-5">
                <label>Description</label>
                <textarea id="message" name="Description" rows="4" cols="50"
                    class="form-control"><?php echo $donnees['Description']; ?></textarea><br>
            </div>
            <div class="form-group col-lg-5">
                <label>Sanctions</label>
                <textarea id="message" name="Sanction" rows="4" cols="50"
                    class="form-control"><?php echo $donnees['Sanction']; ?></textarea><br>
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