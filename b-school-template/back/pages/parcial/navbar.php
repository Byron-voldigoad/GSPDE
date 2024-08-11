<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
        data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item " aria-haspopup="true"><a href="Dashboard.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-home"></i><span class="kt-menu__link-text">Tableau de
                        bord</span></a></li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Groupe 1</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeEleves.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-graduation-cap"></i><span></span></i><span
                        class="kt-menu__link-text">Etudiants</span></a></li>

            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeEnseignant.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-users"><span></span></i><span class="kt-menu__link-text">
                        Enseignants</span></a></li>
            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeParent.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-user-friends"><span></span></i><span
                        class="kt-menu__link-text">Parent</span></a></li>

            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeMatiere.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-book-reader"><span></span></i><span
                        class="kt-menu__link-text">Matieres</span></a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="MatieresAClasses.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-clipboard-list"><span></span></i><span
                        class="kt-menu__link-text">Atribuer des matieres a des Fillieres</span></a>
            </li>


            <?php } ?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeClasse.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-clipboard"><span></span></i><span
                        class="kt-menu__link-text">Fillieres</span></a>
            </li>

            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Groupe 2</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeNotes.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-clipboard"><span></span></i><span
                        class="kt-menu__link-text">Notes</span></a></li>
            <?php } ?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="calendrier.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-calendar-plus"><span></span></i><span
                        class="kt-menu__link-text">Gestions d'evenements</span></a></li>

            <li class="kt-menu__item " aria-haspopup="true"><a href="Discipline.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-clock"><span></span></i><span class="kt-menu__link-text">Suivi
                        disciplinaire</span></a></li>
            <!-- <li class="kt-menu__item " aria-haspopup="true"><a href="graphes.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-chart-bar"><span></span></i><span
                        class="kt-menu__link-text">Donee
                        pedagogique</span></a></li> -->
            <li class="kt-menu__item " aria-haspopup="true"><a href="user.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-comments"><span></span></i><span
                        class="kt-menu__link-text">Communication</span></a></li>

            <?php if ($_SESSION['user']['ROLE']!='PARENT') {?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="ListeComment.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-clipboard"><span></span></i><span
                        class="kt-menu__link-text">Commentaires</span></a></li>
            <?php } ?>

            <?php if ($_SESSION['user']['ROLE']=='Admin') {?>
            <li class="kt-menu__item " aria-haspopup="true"><a href="AnneeScolaire.php" class="kt-menu__link "><i
                        class="kt-menu__link-icon fa fa-chalkboard"><span></span></i><span
                        class="kt-menu__link-text">Annee
                        scolaire / Semestre</span></a></li>
            <?php } ?>
        </ul>
    </div>
    </li>

</div>
</div>

<!-- end:: Aside Menu -->