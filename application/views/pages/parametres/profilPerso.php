<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-lg-12">
				<div class="card ">
					<div class="card-body ">
						<div class="card-title">
							<h3 class="text-center title-2">PROFIL DE <?= $professeur[0]->nom?></h3>
                            <hr>
						</div>
                        <div class="col-md-12 col-lg-12 fiche">
                            <div class="row">
                                <div class="col-lg-8 designation">
                                    <br />
                                    <?php foreach ($professeur as $key){ ?>
                                        <p>Nom : <?php echo $key->nom?></p>
                                        <p>Prénom : <?php echo $key->prenom?></p>
                                        <p>CIN : <?php echo $key->CIN ?> </p>
                                        <p>IM : <?php echo $key->IM ?> </p>
                                        <p>sexe : <?php echo ($key->sexe == 1) ? "Masculin" : "Feminin" ?></p>
                                        <p>Nee le : <?php echo $key->date_de_naissance?> </p> 
                                        <p>Code cadre : <?php echo $key->code_cadre ?> </p>
                                        <p>corps grade : <?php echo $key->corps_grade ?> </p>
                                        <p>date d ' entre : <?php echo $key->date_entre ?> </p>
                                        <p>CRPS : <?php echo $key->CRPS ?> </p>
                                        <p>Diplome academique : <?php echo $key->diplome_academique_eleves ?> </p>
                                        <p>Diplome pedagogique : <?php echo $key->diplome_pedagogique_eleves ?> </p>
                                        <p>Matiere Enseigne : <?php echo $key->matiere_enseigne ?> </p>
                                        <p>Contacte : <?php echo $key->contacte ?> </p>
                                    
                                    <?php } ?>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                        
                                    
                                    <?php foreach ($professeur as $key){ ?>
                                        <img style="width: 180px;heigth:180px;" src="<?= base_url("image/".$key->image);?>" alt="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
