<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");?>


<link rel="stylesheet" href="css/style.css" />


<body>

    <div class="row" style="margin-left:27rem;">
        <div class="wrapper col-8">
            <section class="users">
                <header>
                    <?php
                    
    require_once("db-connect2.php");
    if ($_SESSION['user']['ROLE']!='PARENT') {
                    $sql = "SELECT * FROM ENSEIGNANT WHERE id_unique_E = {$_SESSION['user']['id_unique_E']}";
                    $resultatUser=$pdo->query($sql);
                    $row=$resultatUser->fetch();
                    }else{
                        $sql = "SELECT * FROM PARENT WHERE id_unique_p = {$_SESSION['user']['id_unique_p']}";
                    $resultatUser=$pdo->query($sql);
                    $row=$resultatUser->fetch();
                    }
                    ?>

                    <div class="content">
                        <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                        <img src="php/images/<?php echo $row['PHOTO_E']?>" alt="" />
                        <div class="details">
                            <span><?php echo $row['NOM_ENSEIGNANT']. " " . $row['PRENOM_ENSEIGNANT'] ?></span>
                            <p><?php echo $row['statut']?></p>
                        </div>
                        <?php }else{ ?>
                        <img src="php/images/<?php echo $row['PHOTO_P']?>" alt="" />
                        <div class="details">
                            <span><?php echo $row['NOM_PARENT']. " " . $row['PRENOM_PARENT'] ?></span>
                            <p><?php echo $row['statut']?></p>
                        </div>
                        <?php } ?>
                    </div>

                </header>
                <div class="search">
                    <span class="text">Selectionner un destinataire</span>
                    <input type="text" placeholder="Enter name to search..." />
                    <button><i class="fa fa-search"></i></button>
                </div>
                <div class="users-list">

                </div>
            </section>
        </div>

</body>
<script src="JS/user.js"></script>
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>