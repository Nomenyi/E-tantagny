<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-12">
				<?php
						// var_dump($valeurs[0]->parent_id);exit;
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
				<div class="overview-wrap">
					<h2 class="title-1">ANNE SCOLAIRE</h2>
						<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#largeModal">
							<i class="zmdi zmdi-plus"></i>
								Ajouter Anne Scolaire
						</button>
				</div>
			</div>
			<?php 
				if( count($liste) >= 1 ){
			?>
            <div class="row">
				<div class="col-lg-12 table-responsive  m-b-4-0 ">

					<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Numéro
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Anne scolaire
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
									Status
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($liste as $key) { ?>
							<tr role="row" class="odd">
								<td><?php echo $key->id_anne_scolaire?></td>
								<td><?php echo $key->anne_scolaire?></td>
                                <td>
                                    <?php if($key->status == 0){?>
                                        <p style="color:green;text-transform:uppercase;">ACTIF</p>
                                    <?php } 
                                        else if($key->status == 1){?>
                                       <p style="color:red;text-transform:uppercase;">Innactif</p>
                                    <?php } ?>
                                        
                                </td>
							</tr>
						<?php 
							} ?>
						</tbody>

					</table>
				</div>
			</div>
			<?php } elseif(count($liste) == 0) {?>
			<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger " >Votre enne scolaire est vide !!</span><br>
				<p>Veuillez entrer votre anne scolaire en se moment s'il vous plait !</p>
				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</body>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Nouveaux Anne Scolaire</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('ParametreControllers/annescolaire') ?>" method="post" novalidate="novalidate">
					<div class="form-group">
						<label for="anne_scolaire" class="control-label mb-1">Anne Scolaire</label>
						<input id="anne_scolaire" name="input_val[anne_scolaire]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="2019 - 2020">
					</div>
                    <div class="form-group">
                        <select id="status" name="input_val[status]"  class="form-control-sm form-control">
                            
							<option style="color:green;" value="0">Actif</option>
							<option style="color:red; " value="1" >Inactif</option>
                        </select>

                    </div>
					<?php if(count($liste) <= 0 ){ ?>
						<input id="enregistrer" name="enregistrer"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
					<?php 
						}
						else if(count($liste) >= 0 ){ 
					?>
						<input id="modifier" name="modifier"  type="submit" class="btn btn-lg btn-success" value="Modifier">
					<?php
						}
					
					?>
					
				</form>
			</div>
		</div>
	</div>
</div>
