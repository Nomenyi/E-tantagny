<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="styles.css">
	</head>
	<style>
		
		.faneva .ff{
			font-size : 12px;
			text-decoration: underline;
			width:50%;
		}
		.Titre {
			float:right;
			margin-top: -10rem;
		}
		.Titre .vv{
			margin-top:-0.5%;
			font-size : 12px;
		}
		.contenu{
			margin-top: 10%;
			font-size : 12px;
		}
	</style>
	<body>
		<div class="container_fluid">
			<div class="heading">
				<section class="faneva">
					<h4 class="ff" style="margin-left:5%;">MINISTERA DE L ' EDUCATION NATIONALE <br></h4>
					<h4 class="ff"style="margin-top:-1%">DIRECTION REGIONALE DE L ' EDUCATION NATIONALE <br></h4>
					<h4 class="ff"style="margin-top:-2%;margin-left:10%;" > ATSIMO ATSINANA <br></h4>
					<h4 class="ff"style="margin-top:-2%">CIRCONSCRIPTION SCOLAIRE DE VANGAINDANO <br></h4>
					<h4 class="ff"style="margin-top:-2%;margin-left:5%;">LYCEE DE VANGAINDRANO <br></h4>
					<h4 class="ff"style="margin-top:-2%;margin-left:10%;">C.E.N 320 24 00 15 </h4>
					
				</section><br>
				<section class="Titre">
					<h4 class="vv" style="margin-top:-2%;">REPOBLIKAN ' I MADAGASCAR<br></h4>
					<h4 class="vv">Fitiavana - Tanindrazana - Fandrosoana <br></h4>
					<h4 class="vv">CERTIFICAT DE SCOLARITE <br></h4>
					<h4 class="vv">( Arrêté N°542-E/C du 19 Décembre 1965 )<br></h4>
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

