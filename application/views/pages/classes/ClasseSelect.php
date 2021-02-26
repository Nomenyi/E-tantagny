<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<a href="<?php echo base_url('ClassesControllers/listeClasse'); ?>" class=" btn btn--blue">Retour</a>
                <h2 class="col-md-5 title-1 m-b-25">


				</h2>
				<div class="col-lg-4">
					<div class="overview-wrap">

						<?php
							// echo count($classe_etudiants);exit;
							if(count($classe_etudiants) <= 0)
							{
							?>
								<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
									<span class="badge badge-pill badge-warning " >Il faut inserer des eleves</span><br>
									<?php echo $this->session->flashdata('error'); ?>
									<a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('EtudiantsControllers/index'); ?>"><button   style="color:white;">Eleves</button></a>

								</div>
							<?php
							}
							else{
								foreach ($trimestre as $value) {

									?>
									<a class="btn role user"  href="<?php echo base_url('ClassesControllers/noteEleves/').$classe_etudiants[0]->id_classe.'/'.$value->trimestre_nom.'/'.$value->trimestre_id;?>">

									<button  data-toggle="modal" data-target="#largeModal">
										<i class="zmdi zmdi-plus"></i>
										<?= $value->trimestre_nom ?>
									</button>
									</a>

								<?php

								}

							}
						?>

					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12 table-responsive  m-b-4-0 ">

				<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">

					<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Matricule
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom & Prenom
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									1er Trimestre
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									2em Trimestre
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									3em Trimestre
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
								<i class="zmdi zmdi-plus"></i>Asigne
								</th>
							</tr>
						</thead>

						<tbody>
							<?php for($i=0; $i< count($classe_etudiants); $i++) { ?>
								<tr role="row" class="odd">
									<td ><?= $classe_etudiants[$i]->etudiant_im ?></td>
									<td ><?= $classe_etudiants[$i]->etudiant_nom .' '. $classe_etudiants[$i]->etudiant_prenom ?></td>
									<td><?php
										if($moyenne_trimestre['1ERTRIM'] == NULL)
										{
											echo "Pas encore";
										}
										else{
											echo $moyenne_trimestre['1ERTRIM'][$classe_etudiants[$i]->etudiant_im];
										}
									 ?></td>
									<td><?php
										if($moyenne_trimestre['2EMTRIM'] == NULL)
										{
											echo "Pas encore";
										}
										else{
											echo $moyenne_trimestre['2EMTRIM'][$classe_etudiants[$i]->etudiant_im];
										}
									 ?></td>
									<td><?php
										if($moyenne_trimestre['3EMTRIM'] == NULL)
										{
											echo "Pas encore";
										}
										else{
											echo $moyenne_trimestre['3EMTRIM'][$classe_etudiants[$i]->etudiant_im];
										}
									 ?></td>
									<td>
										<?php
											foreach ($trimestre as $value) {

											?>
											<a class="btn role user"  href="<?php echo base_url('ClassesControllers/noteEleves/').$classe_etudiants[$i]->id_classe.'/'.$classe_etudiants[$i]->etudiant_im.'/'.$value->trimestre_id;?>">

											<button   data-toggle="modal" data-target="#largeModal">
												<i class="zmdi zmdi-plus"></i>
												<?= $value->trimestre_nom ?>
											</button>
											</a><br><br>

										<?php

											}
										?>
										<?php if($moyenne_trimestre['1ERTRIM'] != NULL){ ?>
											<a class="btn role user" href="<?php echo base_url('ClassesControllers/eleveNotes/').$classe_id.'/'.$classe_etudiants[$i]->etudiant_im.'/'.$id_anne_scolaire;?>">
											<i class="zmdi zmdi-plus"></i>
											Note
											</a>

										<?php } ?>

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
