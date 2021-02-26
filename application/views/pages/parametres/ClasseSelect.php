<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <div class="col-lg-2">
							<a href="<?php echo base_url('ParametreControllers/listeClasse'); ?>" class=" btn btn--blue">Retour</a>
							
						</div>
						<div class="col-lg-5">
							<h2 class=" title-1 m-b-25"> 
								<?php
								foreach ($classe_etudiants as $data){
									echo $data->classe_nom;
									break;
								}

								?>
							</h2>
						</div>
                        <div class="col-lg-5">
                            <button class="au-btn au-btn-icon au-btn--blue"  data-toggle="modal" data-target="#modifier">
								<i class="zmdi zmdi-plus"></i>
								Modifier
							</button>

						
							<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#assigne">
								<i class="zmdi zmdi-plus"></i>
								Assigne 
							</button>
                        </div>
                    </div>
                </div>
			</div>
			<?php
				if($this->session->flashdata('success')){
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
				<div class="col-lg-4 table-responsive  m-b-4-0 ">

					<table id="country_table" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">

						<h2>Liste des Etudiants</h2>
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Matricule
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom & Prenom
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Sexe
								</th>
							</tr>
						</thead>
							
						<tbody>
								<?php foreach ($classe_etudiants as $data) { ?> 
									<tr role="row" class="odd">
										<td tabindex="0" class="sorting_1"><?= $data->etudiant_im ?></td>
										<td tabindex="0" class="sorting_1"><?= $data->etudiant_nom .' '. $data->etudiant_prenom ?></td>
										<td ><?php
											if($data->etudiant_sexe == 2)
											{
												$SEXE = $data->etudiant_sexe ;
												$SEXE = "F";
											}
											else if($data->etudiant_sexe == 1)	
											{
												$SEXE = $data->etudiant_sexe ;
												$SEXE = "M";
											}
											echo $SEXE;
										?>
										</td>
									</tr>
							<?php } ?>
						</tbody>
						

					</table>
				</div>
				<div class="col-lg-8 table-responsive  m-b-4-0 ">

					<table id="country_table" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">

						<h2>Professeurs & Matiere</h2>
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Professeurs
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Matiere
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Coeficient
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Action
								</th>
							</tr>
						</thead>
							
						<tbody>
								<?php foreach ($get_matProfClasse as $data) { ?>
									<!-- <script>
										var data_id = "<?php echo $data->num; ?>"
										// console.log(data_id)
									</script> -->
									<tr role="row" class="odd">	
										<td tabindex="0" class="sorting_1"><?= $data->num ?></td>
										<td tabindex="0" class="sorting_1"><?= $data->matiere_abrev ?></td>
										<td tabindex="0" class="sorting_1"><?= $data->coefficient ?></td>
										<td >
											
											<a href="<?= base_url('ParametreControllers/updateProf_mat/').$data->num;?>" class="update btn btn-warning btn-sm update-record" >
												Edit
											</a>
										</td>
									</tr>
							<?php } ?>
						</tbody>
						

					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<!-- modifier classe -->
<div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Ajouter une nouvelle Classe</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php 
				if(empty($classe_etudiants[0]->classe_id)){
					?>
						<div class="modal-body">

							<label for="">Veuillez inserer des etudiants dans la classe</label>

						</div>
					<?php
				}else{
					?>
					<div class="modal-body">
						<form action="<?= base_url('ParametreControllers/update_classe/').$classe_etudiants[0]->classe_id; ?>" method="post" novalidate="novalidate">
							<div class="form-group">
								<input type="hidden" name="classe_id" value="<?= $classe_etudiants[0]->classe_id; ?>">
								<label for="classe_nom" class="control-label mb-1">Nom de la classe</label>
								<input id="classe_nom" name="classe_nom" type="text" class="form-control"  aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->classe_nom; ?>">
							</div>
							<div class="form-group">
								<label for="class			<form action="<?= base_url('ParametreControllers/update_classe/').$classe_etudiants[0]->classe_id; ?>" method="post" novalidate="novalidate">
							<div class="form-group">
								<input type="hidden" name="classe_id" value="<?= $classe_etudiants[0]->classe_id; ?>">
								<label for="classe_nom" class="control-label mb-1">Nom de la classe</label>
								<input id="classe_nom" name="classe_nom" type="text" class="form-control"  aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->classe_nom; ?>">
							</div>
							<div class="form-group">
								<label for="classe_serie" class="control-label mb-1">Nombre d'eleves maximum dans une classe</label>
									<input id="classe_serie" name="classe_serie" type="number" class="form-control" aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->classe_serie ?>">
								
							</div>
							<div class="form-group">
								<label for="classe_serie" class="control-label mb-1">Nombre de matiere</label>
									<input id="nombre_matiere" name="nombre_matiere" type="number" class="form-control" aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->nombre_matiere ?>">
								
							</div>
							<input id="save" name="ajour"  type="submit" class="btn btn-lg btn-success" value="Mise_a_jour">
							
						</form>
					</div>e_serie" class="control-label mb-1">Nombre d'eleves maximum dans une classe</label>
									<input id="classe_serie" name="classe_serie" type="number" class="form-control" aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->classe_serie ?>">
								
							</div>
							<div class="form-group">
								<label for="classe_serie" class="control-label mb-1">Nombre de matiere</label>
									<input id="nombre_matiere" name="nombre_matiere" type="number" class="form-control" aria-required="true" aria-invalid="false" value="<?= $classe_etudiants[0]->nombre_matiere ?>">
								
							</div>
							<input id="save" name="ajour"  type="submit" class="btn btn-lg btn-success" value="Mise_a_jour">
							
						</form>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
<!-- assigne -->
	<div class="modal fade" id="assigne" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="largeModalLabel">Generer </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<?php if(count($classe_etudiants) > 0 ){?>
					<form action="<?= base_url('ParametreControllers/assigne/').$classe_etudiants[0]->classe_id ?>" method="post" novalidate="novalidate">
						<?php 
							$i = 0;							
							// var_dump(count($listematiere));exit;
								while($i < count($listematiere)){
									
							?>
								<?php
									foreach($anne_scolaire as $anne):
								?>
									<input type="hidden" id="id_anne_scolaire" name="id_anne_scolaire[]" value="<?= $anne->id_anne_scolaire;?>">
								<?php endforeach; ?>
							
									<input type="hidden" id="classe_id" name="classe_id[]" value="<?= $classe_id;?>">
								
									<div class="row form-group">
									<div class="col-lg-6">	
										<label for="classe_nom" class="control-label mb-1">Professeurs</label>
										<select id="professeur_id" name="professeur_id[]" class="form-control">
											<option value="">...</option>
											<?php
												foreach($professeurs as $professeur):
											?>
											<option value="<?= $professeur->professeur_id;?>"><?= $professeur->nom;?><?= " "?><?= $professeur->prenom?></option>
											<?php 
												endforeach; 
											?>
										</select>
									</div>
									<div class="col-lg-3">	
										<label for="classe_nom" class="control-label mb-1">Matiere</label>
										<select id="matiere_id" name="matiere_id[]" class="form-control">
										<option value="">...</option>
											<?php
												foreach($listematiere as $listematieres):
											?>
											<option value="<?= $listematieres->matiere_id;?>"><?= $listematieres->matiere_abrev;?></option>
											<?php 
												endforeach; 
											?>
										</select>
									</div>
									<div class="col-lg-3">	
										<label for="coefficient" class="control-label mb-1">Coefficient</label>
										<input id="coefficient" name="coefficient[]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="3">
								
									</div>
								</div>
							<?php 
							$i ++;
							}
						?>
						<input type="hidden" name="classe_id" value="<?= $classe_id ?>">
						<input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
						
					</form>
				<?php }else{?>
					<h3 class="sufee-alert alert with-close alert-danger alert-dismissible fade show">Veuillez entrer les Eleves, les classes et les matierer</h3>
				<?php }?>
				</div>
			</div>
		</div>
	</div>
