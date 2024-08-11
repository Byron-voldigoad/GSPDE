<?php include("parcial/headear.php") ?>


<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <a href="ListeParent.php"><i class="fa fa-arrow-left"></i></a>&nbsp;&nbsp;Nouveau Parent
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" method="POST" action="insertParent.php">
        <div class="kt-portlet__body">
            <div class="form-group form-group-last">

                <div class="alert alert-secondary" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                    <div class="alert-text">
                        Ce formulaire permet d enregistrer un nouveau Parent
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrer le nom du parent" required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Prenom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Entrer le prenom du parent">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrer l'Email du parent"
                        required>
                </div>
                <div class="form-group col-lg-6">
                    <label>Login</label>
                    <input type="text" name="login" class="form-control" placeholder="Entrer le login du parent"
                        required>
                </div>

            </div>
            <div class="form-group">
                <label>Telephone</label>
                <input type="text" name="tel" class="form-control" placeholder="Entrer le telephone du parent">
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Sexe</label>
                <div class="col-9">
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Masculin" checked> M
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="sexe" value="Feminin"> F
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-brand">Enregistrer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>

<!--end::Modal-->
<script src="JS/Date.js"></script>
<?php include("parcial/script.php") ?>