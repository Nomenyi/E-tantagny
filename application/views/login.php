<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Etantagny - login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
	<link href="<= base_url(); ?>assets/bootstrap-4.1/boostrap.min.css" >
	<link href="<?= base_url(); ?>assets/css/loginstyle.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/fontawesome-free/css/all.css" rel="stylesheet">
	<!-- framework -->
	<link href="<?= base_url(); ?>assets/boostrap4/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="login-card">
		<div class="container-login">
		<div class="container">
	<div class="row">
		<div class="col-sm-6 ">
			<div class="contact1-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
				<img class="logo-img" src="<?= base_url('assets/images/logo2.png') ?>" alt="" srcset="">
			</div>
		</div>
		<div class="col-sm-6 bg-">
			<div class="card-body">
				<?php
				$success_msg = $this->session->flashdata('success');
				$error_msg = $this->session->flashdata('error');

				if ($success_msg) {
				?>
					<div class="alert alert-success">
						<?php echo $success_msg; ?>
					</div>
				<?php
				}
				if ($error_msg) {
				?>
					<div class="alert alert-danger">
						<?php echo $error_msg; ?>
					</div>
				<?php
				}
				?>
				<form class="" role="form" method="post" action="<?php echo base_url('login/connection'); ?>">

					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text "><i class="fas fa-user"></i></span>
						</div>
						<input name="user_name" id="user_name" required placeholder="username" type="text" class="form-control input1">
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text "><i class="fas fa-key"></i></span>
						</div>
						<input name="user_password" id="user_password" required placeholder="mot de passe" type="password" class="form-control input1">
					</div>
					<br>
					<!-- <div class="position-relative form-check"><label class="form-check-label">
							<input type="checkbox" name="remember" class="form-check-input "> Se souvenir de moi</label>
					</div> -->
					<br>
					<div class="position-relative form-check"><label class="form-check-label">
							<a href="">Mot de passe oublié ?</a>
					</div>
					<br>
					<div class="input-group">

						<input type="submit" class="form-control btn btn-primary" value="Connecter">

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
		</div>
	</div>
</body>

<script>
	// Disable form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Get the forms we want to add validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>

</html>
