<?php
include('config.php');
error_reporting(0);
if (isset($_REQUEST['register'])) {
  $TID = $_REQUEST['tid'];
  $Name = $_REQUEST['tn'];
  $Password = $_REQUEST['tpass'];

  $query = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
  $rowCount = mysqli_num_rows($query);
  if ($rowCount != 0) {
    $_SESSION['errorMsg'] = "TID already registered";
  } else {
    $query = mysqli_query($conn, "Insert into `teachinfo` (`tid`,`tName`,`tPassword`) values ('$TID','$Name','$Password')");
    $_SESSION['successMsg'] = "Registered successfully";
    header('location:tlogin.php');
  }

} else {
  $_SESSION['errorMsg'] = "";
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Registration</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <?php
  if (isset($_SESSION['successMsg'])) {
    ?>
    <p style="color: green;">
      <?php echo $_SESSION['successMsg']; ?>
    </p>
    <?php
    unset($_SESSION['successMsg']);
  }
  if (isset($_SESSION['errorMsg'])) {
    ?>
    <p style="color: red;">
      <?php echo $_SESSION['errorMsg']; ?>
    </p>
    <?php
    unset($_SESSION['errorMsg']);
  }
  ?>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="#" method="post">
      <div class="input-box">
        <label for="tid"><b>Teacher ID</b></label><br>
        <input type="text" name="tid" placeholder="Enter your TID" required>
      </div>
      <div class="input-box">
        <label for="tn"><b>Name</b></label><br>
        <input type="text" name="tn" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <label for="tpass"><b>Password</b></label><br>
        <input type="password" name="tpass" placeholder="Create password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})"
          title="Must contain at least one nuimber and one uppercase and lowercase letter, and at least 8 or more characters"
          required>
      </div><br>
      <div class="input-box button">
        <input type="Submit" value="Register" name="register" class="registerbtn">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="tlogin.php">Login Now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>