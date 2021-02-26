<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
            <?php
                        foreach ($update as $data){?>
                         <a href="<?php echo base_url('ParametreControllers/classeSelect/').$data->classe_id; ?>" class=" btn btn--blue">Retour</a>
                            <h4 class="col-md-6 title-1 m-b-25"> 
                               <?php echo $data->classe_nom ?>
                            </h4>
                
                    <?php } ?>
			</div>
			
			<br>
			<div class="row">
				
				<div class="col-lg-12 table-responsive  m-b-4-0 ">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?= base_url('ParametreControllers/update_one'); ?>"  method="post" id="form_update">
                                    
                                    <?php
                                        foreach($anne_scolaire as $anne):
                                    ?>
                                        <input type="hidden" id="id_anne_scolaire" name="id_anne_scolaire" value="<?= $anne->id_anne_scolaire;?>">
                                    <?php endforeach; ?>
                                    <?php
                                        foreach($classe_etudiants as $classe):
                                    ?>
                                        <input type="hidden" id="classe_id" name="classe_id" value="<?= $classe->classe_id;?>">
                                    <?php endforeach; ?>
                                        <div class="row form-group">
                                        <div class="col-lg-6">	
                                         
                                            <label for="classe_nom" class="control-label mb-1">Professeurs</label>
                                            <select id="professeur_id" name="professeur_id" class="form-control">
                                                <?php
                                                    
                                                    foreach($professeurs as $professeur):
                                                ?>
                                                    <option value="<?= $professeur->professeur_id ?>" <?php if($professeur->professeur_id == $update[0]->professeur_id){echo "selected";} ?> ><?=$professeur->nom?></option>
                                                <?php
                                                    endforeach; 
                                                ?>
                                              
                                            </select>
                                        </div>
                                        <div class="col-lg-3">	
                                            <label for="coefficient" class="control-label mb-1">Coefficient</label>
                                                <input id="coefficient" name="coefficient" type="number" class="form-control" aria-required="true" aria-invalid="false" value="<?= $update[0]->coefficient ?>">                                           
                                        </div>
                                        <div class="col-lg-3">	
                                            <label for="classe_nom" class="control-label mb-1">Matiere</label>
                                            <select id="matiere_id" name="matiere_id" class="form-control">
                                                <?php
                                                    
                                                    foreach($listematiere as $listematieres):
                                                ?>
                                                <option value="<?= $listematieres->matiere_id;?>"<?php if($listematieres->matiere_id == $update[0]->matiere_id){echo "selected";} ?>><?= $listematieres->matiere_abrev;?></option>
                                                <?php 
                                                    endforeach; 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <input type="hidden" name="classe_id" id="" value="<?= $update[0]->classe_id ?>">
                                <input type="hidden" id="" name="id" value="<?= $update[0]->num ?>">
                                    
                                <input id="update" name="update"  type="submit" class="btn btn-lg btn-warning" value="Modifier">
                    
                            </form>
                        </div>
                    </div>					
				</div>
			</div>
		</div>
	</div>
</div>
</body>

