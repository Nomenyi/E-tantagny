<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				
				<h2 class="col-md-8 title-1 m-b-25">Listes des Enseignats</h2>

				<div class="col-md-3">
					<a href="<?=  base_url('EnseignantsControllers/Nouveaux_enseignants');?>">
						<button type="button" class="btn btn-outline-primary btn-lg btn-block">
							<span class="fa fa-edit"></span>Nouveaux Enseignats

						</button>
					</a>
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
				<div class="col-lg-12 col-md-12 ">

					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Numéro
								</th>
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Photo
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Nom 
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Prenom
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Matiere Enseigner
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($liste as $key) { ?>
							<tr role="row" class="odd">
								<td><?php echo $key->professeur_id?></td>
								<td >
									<?php
										if($key->image == ""){
											echo "pas d'image";
										}else{
									?>

									<img style="width: 50px;heigth:50px;" src="<?= base_url("image/".$key->image);?>" alt="">
									<?php

										}									
									?> 
									</td> 
								<td><?php echo $key->nom?></td>
								<td><?php echo $key->prenom?></td>
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
			</div>
		</div>
	</div>
</div>
</body>
