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

	


		$getAllMedia = "
		SELECT * FROM offices ;
	";

	$allMediaResult = mysqli_query($conn, $getAllMedia);
?>

<style type="text/css">
	


	.card {



		margin-top: 70px;
	}
	

</style>



<?php include('navbar.php'); ?>


		<div class="px-5 p-3 m-auto" style="overflow-x:auto;">
			<h3 class="py-2 ">Our Selection</h3>
			<table class="table">
				<thead>
    				<td>#</td> 
    				<td>Address</td>
    				<td>phone_number</td>	
  				</thead>

			<?php 
				while($mediaRow = mysqli_fetch_assoc($allMediaResult)) {
			?>
				<tbody>	
					<td><?php echo $mediaRow ['offices_id']; ?></td>
					<td><?php echo $mediaRow ['address']; ?></td>
					<td><?php echo $mediaRow ['phone']; ?></td>
				</tbody>
			<?php
				}
			?>

			</table>

		</div>