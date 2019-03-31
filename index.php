<?php
include('db.php');

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //header("location: localhost:8080/hotel/index.php");
    //exit;
}

  if(isset($_POST['submit']))
{

      $username= $_POST['uname'];
      $password = $_POST['psw'];
      
      $stmt = $conn->prepare("SELECT username FROM user Where username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
                             $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                           // header("location: localhost:8080/hotel/index.php");
                   
                          
}
 
}



if(isset($_POST['signup']))
{
	

      $username= $_POST['uname'];
			$password = $_POST['psw'];
			$cpassword = $_POST['cpsw'];
			if($password==$cpassword)
			{

				$sql ="INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')" ;
				if(mysqli_query($conn,$sql))
					{
			 			echo '<script>alert("User Registerd Successfully") </script>' ;
					}else {
						echo '<script>alert("Sorry ! Check The System") </script>' ;
					}

			}else {
				echo '<script>alert("Password Mismatch") </script>' ;
			}
      
      
			
                          

 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>HORTAIN RISE HOTEL</title>

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Times New Roman"rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="homestyle.css" rel="stylesheet"> 



</head>
<body>
<!-- header -->

<div class="banner-top">
			<div class="social-bnr-agileits">
                            <img src="images/hortain2.png" style="width:67%">
				
			</div>
			<div class="contact-bnr-w3-agile">
				<ul>
                                    
                                    
                                    <?php 
                                    
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                          
                                        ?>  <button onclick="document.location.href='logout.php'" style="width:auto;">Log Out</button> <?php
                                        
                                    }
                                    else
                                    {
                                        ?>  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
																				<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SignUp</button>
																				
																				
																				 <?php
                                    }
                                    
                                    ?>
                                                                         

<div id="id01" class="modal">
    
    
    
  
    <form class="modal-content animate" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/user2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="submit">Login</button>
			<button onclick="document.getElementById('id02').style.display='block'" >SignUp</button>

      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal">
    
    
    
  
    <form class="modal-content animate" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/user2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
			<label for="psw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Comfirm Password" name="cpsw" required>
        
      <button type="submit" name="signup">Signup</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal = document.getElementById('id02');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">INFO@HORTAINRISE.COM</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+94 (52)222-44-55</li>
                                        
					<li class="s-bar">
						<div class="search">
							<input class="search_box" type="checkbox" id="search_box">
							<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
							<div class="search_form">
								<form action="#" method="post">
									<input type="search" name="Search" placeholder=" " required=" " />
									<input type="submit" value="Search">
								</form>
							</div>
						</div>
					</li>
                                        <div class="social-bnr-agileits footer-icons-agileinfo">
							<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
						</div>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php">HORTAIN <span>RISE</span><p class="logo_w3l_agile_caption">Luxury Hotels & Resorts</p></a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
                                                    <li class="menu__item menu__item--current"><a href="index.php" class="menu__link"><i class="fa fa-fw fa-home"></i></a></li>							
                                                        <li class="dropdown">
                                                        <li class="menu__item"><a href="#about" class="menu__link scroll">About</a></li>                                           
							<li class="menu__item"><a href="#team" class="menu__link scroll">Team</a></li>
							<li class="menu__item"><a href="#gallery" class="menu__link scroll">Gallery</a></li>
							
                                                        <li class="dropdown">
                                                        <a href="javascript:void(0)" class="menu__link scroll">Reservations</a>
                                                        <div class="dropdown-content">
                                                        <a href="#rooms" class="menu__link scroll">Rooms and Meals Planning</a>
                                                        <a href="#banquets" class="menu__link scroll">Banquet Halls</a>
                                                        <a href="#swimming" class="menu__link scroll">Swimming Pool</a>
                                                        <a href="#cafe" class="menu__link scroll">Cafetaria</a>
							<li class="menu__item"><a href="#contact" class="menu__link scroll">Contact Us</a></li>
                                                       
						</ul>
					</nav>
				</div>
                                
			</nav>

		</div>
	</div>
<!-- //header -->
		<!-- banner -->
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/c.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/j.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/k.jpg" style="width:100%">
  <div class="text"></div>
</div>
    

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>HORTAIN  <span>RISE</span></h4>
                                                                                <img src="images/b.jpg" alt=" " class="img-responsive">
										<h5>We know what you love</h5>
										<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
									</div>
								</div>
							</div>
						</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-12 book-form-left-w3layouts">
    
    <?php 
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        ?> <a href="admin/reservation.php"><h2>ROOM RESERVATION</h2></a><?php
    }
 else {
       ?>  <button onclick="document.getElementById('id01').style.display='block'" style="width:100%;padding-top: 50px;padding-bottom: 50px;font-size: 35px;background-color:#f0ad4e">Room Reservation</button> <?php
 }
    ?>
	
