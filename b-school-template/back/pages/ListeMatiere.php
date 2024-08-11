<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    
    $requeteMatiere="select * from MATIERE group by id_matiere";
   
    $resultatMatiere=$pdo->query($requeteMatiere);
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Matieres
            </h3>
        </div>
        <div class="kt-portlet__head-label">
            <?php if ($_SESSION['user']['ROLE']=='Admin') {?>

            <h3 class="kt-portlet__head-title">
                <a href="#" data-toggle="modal" data-target="#kt_modal_4">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nouvelle Matieres
                </a>
                <?php } ?>

            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Matieres.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($Matiere=$resultatMatiere->fetch()){ ?>
                            <tr>
                                <th scope="row"><?php echo $Matiere['ID_MATIERE'] ?></th>
                                <td><?php echo $Matiere['NOM_MATIERE'] ?></td>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                                <td>
                                    <a href="EditerMatiere.php?id=<?php echo $Matiere['ID_MATIERE'] ?>">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="SupprimerMatiere.php?id=<?php echo $Matiere['ID_MATIERE'] ?>"
                                        onclick="return confirm('Etes vous sur de vouloir supprimer <?php echo $Matiere['NOM_MATIERE'] ?> ?')">
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


<!--begin::Modal add-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvelle matiere</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="kt-form" method="POST" action="insertMatiere.php">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                <div class="alert-text">
                                    Ce formulaire permet d'ajouter une nouvelle matiere
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nom" class="form-control"
                                placeholder="Entrer le nom de la matiere">
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

<!--end::Modal add-->

<!--end::Modal update-->
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>