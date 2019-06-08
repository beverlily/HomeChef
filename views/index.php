<!DOCTYPE html>
<!--<?= $_SESSION['USERID'] ?>-->
<html>
	<head>
		<title>Home Chef</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
	    <a id="skip-to-main" class="hidden" href="#main" tabindex="0">Skip to main content</a>
	   	<header id="header">
	   	   <div class="page-wrapper">
			  <div id="header-content" class="flex-container">
				  <div id="site-logo">
					   <a href=""><img src="images/logo.png" alt="Home Chef Logo" /></a>
				  </div>
		   		  <nav id="header-nav">
		   			 <h2 class="hidden">Main Navigation</h2>
		   			 <ul>
		   				<li><a href="register_user" class="button">Sign Up</a></li>
		   			  <li><a href="sign_in" class="button">Log In</a></li>
		   			 </ul>
		   		  </nav>
			  </div>
	   	   </div>
	   	</header>
		<div id="home-banner">
			<div class="page-wrapper">
				<div id="home-banner-text" class="banner-text">
					Who's cooking your
					dinner tonight?
					<a href="#" class="button"><span>Sign Up</span></a>
				</div>
			</div>
		</div>
	   	<main id="main">
			<div id="about">
				<h2 class="red-heading">How it works...</h2>
				<div id="about-content">
					<div id="steps" class= "page-wrapper flex-container">
						<div class="step">
							<img src="images/step1.png" />
							<p>
								1. Check out the
								local home chefs
								in your area.
							</p>
						</div>
						<div class="step">
							<img src="images/step2.png" />
							<p>
								2. Order a fresh and
								tasty home cooked meal.
							</p>
						</div>
						<div class="step">
							<img src="images/step3.png" />
							<p>
								3. Have a meal delievered
								right to your door
								and enjoy!
							</p>
						</div>
					</div>
					<div class="button-container flex-container">
						<a href="" class="button">Find out more...</a>
					</div>
				</div>
			</div>
			<div id="testimonials">
				<div class="page-wrapper">
					<h2 class="red-heading">What people are saying...</h2>
				  <div id="testimonials-content" class="flex-container">
					 <div class="testimonial flex-container">
						<div class="testimonial-text">
						   <img src="images/3.jpg" alt="A person jogging on a treadmill">
						   <div class="featureImgText">
							  <p>I loved my meal!
							  So fresh and tasty!</p>
						   </div>
						</div>
					 </div>
					 <div class="testimonial flex-container">
						<div class="testimonial-text">
						   <img src="images/1.jpg" alt="A person jogging on a treadmill">
						   <div class="featureImgText">
							  <p>Perfect for a busy
							  night when you want
						  	  something quick.</p>
						   </div>
						</div>
					 </div>
					 <div class="testimonial flex-container">
						<div class="testimonial-text">
						   <img src="images/2.jpg" alt="A person jogging on a treadmill">
						   <div class="featureImgText">
							  <p>Really cool way to
							  meet people in the area!</p>
						   </div>
						</div>
					 </div>
			   	  </div>
				</div>
		</main>
	   	<footer id="footer" class="flex-container" tabindex="0">
			<div class="page-wrapper">
				<h2 class="hidden">Main Footer</h2>
				<ul>
				 <li>
					 <a href="#">About Us</a>
					 <a href="#">FAQ</a>
					 <a href="#">Contact Us</a>
					 <a href="#">Privacy Policy</a>
					 <a href="#">Become a Chef!</a>
				 </li>
				</ul>
				<p id="copyright">
					Home Chef &copy; 2019
				</p>
			</div>
	   	</footer>
	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	   	<script src="script.js"></script>
    </body>
</html>
