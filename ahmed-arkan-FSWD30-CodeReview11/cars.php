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

	$filter = "all";

	$queryAutoReturn = "
		DELETE FROM reservation 
		WHERE CURRENT_TIMESTAMP > `pickup_date` + INTERVAL 30 DAY
	";

	$resAutoReturn = mysqli_query($conn, $queryAutoReturn);

	?>

<!-- HTML================================= -->

<!-- html/head/<body> -->

	<style type="text/css">
		
		body{

			background-color: white;
		}

	.split {
    height: 400px;
    width: 50%;
   
    top: 0;
   
    background-color: white;
}

.left {

overflow-x: ;

margin-bottom: 30px


}

.right {
    right: 0;
background-color: #f3f3f3;
padding-top:10px;
padding-bottom:10px;

line-height: 2;
margin-bottom: 30px
}

.centered {

    top: 50%;
    left: 50%;

    text-align: center;
}

.centered img {
    width: 150px;
    border-radius: 50%;
}

.text-center{

	margin: 0 auto;
}

.btn-group-lg{

	padding: 30px;
}

.text-center{

margin-bottom: 30px ;
}

.slide{

	margin-top: 50px;
}
#carouselExampleSlidesOnly img{


max-height: 550px;
}


	</style>

<?php include('navbar.php'); ?>

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/buildings-1851246_960_720.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/steering-wheel-801994_960_720.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/road-3113455_960_720.jpg" alt="Third slide">
    </div>
  </div>


		  <?php
		  	echo $borrowedRows; 
		  ?>
	  	
	  </p>
	  <hr class="my-4">


	  <?php
	    if ( isset($errMSG) ) {
	  ?>

	    <div class="alert">
	     <?php echo $errMSG; ?>
	    </div>

	  <?php
	  }
	  ?>

	</div>


<div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">The convenience of a car without owning one</h5>
    <p class="card-text">
With car2rent you always have the perfect car at your disposal – whatever you’re up to.

</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>

</div>


<?php


$sql1 = "SELECT * FROM cars WHERE car_id = 1 || car_id = 2 || car_id = 3 ";

$result1 = $conn->query($sql1);



if ($result1->num_rows > 0) {
  echo '
  <main role="main" class="main">
    <div class="album py-5 ">
        <div class="container">
    <div class="row">
          ';

    while($row1 = $result1->fetch_assoc()) {
      echo '
   


   <div class="card text-center">
  
  <div class="card-body">
    <h5 class="card-title">The convenience of a car without owning one</h5>
    <p class="card-text">
With car2rent you always have the perfect car at your disposal – whatever you’re up to.

</p>

  </div>

</div>




   <div class="split left">

  <center class="container">
<img src='.$row1["image1"].' height="103%" >
</center>
</div>

<div class="split right">
  <div class="centered">

  <h2>'.$row1["name"] .' / '.$row1["model"].' </h2>

  <div class="btn-group btn-group-lg" role="group" aria-label="...">

<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-secondary">Left</button>
  <button type="button" class="btn btn-secondary">Middle</button>
  <button type="button" class="btn btn-secondary">Right</button>
</div>
  </div>
  <br>
    <a href="singlepage.php?id='.$row1["car_id"].'&details='.$row1["details"].'&name='.$row1["name"].'&model='.$row1["model"].'&image1='.$row1["image1"].'&image2='.$row1["image2"].'&image3='.$row1["image3"].'&type='.$row1["type"].'    " ><button type="button" class="btn btn-outline-primary">More</button></a>

    <p> (ditals)You want a dynamic ride and signature design? With the Mercedes-Benz A-Class you and your friends travel sporty and in proper style. Get in for a nippy ride on your way through the city.</p>
  
  </div>
  <center class="container">
  <h5> </5>
   <a href="cars_locations.php"> <button type="button" class="btn btn-info">See if it is now Available</button></a>
    </center>
</div>



   
            ';
    }
       echo "
           </div>
          </div>
        </div>
      </main>";
 } else {
    echo "0 results";
}



?>

		




		

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>