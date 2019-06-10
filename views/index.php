<?php
	include 'views/partials/header.php';
	include 'views/partials/menu.php';
?>
	<body>
	  <a id="skip-to-main" class="hidden" href="#main" tabindex="0">Skip to main content</a>
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
							  <p>"I loved my meal!
							  So fresh and tasty!"</p>
						   </div>
						</div>
					 </div>
					 <div class="testimonial flex-container">
						<div class="testimonial-text">
						   <img src="images/1.jpg" alt="A person jogging on a treadmill">
						   <div class="featureImgText">
							  <p>"Perfect for a busy
							  night when you want
						  	  something quick."</p>
						   </div>
						</div>
					 </div>
					 <div class="testimonial flex-container">
						<div class="testimonial-text">
						   <img src="images/2.jpg" alt="A person jogging on a treadmill">
						   <div class="featureImgText">
							  <p>"Really cool way to
							  meet people in the area!"</p>
						   </div>
						</div>
					 </div>
			   	  </div>
				</div>
		</main>
		 <?php  include 'views/partials/footer.php';
