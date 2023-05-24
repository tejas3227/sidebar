<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
    header('location:login.php');
}

if (isset($_REQUEST['login'])) {
    $PRN = $_REQUEST['sprn'];
    $Name = $_REQUEST['sn'];
    $Password = $_REQUEST['spass'];
    $img = $_FILES['simg']['name'];

    if ($_FILES['simg']['size'] > 256000) {
        $_SESSION['errorMsg'] = "Image file size should be less than 256kb";
        echo '<script>alert("Image file size should be less than 256kb"); window.location.href = "edit.php";</script>';
        exit;
    }

    if ((!empty($PRN)) && (!empty($PRN))) {
        $PRN = $_SESSION['loginid'];
        $up = mysqli_query($conn, "update `studinfo` set `PRN`='$PRN', `Name`='$Name' where `PRN`='$PRN'");

        if (!empty($Password)) {
            $up = mysqli_query($conn, "update `studinfo` set `Password`='$Password' where `PRN`='$PRN'");
        }

        if (!empty($img)) {
            $tmpName = $_FILES['simg']['tmp_name'];
            $uploadDir = "images/";
            move_uploaded_file($tmpName, $uploadDir . $img);
            $up = mysqli_query($conn, "update `studinfo` set `Img`='$img' where `PRN`='$PRN'");
        }
        // $_SESSION['successMsg'] = "Profile has been updated Successfully";
        header('location:dashboard.php');
        exit;
    } else {
        $_SESSION['errorMsg'] = "PRN,Name are required";
        header('location:edit.php');
        exit;
    }

}

$PRN = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row = mysqli_fetch_assoc($getData);

$getData2 = mysqli_query($conn, "select * from `pinfo` where `PRN`='$PRN'");
$row2 = mysqli_fetch_assoc($getData2);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KIT Mentoring</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo "PRN: ", $row['PRN']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="images/<?php echo $row['Img']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container mx-auto">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit</h6>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="input-fields">
                                    <div class="input-box ">
                                        <span class="sprn"><b>PRN</b></span>
                                        <input type="text" name="sprn" value="<?php echo $row['PRN']; ?>" readonly
                                            placeholder="Enter PRN" title="Enter 10 digit PRN">
                                    </div><br>
                                    <div class="input-box">
                                        <span class="sn"><b>Name</b></span>
                                        <input type="text" name="sn" value="<?php echo $row['Name']; ?>" readonly
                                            placeholder="Enter PRN" title="Enter 10 digit PRN">
                                    </div><br>
                                    <div class="input-box">
                                        <span class="simg"><b>Profile Picture</b></span><br>
                                        <input type="file" name="simg" id="img">
                                    </div>
                                </div><br>
                                <div class="btn btn-success btn-icon-split">
                                    <button type="submit" name="login" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Submit</span>
                                    </button>
                                </div>

                                <a href="dashboard.php" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Dashboard</span>
                                </a>
                        </div>



                        </form>




                        <!-- End of Main Content -->

                        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>2023 &copy; Student Mentoring</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>


                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>