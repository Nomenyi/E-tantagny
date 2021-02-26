<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <div class="col-lg-2">
							<a href="<?php echo base_url('ParametreControllers/listeClasse'); ?>" class=" btn btn--blue">Retour</a>
							
						</div>
                    </div>
                </div>
			</div>
			<?php
				if($this->session->flashdata('success')){
			?>
			<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
				<span class="badge badge-pill badge-success " >SUCCESS</span><br>
				<?php echo $this->session->flashdata('success'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?php
				}
			?>
			<br>
			<div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Import/importdata');  ?>" enctype="multipart/form-data" method="post" role="form">
                            <div class="form-group">
                            <label for="exampleInputFile">File Upload</label>
                            <input type="file" name="file" id="file" size="150">
                            <p class="help-block">Only Excel/CSV File Import.</p>
                            </div>
                            <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
                        </form>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
</body>