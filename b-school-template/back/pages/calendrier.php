<?php
    require_once("db-connect2.php");  

    $requeteAnnee="select * from ANNEE where statut=1";
    $resultatAnnee=$pdo->query($requeteAnnee);
    while($annee=$resultatAnnee->fetch()){
        $id_annee = $annee['id_annee'];
    }
?>
<?php require_once('db-connect.php') ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="Calendrier/css/bootstrap.min.css">
    <link rel="stylesheet" href="Calendrier/fullcalendar/lib/main.min.css">
    <script src="Calendrier/js/jquery-3.6.0.min.js"></script>
    <script src="Calendrier/js/bootstrap.min.js"></script>
    <script src="Calendrier/fullcalendar/lib/main.min.js"></script>
    <style>
    :root {
        --bs-success-rgb: 71, 222, 152 !important;
    }

    html,
    body {
        height: 100%;
        width: 100%;

    }

    .btn-info.text-light:hover,
    .btn-info.text-light:focus {
        background: #000;
    }

    table,
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #ededed !important;
        border-style: solid;
        border-width: 1px !important;
    }
    </style>
</head>
<?php include("parcial/headear.php") ?>

<body class="bg-light">
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Formulaire D'evenemets</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Titre</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                                        id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Debut</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">Fin</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                                    class="fa fa-save"></i> Sauvegarder</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                                    class="fa fa-reset"></i> Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Details du calendrier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Titre</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Debut</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Fin</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                        <?php if ($_SESSION['user']['id_annee']==$id_annee ) {?>
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                            data-id="">Editer</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                            data-id="">Supprimer</button>
                        <?php } ?>
                        <?php } ?>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php 
$schedules = $conn->query("SELECT * FROM `CALENDRIER`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
    <?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="Calendrier/js/script.js"></script>
<script src="JS/Date.js"></script>

</html>
<?php include("parcial/script.php") ?>