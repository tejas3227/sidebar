<?php
include('config.php');

if (!isset($_SESSION['loginid'])) {
    header('location:tlogin.php');
}

if (isset($_REQUEST['login'])) {
    $TID = $_REQUEST['tid'];
    $Name = $_REQUEST['tn'];
    $Password = $_REQUEST['tpass'];
    $img = $_FILES['timg']['name'];

    if ((!empty($TID)) && (!empty($TID))) {
        $TID = $_SESSION['loginid'];
        $up = mysqli_query($conn, "update `teachinfo` set `tid`='$TID', `tName`='$Name' where `tid`='$TID'");

        if (!empty($Password)) {
            $up = mysqli_query($conn, "update `teachinfo` set `tPassword`='$Password' where `tid`='$TID'");
        }

        if (!empty($img)) {
            $tmpName = $_FILES['timg']['tmp_name'];
            $uploadDir = "images/";
            move_uploaded_file($tmpName, $uploadDir . $img);
            $up = mysqli_query($conn, "update `teachinfo` set `Img`='$img' where `tid`='$TID'");
        }
        $_SESSION['successMsg'] = "Profile has been updated Successfully";
        header('location:tdashboard.php');
        exit;
    } else {
        $_SESSION['errorMsg'] = "TID,Name are required";
        header('location:tedit.php');
        exit;
    }
}

$TID = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row = mysqli_fetch_assoc($getData);
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
                                    <?php echo "TID: ", $row['tid']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="tlogout.php" data-toggle="modal" data-target="#logoutModal">
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
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Profile</h6>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <form action="#" method="post" enctype="multipart/form-data" style="margin-left: 15%;">
                                <div class="input-fields">


                                    <div class="input-box">
                                        <span class="tid"><b>TID</b></span>
                                        <input type="text" value="<?php echo $row['tid']; ?>" name="tid"
                                            placeholder="Enter TID" title="Enter TID" readonly>
                                    </div><br>
                                    <div class="input-box">
                                        <span class="tn"><b>Name</b></span>
                                        <input type="text" name="tn" value="<?php echo $row['tName']; ?>"
                                            placeholder="Enter Your Name" title="Enter Your Name" readonly>
                                    </div><br>
                                    <div class="input-box">
                                        <span class="timg"><b>Profile Picture</b></span><br><br>
                                        <input type="file" name="timg" id="img">
                                    </div><br>
                                </div>

                                <div class="btn btn-success btn-icon-split">
                                    <button type="submit" name="login" class="btn btn-success btn-icon-split"
                                        onclick="if(confirm('Are you sure you want to update Information?'))location.href='tdashboard.php'"><span
                                            class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Submit</span></button>
                                </div>
                                <a href="tdashboard.php" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Dashboard</span>
                                </a>
                        </div>
                        </form>




                        <!-- End of Main Content -->


                    </div>
                    <!-- End of Content Wrapper -->

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