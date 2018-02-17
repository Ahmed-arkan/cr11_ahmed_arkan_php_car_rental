
<?php
$vorname = $_GET['id'];
$image1 = $_GET['image1'];
$image2 = $_GET['image2'];
$image3 = $_GET['image3'];
$name = $_GET['name'];
$model = $_GET['model'];
$details = $_GET['details'];
$type = $_GET['type'];
?>



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


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
    font-family: Arial;
    padding: 20px;
    background: #f1f1f1;
}

/* Header/Blog Title */
.header {
    padding: 30px;
    font-size: 40px;
    text-align: center;
    background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
     background-color: white;
     padding: 20px;
     margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}
</style>
</head>
<body>

<?php include('navbar.php'); ?>


<div class="header">
  <h1><?php echo "$name"; ?></h1>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2><?php echo "$name"; ?></h2>
      <h5><?php echo "$model"; ?></h5>
      <div class="fakeimg">
        <img src="<?php echo "$image1"; ?>">
      </div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    <div class="card">
      <h2>BACK VIEW</h2>
     
      <div class="fakeimg" ><img src="<?php echo "$image2"; ?>"></div>
      <p>Some text..</p>
       </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">  <p><?php echo "$details"; ?></p></div>
  
    </div>
    
  </div>
</div>



</body>
</html>




 <!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>
 