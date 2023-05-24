<?php
include('config.php');

if (isset($_SESSION['loginid'])) {
    header('location:dashboard.php');
}

if (isset($_REQUEST['login'])) {
    $PRN = $_REQUEST['sprn'];
    $Password = $_REQUEST['spass'];

    $query = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN' and `Password`='$Password'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount > 0) {
        $rt = mysqli_fetch_assoc($query);
        $PRN = $rt['PRN'];
        $_SESSION['loginid'] = $PRN;
        if ($Password == 'kitcoek') {
            header('location:changep.php');
            exit;
        } else {
            header('location:dashboard.php');
            exit;
        }
    } else {
        echo "<script>alert('Invalid login credentials'); window.location.href = 'login.php';</script>";
        exit;
    }
}
?>

<html>

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-image: url(images/kit.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover; 
        }
        .container{
            opacity: 1;
        }
        .image-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>
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
    <div class="container">
    <div class="image-container">
    <img src="images/kit-logo.png" alt="Image description">
  </div><br>
        <header class="title">STUDENT LOGIN</header>
        <div classs="fields">
            <form action="#" method="post" style="margin-left: 15%;">
                <div class="input-fields">
                    <div class="input-box">
                        <label class="sprn"><b>PRN</b></label>
                        <input type="text" name="sprn" placeholder="Enter PRN" title="Enter 10 digit PRN"
                            pattern="[0-9]{10}" required>
                    </div>
                    <div class="input-box">
                        <span class="spass"><b>Password</b></label>
                            <input type="password" name="spass" placeholder="Enter Password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})"
                                title="Must contain at least one nuimber and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                    </div>
                </div>

                <div class="button">
                    <button type="submit" name="login" class="loginbtn" style="margin-left: 4%;">Login</button> <br>
                </div>


        </div>
        </form>
    </div>
</body>

</html>