</div>

			<div class="clearfix"> </div>
</div>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">	
			<div class="agileits_banner_bottom">
				<h3><span>Experience a good stay, enjoy fantastic offers</span> Find our friendly welcoming reception</h3>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_road"></span>
							<h4 class="cbp-ig-title">MASTER BEDROOMS</h4>
							<span class="cbp-ig-category">HORTAIN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_cube"></span>
							<h4 class="cbp-ig-title">MOUNTAIN VIEW BALCONY</h4>
							<span class="cbp-ig-category">HORTAIN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_users"></span>
							<h4 class="cbp-ig-title">LARGE CAFE</h4>
							<span class="cbp-ig-category">HORTAIN RISE</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_ticket"></span>
							<h4 class="cbp-ig-title">WIFI COVERAGE</h4>
							<span class="cbp-ig-category">HORTAIN RISE</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- /about -->
 	<div class="about-wthree" id="about">
		  <div class="container">
				   <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">About Our HORTAIN RISE</h3> 
						   <p class="about-para-w3ls">Hortain Rise is a luxury hotel which is located around amazing mountains and valleys</p>                                                   
                                                   <img src="images/d.jpg" class="img-responsive" alt="Hair Salon">
										<div class="w3l-slider-img">
                                                                                    <img src="images/wsd.jpg" class="img-responsive" alt="Hair Salon">
										</div>
                                                                            </div>
		   	<div class="clearfix"> </div>
    </div>
</div>
 	<!-- //about -->
<!--sevices-->
<div class="advantages">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title-w3-agileits">Our Services</h3>
		   <div class="advantage-bottom">
			 <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block ">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
			 		<h4>Stay First, Pay After! </h4>
			 		<p>Our priority is your satisfaction</p>
                                        <p><i class="fa fa-check" aria-hidden="true"></i>Easy online payments</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Decorated room, proper air conditioned</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>Private balcony</p>
			 		
			 	</div>
			 </div>
			 <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					<i class="fa fa-clock-o" aria-hidden="true"></i>
			 		<h4>24 Hour Restaurant</h4>
			 		<p>Any person who reserved a room or not are eligible for use this 24 hour restaurant</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>24 hours room service</p>
					<p><i class="fa fa-check" aria-hidden="true"></i>24-hour Concierge service</p>
			 	</div>
			 </div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--//sevices-->
<!-- team -->
<div class="plans-section" id="team">
<div class="container">
<h3 class="title-w3-agileits title-black-wthree">Our Team</h3>
<div class="row">
  <div class="column">
    <div class="card">
        <img src="images/tl1.jpg" alt="Jane" style="width:100%">
      <div class="container">
          <h2>Pradeep Dayananda</h2><b>
              <p class="title">CEO & Founder</p></b>
        <p>Specialist in the hospitality industry</p>
        <p>with experience of over 10 years.</p>
        <ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
        <p><button class="button" style="width:20%">Contact</button></p>
      </div>
    </div>
  </div>

<div class="column">
    <div class="card">
        <img src="images/cm.1.jpg" alt="John" style="width:100%">
      <div class="container">
          <h2>Dileepa Dhananjaya</h2><b>
              <p class="title">Manager</p></b></font>
              <p>Expert in Management with 10 years</p>
        <p>of Strategic Planning.</p>
<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
        <p><button class="button" style="width:20%">Contact</button></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
        <img src="images/tl3.jpg" alt="Mike" style="width:100%">
      <div class="container">
          <h2>Chadeepa Dhanajaya</h2><b>
              <p class="title">Receptionist</p></b>
        <p>Specialized in PR</P>
        <p>in with 5 years working experience.</p>        
<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
        <p><button class="button" style="width:20%">Contact</button></p>
      </div>
    </div>
  </div>
 <div class="column">
    <div class="card">
        <img src="images/cm.2.jpg" alt="John" style="width:100%">
      <div class="container">
          <h2>Dileepa Dhananjaya </h2><b>
              <p class="title">Manager</p></b>
        <p>Expert in Management with 10 years</p>
        <p>of Strategic Planning.</p>
<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
							</ul>
        <p><button class="button" style="width:20%">Contact</button></p>
      </div>
    </div>
  </div> 
