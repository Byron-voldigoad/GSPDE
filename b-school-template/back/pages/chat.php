<?php include("parcial/headear.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Realtime Chap App</title>
</head>

<body>
    <div class="row" style="margin-left:27rem;">
        <div class="wrapper col-lg-8 col-sm-8">
            <section class="chat-area">
                <header>

                    <?php
                require_once("db-connect2.php");
                $user_id = $_GET["user_id"];
                if ($_SESSION['user']['ROLE']=='PARENT') {
                    
                    $resultatSql = $pdo->query("SELECT * FROM ENSEIGNANT WHERE id_unique_E = $user_id");
                  }else{
                    $resultatSql = $pdo->query("SELECT * FROM PARENT WHERE id_unique_p = $user_id");
                  }
                  $sql=$resultatSql->fetch();
                ?>
                    <a href="user.php" class="back-icon"><i class="fa fa-arrow-left"></i></i></a>
                    <?php if ($_SESSION['user']['ROLE']=='PARENT') {?>
                    <img src="php/images/<?php echo $sql['PHOTO_E']?>" alt="">
                    <div class="details">
                        <span><?php echo $sql['NOM_ENSEIGNANT']. " " . $sql['PRENOM_ENSEIGNANT'] ?></span>
                    </div>
                    <?php }else{ ?>
                    <img src="php/images/<?php echo $sql['PHOTO_P']?>" alt="">
                    <div class="details">
                        <span><?php echo $sql['NOM_PARENT']. " " . $sql['PRENOM_PARENT'] ?></span>
                    </div>
                    <?php } ?>

                </header>
                <div class="chat-box">


                </div>

                <form action="#" class="typing-area">
                    <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user']['id_unique_E'];?>" hidden>
                    <?php }else{ ?>
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user']['id_unique_p'];?>" hidden>
                    <?php } ?>
                    <input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
                    <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
    </div>
</body>

<script src="JS/chat.js"></script>
<script src="JS/Date.js"></script>

</html>
<?php include("parcial/script.php") ?>