<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">PARAMETRE MATIERE</h2>
                        <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#largeModal">
                            <i class="zmdi zmdi-plus"></i>
                                Ajouter une nouvelle Matière
                        </button>
                    </div>
                </div>
			</div>
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
									Matières
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									Abrèvations
								</th>
							</tr>
						</thead>
						<tbody>
							
							<?php 
								// var_dump($listematiere);
									foreach($listematiere as $liste):	
							?>
								<tr role="row" class="">
									<td ><?php echo  $liste->matiere_id ?></td>
									<td ><?php echo  $liste->matiere_fullname ?></td> 
									<td ><?php echo  $liste->matiere_abrev ?></td>
								</tr>
							</tbody>
							<?php 
								    endforeach;
							?>
							
						</tbody>

					</table>
					<a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url('ExportControllers/generateXls') ?>"><i class="fa fa-file-excel-o"></i> Export Data</a>
            
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</body>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Nouveaux Matière</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('ParametreControllers/add_matiere') ?>" method="post" novalidate="novalidate">
					<div class="form-group">
						<label for="matiere_fullname" class="control-label mb-1">Nom de la Matières</label>
						<input id="matiere_fullname" name="input_val[matiere_fullname]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="physique & chimie">
                    </div>
                    <div class="form-group">
						<label for="matiere_abrev" class="control-label mb-1">Abrévation de la Matières</label>
						<input id="matiere_abrev" name="input_val[matiere_abrev]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="physique & chimie">
					</div>
					<input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
					
				</form>
			</div>
		</div>
	</div>
</div>
