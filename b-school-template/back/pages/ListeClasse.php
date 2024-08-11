<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");
    
    $requeteUser="select * from classe";
    $requeteMatieresAClasses="select * from vue_matiereclasse group by id_classe";
   
    $resultatUser=$pdo->query($requeteUser);
    $resultatMatieresAClasses=$pdo->query($requeteMatieresAClasses);


?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Fillieres
            </h3>
        </div>
        <div class="kt-portlet__head-label">
            <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
            <h3 class="kt-portlet__head-title">
                <a href="#" data-toggle="modal" data-target="#kt_modal_4">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nouvelle Filliere
                </a>
                <?php } ?>
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Fillieres.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Niveau</th>
                                <th>Matieres (credit)</th>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($user=$resultatMatieresAClasses->fetch()){ ?>
                            <tr>
                                <th scope="row"><?php echo $user['id_classe'] ?></th>
                                <td><?php echo $user['nom'] ?></td>
                                <td><?php echo $user['niveau'] ?></td>
                                <td>
                                    <ul>
                                        <?php
                                            // Afficher les matières associées à cette classe
                                            $classeId = $user['id_classe'];
                                            if(isset($classeId)){
                                                $queryMatiere = "SELECT m.nom_matiere,m.id_matiere,mc.credit FROM matiere m INNER JOIN MatieresAClasses mc ON m.ID_MATIERE = mc.ID_MATIERE WHERE mc.id_classe = $classeId";
                                            $resultatMatiere = $pdo->query($queryMatiere);
                                            while($matiere = $resultatMatiere->fetch()) {
                                                echo "<li>" . $matiere['nom_matiere'].' ('.$matiere['credit'].')' ."</li>";

                                        }
                                        }

                                        ?>
                                    </ul>
                                </td>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                                <td>
                                    <a href="EditerClasse.php?id=<?php echo $user['id_classe'] ?>"
                                        data-toggle="kt-tooltip" title="Editer Classe" data-placement="left">
                                        <i class="fa fa-pen fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="SupprimerClasse.php?id=<?php echo $user['id_classe'] ?>"
                                        onclick="return confirm('Etes vous sur de vouloir supprimer Cette Classe ?')"
                                        data-toggle="kt-tooltip" title="Supprimer Classe" data-placement="left">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <a href="EditerMatiereAclasse.php?id=<?php echo $user['id_classe'] ?>"
                                        data-toggle="kt-tooltip" title="Supprimer Matiere" data-placement="left">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>


                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!--end::Section-->
    </div>

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
                <form class="kt-form" method="POST" action="insertClasse.php">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                <div class="alert-text">
                                    Ce formulaire permet d'ajouter une nouvelle Filliere
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de la classe">
                        </div>
                        <div class="form-group">
                            <label>Niveau</label>
                            <input type="text" name="niveau" class="form-control"
                                placeholder="Entrer le niveau de la classe">
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-brand">Enregistrer</button>
                            <button type="reset" class="btn btn-secondary">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->

<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>