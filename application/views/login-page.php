<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login PMI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" href="<?php echo base_url('asset/')?>img/logo.jpg" type="image/x-icon">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/') ?>css/main.css">
	<!--===============================================================================================-->
</head>
<body background="<?php echo base_url('assets/') ?>berita/bb.jpg">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="" action="<?php echo site_url('welcome/log_process') ?>" method="post">
					<span class="login100-form-logo">
						<img src="<?php echo base_url('asset/') ?>images/pp.png" style="width: 85%">
					</span>

					<span class="login100-form-title p-b-20 p-t-27">
						LOGIN<br>PMI
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input type="text" name="username" class="form-control" placeholder="username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input type="password" name="password-user" class="form-control" placeholder="password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

				<!-- 	<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password-user" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div> -->

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" value="Login" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('asset/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('asset/') ?>vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/') ?>js/main.js"></script>

</body>
</html>