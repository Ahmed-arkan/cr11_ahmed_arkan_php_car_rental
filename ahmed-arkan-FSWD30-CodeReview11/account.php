<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
  }


  // select logged-in users detail
  $query = "SELECT * FROM users WHERE user_id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userEmail = $userRow['user_email'];
  $userPass = $userRow['user_pass'];

  if ( isset($_POST['btn-update']) ) {
    // sanitize user input to prevent sql injection

    $name = trim($_POST['first_name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $last_name = trim($_POST['last_name']);
    $last_name = strip_tags($last_name);
    $last_name = htmlspecialchars($last_name);

    // first name validation
    if (empty($name)) {
      $error = true;
      $nameError = "Please enter your full first name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have at leat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }

    //last name validation
    if (empty($last_name)) {
      $error = true;
      $last_nameError = "Please enter your full last name.";
    } else if (strlen($last_name) < 3) {
      $error = true;
      $last_nameError = "Name must have at leat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
      $error = true;
      $last_nameError = "Name must contain alphabets and space.";
    }

    // if there's no error, continue to update data
    if( !$error ) {

      $userEmail = $userRow['user_email'];

      $queryUpdate = "

      UPDATE `users` SET 
      `first_name`='$name',
      `last_name`='$last_name'
      WHERE `user_email` = '$userEmail'
      LIMIT 1

      ";

      $res = mysqli_query($conn, $queryUpdate);
      
      if ($res) {
        $errMSG = "Your Data was successfully updated";
        
        unset($first_name);
        unset($last_name);

      } else {
        $errMSG = "Something went wrong, try again later...";
      }
    }


  }

  // =======================================
  
  if ( isset($_POST['btn-update-password']) ) {
  // sanitize user input to prevent sql injection

  $user_pass = trim($_POST['user_pass']);
  $user_pass = strip_tags($user_pass);
  $user_pass = htmlspecialchars($user_pass);

  // user_password encrypt using SHA256();
  $password = hash('sha256', $user_pass);

  // user_password validation
  if (empty($user_pass)){
    $error = true;
    $passError = "Please enter password.";
  } else if(strlen($user_pass) < 6) {
    $error = true;
    $passError = "Password must have at least 6 characters.";
  } else if ( $userPass == $password ) {
    $error = true;
    $passError = "You must enter a new password.";
  }

  
  // if there's no error, continue to update data
  if( !$error ) {

    $queryPassword = "

    UPDATE `users` SET 
    `user_pass`='$password' 
    WHERE `user_email` = '$userEmail'
    LIMIT 1

    ";

    $res = mysqli_query($conn, $queryPassword);
    
    if ($res) {
      $errMSGpass = "Your password was successfully updated";
      
      unset($user_pass);

    } else {
      $errMSGpass = "Something went wrong, try again later...";
    }
  }
 
}  



  //return ITEM

  if (isset($_GET['return'])) {

  $returnID = $_GET['return'];
   $queryReturn = "
      DELETE FROM `reservation` 
      WHERE `reservation_id` = $returnID
    ";

  $resReturn = mysqli_query($conn,$queryReturn);
  header("Location: account.php");
  }
  
?>

<style type="text/css">
  
  .container-fluid{

    margin-top: 80px;
  }
</style>

<!-- HTML================================= -->

<!-- html/head/<body> -->
<?php include('navbar.php'); ?>

<div class="container-fluid row mx-auto">


  <div class="col-md-6 col-sm-10 mx-auto my-auto">
    <div class="px-5 p-3" style="overflow-x:auto;">
      <h3 class="py-2">My Borrowed Media</h3>
      <?php if ($count != 0) { ?>
        <table class="table table-sm table-hover table-striped">
          <tr>
            <th>ID</th>
            <th>name</th> 
            <th>model</th>
            <th>details</th>
            <th>Return</th>
          </tr>

        <?php
          while($mymediaRow = mysqli_fetch_assoc($resultMyMedia)) {
        ?>
          <tr>
            <td><?php echo $mymediaRow['car_id']; ?></td>
            <td><?php echo $mymediaRow['name']; ?></td>
            <td><?php echo $mymediaRow['model']; ?></td>
            <td><?php echo $mymediaRow['details']; ?></td>
            <td>
              <a href="account.php?return=<?php echo $mymediaRow['reservation_id']; ?>">Return</a>
            </td>
          </tr>
        <?php
          }
        ?>
      <?php
        } else {  
      ?>

      <p>You haven´t Rent any Car yet</p>
      <a href="cars_locations.php">To rent a car...</a>

      <?php 
      }
      ?>

      </table>

    </div>
  </div>



  <div class="container col-md-6 col-sm-10 m-auto">
    <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <div class="text-center">
        <h2><?php echo ucwords($userRow['first_name']); ?>'s Account</h2>
        <hr>
        <p>Would you like to make some changes?</p>
      </div>

      <?php
        if ( isset($errMSG) ) {
      ?>

        <div class="alert">
          <?php echo $errMSG; ?>
        </div>

      <?php
      }
      ?>

      <div class="form-group">
        <p>First Name</p>
        <input  type="text" name="first_name" class="form-control" placeholder="<?php echo ucwords($userRow['first_name']); ?>" maxlength="50" value="<?php echo ucwords($userRow['first_name']); ?>" />
        <span class="text-danger"><?php echo $nameError; ?></span>
      </div>

      <div class="form-group">
        <p>Last Name</p>
        <input  type="text" name="last_name" class="form-control" placeholder="<?php echo ucwords($userRow['last_name']); ?>" maxlength="50" autocomplete="off" value="<?php echo ucwords($userRow['last_name']); ?>" />
        <span class="text-danger"><?php echo $last_nameError; ?></span>
      </div>
      <hr>
      <button type="submit" class="btn btn-block btn-primary col-8 m-auto" name="btn-update">Update</button>
    </form>

    <hr>

    <!-- PASSWORD FORM -->

    <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    <?php
    if ( isset($errMSGpass) ) {
    ?>

        <div class="alert">
            <?php echo $errMSGpass; ?>
        </div>

    <?php
    }
    ?>
      
      <div class="form-group">
        <p>New Password</p>
        <input type="password" name="user_pass" class="form-control" maxlength="15" autocomplete="off" placeholder="Pass" />
        <span class="text-danger"><?php echo $passError; ?></span>
      </div>

      <hr/>

      <button type="submit" class="btn btn-block btn-primary col-8 m-auto" name="btn-update-password">Update</button>
      <hr />
      <a href="javascript:AlertIt();">Delete Account</a>
    </form>

  </div> <!-- both forms -->

</div>

  <!-- CONFIRM ACCOUNT DELETION -->

<script type="text/javascript">
  function AlertIt() {
  var answer = confirm ("Warning! Your account will be deleted by pressing Ok.")
  if (answer)
  window.location="delete.php?delete";
  }
</script>


<!-- footer + </body><html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>