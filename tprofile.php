<?php
include('config.php');

if (!isset($_SESSION['loginid'])) {
    header('location:tlogin.php');
}
$TID = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row = mysqli_fetch_assoc($getData);

if (isset($_REQUEST['submit'])) {
    header('location:tprofiles.php');
    $Department = $_REQUEST['td'];
    $Mobile_Number = $_REQUEST['tmob'];
    $Alt_Mobile_Number = $_REQUEST['tamob'];
    $Email = $_REQUEST['tmail'];
    $Address = $_REQUEST['tadr'];

    $query = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount != 0) {
        $query = mysqli_query($conn, "update `teachinfo` set `Department`='$Department', `Mobile_Number`='$Mobile_Number',
    `Alt_Mobile_Number`='$Alt_Mobile_Number', `Email`='$Email', `Address`='$Address' where `tid`='$TID'");
        $_SESSION['successMsg'] = "Profile updated successfully";
    } else {
        $query = mysqli_query($conn, "Insert into `teachinfo` (`Department`,`Mobile_Number`,`Alt_Mobile_Number`,`Email`,`Address`)
    values (`$Department`,`$Mobile_Number`,`$Alt_Mobile_Number`,`$Email`,`$Address`)");
        $_SESSION['successMsg'] = "Skills inserted successfully";
    }
} else {
    $_SESSION['errorMsg'] = "";
}
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
                                <img class="img-profile rounded-circle" src="images/<?php echo $row['img']; ?>">
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
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Profile</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>

                                            </tr>
                                            <tr>
                                                <td><label for="td">Department</label></td>
                                                <td><select name="td">
                                                        <option value="CSE"> CSE </option>
                                                        <option value="MECH"> MECH </option>
                                                        <option value="ELE"> ELE </option>
                                                        <option value="CVL"> CVL </option>
                                                        <option value="BIO"> BIO </option>
                                                        <option value="ENV"> ENV </option>
                                                        <option value="ENTC"> ENTC </option>
                                                        <option value="PROD"> PROD </option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><label for="tmob">Mobile Number</label></td>
                                                <td>
                                                    <input type="text" name="tmob"
                                                        value="<?php echo $row['Mobile_Number']; ?>"
                                                        placeholder="Enter Mobile Number"
                                                        title="Enter 10 Digit Mobile Number" pattern="[0-9]{10}"
                                                        required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="tamob">Alternative Mobile Number</label></td>
                                                <td><input type="text" name="tamob"
                                                        value="<?php echo $row['Alt_Mobile_Number']; ?>"
                                                        placeholder="Enter Mobile Number"
                                                        title="Enter 10 Digit Mobile Number" pattern="[0-9]{10}"
                                                        required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="tmail">Email</label></td>
                                                <td>
                                                    <input type="email" name="tmail"
                                                        value="<?php echo $row['Email']; ?>"
                                                        placeholder="Enter Email Id"
                                                        title="Enter Email address in Proper Format"
                                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="tadr">Address</label></td>
                                                <td><input type="text" name="tadr"
                                                        value="<?php echo $row['Address']; ?>"
                                                        placeholder="Enter Adrress" title="Enter Adrress" required></td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="tprofiles.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="tprofiles.php" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-left"></i>
                                                </span>
                                                <span class="text">Go Back</span>
                                            </a>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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