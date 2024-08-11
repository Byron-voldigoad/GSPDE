<?php
require_once("db-connect2.php");

$id=$_GET['id'];
echo $id;
$reponse = $pdo->query("select*from MatieresAClasses JOIN MATIERE
                     on MATIERE.ID_MATIERE = MatieresAClasses.ID_MATIERE WHERE id_classe=".$id);



while ($donnees = $reponse->fetch()){?>
<input type="text" name="ID_MATIERE" class="form-control" placeholder="Entrer le nom de la matiere"
    value="<?php echo $donnees['NOM_MATIERE']; ?>">
<input type="checkbox">


<?php } ?>