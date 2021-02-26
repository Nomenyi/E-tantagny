<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h3 class="text-center title-2">FICHE INDIVUDUELLE</h3>
						</div>
						<hr>
                        <div class ="col-lg-12">
                            <h4 class="text title-2">ETAT CIVIL</h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3"><br />
                                    <p>Nom :</p><br />
                                    <p>Prénom :</p><br />
                                    <p>sexe :</p><br />
                                    <p>Date de naissance :</p><br />
                                    <p>Lieu de naissance :</p><br />
                                    <p>Fils/fille de :</p><br />
                                    <p>Et de:</p><br /><br />
                                    <p>Profession du pére :</p><br />
                                    <p>Profession de la mère:</p><br />
                                    <p>Adresse des Parents</p><br />
                                    
                                </div>
                                
                                <?php foreach ($etudiantsSelect as $key){ ?>
                                    <div class="col-lg-3"><br />
                                        <p><?php echo $key->etudiant_nom?></p><br />
                                        <p><?php echo $key->etudiant_prenom?></p><br />
                                        <p><?php echo ($key->etudiant_sexe == 1) ? "Masculin" : "Feminin" ?></p><br />
                                        <p><?php echo $key->etudiant_date_de_naissance?></p><br />
                                        <p><?php echo $key->etudiant_lieu_de_naissance?></p><br />
                                        <p><?php echo $key->parent_nom_pere?></p><br />
                                        <p><?php echo $key->parent_nom_mere?></p><br /><br />
                                        <p><?php echo $key->parent_pere_profession?></p><br />
                                        <p><?php echo $key->parent_mere_profession?></p><br />
                                        <p><?php echo $key->parent_adresse?></p><br />
                                        
                                    </div>


                                    <?php } ?>

                                    
                            
                                    <div class ="col-lg-12"><br />
                                        <h4 class="text title-2">LES COORESPODANCES</h4><br />
                                        <p>Tous les élèves du Lycée , en dehors de leurs Parents doivent   avoir obligatoirement deux (02)correspondants</p>
                                    <div class="row">
                                    <div class="col-lg-3"><br />
                                        <p>Nom et prénom :</p><br />
                                        <p>Profession :</p><br />
                                        <p>Filiation avec élève :</p><br />
                                        <p>Adresse :</p><br /><br /><br />
                                    </div>
                                    <?php foreach ($etudiantsSelect as $key){ ?>
                                        <div class = col-lg-3><br />
                                            <p><?php echo $key->parent_tuteur?></p><br />
                                            <p><?php echo $key->parent_tuteur_profession?></p><br />
                                            <p><?php echo $key->relation_tuteurs_eleves?></p><br />
                                            <p><?php echo $key->parent_tuteur_adresse?></p><br />
                                    
                                   <?php } ?>
                                    
                                    </div>

                                    </div>
                                    </div>

                                    <!-- <div class="col-lg-12">
                                        <div class="row">
                                        <div class ="col-lg-6">
                                            <p>signature du pére</p><br />
                                        </div>
                                        <div class ="col-lg-6">
                                            <p>signature du pére</p><br />
                                        </div>
                                    </div>  -->

                                    <div class ="col-lg-12"><br />
                                         <h3 class="text title-2">SCOLARITE</h3> <br /><br />  
                                    </div>
                                <div class="col-lg-12">
                                    <table class="table table-responsive table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Anné scolaire</th>
                                                <th>Etabliments d'orgine</th>
                                                <th>Classe suivie</th>
                                                <th>Date</th>
                                                <th>activités sportives</th>
                                                <th>displine sportives</th>
                                                <th>Classe</th>
                                                <th>N° Registre</th>
                                                <th>TrimestreI</th>
                                                <th>TrimestreII</th>
                                                <th>TrimestreIII</th>
                                                <th>Observation</th>
                                                <th>Recompenses et sanctions</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($etudiantsSelect as $key) { ?>

                                            <tr>
                                                <td><?php echo $key->annee_scolaire?></td>
                                                <td><?php echo $key->etablissement_origine?></td>
                                                <td><?php echo $key->classe_suivi?></td>
                                                <td><?php echo $key->anne_scolaire2?></td>
                                                <td><?php echo ($key->apte_sportive ==1) ? "Oui":"Nom"?></td>
                                                <td><?php echo $key->discipline_sportive?></td>
                                                <td><?php echo $key->classe?></td>
                                                <td><?php echo $key->num_registre?></td>
                                                <td><?php echo $key->rang_premier?></td>
                                                <td><?php echo $key->rang_deux?></td>
                                                <td><?php echo $key->rang_trois?></td>
                                                <td><?php echo $key->observation?></td>  
                                                <td><?php echo $key->recompense_sanction?></td>                                          
                                            </tr>

                                    <?php    } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12"><br /><br /><br />
                                    <button type="button" class="btn btn-primary btn-lg" style="float:right;">Success</button>
                                 </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>