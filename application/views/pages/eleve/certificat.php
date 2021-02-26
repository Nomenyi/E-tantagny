<!DOCTYPE html>
<html>
	<style>
		
		.body{
			margin: 0;
			text-align: justify;
			
		}
		.ff{
			font-size: 10px;
			font-weight: normal;
			padding:-10px;
		}
		.contenu{
			font-size : 13px;
		}
	</style>
	<body>

		<div class="container_fluid" style="font-family:Courier New Lucida Console">
			<div class="heading">
				<section class="faneva">
				<h4 class="ff" style="margin-left:65%;font-size:10px;letter-spacing: 1px;">REPOBLIKAN ' I MADAGASCAR<br></h4>
				<h4 class="ff" style="margin-top:-20%;margin-left:5%;text-decoration:underline;">MINISTERA DE L ' EDUCATION NATIONALE <br></h4>
					<h4 class="ff"style="margin-left:62%;font-style:italic;letter-spacing: 1px;">Fitiavana - Tanindrazana - Fandrosoana <br></h4>
						<h4 class="ff"style="margin-top:-50%;line-height: 15px;text-decoration:underline;">DIRECTION REGIONALE DE L ' EDUCATION NATIONALE <br></h4>
						<h4 class="ff"style="margin-left:10%;margin-top:0%;line-height: 15px;text-decoration:underline;" > ATSIMO ATSINANA <br></h4>
					<h4 class="ff" style="margin-left:60%;font-size:15px;letter-spacing: 1.9px;text-transform:Bold;">CERTIFICAT DE SCOLARITE <br></h4>

					<h4 class="ff"style="margin-top:-10%;line-height: 15px;text-decoration:underline;">CIRCONSCRIPTION SCOLAIRE DE VANGAINDANO <br></h4>
					<h4 class="ff" style="margin-top:2px;margin-left:55%;font-size:14px;font-style:italic;line-height: 1.5;letter-spacing: 1.5px;">( Arrêté N°542-E/C du 19 Décembre 1965 )<br></h4>
						<h4 class="ff"style="margin-left:8%;margin-top:-10%;line-height: 15px;text-decoration:underline;">LYCEE DE VANGAINDRANO <br></h4>
						<h4 class="ff"style="margin-left:10%;line-height: 15px;text-decoration:underline;">C.E.N 320 24 00 15 </h4>
					
				</section>
			</div>
			<!-- contenue -->
			<div class="contenu" >
				<?php foreach($etudiantsSelect as $data): ?>

					<div class="container">
						<p class="Introduction" style="margin-left:25%;"> Je,soussigné, Proviseur du Lycée de vangaindrano, cerifie aue l'élève :</p>
						<p class="apropos">
							Nom : <?php echo $data->etudiant_nom ;?> Prénom : <?php echo $data->etudiant_prenom ;?>  a fréquenté mon Etablissement depuis le : <?php echo $data->anne_scolaire2?>
							jusqu ' à _______ 
						</p>
						<p class="Introduction2" style="margin-left:25%;"> Les inscriptions suivantes figurent au Registre Matricule de l'Etablissement, en ce qui concerne cet élève :</p>
						<p class="apropos2">
							Numéro Matricule : <?php echo $data->etudiant_nom ;?> du : <?php echo $data->anne_scolaire2?>  
							Né (e) le  : <?php echo $data->etudiant_date_de_naissance?> à : <?php echo $data->etudiant_lieu_de_naissance?> <br />  Fils (fille) de : <?php echo $data->parent_nom_pere?> et de : <?php echo $data->parent_nom_mere?>
							Domicilié à <?php echo $data->parent_adresse?> Nature de la pièce d'Etat Civil N° ________ du _____ <br>

						<p class="Introduction" style="margin-left:20%;"> Je,soussigné, Proviseur du Lycée de vangaindrano, cerifie aue l'élève :</p>
						<p class="apropos">
							Nom : <b style="text-transform:Uppercase;padding:0 10px 0 10px"><?php echo $data->etudiant_nom ;?></b>   Prénom : <b style="padding:0 10px 0 10px"><?php echo $data->etudiant_prenom ;?></b>  a fréquenté mon Etablissement depuis le : <b><?php echo $data->anne_scolaire2?></b>
							jusqu ' à _______ 
						</p>
						<p class="Introduction2" style="margin-left:20%;"> Les inscriptions suivantes figurent au Registre Matricule de l'Etablissement, en ce qui concerne cet élève :</p>
						<p class="apropos2">
							Numéro Matricule : <b style="padding:0 10px 0 10px"><?php echo $data->etudiant_im ;?></b> du : <b style="padding:0 10px 0 10px"><?php echo $data->anne_scolaire2?> </b> <br>
							Né (e) le  : <b style="padding:0 10px 0 10px"><?php echo $data->etudiant_date_de_naissance?></b> à : <b style="padding:0 10px 0 10px"><?php echo $data->etudiant_lieu_de_naissance?></b> <br />
							Fils (fille) de : <b style="text-transform:Uppercase;padding:0 10px 0 10px"><?php echo $data->parent_nom_pere?></b> et de : <b style="text-transform:Uppercase;padding:0 10px 0 10px"><?php echo $data->parent_nom_mere?></b> <br>
							Domicilié à <b style="text-transform:Uppercase;padding:0 10px 0 10px"><?php echo $data->parent_adresse?> </b>Nature de la pièce d'Etat Civil N° ________ du _____ <br>
							Classe  suivie durant l'Année scolaire <?php echo $data->classe_suivi?> / <?php echo $data->annee_scolaire?>
						</p>
						<p class="Introduction2"> En fai de quoi, le présent certificat lui est délivré pour servir et valoir ce que de droit</p>
						<p clas="signature" style="float:right;"> A Vangaindrano le ___________________<br>
							<big>Le Proviseur du Lycée,</big>
						</p>
						
						
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>

