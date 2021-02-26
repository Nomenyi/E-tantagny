<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<h2 class="col-md-8 title-1 m-b-25">Listes des Eleves</h2>
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
				<div class="col-lg-12 table-responsive  m-b-4-0 ">

					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Numéro
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom & Prenom
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Sexe
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Classe
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							
							<?php 
								// var_dump($allEtudiants_inscrit);
								// if(count($allEtudiants_inscrit > 0)):
									foreach($allEtudiants_inscrit as $liste):	
							?>
								<tr role="row" class="">
									<td ><?= $liste->etudiant_im; ?></td> 
									<td ><?= $liste->etudiant_nom; ?><?= " ";?><?= $liste->etudiant_prenom; ?></td>
									<td ><?php
										if($liste->etudiant_sexe == 2)
										{
											$SEXE = $liste->etudiant_sexe ;
											$SEXE = "Feminin";
										}
										else if($liste->etudiant_sexe == 1)	
										{
											$SEXE = $liste->etudiant_sexe ;
											$SEXE = "Masculin";
										}
										echo $SEXE;
									?>
									</td>
									<td >	<?= $liste->classe_nom; ?><?= " ";?></td>
								
									<td >
										<a href="<?= base_url('EconomeControllers/eleves_paye/').$liste->etudiant_im;?>" class="btn btn-info btn-sm update-record" data-package_id="" data-package_name="">Payement</a>
									</td>
								</tr>

							<?php 
								endforeach;
								// endif;
							?>
							</tbody>
							

					</table>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</body>

