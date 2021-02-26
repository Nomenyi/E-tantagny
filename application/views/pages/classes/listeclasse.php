<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-12">
				<div class="overview-wrap">
					<h2 class="title-1">Listes des Classes</h2>
					<?php if((count($classeListe) == 0)){?> ?>
						<a href="<?= base_url('ParametreControllers/listeClasse')?>">
							<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#largeModal">
								<i class="zmdi zmdi-plus"></i>
								Parametre
							</button>
						</a>
						
					<?php } ?>
				</div>
			</div>	
			<?php
				if(count($classeListe) >= 1 ){
			?>
			<div class="row m-t-25">
			<?php 
				foreach($classeListe as $Liste){
						
					if(count($classeListe) == 1){?>

						<a href="<?= base_url('ClassesControllers/classeSelect/').$Liste->classe_id ?>" class="col-sm-6 col-lg-10">
							<div class="overview-item overview-item--c1">
								<div class="overview__inner">
									<div class="overview-box clearfix">
										<div class="icon">
											<i class="zmdi zmdi-home"></i>
										</div>
										<div class="text">
										<form action="" method="get">
											<input type="hidden" value="<?= $Liste->classe_id ?>">
										</form>
											<h2><?= $Liste->classe_serie ?>/<?= $Liste->classe_serie ?></h2>
											<span><?= $Liste->classe_nom ?></span>
										</div>
									</div>
								</div>
							</div>
						</a>

			<?php 
				}
				elseif(count($classeListe) == 2){?>
				<a href="<?= base_url('ClassesControllers/classeSelect/').$Liste->classe_id ?>" class="col-sm-6 col-lg-5">
						<div class="overview-item overview-item--c1">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-home"></i>
									</div>
									<div class="text">
									<form action="" method="get">
										<input type="hidden" value="<?= $Liste->classe_id ?>">
									</form>
										<h2><?= $Liste->classe_serie ?>/<?= $Liste->classe_serie ?></h2>
										<span><?= $Liste->classe_nom ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php }
				elseif(count($classeListe) >= 3){?>
					<a href="<?= base_url('ClassesControllers/classeSelect/').$Liste->classe_id ?>" class="col-sm-6 col-lg-3">
						<div class="overview-item overview-item--c1">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										<i class="zmdi zmdi-home"></i>
									</div>
									<div class="text">
									<form action="" method="get">
										<input type="hidden" value="<?= $Liste->classe_id ?>">
									</form>
										<h2><?= $Liste->classe_serie ?>/<?= $Liste->classe_serie ?></h2>
										<span><?= $Liste->classe_nom ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php } ?>
			<?php
				}
			} elseif((count($classeListe) == 0)){?>
				<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
						<span class="badge badge-pill badge-danger " >Votre Classe est vide</span><br>
					<p>Veuillez parametre les classes et entrer l'anne scolaire actif s'il vous plait !</p>
					
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			<?php	
			}
			?>
				
			</div>
		</div>
	</div>
</div>
</body>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Ajouter une nouvelle Classe</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('ParametreControllers/addClasse') ?>" method="post" novalidate="novalidate">
					<div class="form-group">
						<label for="classe_nom" class="control-label mb-1">Nom de la classe</label>
						<input id="classe_nom" name="input_val[classe_nom]" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Seconde I">
					</div>
					<div class="form-group">
						<label for="classe_serie" class="control-label mb-1">Nombre d'eleves maximum dans une classe</label>
							<input id="classe_serie" name="input_val[classe_serie]" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="20">
						
					</div>
					<div class="form-group">
						<label for="classe_serie" class="control-label mb-1">Nombre de matiere</label>
							<input id="nombre_matiere" name="input_val[nombre_matiere]" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="20">
						
					</div>
					<input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
					
				</form>
			</div>
		</div>
	</div>
</div>
