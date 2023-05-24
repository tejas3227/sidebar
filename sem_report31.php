<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
    header('location:tlogin.php');
}
$selectedPRN = $_GET['sprn'];
$TID = $_SESSION['loginid'];
$getData1 = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row1 = mysqli_fetch_assoc($getData1);

$getData = mysqli_query($conn, "select * from `semrepo31` where `PRN`='$selectedPRN'");
$row = mysqli_fetch_assoc($getData);


if (isset($_REQUEST['submit'])) {
    header('location:sems_report31.php');
    $Review = $_REQUEST['review31'];
    $Attendance = $_REQUEST['attendance31'];
    $Result = $_REQUEST['result31'];
    $Carricular = $_REQUEST['carricular31'];
    $CandP_Skills = $_REQUEST['candp31'];
    $Behaviour = $_REQUEST['behaviour31'];
    $Other = $_REQUEST['other31'];

    $query = mysqli_query($conn, "select * from `semrepo31` where `PRN`='$selectedPRN'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount != 0) {
        $query = mysqli_query($conn, "UPDATE `semrepo31` SET `Review`='$Review', `Attendance`='$Attendance', `Result`='$Result', `Carricular`='$Carricular', `CandP_Skills`='$CandP_Skills', `Behaviour`='$Behaviour', `Other`='$Other' WHERE `PRN`='$selectedPRN'");
        $_SESSION['successMsg'] = "Profile updated successfully";
    } else {
        $query = mysqli_query($conn, "INSERT INTO `semrepo31` (`PRN`, `Review`, `Attendance`, `Result`, `Carricular`, `CandP_Skills`, `Behaviour`, `Other`, `TID`) VALUES ('$selectedPRN', '$Review', '$Attendance', '$Result', '$Carricular', '$CandP_Skills', '$Behaviour', '$Other', '$TID')");
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
                                    <?php echo "PRN: ", $row['PRN']; ?>
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
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Semester Report (Third Year -
                                First Semester)</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                                        echo '<p>Selected PRN: ' . $selectedPRN . '</p>';
                                        ?>
                                        <tbody>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Details</th>
                                                <th>Remarks</th>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>1</td>
                                                <td>ISE I/II MSE/ ESE</td>
                                                <td><label for="review31"></label>
                                                    <input type="text" name="review31" id="review31"
                                                        value="<?php echo $row['Review']; ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Students attendance and his/her regularity</td>
                                                <td><label for="attendance31"></label> <input type="text"
                                                        name="attendance31" id="attendance31"
                                                        value="<?php echo $row['Attendance']; ?>" required></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Semester Result of the Earlier Semester</td>
                                                <td><label for="result31"></label> <input type="text" name="result31"
                                                        id="result31" value="<?php echo $row['Result']; ?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Participation in various
                                                    activities(Technical/Sports/Cultural/Co-carricular)</td>
                                                <td><label for="carricular31"></label> <input type="text"
                                                        name="carricular31" id="carricular31"
                                                        value="<?php echo $row['Carricular']; ?>" required> </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Communication and Professional Skills</td>
                                                <td><label for="candp31"></label> <input type="text" name="candp31"
                                                        id="candp31" value="<?php echo $row['CandP_Skills']; ?>"
                                                        required> </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>General Behaviour and Discipline</td>
                                                <td><label for="behaviour31"></label> <input type="text"
                                                        name="behaviour31" id="behaviour31"
                                                        value="<?php echo $row['Behaviour']; ?>" required> </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Any Other Specify</td>
                                                <td><label for="other31"></label> <input type="text" name="other31"
                                                        id="other31" value="<?php echo $row['Other']; ?>" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="sems_report31.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="sems_report31.php" class="btn btn-primary btn-icon-split">
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