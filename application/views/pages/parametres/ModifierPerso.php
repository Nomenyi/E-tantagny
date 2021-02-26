<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<?php
				if($this->session->flashdata('error'))
				{
			?>
			<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
				<span class="badge badge-pill badge-warning " >Error</span><br>
				<?php echo $this->session->flashdata('error'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?php
				}
			?>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h3 class="text-center title-2">Modification Personnels</h3>
						</div>
						<hr>

						<form action="<?php echo base_url('ParametreControllers/update_Personnels')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php foreach($personnels as $key): ?>
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<input id="nom" name="nom" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Nom" value="<?= $key->nom; ?>">
								</div>
								<div class="col-md-4 mb-3">
									<input id="prénom" name="prenom" type="text" class="form-control " aria-required="true" aria-invalid="false" placeholder="Prenom" value="<?= $key->prenom; ?>">
								
								</div>

								<div class="col-md-4 mb-3">
										<input type="file" class="form-control" name="enseignatImage" id="enseignatImage"placeholder="image" value="<?= $key->image; ?>"> 
										
									</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="CIN" name="CIN" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CIN" value="<?= $key->CIN; ?>" >
								</div>
								<div class="col-md-6 mb-3">
									<input id="IM" name="IM" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="I.M"  value="<?= $key->IM; ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<select id="sexe" name="sexe" class="form-control">
										<option value="1">Masculin</option>
										<option value="2">Feminin</option>
									</select>
								</div>
								<div class="col-md-6 mb-3">

									<input type="date" class="form-control" name="date_De_naissance" id="date_de_naissance"  placeholder="Né(e) le"  value="<?= $key->date_De_naissance; ?>">
									<small class="help-block form-text">date de naissance</small>
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="codre_cadre" name="code_cadre" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="code et cadre" value="<?= $key->code_cadre; ?>">
								</div>
								<div class="col-md-6 mb-3">
									<input id="corps_grade" name="corps_grade" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="corps et grade" value="<?= $key->corps_grade; ?>" >
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="date_entre" name="date_entre" type="date" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="date d'entre " value="<?= $key->date_entre; ?>" >
									<small class="help-block form-text">date d'entrer</small>
								</div>
								<div class="col-md-6 col-12 mb-3">
									<input id="CRPS" name="CRPS" type="date" class="form-control cc-number identified visa" value="date" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CRPS" value="<?= $key->CRPS; ?>">
									<small class="help-block form-text">CRPS</small>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="diplome_academique_eleves" name="diplome_academique_eleves" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome Académique élevé " value="<?= $key->diplome_academique_eleves; ?>">
								</div>
								<div class="col-md-6 mb-3">
									<input id="diplome_pedagogique_eleves" name="diplome_pedagogique_eleves" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome pédagogique élevé" value="<?= $key->diplome_pedagogique_eleves; ?>">
								</div>
							</div>
							<!-- fonction -->
							<div class="form-row">
								<div class="col-lg-6 mb-3">
									<input id="contacte" name="contacte" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="contacte" value="<?= $key->contacte; ?>">
								</div>
								<div class="col-lg-6 mb-3" >
									<select id="id_fonction" name="id_fonction" class="form-control">
										<?php
											foreach($liste_fonctions as $liste):
										?>
											<option value="<?= $liste->id_fonctions;?>"><?= $liste->nom_fonctions;?></option>
										<?php 
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="user_name" name="user_name" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Nom d'utilisateurs " value="<?= $key->user_name; ?> ">
								</div>
								<div class="col-md-6 mb-3">
									<input id="user_password" name="user_password" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Mot de passe"  value="<?= $key->user_password; ?> ">
								</div>
							</div>

                            <input type="hidden" class="form-control" name="id_personnel" id="id_personnel"  value="<?= $key->id_personnels; ?>">
                            <input type="hidden" class="form-control" name="user_id" id="user_id"  value="<?= $key->user_id; ?>">

							<?php endforeach;?>
							<div class="form-row">
								<div class="col-lg-6">
									<input type="reset" name="save" value="Annuler" class="btn btn-outline-danger btn-lg btn-block">
								</div>
								<div class="col-lg-6">
									<input type="submit" name="save" value="Enregistrer" class="btn btn-outline-success btn-lg btn-block">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
