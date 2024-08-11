<?php
require_once('./identifier.php');
function calculerChemin($url) {
  // Sépare l'URL en segments
  $segments = explode("/", $url);

// Enlève les 3 premiers éléments du tableau
$segments = array_splice($segments, 4, 3);

  
  // Crée une chaîne vide pour le chemin
  $chemin = "";

  // Parcourt les segments de l'URL
  foreach ($segments as $segment) {
    // Ajoute le segment au chemin
    $segment = substr($segment, 0, -4);
    $chemin .= $segment . " > ";
  }

  // Supprime le dernier caractère du chemin
  $chemin = substr($chemin, 0, -3);

  return $chemin;
}
require_once("db-connect2.php");

$requeteAnnee="select * from ANNEE where statut=1";
$resultatAnnee=$pdo->query($requeteAnnee);

$requetesemmestre="select * from semmestre where statut=1";
$resultatsemmestre=$pdo->query($requetesemmestre);
?>

<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>GSPDE | <?php echo calculerChemin($_SERVER['REQUEST_URI']); ?></title>
    <meta name="description" content="Page headear">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="../assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="../assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"
        type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="../assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"
        type="text/css" />
    <link href="../assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="../assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="../assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <!-- <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" /> -->
    <link rel="shortcut icon" href="../pages/PHP/images/80x80.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->


<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="#">
                <!-- <img alt="Logo" src="../assets/media/logos/logo-light.png" /> -->
                GSPDE
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
                id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="#">
                            <!-- <img alt="Logo" src="../assets/media/logos/logo-light.png" /> -->
                            <p style="color:white; font-size:15px;">GSPDE</p>
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            id="Path-94" fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                        <path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                    </g>
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                            id="Path-94" fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                            id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                    </g>
                                </svg></span>
                        </button>

                        <!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
                    </div>
                </div>

                <!-- end:: Aside -->

                <!-- begin:: Aside Menu -->
                <?php include("navbar.php");?>

                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div style="margin-top:15px; margin-left:10px;">
                            <h2>
                                <a <?php if ($_SESSION['user']['ROLE']=='Admin') { ?> href="./AnneeScolaire.php"
                                    <?php } ?>>
                                    <?php //echo calculerChemin($_SERVER['REQUEST_URI']); ?>
                                    <?php while($annee=$resultatAnnee->fetch()){ ?>
                                    <?php echo $annee['dateDebut'].'-'.$annee['dateFin'] ?>
                                    <?php } ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div style="margin-top:10px; font-size: 15px;">
                        <div class="kt-header__topbar">
                            <div>
                                <h4>
                                    <?php if ($_SESSION['user']['ROLE']=='Admin'|| $_SESSION['user']['ROLE']=='user') {?>
                                    <a href="EditerEnseignant.php?id=<?php echo $_SESSION['user']['id_enseignant'] ?>"
                                        style="color:#133d87;">

                                        <img src="PHP/images/<?php echo $_SESSION['user']['PHOTO_E']?>" width="30px"
                                            height="30px" style="border-radius: 50%;">
                                        <?php echo  ' '.$_SESSION['user']['login']?>
                                    </a>
                                    <?php }elseif ($_SESSION['user']['ROLE']=='PARENT') { ?>
                                    <a href="EditerParent.php?id=<?php echo $_SESSION['user']['ID_PARENT'] ?>"
                                        style="color:#133d87;">

                                        <img src="PHP/images/<?php echo $_SESSION['user']['PHOTO_P']?>" width="50px"
                                            height="50px" style="border-radius: 50%;">
                                        <?php echo  ' '.$_SESSION['user']['login']?>
                                    </a>
                                    <?php } ?>
                                </h4>
                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <div>
                                <h4>
                                    <a href="SeDeconnecter.php" style="color:#133d87;">
                                        <i class="fa fa-sign-out-alt"></i>
                                        &nbsp Se déconnecter
                                    </a>
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- end:: Header -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-subheader__main">
                            <h2>
                                <a <?php if ($_SESSION['user']['ROLE']=='Admin') { ?> href="./AnneeScolaire.php"
                                    <?php } ?>>
                                    <?php //echo calculerChemin($_SERVER['REQUEST_URI']); ?>
                                    <?php if($semmestre=$resultatsemmestre->fetch()){ ?>
                                    <?php 
                                        echo 'Semestre '.$semmestre['Num_semestre'];
                                        
                                    }else{
                                        echo 'Aucun semestre selectionner ';
                                        
                                      ?>
                                    <?php } ?>
                                </a>
                            </h2>
                        </div>
                        <div class="kt-subheader__toolbar">
                            <div class="kt-subheader__wrapper">
                                <div href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker"
                                    data-toggle="kt-tooltip" title="Date et heure" data-placement="left">
                                    <div class="horloge" style="color:#133d87; font-size: 11px;">
                                        <div class="heures"></div>
                                        <div class="date" style="color:#133d87; font-size: 15px;"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">