<?php 
$status = ($this->session->userdata('status'));
$email = $this->session->userdata('email');
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>e-PKM | Masuk :: Akademik ITS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
								<!--/login-->
				
						   <div class="error_page">
												<!--/login-top-->						
									<div class="error-top up" align="center">
										<h2 class="inner-tittle page" >e-PKM</h2>
										    <div class="login">
												<h3 class="inner-tittle t-inner">Masuk</h3>
													<p style="color: red"><?php echo $this->session->flashdata('error');?></p>
														<form action="<?php echo base_url().'index.php/controller/login' ?>" method='POST' >
																<input name="username" type="text" class="text" value="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'username';}" required>
																<input name="password" type="password" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" required>	
																<p> Belum punya akun? Silahkan Daftar <a href="<?php echo base_url().'index.php/page/register' ?>">disini</a> </p>							
														<div class="submit"><input type="submit" onclick="myFunction()" value="Masuk" ></div>
														<div class="clearfix"></div>
														</form>
											</div>
																
									</div>
													 
												<!--//login-top-->
							</div>
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer sign">
										<div class="error-btn">
															</div>
										   <p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>