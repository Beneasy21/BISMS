<?php include(SHARED_PATH . '/imports.php');?>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.yourdomainname.com</p>
						<p class="num">Call: +234(0) 703 891 4244</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<!--<li><a href="#"><i class="icon-github"></i></a></li>-->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-5 text-primary">
						<div id="fh5co-logo">
							<a href="index.html">
								<img style="width: 80px" src='<?php echo urlFor("/images/logo.png");?>' />
								<span>COMMAND SECONDARY SCHOOL</span></a>
						</div>
					</div>
					<div class="col-xs-7 text-right menu-1">
						<ul>
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li class="has-dropdown">
								<a href="">Our Schools</a>
								<ul class="dropdown">
									<li><a href="#">Suleja</a></li>
									<li><a href="#">Lokoja</a></li>
								</ul>
							</li>
							<li class="active"><a href="">Our Story</a></li>
							<li><a href="<?php echo urlFor('teacher.php');?>">Our Teacher</a></li>
							<li><a href="courses.html">Gallery</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="btn-cta"><a href="<?php echo urlFor('/students/login.php');?>"><span>Student Login</span></a></li>
							<li class="btn-cta"><a href="#"><span>Staff Login</span></a></li>
							
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>