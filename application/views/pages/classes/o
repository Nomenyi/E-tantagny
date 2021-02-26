bindec<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<h2 class="col-lg-2 title-1 m-b-25">
					<?php
						foreach ($classeListe as $data){?>
						<a href="<?php echo base_url('ClassesControllers/classeSelect/').$data->classe_id; ?>" class=" btn btn--blue">Retour</a>
						 <?php
						   
                            break;
						}
						?>

				</h2>
				<h2 class="col-lg-8 title-1 m-b-25">

				<p><?= $nom_etudiant['etudiant_nom']?></p>
				</h2>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12 table-responsive  m-b-4-0 ">

				<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">

					<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
									MATIERE
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
									1 <sup>er</sup> TRIMESTRE
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                    2 <sup>er</sup> TRIMESTRE
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                    3 <sup>er</sup> TRIMESTRE
								</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
								<i class="zmdi zmdi-plus"></i>Asigne
								</th>
							</tr>
						</thead>

						<tbody>
							<?php 
								$trim = "1ERTRIM";
								
								foreach ($note_per_trimestre[$trim][$nom_etudiant['etudiant_im']] as $key => $value) { 
									// var_dump(is_null($note_per_trimestre['1ERTRIM'][$id_etudiant]));exit;
									?>										
										<tr>
											<td><?php  
												echo $key;
											?></td>
											<td><?php
												if(!empty($note_per_trimestre['1ERTRIM'][$nom_etudiant['etudiant_im']])){
													if(key_exists($key, $note_per_trimestre['1ERTRIM'][$nom_etudiant['etudiant_im']])){
														echo $value;
													}
													else{
														echo "Aucun note";
													}
												}else{
													echo "Aucun note";
												}
											?>
											</td>
											<td><?php 
												if(!empty($note_per_trimestre['2EMTRIM'][$nom_etudiant['etudiant_im']])){
													if(key_exists($key, $note_per_trimestre['2EMTRIM'][$nom_etudiant['etudiant_im']])){
														echo $note_per_trimestre['2EMTRIM'][$nom_etudiant['etudiant_im']][$key];
													}
													else{
														echo "Aucun note";
													}
												}else{
													echo "Aucun note";
												}
											?></td>
											<td><?php 
												if(!empty($note_per_trimestre['3EMTRIM'][$nom_etudiant['etudiant_im']])){
													if(key_exists($key, $note_per_trimestre['3EMTRIM'][$nom_etudiant['etudiant_im']])){
														echo $note_per_trimestre['3EMTRIM'][$nom_etudiant['etudiant_im']][$keys];
													}
													else{
														echo "Aucun note";
													}
												}else{
													echo "Aucun note";
												}
											?></td>
											<td>
												
											</td>
										</tr>
									<?php
								}

							?>
						</tbody>


					</table>

					<!-- <a class="pull-right btn btn-info btn-xs" href="<?php echo base_url('ExportControllers/ExportBulletin/').$nom_etudiant['etudiant_im'] ?>"><i class="fa fa-file-excel-o"></i> Bulletin</a> -->
            
				</div>
			</div>
		</div>
	</div>
</div>
</body>
