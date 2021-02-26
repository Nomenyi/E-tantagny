<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <h5>

					  <?php
                        foreach ($classe_etudiants as $data){?>
                         <a href="<?php echo base_url('ClassesControllers/classeSelect/').$data->classe_id; ?>" class=" btn btn--blue">Retour</a>
                            <h4 class="col-md-6 title-1 m-b-25">
                               <?php echo $data->etudiant_nom ?>
                            </h4>

						<?php break;} ?>
                </h5>

			</div>
            <br>
        <?php if(count($get_matProfClasse) > 0 ){?>
          </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-4 col-lg-4 ">
                        <div class="card">
                            <div class="card-header ">
                            <b>Entrer les Notes</b>
															<?php if($note_eleves == NULL) {?>
                                <div class="card-body">
                                    <form action="<?php echo base_url('ClassesControllers/set_note/');?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                        <?php foreach($listematiere as $keys): ?>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">

                                                    <input type="text"  class="form-control" name="" id="etudiant_nom" placeholder="Nom" value="<?= $keys->matiere_abrev ?>">

                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <input type="number" min="0" max="20" class="form-control" name="note[]" id="etudiant_prenom" placeholder="0" value="" >

                                                </div>
                                            </div>
																						<input type="hidden" name="id_trimestre[]" value="<?= $trimestre_id ?>">
                                            <input type="hidden" name="id_anne_scolaire[]" value="<?= $id_anne_scolaire; ?>">
                                            <input type="hidden" name="id_etudiant[]" value="<?= $etudiant_im; ?>">
                                            <input type="hidden" name="id_classe[]" value="<?= $classe_id ?>">
																						<input type="hidden" name="id_matiere[]" value="<?= $keys->matiere_id ?>">
                                            <?php endforeach;?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="submit" name="save" value="OK" class="btn btn-outline-success btn-lg btn-block">
                                                </div>
                                            </div>
                                    </form>
                                </div>
															<?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header ">
                                <h5>Notes  Trimestre</h5>
                                <div class="card-body">
																	<div class="row">
																		<div class="col-sm-12 table-responsive m-b-4-0">
																			<table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
																				<thead>
																					<tr role="row">
																						<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
																							Matiere
																						</th>
																						<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
																							Notes
																						</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php for($j=0; $j < count($note_eleves); $j++) {?>
																						<tr role="row" class="odd">
																							<td><?= $note_eleves[$j]->matiere_fullname ?></td>
																							<td><?= $note_eleves[$j]->valeur ?></td>
																						</tr>
																					<?php } ?>
																				</tbody>
																			</table>
																		</div>
																	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                else
                {
            ?>
                <h3 class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        Parametrer les professeurs,dans une classes et ces matiere
                </h3>
        <?php }?>
		</div>
	</div>
</div>
</body>
