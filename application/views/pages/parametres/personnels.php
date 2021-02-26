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
            <?php if(count($liste_fonctions) == 0  || count($listematiere) == 0){?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger " >Attentions!!</span><br>
                    <p>Veuillez parametre les classes,l'anne scolaire actif, les matieres,les Fonctions  s'il vous plait !</p>
                                
                        <a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeFonctions')?>"><button   style="color:white;">Fonctions</button></a>
                        <a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/Listematiere')?>"><butto style="color:white;">Matieres</button></a>
        
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php 
                }
                else if(count($liste_fonctions) >= 1  AND count($listematiere) >= 1 )
                {
            ?>
			<div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <div class="col-lg-6">
                        <h2 class="title-1">PERSONNELS & ENSEIGNANTS</h2>

                        </div>
                        <div class="col-lg-6">
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#newPersonnels">
                                <i class="zmdi zmdi-plus"></i>
                                    personnels
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#enseignants">
                                <i class="zmdi zmdi-plus"></i>
                                    enseignants
                            </button>
                        </div>
                    </div>
                </div>
			</div>
            <br><br>
            <?php if(count($liste_fonctions) == 0 ){?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger " >Attentions!!</span><br>
                    <p>Veuillez parametre les classes,l'anne scolaire actif, les matieres,les Fonctions  s'il vous plait !</p>
                                
                        <a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeFonctions')?>"><button   style="color:white;">Fonctions</button></a>
                 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php 
                    }
                    elseif(count($liste_fonctions) >= 1   )
                    {
                ?>
            <div class="row">
				<div class="col-lg-6 table-responsive  m-b-4-0 ">
                    <h3>Enseignants</h3>
					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom & prenome
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Matiere Enseigner
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($liste as $key) { ?>
							<tr role="row" class="odd">
								<td><?php echo $key->nom?> <?php echo " "?> <?php echo $key->prenom?></td>
								<td><?php echo $key->matiere_fullname?></td>
                                <td>
									<a href="<?php echo base_url('EnseignantsControllers/recuperation/').$key->professeur_id?>" class="btn btn-warning btn-sm update-record">
										<i class="zmdi zmdi-edit"> modifier</i>
									</a>
									<a href="<?php echo base_url('EnseignantsControllers/profil/').$key->professeur_id?>"class="btn btn-info btn-sm update-record" >
										<i class="fa fa-plus"></i> detaills
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>

					</table>
                </div>
                <div class="col-lg-6 table-responsive  m-b-4-0 ">
                        <h3>Personnels</h3>
					<table id="example2" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom & prenome
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Fonctions
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Actions
								</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($personnelesListe as $key) { ?>
							<tr role="row" class="odd">
								<td><?php echo $key->nom?> <?php echo " "?> <?php echo $key->prenom?></td>
								<td><?php echo $key->fonction?></td>
                                <td>
									<a href="<?php echo base_url('ParametreControllers/recuperationPerso/').$key->id_personnel?>" class="btn btn-warning btn-sm update-record">
										<i class="zmdi zmdi-edit"> modifier</i>
									</a>
									<a href="<?php echo base_url('ParametreControllers/recuperationPerso/').$key->id_personnel?>"class="btn btn-info btn-sm update-record" >
										<i class="fa fa-plus"></i> detaills
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>

					</table>
				</div>
            </div>
            <?php } ?>
		</div>
	</div>
</div>
</body>
<!-- Personnels -->
<div class="modal fade" id="enseignants" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Nouveaux Enseignants</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

                <form action="<?php echo base_url('ParametreControllers/Insertion')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<input id="nom" name="nom" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Nom">
								</div>
								<div class="col-md-4 mb-3">
									<input id="prénom" name="prenom" type="text" class="form-control " aria-required="true" aria-invalid="false" placeholder="Prenom">
								
								</div>

								<div class="col-md-4 mb-3">
										<input type="file" class="form-control" name="enseignatImage" id="enseignatImage"placeholder="image" value="" >
										
									</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="CIN" name="CIN" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CIN">
								</div>
								<div class="col-md-6 mb-3">
									<input id="IM" name="IM" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="I.M">
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

									<input type="date" class="form-control" name="date_de_naissance" id="date_de_naissance"  placeholder="Né(e) le"  >
									<small class="help-block form-text">date de naissance</small>
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="codre_cadre" name="code_cadre" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="code et cadre">
								</div>
								<div class="col-md-6 mb-3">
									<input id="corps_grade" name="corps_grade" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="corps et grade">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="date_entre" name="date_entre" type="date" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="date d'entre ">
									<small class="help-block form-text">date d'entrer</small>
								</div>
								<div class="col-md-6 col-12 mb-3">
									<input id="CRPS" name="CRPS" type="date" class="form-control cc-number identified visa" value="date" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CRPS">
									<small class="help-block form-text">CRPS</small>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 mb-3">
									<input id="diplome_academique_eleves" name="diplome_academique_eleves" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome Académique élevé ">
								</div>
								<div class="col-md-6 mb-3">
									<input id="diplome_pedagogique_eleves" name="diplome_pedagogique_eleves" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome pédagogique élevé">
								</div>
							</div>
							<!-- fonction -->
							<div class="form-row">
								
							
								<div class="col-lg-6 mb-3">
									
									<select id="id_matiere" name="id_matiere" class="form-control">
										<?php
											foreach($listematiere as $listematiere):
										?>
													<option value="<?= $listematiere->matiere_id;?>"><?= $listematiere->matiere_abrev;?></option>
										<?php 
											endforeach; 
										?>
									</select>
								</div>

								<div class="col-lg-6 mb-3">
									<input id="contacte" name="contacte" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="contacte">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-4 mb-3">
									<input id="user_name" name="user_name" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Nom d'utilisateurs " required>
								</div>
								<div class="col-md-4 mb-3">
									<input id="user_password" name="user_password" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Mot de passe" required>
								</div>
								<div class="col-lg-4 mb-3" >
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
<!-- Enseignants -->
<div class="modal fade" id="newPersonnels" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Nouveaux Personnels</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

                <form action="<?php echo base_url('ParametreControllers/addPersonnels')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input id="nom" name="nom" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Nom">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input id="prénom" name="prenom" type="text" class="form-control " aria-required="true" aria-invalid="false" placeholder="Prenom">
                        
                        </div>

                        <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" name="enseignatImage" id="enseignatImage"placeholder="image" value="" >
                                
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input id="CIN" name="CIN" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CIN">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input id="IM" name="IM" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="I.M">
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

                            <input type="date" class="form-control" name="date_de_naissance" id="date_de_naissance"  placeholder="Né(e) le"  >
                            <small class="help-block form-text">date de naissance</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input id="codre_cadre" name="code_cadre" type="number" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="code et cadre">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input id="corps_grade" name="corps_grade" type="number" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="corps et grade">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input id="date_entre" name="date_entre" type="date" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="date d'entre ">
                            <small class="help-block form-text">date d'entrer</small>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <input id="CRPS" name="CRPS" type="date" class="form-control cc-number identified visa" value="date" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="CRPS">
                            <small class="help-block form-text">CRPS</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input id="diplome_academique_eleves" name="diplome_academique_eleves" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome Académique élevé ">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input id="diplome_pedagogique_eleves" name="diplome_pedagogique_eleves" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="diplome pédagogique élevé">
                        </div>
                    </div>
                    <!-- fonction -->
                    <div class="form-row">

                        <div class="col-lg-6 mb-3">
                            <input id="contacte" name="contacte" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="contacte">
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
                            <input id="user_name" name="user_name" type="texte" class="form-control"  data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Nom d'utilisateurs " required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input id="user_password" name="user_password" type="texte" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder=" Mot de passe" required>
                        </div>
                    </div>
                    
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
<?php } ?>