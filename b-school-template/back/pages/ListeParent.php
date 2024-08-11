<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");

$requeteAnnee = "select * from ANNEE where statut=1";
$resultatAnnee = $pdo->query($requeteAnnee);
while ($annee = $resultatAnnee->fetch()) {
    $id_annee = $annee['id_annee'];
}

$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$idfiliere = isset($_GET['ID_PARENT']) ? $_GET['ID_PARENT'] : 0;


$requeteParent = "select * from PARENT";

$resultatParent = $pdo->query($requeteParent);



?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Parents
            </h3>
        </div>
        <div class="kt-portlet__head-label">
            <?php if ($_SESSION['user']['ROLE'] !== "PARENT") { ?>
            <?php if ($_SESSION['user']['id_annee'] == $id_annee  || $_SESSION['user']['ROLE'] == "Admin") { ?>
            <h3 class="kt-portlet__head-title">
                <a href="AjouterParent.php">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nouveau Parents
                </a>
            </h3>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Parents.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Telephone</th>
                                <th>Sexe</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <?php if ($_SESSION['user']['ROLE'] == "Admin") { ?>
                                <?php if ($_SESSION['user']['ROLE'] !== "PARENT") { ?>
                                <th>Actions</th>
                                <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($parent = $resultatParent->fetch()) { ?>
                            <tr>
                                <th scope="row"><?php echo $parent['ID_PARENT'] ?> </th>
                                <td><?php echo $parent['NOM_PARENT'] ?></td>
                                <td><?php echo $parent['PRENOM_PARENT'] ?></td>
                                <td><?php echo $parent['TEL_PARENT'] ?></td>
                                <td><?php echo $parent['SEXE_PARENT'] ?></td>
                                <td><?php echo $parent['email'] ?></td>
                                <td> <img src="PHP/images/<?php echo $parent['PHOTO_P'] ?>" width="50px" height="50px"
                                        style="border-radius: 50%;"></td>
                                <?php if ($_SESSION['user']['ROLE'] == "Admin") { ?>
                                <?php if ($_SESSION['user']['ROLE'] !== "PARENT") { ?>
                                <td>
                                    <a href="EditerParent.php?id=<?php echo $parent['ID_PARENT'] ?>">
                                        <i class="fa fa-user-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer <?php echo $parent['NOM_PARENT'] ?> ?')"
                                        href="SupprimerParent.php?id=<?php echo $parent['ID_PARENT'] ?>">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                </td>
                                <?php } ?>
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