<?php include("parcial/headear.php") ?>
<?php
    require_once("db-connect2.php");
    

$id=$_GET['id'];
$reponse = $pdo->query("select*from vue_notes_eleves2 WHERE n_eleve=".$id);
$reponse2 = $pdo->query("select*from eleve WHERE n_eleve=".$id);
$reponseCount = $pdo->query("select count(*) countS from vue_notes_eleves2 WHERE n_eleve=".$id);
// var_dump($reponse);

$donneescount = $reponseCount->fetch();
$nbrNotes=$donneescount['countS']
?>
<script src="./JS/chart.js"></script>


<div class="kt-portlet">

    <div class="kt-portlet__body">
        <?php
            while ($donnees2 = $reponse2->fetch()){ ?>
        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                <a href="ListeEleves.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Cette page vous affiche les
                stats de l'eleve
                <?php echo $donnees2['NOM_ELEVE']." ".$donnees2['PRENOM_ELEVE'] ?>
                <br>
                <br>
                <h4>Semestre 1</h4>
            </div>

            <?php $count = 0;
            while ($donnees = $reponse->fetch()){ ?>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <input type="hidden" id="id<?php echo $count ?>" value=" <?php echo $donnees['NOM_MATIERE'] ?>">

                    <input type="hidden" id="value<?php echo $count ?>" value="<?php echo $donnees['note1'] ?>">

                    <?php $count++ ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <input type="hidden" id="sectionCount" value="<?php echo $count ?>">

        <!--end::Section-->
    </div>
    <center>
        <?php if($nbrNotes==0){
            echo "<h1>".$donnees2['NOM_ELEVE']." ".$donnees2['PRENOM_ELEVE']." na pas de note</h1>";
        }else{
        echo "<canvas id='camembertChart' width='400' height='400'></canvas>";
         } ?>
        <?php } ?>
    </center>

    <!--end::Form-->
</div>

<script>
const sectionCount = parseInt(document.getElementById('sectionCount').value);
const labels = [];
const data = [];

for (let i = 0; i < sectionCount; i++) {
    const label = document.getElementById('id' + i).value;
    const value = parseInt(document.getElementById('value' + i).value);
    labels.push(label);
    data.push(value);
}

const ctx = document.getElementById('camembertChart');
var options = {
    responsive: false
};
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8B00FF', '#FF7F50', '#98FB98',
                '#FF0080', '#FF007F', '#FF8C69', '#C74266', '#C8A2C8', '#FFFFE0',
                '#98FB98', '#B0C4DE', '#FFC0CB', '#EE82EE', '#F5F5DC', '#87CEEB',
                '#FF4500', '#FFD700', '#4B0082', '#6A5ACD', '#F0E68C', '#E6E6FA',
                '#FFF0F5', '#C0C0C0', '#D3D3D3', '#808080', '#4D4D4D', '#2F4F4F',
                '#000000', '#778899', '#708090', '#696969', '#F5F5F5', '#FAFAFA'
            ]
        }]
    },
    options: options
});
</script>


<?php

$requetesemmestre="select * from semmestre where statut=1";
$resultatsemmestre=$pdo->query($requetesemmestre);
while($semmestre=$resultatsemmestre->fetch()){
    $id_semestre = $semmestre['Num_semestre'];
};


$reponse1 = $pdo->query("select*from vue_notes_eleves2 WHERE n_eleve=".$id);
$reponse21 = $pdo->query("select*from eleve WHERE n_eleve=".$id);
$reponseCount1 = $pdo->query("select count(*) countS from vue_notes_eleves2 WHERE n_eleve=".$id);
// var_dump($reponse);

$donneescount1 = $reponseCount1->fetch();
$nbrNotes1=$donneescount1['countS']
?>
<?php if($id_semestre==2){?>
<div class="kt-portlet">

    <div class="kt-portlet__body">
        <?php
            while ($donnees21 = $reponse21->fetch()){ ?>
        <!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__info">
                <a href="ListeEleves.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Cette page vous affiche les
                stats de l'eleve
                <?php echo $donnees21['NOM_ELEVE']." ".$donnees21['PRENOM_ELEVE'] ?>
                <br>
                <br>
                <h4>Semestre 2</h4>
            </div>

            <?php $count = 0;
            while ($donnees1 = $reponse1->fetch()){ ?>
            <div class="kt-section__content">
                <div class="table-responsive">
                    <input type="hidden" id="id<?php echo $count ?>" value=" <?php echo $donnees1['NOM_MATIERE'] ?>">

                    <input type="hidden" id="value1<?php echo $count ?>" value="<?php echo $donnees1['note2'] ?>">

                    <?php $count++ ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <input type="hidden" id="sectionCount1" value="<?php echo $count ?>">

        <!--end::Section-->
    </div>
    <center>
        <?php if($nbrNotes1==0){
            echo "<h1>".$donnees21['NOM_ELEVE']." ".$donnees21['PRENOM_ELEVE']." na pas de note</h1>";
        }else{
        echo "<canvas id='camembertChart1' width='400' height='400'></canvas>";
         } ?>
        <?php } ?>
    </center>

    <!--end::Form-->
</div>

<script>
const sectionCount1 = parseInt(document.getElementById('sectionCount1').value);
const labels1 = [];
const data1 = [];

for (let i = 0; i < sectionCount1; i++) {
    const label1 = document.getElementById('id' + i).value;
    const value1 = parseInt(document.getElementById('value1' + i).value);
    labels1.push(label1);
    data1.push(value1);
}

const ctx1 = document.getElementById('camembertChart1');
var options = {
    responsive: false
};
new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: labels1,
        datasets: [{
            data: data1,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8B00FF', '#FF7F50', '#98FB98',
                '#FF0080', '#FF007F', '#FF8C69', '#C74266', '#C8A2C8', '#FFFFE0',
                '#98FB98', '#B0C4DE', '#FFC0CB', '#EE82EE', '#F5F5DC', '#87CEEB',
                '#FF4500', '#FFD700', '#4B0082', '#6A5ACD', '#F0E68C', '#E6E6FA',
                '#FFF0F5', '#C0C0C0', '#D3D3D3', '#808080', '#4D4D4D', '#2F4F4F',
                '#000000', '#778899', '#708090', '#696969', '#F5F5F5', '#FAFAFA'
            ]
        }]
    },
    options: options
});
</script>
<?php } ?>
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>