<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= ucfirst($title)?>-AUCATS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="shortcut icon" href="<?= base_url()?>/styles/images/auca.png" type="image" style="height:70px; width:70px;">
   <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/login/css/main.css">
<!--===============================================================================================-->
<style>
    #body1{
        background-image: url(<?= base_url("styles/images/15.jpg")?>);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
</head>
<body id="body1">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN HERE
				</span>
                <?php if(null != $this->session->flashdata('error')){ echo $this->session->flashdata('error');}  ?>
                <?php if(null != $this->session->flashdata('danger')){ echo $this->session->flashdata('danger');}  ?>

				<form class="login100-form validate-form p-b-33 p-t-5" action="<?= base_url('postuser')?>" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="btn btn-info">
							Login 
						</button>
                        <p style="margin-left:10px;">Don't have account? <a href="<?=base_url('register')?>" style="text-decoration: none; color:blue;">Register here</a></p>
                        
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>styles/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>styles/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>styles/login/js/main.js"></script>

</body>
</html>