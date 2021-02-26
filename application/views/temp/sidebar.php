<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
       
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
				<img src="<?= base_url();?>assets/images/logo1.png" width="20%"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!-- <li>
                            <a href="<?= base_url('PageControllers/dashbord');?>">
                                <i class="fas fa-tachometer-alt"></i>Tableaux de bords</a>
                        </li> -->
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Eleves</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url('EtudiantsControllers/index'); ?>">Inscription</a>
                                </li>
                                <li>
                                    <a href="<?=  base_url('EtudiantsControllers/elevesInscrit');?>">Listes des eleves</a>
                                </li>
                                <li>
                                    <a href="index4.html">Taux des Abscences</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Enseignants</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?= base_url('EnseignantsControllers/Nouveaux_enseignants'); ?>">Nouveaux Enseignants</a>
                                </li>
                                <li>    
                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;"href="<?=  base_url('EnseignantsControllers/enseignant');?>">Listes des Enseignants</a>
                                             
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Listes des Classes</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <?php 
                                     foreach($classeListe as $Liste)
                                { ?>
                                <li>
                                    <a href="<?= base_url('ClassesControllers/classeSelect/').$Liste->classe_id ?>" class="col-sm-6 col-lg-10"> <?= $Liste->classe_nom ?> </a>
						
                                </li>
                                
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Econonme</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                               <li>
                                    <a href="<?= base_url('EconomeControllers/cahie_journale');?>">
                                        <i class="fas fa-suitcase"></i>Cahier de journale</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('EconomeControllers/payement_ff');?>">
                                        <i class="fas fa-suitcase"></i>Payement FG</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('ExportControllers/index');?>">
                                <i class="fas fa-suitcase"></i>export</a>
                        </li> -->
                        <!-- <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li> -->
                        <!-- <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendrier scolaire</a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
