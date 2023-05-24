<?php
include('config.php');
error_reporting(0);

if (!isset($_SESSION['loginid'])) {
    header('location:login.php');
}

$PRN = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row1 = mysqli_fetch_assoc($getData);

$getData2 = mysqli_query($conn, "select * from `placement` where `PRN`='$PRN'");
$row2 = mysqli_fetch_assoc($getData2);

if (isset($_REQUEST['submit'])) {
    header('location:placements.php');
    $Drive1 = $_REQUEST['d1'];
    $Drive2 = $_REQUEST['d2'];
    $Drive3 = $_REQUEST['d3'];
    $Drive4 = $_REQUEST['d4'];
    $Drive5 = $_REQUEST['d5'];
    $Drive6 = $_REQUEST['d6'];
    $Drive7 = $_REQUEST['d7'];
    $Drive8 = $_REQUEST['d8'];
    $Drive9 = $_REQUEST['d9'];
    $Drive10 = $_REQUEST['d10'];

    $query = mysqli_query($conn, "select * from `placement` where `PRN`='$PRN'");
    $rowCount = mysqli_num_rows($query);
    if ($rowCount != 0) {
        $query = mysqli_query($conn, "update `placement` set `Drive1`='$Drive1',`Drive2`='$Drive2',`Drive3`='$Drive3',`Drive4`='$Drive4',
    `Drive5`='$Drive5',`Drive6`='$Drive6',`Drive7`='$Drive7',`Drive8`='$Drive8',`Drive9`='$Drive9', `Drive10`='$Drive10' where `PRN`='$PRN'");
        $_SESSION['successMsg'] = "Placement Drive data saved successfully";
    } else {
        $query = mysqli_query($conn, "Insert into `placement` (`PRN`,`Drive1`,`Drive2`,`Drive3`,`Drive4`,`Drive5`,`Drive6`,`Drive7`,
        `Drive8`,`Drive9`,`Drive10`) values ('$PRN','$Drive1','$Drive2','$Drive3','$Drive4','$Drive5','$Drive6','$Drive7',
        '$Drive8','$Drive9','$Drive10')");
        $_SESSION['successMsg'] = "Placement Drive data inserted successfully";
    }

} else {
    $_SESSION['errorMsg'] = "Please fill correctly";
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

    <title>placements</title>

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
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Placement Details</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th colspan="1">
                                                    <h4>Drive Information</h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d1" value="<?php echo $row2['Drive1']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d2" value="<?php echo $row2['Drive2']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d3" value="<?php echo $row2['Drive3']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d4" value="<?php echo $row2['Drive4']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d5" value="<?php echo $row2['Drive5']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d6" value="<?php echo $row2['Drive6']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d7" value="<?php echo $row2['Drive7']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d8" value="<?php echo $row2['Drive8']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d9" value="<?php echo $row2['Drive9']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d10"
                                                        value="<?php echo $row2['Drive10']; ?>"
                                                        placeholder="Company Name/Selected-NotSelected"
                                                        title="Enter company name and result"></td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="placements.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="placements.php" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-left"></i>
                                                </span>
                                                <span class="text">Go Back</span>
                                            </a>
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