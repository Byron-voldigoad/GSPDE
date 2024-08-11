<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");

    $requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
        $id_annee = $annee['id_annee'];
    }
    
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['id_enseignant'])?$_GET['id_enseignant']:0;
    
    
      
    $requeteUser="select * from ENSEIGNANT_Affichage where id_annee='$id_annee'";
   
    $resultatUser=$pdo->query($requeteUser);
?>


<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Enseignants
            </h3>
        </div>
        <div class="kt-portlet__head-label">
            <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
            <h3 class="kt-portlet__head-title">
                <a href="AjouterEnseignant.php">
                    <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Nouvel Enseignant
                </a>
                <?php } ?>
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Enseignants.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Matiere</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                <th>Role</th>
                                <?php } ?>
                                <th>Photo</th>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
                                <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($user=$resultatUser->fetch()){ ?>
                            <?php if ($_SESSION['user']['email']!==$user['email']) {?>
                            <tr>
                                <th scope="row"><?php echo $user['id_enseignant'] ?> </th>
                                <td><?php echo $user['NOM_ENSEIGNANT'] ?></td>
                                <td><?php echo $user['PRENOM_ENSEIGNANT'] ?></td>
                                <td><?php echo $user['NOM_MATIERE'] ?></td>
                                <td><?php echo $user['TEL_ENSEIGNANT'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['SEXE_ENSEIGNANT'] ?></td>
                                <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                <td><?php echo $user['ROLE'] ?></td>
                                <?php } ?>
                                <td> <img src="PHP/images/<?php echo $user['PHOTO_E'] ?>" width="50px" height="50px"
                                        style="border-radius: 50%;"></td>
                                <?php if ($_SESSION['user']['ROLE']=='Admin') {?>

                                <td>

                                    <a href="EditerEnseignant.php?id=<?php echo $user['id_enseignant'] ?>">
                                        <i class="fa fa-user-edit fa-2x"></i>
                                    </a>

                                    &nbsp;
                                    &nbsp;
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer l enseignant ?')"
                                        href="SupprimerEnseignant.php?id=<?php echo $user['id_enseignant'] ?>">
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