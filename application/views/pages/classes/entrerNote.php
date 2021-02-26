<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <p>Matiere de <?= utf8_encode($nom_matiere)  ?></p>
			</div>
			<?php
						if($this->session->flashdata('success'))
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
						}
					?>
			<br>
			<div class="row"> 
                <div class="col-sm-12">  
                    <div class="card">
                        <div class="card-header">
                            <strong></strong> Enregistrement des notes Eleves par Matiere
                        </div>
                        <div class="card-body card-block">
                            <?php 

                                if($exists_false == FALSE){
                                    ?>

                                        <label for="">Tous les eleves dans cette classes ont deja de note</label>

                                    <?php
                                }
                                else{
                                    ?>
                                            <form action="<?php echo base_url('ClassesControllers/set_note/');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        
                                                      
                                            <?php 
                                                foreach ($classe_etudiants as $value) {
                                                    ?>
                                                      <div class="form-row">
                                                            <div class="col-md-10 mb-3">
                                                                <label for=""><?= $value->etudiant_nom.' '.$value->etudiant_prenom; ?></label>                                                    
                                                            </div>
                                                            <div class="col-md-2 mb-3">
                                                            <input type="number" class="form-control" name="note[]" id="etudiant_prenom" placeholder="10">
                                                            </div>
                                                            <input type="hidden" name="id_anne_scolaire[]" value="<?= $id_anne_scolaire; ?>">
                                                            <input type="hidden" name="id_etudiants[]" value="<?= $value->etudiant_im; ?>">
                                                            <input type="hidden" name="id_matiere[]" value="<?= $matiere_by_id[0]->matiere_id?>">
                                                            <input type="hidden" name="id_classe[]" value="<?= $classe_id ?>">
                                                            <input type="hidden" name="id_trimestre[]" value="<?= $trimestre_id ?>">
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="submit" name="save" value="Enregistrer" class="btn btn-outline-success btn-lg btn-block">
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
		</div>
	</div>
</div>
</body>

