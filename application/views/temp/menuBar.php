 <!-- PAGE CONTAINER-->
 <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <h4>
                                <?php 
                                    echo date('d l yy');
                                    $anne = date('yy');
                                ?> 
                            </h4>       
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="fas fa-cogs"></i>
                                        <div class="notifi-dropdown js-dropdown">

                                            <div class="notifi__item">
                                                 <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('ParametreControllers/listeAnnescolaire')?>">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>
                                                <div class="content">
                                                   Anne Scolaire</a>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                 <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('Import/uploadCsv')?>">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>
                                                <div class="content">
                                                   Mise a jour des Eleves</a>
                                                </div>
                                            </div>

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>

                                                <div class="content">
                                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('ParametreControllers/listeFonctions')?>">Fonction</a>
                                                </div>
                                            </div>

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>

                                                <div class="content">
                                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('EconomeControllers/parametrer_economes  ')?>">Economes</a>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>
                                                <div class="content">
                                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('ParametreControllers/listeClasse')?>">Classes</a>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>
                                                <div class="content">
                                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;" href="<?= base_url('ParametreControllers/Listematiere')?>">Matiéres</a>
                                                </div>
                                            </div>

                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="fas fa-cogs"></i>
                                                </div>
                                                <div class="content">
                                                    <a style="color: #555; line-height: 1;padding-top: 10px;margin-bottom: 2px;"href="<?=  base_url('ParametreControllers/ListePersonnels');?>">Personnels & Enseignants</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url();?>assets/images/icon/contact.png" style="background-color:#008000;border-radius: 50%;" >
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $this->session->userdata('nom') ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url();?>assets/images/icon/contact.png" style="background-color:#008000;border-radius: 50%;"  >
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $this->session->userdata('nom') ?></a>
                                                    </h5>
                                                    <span class="email"><?= $this->session->userdata('nom') ?></span>
                                                </div>
                                            </div>
                                            <!-- <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div> -->
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('Logout/deconnexion') ?>" style="text-weight:bold;color: white;background-color:red;">
                                                    <i class="zmdi zmdi-power"></i>
													Déconnecter
												</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
