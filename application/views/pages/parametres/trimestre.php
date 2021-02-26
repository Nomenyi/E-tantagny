<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-12">
				<div class="overview-wrap">
					<h2 class="title-1">Parametres Classes</h2>
					<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#largeModal">
						<i class="zmdi zmdi-plus"></i>
                            Genere les trimestre
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									Désignations
								</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            foreach($liste as $data): 
                                if(count($data) > 0):?>
                            
							<tr role="row" class="">
								<td  tabindex="0" class="sorting_1"><?= $data->trimestre_id ?></td>
                                <td  tabindex="0" class="sorting_1"><?= $data->trimestre_nom ?></td>
							</tr>
                        <?php 
                                endif;
                            endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
			<?php } elseif(count($liste) == 0) {?>
			<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger " >Votre trimestre est vide !!</span><br>
				<p>Veuillez entrer tous vos trimestre en se moment s'il vous plait !</p>
				
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
				<h5 class="modal-title" id="largeModalLabel">NOuveaux trimestre</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('ParametreControllers/add_trimestre') ?>" method="post" novalidate="novalidate">
					<div class="form-group">
						<label for="nom_fonctions" class="control-label mb-1">Nom du trimestre</label>
						<input id="nom_fonctions" name="input_val[trimestre_nom]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Proffesseurs">
					</div>
					<input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
					
				</form>
			</div>
		</div>
	</div>
</div>
