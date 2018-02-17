<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}

	// select logged-in users detail
	$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user'];
	$res = mysqli_query($conn, $query);
	$userRow = mysqli_fetch_assoc($res);
	$userID = $userRow['user_id'];


?>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<style type="text/css">

  .hero-image {
  background-image: url("img/cars3.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;

}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: black;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  
  text-align: center;
  cursor: pointer;
}

.text-muted{

	color: black;
}
.try{
	background: linear-gradient(rgba(0, 0, 225, 0.7),rgba(0, 0, 255, 0.7)),url(cars3.jpg);
background-size: cover;
height: 400px;

}

.display-3{

	background-color: #ddd;
	top: 0;
	text-align: center;
	font-size: 20px;
	padding: 5px;

	margin-bottom: 5px;
}

#blue{

	color: blue;
}

#red{

	color: red;
}

#green{

	color: green;
}

</style>

	<?php include('navbar.php'); ?>

<div class="hello">
	  <h3 class="display-3">Hello, <?php echo ucwords($userRow['first_name']); ?>!</h3>
</div>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/bluesg-rental-rates.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/5-Automobile-Showrooms-that-has-Reeled-In-Customers-with-Augmented-Reality1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/756d7f4d3b9b2aa848c3164844dea479 (1).jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="card text-center">
 
  <div class="card-body">
    <div> <h2> How it works</h2> </div> 
    <p class="card-text">Thanks to car2rent, carsharing has never been easier. Register, validate and drive <br> – with car2rent you always have a car when you need one..</p>
   
  </div>
  <div class="card-footer">
<div class="card-group">
  <div class="card">
  
    <div class="card-body">

<i class="fas fa-user-plus fa-3x"></i>
      <h5 class="card-title">Join</h5>
      <p class="card-text">Sign up now to drive and enjoy flexibly <br> and unlimited options car2rent offers.</p>

    </div>
  </div>
  <div class="card">
  
    <div class="card-body">

    	<i class="far fa-clock fa-3x"></i>
      <h5 class="card-title">Search & Reserve</h5>
      <p class="card-text">With the car2rent app you see immediately which cars are available nearby.<br> Choose one and reserve it up to 30 minutes before departure.</p>

    </div>
  </div>
  <div class="card">
   
    <div class="card-body">

    	<i class="fas fa-car fa-3x"></i>

      <h5 class="card-title">Card title</h5>
      <p>This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>

    </div>
  </div>
</div>

 <a class="btn btn-primary" href="cars_locations.php">RENT NOW </a>
  </div>

</div>


<div class="card bg-dark text-white">

	<div class="try"></div>

  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
  </div>
</div>



<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
  <div class="card-footer text-muted">
  <div class="card-group">
  <div class="card">
  
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
  </div>
</div>



<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Our cars</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
  <div class="card-footer text-muted">
  <div class="card-group">
  <div class="card">
  
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
 <a href="cars.php" class="btn btn-primary">see more</a>
  </div>
</div>


<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">Our cars and offices location </h5>
    <p class="card-text"> <span id="blue"><i class="fas fa-car"></i> if the cars is blus so it will be available </span> <span id="red"><i class="fas fa-car"></i> if the cars is red so it will be not available </span> </p>

    <p id="green"> this  <i class="fas fa-home"></i> on the map its our offices  </p>
  </div>
  
<iframe src="https://www.google.com/maps/d/embed?mid=14qppN6ICsN3glqQpENn6onTBfAGMMVB5&hl=en" width="100%" height="680"></iframe>

 <a href="cars_locations.php" class="btn btn-primary">see more</a>
  </div>
</div>
		

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>