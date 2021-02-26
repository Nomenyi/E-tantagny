<div class="main-content">
	<div class="section__content section__content--p30">

	<!-- <a href="<?= base_url('EtudiantsControllers/index'); ?>">
						<button type="button" class="btn btn-outline-primary btn-lg btn-block">
							<span class="fa fa-edit"></span> 
						</button>
					</a> -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6  ">

					<h2 class="title-1">Journales des Comptes</h2>
				</div>
				<div class="col-lg-2 m-b-25">
					<div class="overview-wrap">
						<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#Entrant">
							<i class="zmdi zmdi-plus"></i>
							Entrant
						</button>
					</div>
				</div>
				<div class="col-lg-2">
				
					<div class="overview-wrap">
							<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#Sortie">
								<i class="zmdi zmdi-plus"></i>
								Sortie
							</button>
						</div>
					</div>
				</div>
			</div>
				<div class="card card-body">

					<div class="row">
						<div class="col-lg-2 m-b-25">
						<span>Total Entre</span></br>
							<div class="overview-wrap">
								<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#largeModal">
									<?= $budget['Total_entre']."Ar"?>
								</button>
							</div>
						</div>
						<div class="col-lg-2 m-b-25">
							<span>Total sortie</span>
							<div class="overview-wrap">
								<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#largeModal">
									<?= $budget['Total_sortie']."Ar" ?>
								</button>
							</div>
						</div>
						<div class="col-lg-2 m-b-25">
							<span>Reste total</span>
							<div class="overview-wrap">
								<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#largeModal">
									<?= $budget['Reste_total']."Ar" ?>
								</button>
							</div>
						</div>
						<div class="col-lg-2 m-b-25"><br>
							<div class="overview-wrap">	
								<a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('ExportControllers/exportCahier') ?>"><i class="fa fa-file-excel-o"></i> Export</a>
            				</div>
						</div>
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
				<div class="col-lg-12 table-responsive  m-b-4-0 ">

					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Numéro
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Designation
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Entrant
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Sortie
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Anne_scolaire
								</th>

								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
									Date
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach($journale as $actif):
							?>
								<tr role="row" class="">
								
									<td><?php echo $actif->id_caisse ?></td>
									<td><?php echo $actif->designation ?></td>
									<td><?php echo $actif->entrant ?></td>
									<td><?php echo $actif->sortie ?></td>
									<td><?php echo $actif->anne_scolaire ?></td>
									<td><?php echo $actif->date ?></td>
								</tr>
						
							<?php endforeach;?>
						</tbody>
							

					</table>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</body>
<!-- modal sorti -->
<div class="modal fade" id="Entrant" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Entrer la Samme</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('EconomeControllers/Entrer_mont') ?>" method="post" novalidate="novalidate">
					<div class="form-row">
							<input type="hidden" class="form-control" name=""  id="classe" placeholder="Classe de"  >	
							<?php
									foreach($annescolaire as $anne):
								?>
								<input type="hidden" id="id_anne_scolaire" name="id_anne_scolaire" value="<?= $anne->id_anne_scolaire;?>">
							<?php endforeach; ?>	
							<input type="hidden" class="form-control" name="sortie" id="entsortierant" value="0"  >
								
						<div class="col-md-4 mb-3">
							<input type="text" class="form-control" name="entrant" id="entrant" placeholder="Montant"  >
							
						</div>
						<div class="col-md-4 mb-3">
							<input type="text" class="form-control" name="designation" id="designation" placeholder="Designation"  >
							
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<input type="submit" name="saveEntrant" value="Enregistrer" class="btn btn-outline-success btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- entrant -->
<div class="modal fade" id="Sortie" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Entrer la Samme</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('EconomeControllers/Entrer_mont') ?>" method="post" novalidate="novalidate">
					<div class="form-row">
							<input type="hidden" class="form-control" name=""  id="classe" placeholder="Classe de"  >	
							<?php
									foreach($annescolaire as $anne):
								?>
								<input type="hidden" id="id_anne_scolaire" name="id_anne_scolaire" value="<?= $anne->id_anne_scolaire;?>">
							<?php endforeach; ?>	
							<input type="hidden" class="form-control" name="entrant" id="entrant" value="0"  >
								
						<div class="col-md-4 mb-3">
							<input type="text" class="form-control" name="sortie" id="entrant" placeholder="Montant"  >
							
						</div>
						<div class="col-md-4 mb-3">
							<input type="text" class="form-control" name="designation" id="designation" placeholder="Designation"  >
							
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6">
							<input type="submit" name="savesortie" value="Enregistrer" class="btn btn-outline-success btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
