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
		DELETE FROM cars_status
		WHERE CURRENT_TIMESTAMP > `status` + INTERVAL 30 DAY
	";

	$resAutoReturn = mysqli_query($conn, $queryAutoReturn);

	
	$getAllMedia = "SELECT image1, name, model, type, details, address, phone, status
					FROM cars
					INNER JOIN offices ON cars.fk_offices_id = offices.offices_id
					INNER JOIN cars_status ON cars.car_id = cars_status.fk_car_id";

	$allMediaResult = mysqli_query($conn, $getAllMedia);

	//show number of borrowed items
//	$queryBorrowed = "
	//	SELECT * 
	//	FROM cars WHERE car_id = 2;


//	";

	//$resBorrowed = mysqli_query($conn, $queryBorrowed);
//	$borrowedRows = mysqli_num_rows($resBorrowed);

	//on click check if item is available
	if (isset($_GET['car_id'])) {
		$insertISBN = $_GET['car_id'];

	
		$reseRes = mysqli_query($conn,$getReservations);
		$countRes = mysqli_num_rows($reseRes);
		
		if ($countRes!=0) {
			$errMSG = "I'm sorry! This item has already been borrowed";

		// borrow item
		} else {
			$queryBorrow = "
				INSERT INTO cars_status (fk_car_id, fk_user_id)
				VALUES
				($insertISBN, $userID);
			";

			$res = mysqli_query($conn, $queryBorrow);
			header("Location: cars_locations.php");
			// $borrowedRows = $borrowedRows+1;

			//create a borrowed items history (stays even when returned)
			$queryHistory = "
				INSERT INTO history (fk_ISBN, fk_user_id)
				VALUES
				($insertISBN, $userID);
			";

			$resHis = mysqli_query($conn, $queryHistory);
			$borrowedRows = $borrowedRows+1;

			if ($res && $resHis) {
				$errMSG = "Successfully borrowed. Check your Account";
			} else {
				$errMSG = "Something went wrong, try again later...";
			}
		}
	}



	$queryaddress = "
			
			";
			$res = mysqli_query($conn, $query);
		$userRow = mysqli_fetch_assoc($res);
		$userID = $userRow['user_id'];



?>


<style type="text/css">
	

	table{

		text-align: center;
	}

	.td {
    padding: 2.3rem;
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

.card-body{

	text-align: center;
}
</style>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

	<div class="jumbotron">
	  <h1 class="display-3">Hello, <?php echo ucwords($userRow['first_name']); ?>!</h1>
	  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  <p>You have borrowed: 

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


	  <p class="lead">
	    <a class="btn btn-primary btn-lg" href="aboutus.php" role="button">Learn more</a>
	  </p>
	</div>


	<div class="container-fluid row mx-auto">
		
		<div class="px-5 p-3 m-auto" style="overflow-x:auto;">
			<h3 class="py-2 ">Our Selection</h3>
			<table class="table table-hover table-striped">
				<thead>
    				<th>Image</th> 
    				<th>Name</th>
    				<th>Model</th>
    				<th>Type</th>
    				<th>Details</th>
    				<th>Status</th>
    				<th>Address</th>
    				<th>Phone</th>
    				<th></th>
    				<!-- <th class="02">Publish Date</th> -->
    				<!-- <th class="01">Description</th> -->
  				</thead>

			<?php 
				while($mediaRow = mysqli_fetch_assoc($allMediaResult)) {
			?>
				<tr>
					 <td><img src="<?php echo $mediaRow ['image1']; ?>" alt="media image" style="max-height:45px; max-width:45px;"></td> 
					<td><?php echo $mediaRow ['name']; ?></td>
					<td><?php echo $mediaRow ['model']; ?></td>
					<td><?php echo $mediaRow ['type']; ?></td>
					<td><?php echo $mediaRow ['details']; ?></td>
					<td><?php echo $mediaRow ['status']; ?></td>
					<td><?php echo $mediaRow ['address']; ?></td>
					<td><?php echo $mediaRow ['phone']; ?></td>
					<td>
						<?php  
							if (empty($mediaRow['reservation_id'])) {
						?>
						<a class="to_rent" id="visibility" href="cars_locations.php?name=<?php echo $mediaRow['name']; ?>" name="rent-item">Rent</a>
						<?php 
							} else {
						?>
								<a class="text-muted not-active" >Unavailable</a>
						<?php		
							}
						?>
					</td>

				</tr>
			<?php
				}
			?>

			</table>

		</div>


  
  <div class="card-body">
    <h5 class="card-title">Our cars and offices location </h5>
    <p class="card-text"> <span id="blue"><i class="fas fa-car"></i> if the cars is blus so it will be available </span> <span id="red"><i class="fas fa-car"></i> if the cars is red so it will be not available </span> </p>

    <p id="green"> this  <i class="fas fa-home"></i> on the map its our offices  </p>
  </div>
  
<iframe src="https://www.google.com/maps/d/embed?mid=14qppN6ICsN3glqQpENn6onTBfAGMMVB5&hl=en" width="100%" height="680"></iframe>

  </div>
</div>


<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>