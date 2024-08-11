<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");

$requeteComment = "select * from commentaires";

$resultatComment = $pdo->query($requeteComment);
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Commentaires
            </h3>
        </div>
        <div class="kt-portlet__head-label">


            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Commentaires.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Commentaire</th>
                                <?php if ($_SESSION['user']['ROLE'] == 'Admin') { ?>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($Comment = $resultatComment->fetch()) { ?>
                            <tr>
                                <th scope="row"><?php echo $Comment['id_commentaire'] ?></th>
                                <td><?php echo $Comment['nom'] ?></td>
                                <td><?php echo $Comment['Email'] ?></td>
                                <td><?php echo $Comment['comment'] ?></td>
                                <?php if ($_SESSION['user']['ROLE'] == 'Admin') { ?>
                                <td>

                                    <a href="SupprimerComment.php?id=<?php echo $Comment['id_commentaire'] ?>"
                                        onclick="return confirm('Etes vous sur de vouloir supprimer le commentaire de <?php echo $Comment['nom'] ?> ?')">
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

<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>