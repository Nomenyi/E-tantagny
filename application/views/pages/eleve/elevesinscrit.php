<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<h2 class="col-md-8 title-1 m-b-25">Listes des Eleves</h2>
				<div class="col-md-3">
					<a href="<?= base_url('EtudiantsControllers/index'); ?>">
						<button type="button" class="btn btn-outline-primary btn-lg btn-block">
							<span class="fa fa-edit"></span> Insciptions 
						</button>
					</a>
				</div>
				<div class="overview-wrap">	
					<a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('ExportControllers/exportListeEtudiants') ?>"><i class="fa fa-file-excel-o"></i> Export</a>
				</div>
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
				<div class="col-md-12 col-lg-12  ">

					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Numéro
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Profil
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
									<td >
									<?php
										if($liste->image == ""){
											echo "pas d'image";
										}else{
									?>

									<img style="width: 50px;heigth:50px;" src="<?= base_url("image/".$liste->image);?>" alt="">
									<?php

										}									
									?> 
									</td> 
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
										<a href=" <?php echo base_url('EtudiantsControllers/Modifier/').$liste->etudiant_im?>" class="btn btn-warning btn-sm update-record" data-package_id="" data-package_name="">
										    <i class="zmdi zmdi-edit"> modifier</i>
										</a>
										<a href="<?php echo base_url('EtudiantsControllers/Profil/').$liste->etudiant_im?>" class="btn btn-info btn-sm view-record" data-package_id="">
											<i class="fa fa-plus"></i> detaills
										</a>
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