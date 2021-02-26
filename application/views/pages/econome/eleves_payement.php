<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
            <?php
                foreach ($eleves as $data){?>
                    <a href="<?php echo base_url('EconomeControllers/payement_ff/')?>" class=" btn btn--blue">Retour</a>
                    <h4 class="col-md-6 title-1 m-b-25"> 
                        <?= $data->etudiant_nom.' '. $data->etudiant_prenom?>
                    </h4>
        
                    <?php } ?>
			</div>
			<?php
                if($this->session->flashdata('success'))
                {
            ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success " >OK</span><br>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
                }
                elseif($this->session->flashdata('error'))
                {
            ?> 

                <div class="sufee-alert alert with-close alert-warnig alert-dismissible fade show">
                    <span class="badge badge-pill badge-warning " >ERREUR</span><br>
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php
                }?>
            <br>
            <?php
				if( count($parameEconome) >= 0 ){
			?>
			<div class="row">
				
				<div class="col-lg-12 table-responsive  m-b-4-0 ">
                    <div class="card">
                        <div class="card-body">
                        <?php 

                            if($net_a_payer == NULL)
                            {
                                ?>
                                    <label for="">Vous devez renseigner d'abord le frais de genereaux !!! <a href="<?= base_url().'/EconomeControllers/parametrer_economes' ?>">Cliquez ici</a></label>

                                <?php
                            }else{
                                ?>

                                    <form action="<?= base_url('EconomeControllers/payer/').$eleves[0]->etudiant_im ?>" method="post" novalidate="novalidate">
                                        <div class="form-row">
                                        
                                            <input type="hidden" class="form-control" name="id_classe"  id="classe" placeholder="Classe de" value="<?= $eleves[0]->id_classe ?>"  >	
                                            <input type="hidden" id="id_anne_scolaire" name="id_anne_scolaire" value="<?= $eleves[0]->id_anne_scolaire;?>">
                                            <input type="hidden" id="designation" name="designation" value="<?= $eleves[0]->etudiant_im;?>">
                                            <?php 
                                                $id_econome = NULL;
                                                // var_dump(isset($eleves[0]->id_econome_etudiant));exit;
                                                if(isset($eleves[0]->id_econome_etudiant))
                                                {
                                                    $id_econome = $eleves[0]->id_econome_etudiant;
                                                    ?>
                                                        <input type="hidden" name="id_classe" value="<?= $eleves[0]->id_classe ?>">
                                                    <?php
                                                }
                                                else{
                                                    $id_econome = "";
                                                }
                                            ?>
                                            <input type="hidden" name="id_econome_etudiant" value="<?= $id_econome?>">

                                            <div class="col-md-6 mb-3">
                                                <label for="">Montant a payer</label>
                                                <input type="text" disabled class="form-control" value="<?= $net_a_payer?>"  >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Montant</label>
                                                <input type="text" class="form-control" name="montant" id="montant" placeholder="montant"  >
                                                
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="submit" name="save" value="Enregistrer" class="btn btn-outline-success btn-lg btn-block" <?php (!is_numeric($net_a_payer)) ? "disabled": "" ?>>
                                            </div>
                                        </div>
                                    </form>
                        

                                <?php
                            }

                        ?>
                        </div>
                    </div>					
				</div>
            </div>
            <?php } elseif(count($parameEconome) == 0) {?>
			<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger " >Vou n'avez pas generer les Frais genereaux de cette annee !!</span><br>
				<p>Veuillez parametrer les frais genereaux  s'il vous plait !</p>
				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</body>

