     
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">
														<div>
															<div class="stats-left ">
																<h4> Form Penilaian PKM </h4>
															</div>

															
															<div class="clearfix"> </div>	
														</div>
															
													</div>
													<div class="col-md-8">
															<div class="graph-form">
																	<div class="form-body">
																		<form   method='POST'> 
																			<div class="form-group"> 
																				<label>Judul</label> 
																				<input name="judul" type="text" class="form-control"  required> 
																			</div>
																			<div class="form-group"> 
																				<label >Nama Ketua</label>
																				 <input name="NamaKetua" type="text" class="form-control" > 
																			 </div>
																			 <div class="form-group"> 
																				
																				 <label > Gagasan (orisinalitas, unik dan manfaat masa depan) </label>  
																				 <input name="gagasan" type="number" class="form-control" > 
																				 <p> <label> Perumusan Masalah </label> </p>
																				 <input type="number" name="masalah" class="form-control">
																				 <p> <label> Tinjauan Pustaka</label> </p>
																				 <input type="text" name="tinjauan" class="form-control">
																			 </div>
																			 <div class="form-group">
																			 	<label>Kesesuaian Metode Pelaksanaan</label>
																			 	<input type="number" name="kesesuaian" class="form-control">
																			 </div>
																			 <div class="form-group">
																			 
																			 	<p> <label> Kontribusi produk luaran terhadap pengembangan IPTEK</label> </p>
																			 	<input type="number" name="kontribusi" class="form-control">
																			 	<p> <label> Potensi publikasi artikel ilmiah</label></p>
																			 	<input type="number" name="publikasi" class="form-control">
																			 </div>
																			 <div class="form-group">
																			 	<label> Penjadwalan kegiatan dan personalia </label>
																			 	<input type="number" name="penjadwalan" class="form-control">
																			 </div>
																			 <div class="form-group">
																			 	<label> Penyusunan anggaran biaya</label>
																			 	<input type="number" name="anggaran" class="form-control">
																			 </div>
																			<div>
																				<label> Komentar PKM</label>
																				<textarea type="text" name="komentar" class="form-control"> </textarea> 
																			</div>
																			 <button type="submit" class="btn btn-default">Submit</button> 
																			</form> 
																	</div>

															</div>
													</div>
												</div>
												<!--//custom-widgets-->
												
												
												
									<!--//bottom-grids-->
									
									</div>
									<!--/charts-inner-->
									</div>
										<!--//outer-wp-->
									</div>
									 <!--footer section start-->
										<footer>
										   <p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts.</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>e-PKM</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href="index.html"><span class=" name-caret">Jasmin Leo</span></a>
									 <p>System Administrator in Company</p>
									<ul>
									<li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
										<li><a class="tooltips" href="index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
							</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.html"><i class="fa fa-tachometer"></i> <span> Daftar PKM yang terdaftar </span></a></li>
										<li><a href="typography.html"><i class="lnr lnr-pencil"></i> <span> Daftar PKM yg ditangani </span></a></li>
										<li><a href="<?php echo base_url().'index.php/page/logout'?>"><i class="lnr lnr-pencil"></i> <span> Logout </span></a></li>									
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>