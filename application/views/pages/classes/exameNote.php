<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <h5>
                    
					  <?php
                        foreach ($classe_etudiants as $data){?>
                         <a href="<?php echo base_url('ClassesControllers/classeSelect/').$data->classe_id; ?>" class=" btn btn--blue">Retour</a>
                            <h4 class="col-md-6 title-1 m-b-25"> 
                               <?php echo $data->classe_nom ?>
                            </h4>
                
						<?php break;} ?>
                </h5>
				
			</div>
            <br>	
        <?php if(count($get_matProfClasse) > 0 ){?>
			<div class="row">
                <div class="col-lg-12">
                    <table id="example1" class="table table-borderless table-data2 dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                    MATIERE
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                    COEFICCIENT
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                <i class="zmdi zmdi-plus"></i>Action
                                </th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php foreach ($get_matProfClasse as $data) { ?>
                                <tr role="row" class="odd">	
                                    <td tabindex="0" class="sorting_1"><?= $data->matiere_abrev ?></td>
                                    <td tabindex="0" class="sorting_1"><?= $data->coefficient ?></td>
                                    <td >
                                        
                                        <a href="<?= base_url('ClassesControllers/formulaireNote/').$id_classe.'/'.$data->matiere_id.'/'.$trimestre['trimestre_id'].'/'.$data->matiere_fullname;?>" class="update btn btn-warning btn-sm update-record" >
                                            <i class="fa fa-plus"></i>
                                            Ajouter 
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    

                    </table>
                
                </div>
            </div>
            <?php }else{?>
					<h3 class="sufee-alert alert with-close alert-danger alert-dismissible fade show">PArametrer les professeurs,dans une classes et ces matiere</h3>
				<?php }?>
		</div>
	</div>
</div>
</body>
