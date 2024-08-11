<?php include("parcial/headear.php") ?>
<?php
require_once("db-connect2.php");
$reponse = $pdo->query("select*from PARENT WHERE ID_PARENT=1");
// var_dump($reponse);
while ($donnees = $reponse->fetch()) { ?>
<script src="./JS/chart.js"></script>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeParent.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Modifier Parent
            </h3>
        </div>
    </div>

    <!--begin::Form-->

    <div class="kt-portlet__body">
        <div class="form-group form-group-last">

        </div>
        <div class="form-group">
            <input type="text" id="label" value="<?php echo 1 ?>" name="ID_PARENT" class="form-control"
                placeholder="Entrer le nom de l'éleve">
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="text" id="tel" value="<?php echo $donnees['TEL_PARENT']; ?>" name="tel" class="form-control"
                placeholder="Entrer votre prenom">
        </div>

    </div>
    <?php } ?>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-brand">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>

    </div>

    <canvas id="camembertChart" width="400" height="400"></canvas>

    <!--end::Form-->
</div>
<script>
const label = document.getElementById('label').value;
const value = parseInt(document.getElementById('tel').value);

var data = {
    labels: [label, 'B', 'C', 'D'],
    datasets: [{
        data: [value, value, value, value],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
    }]
};

// Options du camembert
var options = {
    responsive: false
};

// Créer un graphique en camembert
var ctx = document.getElementById('camembertChart').getContext('2d');
var camembertChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
console.log("fqfq");
</script>
<!--end::Modal-->
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>