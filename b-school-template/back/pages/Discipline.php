<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");

    $requeteAnnee="select * from ANNEE where statut=1";
$resultatAnnee=$pdo->query($requeteAnnee);
while($annee=$resultatAnnee->fetch()){
    $id_annee = $annee['id_annee'];
}

    $requetemaxid = "select MAX(n_eleve) countM from vue_event where id_annee='$id_annee' group by EvenementID";
$resultatmaxid=$pdo->query($requetemaxid);
$tabmaxid=$resultatmaxid->fetch();
$maxid=$tabmaxid['countM'];

    $requeteEvent="select * from vue_event WHERE EvenementID IS NOT NULL and id_annee='$id_annee'";
    $requeteEleve="select * from Eleve where id_annee='$id_annee'";
   
    $resultatEvent=$pdo->query($requeteEvent);
    $resultatEleve=$pdo->query($requeteEleve);

    for ($i = 0; $i <= $maxid; $i++){ 
        $idetudiant = $i;
        $requeteAbsence="select count(*) countA from EvenementsDisciplinaires 
                        where n_eleve=$idetudiant and TypeEvenement='Absence'";
        
        $resultatAbsence=$pdo->query($requeteAbsence);
        $tabCount=$resultatAbsence->fetch();
        $absence[]=$tabCount['countA'];}
        
    for ($i = 0; $i <= $maxid; $i++){ 
            $idetudiant = $i;
            $requeteRetard="select count(*) from EvenementsDisciplinaires 
                            where n_eleve=$idetudiant and TypeEvenement='Retard'";
            
            $resultatRetard=$pdo->query($requeteRetard);
            $retard[]=$resultatRetard->fetch();}

    for ($i = 0; $i <= $maxid; $i++){ 
        $idetudiant = $i;
        $requeteRetard="select*from EvenementsDisciplinaires 
                        where n_eleve=$idetudiant and TypeEvenement='Sanction'";
                
        $resultatRetard=$pdo->query($requeteRetard);
        $Sactions[]=$resultatRetard->fetch();}
            
            

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Liste des Evenements disciplinaire
            </h3>
        </div>
        <div class="kt-portlet__head-label">
            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
            <h3 class="kt-portlet__head-title">
                <a href="#" data-toggle="modal" data-target="#kt_modal_4">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter des Evenements disciplinaire
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
                Cette page présente la liste des étudiants accompagnée des décisions disciplinaires qui les concernent.
            </div>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Noms</th>
                                <th>Prenoms</th>
                                <th>Absences</th>
                                <th>Retards</th>
                                <th>Description</th>
                                <th>Sanctions</th>
                                <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
                                <th>Actions</th>
                                <?php } ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($event=$resultatEvent->fetch()){ 
                                
                                ?>
                            <?php if ($_SESSION['user']['ROLE']=='PARENT') {?>
                            <?php if ($_SESSION['user']['TEL_PARENT']==$event['TEL_PARENT']) {?>
                            <tr>

                                <th scope="row"><?php echo $event['EvenementID'] ?></th>
                                <td><?php echo $event['NOM_ELEVE'] ?> <input name="idetudiant" type="hidden"
                                        value="<?php echo $event['n_eleve'] ?>"></td>
                                <td><?php echo $event['PRENOM_ELEVE'] ?></td>
                                <td><?php for ($i = 0; $i <= $maxid; $i++){ 
                                    if($i==$event['n_eleve']){
                                        echo $absence[$i];}
                                }?></td>
                                <td><?php for ($i = 0; $i <= $maxid; $i++){ 
                                    if($i==$event['n_eleve']){
                                        echo $retard[$i][0];}
                                }?></td>
                                <td><?php echo $event['Description'] ?></td>
                                <td><?php echo $event['Sanction'] ?></td>
                                <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
                                <td>
                                    <a href="EditerDiscipline.php?id=<?php echo $event['EvenementID'] ?>">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="SupprimerDiscipline.php?id=<?php echo $event['EvenementID'] ?>"
                                        onclick="return confirm('Etes vous sur de vouloir supprimer cet Evenement ?')">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                </td>
                                <?php } ?>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            <tr>

                                <th scope="row"><?php echo $event['EvenementID'] ?></th>
                                <td><?php echo $event['NOM_ELEVE'] ?> <input name="idetudiant" type="hidden"
                                        value="<?php echo $event['n_eleve'] ?>"></td>
                                <td><?php echo $event['PRENOM_ELEVE'] ?></td>
                                <td><?php for ($i = 0; $i <= $maxid; $i++){ 
                                    if($i==$event['n_eleve']){
                                        echo $absence[$i];}
                                }?></td>
                                <td><?php for ($i = 0; $i <= $maxid; $i++){ 
                                    if($i==$event['n_eleve']){
                                        echo $retard[$i][0];}
                                }?></td>
                                <td><?php echo $event['Description'] ?></td>
                                <td><?php echo $event['Sanction'] ?></td>
                                <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                                <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
                                <td>
                                    <a href="EditerDiscipline.php?id=<?php echo $event['EvenementID'] ?>">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    <a href="SupprimerDiscipline.php?id=<?php echo $event['EvenementID'] ?>"
                                        onclick="return confirm('Etes vous sur de vouloir supprimer cet Evenement ?')">
                                        <i class="fa fa-trash-alt fa-2x"></i>
                                    </a>
                                </td>
                                <?php } ?>
                                <?php } ?>
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

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvel Evenement disciplinaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="kt-form" method="POST" action="insertEvents.php">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-last">
                            <div class="alert alert-secondary" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                <div class="alert-text">
                                    Ce formulaire permet d'ajouter une nouvel Evenement disciplinaire
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Nom</label>
                                <select name="choix1" class="form-control" id="choix1">
                                    <option value="Val1">------</option>
                                    <?php while ($eleve=$resultatEleve->fetch()) { ?>
                                    <option value="<?php echo $eleve['n_eleve'] ?>"
                                        <?php if($eleve['n_eleve']===$eleve)?>
                                        <?php if(isset($_POST['choix1']) && $_POST['choix1'] == $eleve['n_eleve']) echo "selected";?>>
                                        <?php echo $eleve['NOM_ELEVE'].' '.$eleve['PRENOM_ELEVE'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Type D'Evenement</label>
                                <select name="choix2" class="form-control" id="choix2">
                                    <option value="Val2">------</option>
                                    <option value="Absence">Absence</option>
                                    <option value="Retard">Retard</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="Date" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Description</label>
                                <textarea id="message" name="Description" rows="4" cols="50"
                                    class="form-control"></textarea><br>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Sanction</label>
                                <textarea id="message" name="Sanction" rows="4" cols="50"
                                    class="form-control"></textarea><br>
                            </div>
                        </div>


                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-brand">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
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