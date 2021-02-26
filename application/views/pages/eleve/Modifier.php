<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<?php
						// var_dump($valeurs[0]->parent_id);exit;
						if($this->session->flashdata('error'))
						{
					?>
					<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
						<span class="badge badge-pill badge-warning " >error</span><br>
						<?php echo $this->session->flashdata('error'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<?php
						}
					?>
					
					<?php
						if(count($classes) >= 1 && count($annescolaire) >= 1){
					?>
					<div class="card">
						<div class="card-header">
							<b>Formulaire d'insciptions</b> 
						</div>
						<div class="card-body card-block">
							<form action="<?php echo base_url('EtudiantsControllers/updateEleves') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
								
								<div class="form-row">
									<div class="col-md-12 mb-3">
										<span class="help-block">Etats Civil</span>
									</div>
								</div>
								
								<div class="form-row">
									<?php
										// if(count($classes > 0)){
									?>
										<div class="col-md-6 mb-3">
											<select id="id_classe" name="input_id[id_classe]" class="form-control">
												<?php
													foreach($classes as $classes):
												?>
												<option value="<?= $classes->classe_id;?>"><?= $classes->classe_nom;?></option>
												<?php 
													endforeach; 
												?>
											</select>
										</div>
									<!-- <?php
									
									?> -->
									<div class="col-md-6 mb-3">
										<select id="id_anne_scolaire" name="input_id[id_anne_scolaire]" class="form-control">
											<?php
												foreach($annescolaire as $annescolaire):
													if($annescolaire->status == 0):
											?>
														<option value="<?= $annescolaire->id_anne_scolaire;?>"><?= $annescolaire->anne_scolaire;?></option>
											<?php 
													endif;
												endforeach; 
											?>
										</select>
									</div>
								</div>
                                <?php foreach($valeurs as $key):?>
								<div class="form-row">
									<div class="col-md-6 mb-3">

										<input type="text"  class="form-control" name="input_val[etudiant_nom]" id="etudiant_nom" value="<?= $key->etudiant_nom ?>" required>
										
									</div>
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control" name="input_val[etudiant_prenom]" id="etudiant_prenom" placeholder="Prénoms" value="<?= $key->etudiant_prenom ?>" >
										
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6 mb-3">
										<select id="etudiant_sexe" name="input_val[etudiant_sexe]" class="form-control">
											<option value="1">Masculin</option>
											<option value="2">Feminin</option>
										</select>
									</div>
									<div class="col-md-6 mb-3">

										<input type="texte" class="form-control" name="input_val[etudiant_adresse]" id="etudiant_adresse"  placeholder="Adresse"  value="<?= $key->etudiant_adresse ?>" required>
										
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-4 mb-3">

										<input type="date" class="form-control" name="input_val[etudiant_date_de_naissance]" id="etudiant_date_de_naissance"  placeholder="Né(e) le" value="<?= $key->etudiant_date_de_naissance ?>"  required>
										
									</div>
									<div class="col-md-4 mb-3">
										<input type="text" class="form-control" name="input_val[etudiant_lieu_de_naissance]" id="etudiant_lieu_de_naissance"placeholder="A" value="<?= $key->etudiant_lieu_de_naissance ?>" required>
										
									</div>
									<div class="col-md-4 mb-3">
										<input type="file" class="form-control" name="etudiantImage" id="etudiantImage"placeholder="image" value="" >
										
									</div>
                                </div>
								<div class="form-row">
									<div class="col-md-6 mb-3">

										<input type="text" class="form-control" name="input_par[parent_nom_pere]" id="parent_nom_pere" placeholder="Fils /Fille de"  value="<?= $key->parent_nom_pere?>">
										
									</div>
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control" name="input_par[parent_nom_mere]" id="parent_nom_mere" placeholder="Et de" value="<?= $key->parent_nom_mere?>" >
										
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12 mb-3">
										<span class="help-block">Adresse Professionnelle des Parents</span>
									</div>
								</div>

								<div class="form-row">
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control"  name="input_par[parent_pere_profession]" id="parent_pere_professeion" placeholder="Profession du Père"  value="<?= $key->parent_pere_profession?>">
									</div>
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control"  name="input_par[parent_mere_profession]" id="parent_mere_professeion" placeholder="Profession  de la Mère" value="<?= $key->parent_mere_profession?>"  >
										
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6 mb-3">

										<input type="text" class="form-control"  name="input_par[parent_adresse]" id="parent_adresse" placeholder="Domicile des parents" value="<?= $key->parent_adresse?>"  >
										
									</div>
									<div class="col-md-6 mb-3">

										<input type="number" class="form-control"  name="input_par[parent_contact]" id="parent_contact" placeholder="Telephone"  value="<?= $key->parent_contact?>">
										
									</div>
								</div>
								<!-- titeurs -->
								<div class="form-row">
									<div class="col-md-12">
										<span style="Cursor:pointeur;" class="btn"  data-toggle="collapse" data-target="#titeurs" aria-expanded="true" aria-controls="collapseOne">
											<b>	Tous les élèves du Lycée , en dehors de leurs Parents doivent   avoir obligatoirement <br> deux (02)correspondants</b> clique ici
										</span>
									</div>
								</div>

								<aside class="collapse" id="titeurs">

									<div class="form-row">
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur]" id="parent_tuteur" placeholder="01 - Nom et Prénoms" value="<?= $key->parent_tuteur?>" >
											
										</div>
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur_profession]" id="parent_tuteur_profession" placeholder="Profession" value="<?= $key->parent_tuteur_profession?>" >
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_par[relation_tuteurs_eleves]" id="relation_tuteurs_eleves" placeholder=" Filiation avec l'élève"  value="<?= $key->relation_tuteurs_eleves?>">
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur_adresse]" id="parent_tuteur_adresse" placeholder="Adresse" value="<?= $key->parent_tuteur_adresse?>" >
										</div>

										<div class="col-md-4 mb-3">
											<input type="number" class="form-control"name="input_par[parent_tuteur_contact]" id="parent_tuteur_contact" placeholder="Telephone"  value="<?= $key->parent_tuteur_contact?>" >
										</div>
									</div>
									<!-- titeurs2 -->
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur2]" id="parent_tuteur" placeholder="02 - Nom et Prénoms"  >
											
										</div>
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur_profession2]" id="parent_tuteur_profession" placeholder="Profession" value="<?= $key->parent_tuteur_profession?>"  >
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_par[relation_tuteurs_eleves2]" id="relation_tuteurs_eleves" placeholder=" Filiation avec l'élève"  value="<?= $key->relation_tuteurs_eleves?>">
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_par[parent_tuteur_adresse2]" id="parent_tuteur_adresse" placeholder="Adresse" value="<?= $key->parent_tuteur_adresse?>" >
										</div>

										<div class="col-md-4 mb-3">
											<input type="number" class="form-control"name="input_par[parent_tuteur_contact2]" id="parent_tuteur_contact" placeholder="Telephone" value="<?= $key->parent_tuteur_contact?>" >
										</div>
									</div>
								</aside>
								<div class="form-row">
									<div class="col-md-12">
										<span style="Cursor:pointeur;" class="btn"  data-toggle="collapse" data-target="#scolarite" aria-expanded="true" aria-controls="collapseTwo">
											<b>SCOLARITÉ</b>  clique ici	
										</span>
									</div>
								</div>

								<aside class="collapse" id="scolarite">

									<div class="form-row">
										<div class="col-md-12 mb-3">
											<input type="text" class="form-control" name="input_sco[Etablissement_origine]"  id="Etablissement_origine" placeholder="Etablissements d'origine"  value="<?= $key->parent_tuteur_contact?>">
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_sco[classe_suivi]" id="classe_suivi" placeholder=" Classe suivie"  value="<?= $key->parent_tuteur_contact?>">
											
										</div>
										<div class="col-md-6 mb-3">
											<input type="date" class="form-control" name="input_sco[annee_scolaire]" id="anne_scolaire" placeholder="Année Scolaire" value="<?= $key->parent_tuteur_contact?>" >
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<span >Etes-vous dispensé ( e ) d'activités sportives ?</span>
									
										</div>
										<div class="col-md-6 ">
											<select id="apte_sportive" name="input_sco[apte_sportive]" class="form-control">
												<option value="1">Oui</option>
												<option value="2">Non</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<input type="text" class="form-control" name="input_sco[discipline_sportive]" id="discipline_sportive" placeholder="Disciplines sportives" value="<?= $key->discipline_sportive?>" >
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="date" class="form-control" name="input_sco[anne_scolaire2]" id="anne_scolaire2" placeholder="Année Scolaire " value="<?= $key->anne_scolaire2?>">
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[classe]"  id="classe" placeholder="Classe de" value="<?= $key->classe?>" >
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[num_registre]" id="num_registre" placeholder="N° Registre"  value="<?= $key->num_registre?>">
											
										</div>
									</div>
									<div class="col-md-12 mb-3">
											<span>01-RESULTATS SCOLAIRES</span>
									
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[premier_trimestre]" id="premier_trimestre" placeholder="1° Trimestre  " value="<?= $key->premier_trimestre?>" >
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[deuxieme_trimestre]" id="deuxieme_trimestre" placeholder="Rang"  value="<?= $key->deuxieme_trimestre?>">
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[troisieme_trimestre]" id="troisieme_trimestre" placeholder="2° Trimestre  " value="<?= $key->troisieme_trimestre?>" >
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[rang_premier]" id="rang_premier" placeholder="Rang" value="<?= $key->rang_premier?>" >
											
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[rang_deux]" id="rang_deux" placeholder="3° Trimestre  "  value="<?= $key->rang_deux?>">
											
										</div>
										<div class="col-md-4 mb-3">
											<input type="text" class="form-control" name="input_sco[rang_trois]" id="rang_trois" placeholder="Rang"  value="<?= $key->rang_trois?>">
											
										</div>
									</div>
									<div class="col-md-12 mb-3">
											<span>02 - RECOMPENSES ET SANCTIONS</span>
									
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<textarea name="input_sco[recompense_sanction]" id="recompense_sanction" rows="3" placeholder="Texte ... " class="form-control"value="<?= $key->recompense_sanction?>"></textarea>
										</div>
									</div>
									<div class="col-md-12 mb-3">
											<span>02 - OBSERVATION</span>
									
									</div>
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<textarea name="input_sco[observation]" id="observation" rows="" placeholder="Texte ... " class="form-control"value="<?= $key->observation?>"></textarea>
										</div>
									</div>
									
								</aside>
									<input type="hidden" class="form-control" name="etudiant_im" id="etudiant_im"  value="<?= $key->etudiant_im ?>">
									<input type="hidden" class="form-control" name="parent_id" id="parent_id"  value="<?= $key->parent_id ?>">
									<input type="hidden" class="form-control" name="id_scolarite" id="id_scolarite"   value="<?= $key->id_scolarite ?>">
								
									<?php endforeach; ?>		
								<div class="form-row">
									<div class="col-md-6">
										<input type="reset"  value="Annuler" class="btn btn-outline-danger btn-lg btn-block">
									</div>
									<div class="col-md-6">
										<input type="submit" name="modifier" value="Modifier" class="btn btn-outline-success btn-lg btn-block">
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php }elseif(count($classes) == 0 OR count($annescolaire) == 0){ ?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger " >Erreur</span><br>
							<p>Veuillez parametre les classes et entrer l'anne scolaire actif s'il vous plait !</p>
							
							<a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeAnnescolaire')?>"><button   style="color:white;">Anne Scolaire </button></a>
							<a class="au-btn--submit col-sm-6 col-sm-6 text-center" href="<?= base_url('ParametreControllers/listeClasse')?>"><butto style="color:white;">Classes</button></a>
						
									
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
					<?php } ?>
				</div>
			
			</div>
			
		</div>
		
	</div>
</div>