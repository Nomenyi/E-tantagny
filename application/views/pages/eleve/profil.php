<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-lg-12">
				<div class="card ">
					<div class="card-body ">
						<div class="card-title">
							<h3 class="text-center title-2">FICHE INDIVUDUELLE</h3>
                            <hr>
						</div>
                        <div class="col-md-12 col-lg-12 fiche">
                            <div class="row">
                                <div class="col-lg-8 designation">
                                    <h4 class="text title-2">ETAT CIVIL</h4>
                                    
                                    <br />
                                    <?php foreach ($etudiantsSelect as $key){ ?>
                                        <p>Nom : <?php echo $key->etudiant_nom?></p>
                                        <p>Prénom : <?php echo $key->etudiant_prenom?></p>
                                        <p>sexe : <?php echo ($key->etudiant_sexe == 1) ? "Masculin" : "Feminin" ?></p>
                                        <p>Nee le : <?php echo $key->etudiant_date_de_naissance?> a : <?php echo $key->etudiant_lieu_de_naissance?></p>
                                        <p>Fils de : <?php echo $key->parent_nom_pere?> et de : <?php echo $key->parent_nom_mere?></p>
                                        <p>Profession du pére : <?php echo $key->parent_pere_profession?></p>
                                        <p>Profession de la mère: <?php echo $key->parent_mere_profession?></p>
                                        <p>Adresse des Parents: <?php echo $key->parent_adresse?></p>
                                        <p>Contacte : <?php echo $key->parent_contact?></p>
                                    
                                    <?php } ?>
                                </div>
                                <div class="col-md-4 col-lg-4 image">
                                        
                                    
                                    <?php foreach ($etudiantsSelect as $key){ ?>
                                        <img style="width: 180px;heigth:180px;" src="<?= base_url("image/".$key->image);?>" alt="">
                                    <?php } ?>
                                </div>
                            </div>
                                <br />
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5 class="text title-2">COORESPODANCES</h5><br>
                                <?php foreach ($etudiantsSelect as $key){ ?>
                                    <p> <b>Titeurs 1</b> </p>
                                    <p>Nom et prénom : <?php echo $key->parent_tuteur?></p>
                                    <p>Profession : <?php echo $key->parent_tuteur_profession?></p>
                                    <p>Filiation avec élève : <?php echo $key->relation_tuteurs_eleves?></p>
                                    <p>Adresse : <?php echo $key->parent_tuteur_adresse?></p>
                                    <p>Conatcte : <?php echo $key->parent_tuteur_contact?></p>
                                    <p> <b>Titeur 2</b> </p>
                                    <p>Nom et prénom : <?php echo $key->parent_tuteur2?></p>
                                    <p>Profession : <?php echo $key->parent_tuteur_profession2?></p>
                                    <p>Filiation avec élève : <?php echo $key->relation_tuteurs_eleves2?></p>
                                    <p>Adresse : <?php echo $key->parent_tuteur_adresse2?></p>
                                    <p>Conatcte : <?php echo $key->parent_tuteur_contact2?></p>
                                    
                                <?php } ?>
                                </div>

                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                            <h3 class="text title-2">SCOLARITE</h3><br>
                                        <?php foreach ($etudiantsSelect as $key) { ?>
                                            <p>N° Registre : <?php echo $key->num_registre?></p>
                                            <p>Etabliments d'orgine : <?php echo $key->etablissement_origine?></p>
                                            <p>Classe suivie : <?php echo $key->classe_suivi?></p>
                                            <p>Anné scolaire : <?php echo $key->annee_scolaire?></p>
                                            <p>Apte a l'acticite sportives : <?php echo ($key->apte_sportive ==1) ? "Oui":"Nom"?></p>
                                            <p>displine sportives : <?php echo $key->discipline_sportive?></p>
                                            <p>Date de sortie : <?php echo $key->anne_scolaire2?></p>
                                            <p>Classe  suivie : <?php echo $key->classe?></p>
                                        <?php }?>
                                    </div>  
                                    <div class="col-md-5 col-lg-5"><br>
                                        <table class="table table-responsive border table-data2">
                                            <thead>
                                                <tr>
                                                    <th>TRIMESTRE</th>
                                                    <th>MOYENNE</th>
                                                    <th>RANG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($etudiantsSelect as $key) { ?>
                                                <tr> 
                                                    <td>Ier</td> 
                                                    <td><?php echo $key->premier_trimestre?></td>
                                                    <td><?php echo $key->rang_premier?></td>
                                                </tr>
                                                <tr>
                                                    <td>II eme</td> 
                                                    <td><?php echo $key->deuxieme_trimestre?></td>
                                                    <td><?php echo $key->rang_deux?></td>
                                                </tr>
                                                <tr>
                                                    <td>III eme</td> 
                                                    <td><?php echo $key->troisieme_trimestre?></td>
                                                    <td><?php echo $key->rang_trois?></td>
                                                </tr>
                                            <?php    } ?>

                                        
                                                
                                            </tbody>
                                        </table>
                                    </div>             
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-lg-5"><br>
                                        <?php foreach ($etudiantsSelect as $key) { ?>
                                            <p>Observation : <?php echo $key->observation?></p>
                                            <p>Recompenses & sactions : <?php echo $key->recompense_sanction?></p>
                                        <?php }?>
                                    </div>             
                                </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
        <!-- <div class="col-lg-12"><br /><br /><br />
                                 <button type="button" class="btn btn-primary btn-lg" style="float:right;">Certificat</button> -->
                                <a href="<?php echo base_url('Pdfcontrollers/testpdf/').$key->etudiant_im;?>" class="btn btn-primary btn-lg" style="float:right;" data-package_id="">impression certificat</a>
                                </div> 
	</div>
</div>