</div>
</div>
</div>
<!-- //team -->
<!-- Gallery -->
<!-- Header -->

<!-- Photo Grid -->
<div class="plans-section" id="gallery">
<div class="container">
<h3 class="title-w3-agileits title-black-wthree">Gallery</h3>
<div class="row"> 
  <div class="column">
      <img src="images/j.jpg" style="width:100%">
      <img src="images/k.jpg" style="width:100%">
      <img src="images/sw1.jpg" style="width:100%">
      <img src="images/l.jpg" style="width:100%">
 </div>
  <div class="column">
      <img src="images/d.jpg" style="width:100%">
      <img src="images/g6.jpg" style="width:100%">
      <img src="images/g2.jpg" style="width:100%">
  </div>  
  <div class="column">
      <img src="images/e.jpg" style="width:100%">
      <img src="images/b.jpg" style="width:100%">
      <img src="images/g4.jpg" style="width:100%">
  </div>
  <div class="column">
      <img src="images/a.jpg" style="width:100%">
      <img src="images/g8.jpg" style="width:100%">
      <img src="images/g10.jpg" style="width:100%">
  </div>
</div>
<!-- //gallery -->
	 <!-- rooms & rates -->
      <div class="plans-section" id="rooms">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Rooms And Rates</h3>
						<div class="priceing-table-main">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r1.jpg" alt=" " class="img-responsive" />
							<h4>Deluxe Room</h4>
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									
								     </ul>
							</div>
							<div class="price-selet">	
								<h3><span>$</span>320</h3>                                                                                                                
                                                                <?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/reservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid ">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r2.jpg" alt=" " class="img-responsive" />
							<h4>Luxury Room</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
									<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>220</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/reservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid lost">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/r3.jpg" alt=" " class="img-responsive" />
							<h4>Guest House</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>180</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/reservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
							<img src="images/r4.jpg" alt=" " class="img-responsive" />
							<h4>Single Room</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span> 150</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/reservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// rooms & rates -->
         
         <!-- banquet halls -->
      <div class="plans-section" id="banquets">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Banquet Halls</h3>
						<div class="priceing-table-main">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
                                                    <img src="images/bq1.jpg" alt=" " class="img-responsive" />
							<h4>Magenta</h4>
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>									
								     </ul>
							</div>
							<div class="price-selet">	
								<h3><span>$</span>320</h3>                                                                                                                
                                                                <?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                                                                <a href="admin/banquetReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid ">
					<div class="price-block agile">
						<div class="price-gd-top">
                                                    <img src="images/bq2.jpg" alt=" " class="img-responsive" />
							<h4>Merigold</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
									<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>220</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                                                                <a href="admin/banquetReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid lost">
					<div class="price-block agile">
						<div class="price-gd-top">
                                                    <img src="images/bq3.jpg" alt=" " class="img-responsive" />
							<h4>Citadel</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span>180</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                                                                <a href="admin/banquetReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
                                                    <img src="images/bq4.jpg" alt=" " class="img-responsive" />
							<h4>Victorian Lobby</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<h3><span>$</span> 150</h3>
								<?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
                                                                <a href="admin/banquetReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;display: inline-block;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// banquet halls -->
         
         <!-- swimming pool -->
         <div class="plans-section" id="swimming">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Swimming Pool</h3>
						<div class="priceing-table-main" style="width:400% ">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
                                                    <img src="images/sw2.jpg" alt=" " class="img-responsive" />							
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									
								     </ul>
							</div>
							<div class="price-selet">	
								<h3><span>$</span>320</h3>                                                                                                                
                                                                <?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/poolReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>				
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// swimming pool -->
         
         <!-- cafetaria -->
         <div class="plans-section" id="cafe">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Cafetaria</h3>
						<div class="priceing-table-main" style="width:400% ">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
                                                    <img src="images/5.jpg" alt=" " class="img-responsive" />							
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									
								     </ul>
							</div>
							<div class="price-selet">	
								<h3><span>$</span>320</h3>                                                                                                                
                                                                <?php     
                                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
								<a href="admin/cafeReservation.php" >Book Now</a><?php
                                                                }
                                                                else {
                                                                ?>  <button onclick="document.getElementById('id01').style.display='block'" style="font-size: 0.9em; color: #000000;padding: 0.5em 2em;background: #ffce14;text-decoration: none;border: 2px solid #ecbf11;">Book Now</button> <?php
                                                                }?>
							</div>
						</div>
					</div>
				</div>				
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	 <!--// cafetaria -->
         
         
  <!-- visitors -->
	<div class="w3l-visitors-agile" >
		<div class="container">
                 <h3 class="title-w3-agileits title-black-wthree">What other visitors experienced</h3> 
		</div>
		<div class="w3layouts_work_grids">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
                                                                    <img src="images/cm 1.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>This is the best hotel I have stayed in Colombo.
                                                                    Very good service and very convenient here. 
                                                                    There are great food, branded store, Currency Exchange, amazing bar, swimming pool, outdoor program in the evening, cozy cafe, nice buffet as well. 
                                                                    You can find almost everything you need here. Also it's a good place for holding event & business activities. 
                                                                    Room rate is at  a middle range but reasonable considering their service. </p>
								<h5>Shane Fernandz</h5>
								<p>Germany</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
                                                                    <img src="images/cm 2.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Even thought the hotel and the service is just amazing, the rooms are not up to the standard. Amenities provided are also A grade. Over all it's an amazing experience if the room doesn't matter to you at all. </p>
								<h5>Lusion de Silva</h5>
								<p>Austrailia</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
                                                                    <img src="images/cm 4.png" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>I  have been staying here for the past 3 weeks and have 3 more weeks to go. I think that I have been here long enough to give a review. I  really like this hotel. 
                                                                    The service is great, the hotel is clean and the staff are friendly. What more can you ask for. I feel like I am being taken care of. </p>
								<h5>Nimal Perera</h5>
								<p>Sri Lanka</p>
							</div>
							<div class="clearfix"> </div>
						</li>
						<li>
							<div class="w3layouts_work_grid_left">
								<img src="images/5.jpg" alt=" " class="img-responsive" />
								<div class="w3layouts_work_grid_left_pos">
                                                                    <img src="images/cm 5.jpg" alt=" " class="img-responsive" />
								</div>
							</div>
							<div class="w3layouts_work_grid_right">
								<h4>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								Worth to come again
								</h4>
								<p>Truly grand as the name. Good service for all visitors. We went for the dinner in noodles. Very delicious foods. Lots of soft and other drink options. Variety of dinner options of your choice. Not too expensive and they are in affordable prices. Desert options are also different and tasty. There is a open kitchen. It is a romantic place and it is also good for groups. Tables are in different sizes that suitable for groups and couples. It is easy to find places, because there is good guidence by the staff. Good parking space and the staff in the parking is very helpful. </p>
								<h5>Imesha Muthukuda</h5>
								<p>Srilanka</p>
							</div>
							<div class="clearfix"> </div>
						</li>
					</ul>
				</div>
			</section>
		</div>	
	</div>
  <!-- visitors -->
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contact Us</h4>
				<p class="contact-agile2">Sign Up For Our News Letters</p>
				<form  method="post" name="sentMessage" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required >
							<p class="help-block"></p>
						
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required >
							<p class="help-block"></p>
						
                    </div>
                    
                    
                    <input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$name =$_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$approval = "Not Allowed";
					$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
					
					
					if(mysqli_query($con,$sql))
					echo"OK";
					
				}
				?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+94 (65)222-44-55</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">INFO@HORTAINRISE.COM</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Horton Plain Road, Nuwaraeliya, Sri Lanka</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1542689653034!6m8!1m7!1sTzw4RQUDZ8Nx-pbPpnp78g!2m2!1d6.959969508560864!2d80.76929690797049!3f276.29987!4f0!5f0.7820865974627469" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
			<div class="copy">
		        <p>© 2018 HORTAINRISE . All Rights Reserved | Design by <a href="index.php">HORTAINRISE</a> </p>
		    </div>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
<!-- Calendar -->
		<script src="js/jquery-ui.js"></script>
		<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
				});
		</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<div class="modal fade" id="Addmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Register User</h4>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Add new employee no</label>
                                                        <input name="newno"  class="form-control" placeholder="Enter Employee No">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add new employee name</label>
                                                        <input name="newname"  class="form-control" placeholder="Enter Employee Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add contact no</label>
                                                        <input name="newcon" type="tel" class="form-control" placeholder="Enter Employee Contact">
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <input name="newdes"  class="form-control" placeholder="Enter Employee Designation">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date Joined</label>
                                                        <input name="newdate" type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Enter date joined">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    <input type="submit" name="in" value="Add" class="btn btn-primary">
                                                        </form>

                                                </div>
                                        </div>
                                    </div>
                                </div>
																</div>
</body>
</html>


