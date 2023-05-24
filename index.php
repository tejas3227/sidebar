<?php
include('config.php');
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
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
    <form action="register.php" method="post">
      <div class="input-box">
        <label for="sprn"><b>PRN</b></label><br>
        <input type="text" name="sprn" placeholder="Enter your PRN" required>
      </div>
      <div class="input-box">
        <label for="sn"><b>Name</b></label><br>
        <input type="text" name="sn" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <label for="spass"><b>Password</b></label><br>
        <input type="password" name="spass" placeholder="Create password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})"
          title="Must contain at least one nuimber and one uppercase and lowercase letter, and at least 8 or more characters"
          required>
      </div><br>
      <div class="input-box button">
        <input type="Submit" value="Register" name="register" class="registerbtn">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login Now</a></h3>
        <h3>Register as Teacher <a href="tregister.php">Teacher SignUp</a></h3>
      </div>
    </form>
  </div>
</body>

</html>