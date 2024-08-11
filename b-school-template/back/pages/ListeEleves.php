<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");
    
    $requeteAnnee="select * from ANNEE where statut=1";
$resultatAnnee=$pdo->query($requeteAnnee);
while($annee=$resultatAnnee->fetch()){
    $id_annee = $annee['id_annee'];
}
    
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:8;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $TelParent = 0;
    if ($_SESSION['user']['ROLE']=='PARENT') {
    $TelParent = $_SESSION["user"]["TEL_PARENT"];
    }
    
    $requeteFiliere="select * from classe";

    if($idfiliere==0){
        $requeteStagiaire="select N_ELEVE,NOM_ELEVE,PRENOM_ELEVE,TEL_PARENT,nom,SEXE_ELEVE,niveau 
                from classe as f,ELEVE as e
                where f.id_classe=e.id_classe
                and (NOM_ELEVE like '%$nomPrenom%' or PRENOM_ELEVE like '%$nomPrenom%') and e.id_annee='$id_annee'
                order by N_ELEVE";
        
        $requeteCount="select count(*) countS from ELEVE
                where NOM_ELEVE like '%$nomPrenom%' or PRENOM_ELEVE like '%$nomPrenom%'";
    }else{
         $requeteStagiaire="select N_ELEVE,NOM_ELEVE,PRENOM_ELEVE,nom,SEXE_ELEVE,niveau
         from classe as f,ELEVE as e
         where f.id_classe=e.id_classe
         and (NOM_ELEVE like '%$nomPrenom%' or PRENOM_ELEVE like '%$nomPrenom%') and e.id_annee='$id_annee'
                and f.id_classe=$idfiliere
                 order by N_ELEVE";
        
        $requeteCount="select count(*) countS from ELEVE
                where (NOM_ELEVE like '%$nomPrenom%' or PRENOM_ELEVE like '%$nomPrenom%')
                and id_classe=$idfiliere";
    }

    $requeteCountEnfant="select count(*) countEF from ELEVE
                where (NOM_ELEVE like '%$nomPrenom%' or PRENOM_ELEVE like '%$nomPrenom%')
                and TEL_PARENT=$TelParent";

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatUser=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);


    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;   

    $resultatCountEnfant=$pdo->query($requeteCountEnfant);
        
    $tabCountEnfant=$resultatCountEnfant->fetch();
    $nbrEnfant=$tabCountEnfant['countEF']; 
?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Etudiants (
                <?php if ($_SESSION['user']['ROLE']!='PARENT') {
                        echo $nbrStagiaire;
                }     else{
                        echo $nbrEnfant;}?>
                Etudiants)
            </h3>
        </div>
        <div style="margin-top: 10px;" class="kt-input-icon kt-input-icon--right kt-subheader__search col-lg-7">
            <div class="panel-body">
                <form method="get" action="ListeEleves.php" class="form-inline">
                    <div class="form-group">

                        <input type="text" name="nomPrenom" placeholder="Nom et prénom" class="form-control"
                            value="<?php echo $nomPrenom ?>" />
                    </div>
                    <label for="idfiliere">Filière:</label>

                    <select name="idfiliere" class="form-control" id="idfiliere" onchange="this.form.submit()">

                        <option value=0>Toutes les filières</option>

                        <?php while ($filiere=$resultatFiliere->fetch()) { ?>

                        <option value="<?php echo $filiere['id_classe'] ?>"
                            <?php if($filiere['id_classe']===$idfiliere) echo "selected" ?>>

                            <?php echo $filiere['nom'].' '.$filiere['niveau'] ?>

                        </option>

                        <?php } ?>

                    </select>
                    <button type="submit" class="btn btn-secondary">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher...
                    </button>
                </form>
            </div>
        </div>


        <div class="kt-portlet__head-label">

            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <?php if ($_SESSION['user']['id_annee']==$id_annee || $_SESSION['user']['ROLE']=="Admin") {?>
            <h3 class="kt-portlet__head-title">
                <a href="AjouterEleve.php">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Nouvel Etudiant
                </a>
                <?php } ?>
                <?php } ?>
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                Cette page vous affiche la liste des Etudiants.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Sexe</th>
                                <th>Filliere</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($user=$resultatUser->fetch()){ ?>
                            <?php if ($_SESSION['user']['ROLE']=='PARENT') {?>
                            <?php if ($_SESSION['user']['TEL_PARENT']==$user['TEL_PARENT']) {?>
                            <tr>
                                <th scope="row"><?php echo $user['N_ELEVE'] ?></th>
                                <td><?php echo $user['NOM_ELEVE'] ?></td>
                                <td><?php echo $user['PRENOM_ELEVE'] ?></td>
                                <td><?php echo $user['SEXE_ELEVE'] ?></td>
                                <td><?php echo $user['nom'].' '.$user['niveau'] ?></td>

                                <td>
                                    <a href="GrapheEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-chart-pie fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="ReleverNotes.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-print fa-2x"></i>
                                    </a>
                                    <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                    <?php if ($_SESSION['user']['id_annee']==$id_annee || $_SESSION['user']['ROLE']=="Admin") {?>
                                    &nbsp;
                                    &nbsp;
                                    <a href="EditerEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-user-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer l Etudiant ?')"
                                        href="SupprimerEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                    <?php } ?>
                                    <?php } ?>
                                </td>

                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <th scope="row"><?php echo $user['N_ELEVE'] ?></th>
                                <td><?php echo $user['NOM_ELEVE'] ?></td>
                                <td><?php echo $user['PRENOM_ELEVE'] ?></td>
                                <td><?php echo $user['SEXE_ELEVE'] ?></td>
                                <td><?php echo $user['nom'].' '.$user['niveau'] ?></td>

                                <td>
                                    <a href="GrapheEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-chart-pie fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="ReleverNotes.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-print fa-2x"></i>
                                    </a>
                                    <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                    <?php if ($_SESSION['user']['id_annee']==$id_annee || $_SESSION['user']['ROLE']=="Admin") {?>
                                    &nbsp;
                                    &nbsp;
                                    <a href="EditerEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-user-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer l Etudiant ?')"
                                        href="SupprimerEleve.php?id=<?php echo $user['N_ELEVE'] ?>">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                    <?php } ?>
                                    <?php } ?>
                                </td>

                            </tr>
                            <?php } ?>
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