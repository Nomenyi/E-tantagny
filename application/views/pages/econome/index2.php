<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <h2 class="col-lg-8 title-1 m-b-25">GENERER LES FRAIE GENEREAUX</h2>
                
                <div class="col-lg-4">
                         <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#ffg">
							<i class="zmdi zmdi-plus"></i>  Entrer par defaut
						</button>
				</div>
            </div>
            <?php
                if($this->session->flashdata('error'))
                {
            ?>
            <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                <span class="badge badge-pill badge-warning " >ERROR</span><br>
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
                }
                elseif($this->session->flashdata('success'))
                {
            ?> 
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success " >SUCCESS</span><br>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php
            }?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- USER DATA-->
                <div class="user-data m-b-30">
                    <h3 class="title-3 m-b-30">
                        <i class="zmdi zmdi-account-calendar"></i>MOntant generer</h3>
                  
                    <div class="table-responsive table-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Num</td>
                                    <td>Montant</td>
                                    <td>Anne Scolaie</td>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($parameEconome as $liste): 
                                    ?>
                                <tr>
                                <td>
                                        <?php echo  $liste->id_para_econoeme; ?>
                                        </td>  
                                        <td>
                                        <?php echo  $liste->montant; ?>
                                        </td>  
                                        <td>
                                        <?php echo  $liste->anne_scolaire; ?>
                                        </td>                                    

                                </tr>
                                <?php 
                                    endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END USER DATA-->
            </div>
        </div>
	</div>
</div>
</body>
<div class="modal fade" id="ffg" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Generer les Frais generaux</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <?php
                    if(count($annescolaire) >= 1){
                ?>
                    <form action="<?= base_url('EconomeControllers/generer');?>" method="post" novalidate="novalidate">
                            
                        <div class="form-group">
                            <label for="montant" class="control-label mb-1">Montant</label>
                            <input id="montant" name="montant" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Montant">
                        </div>
                        <div class="form-group">
                            <label for="desigation" class="control-label mb-1">Designations</label>
                                <input id="desigation" name="designation" type="text" class="form-control"  aria-required="true" aria-invalid="false" value="Frais généreaux">
                            
                        </div>
                        <div class="form-group">
                            <select id="id_anne_scolaire" name="id_anne_scolaire" class="form-control">
                                <?php
                                    foreach($annescolaire as $annescolaire):
                                        if($annescolaire->status == 0):
                                ?>
                                            <option value="<?= $annescolaire->id_anne_scolaire;?>"><?= $annescolaire->anne_scolaire;?></option>
                                <?php 
                                        endif;
                                    endforeach; 
                                ?>
                            </select>                        
                        </div>
                        <input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
                        
                    </form>
                <?php
                    }else if(count($annescolaire) == 0){
                ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger " >Erreur</span><br>
                        <p>Veuillez parametre les classes et entrer l'anne scolaire actif s'il vous plait !</p>
                        
                        <a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeAnnescolaire')?>"><button   style="color:white;">Anne Scolaire </button></a>
                        <a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeClasse')?>"><butto style="color:white;">Classes</button></a>
                    
                                
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php } ?>
			</div>
		</div>
	</div>
</div>

