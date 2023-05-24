<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
    header('location:tlogin.php');
}
$TID = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `meetings` where `tid`='$TID'");
$row = mysqli_fetch_assoc($getData);

$getData1 = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row1 = mysqli_fetch_assoc($getData1);

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


                        <li class="nav-item">
                            <a class="nav-link text-dark">Teacher Module</a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo "TID: ", $row1['tid']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="images/<?php echo $row1['img']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="button text-center">
                    <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                        <a href="tmeeting_table.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-eye"></i>
                            </span>
                            <span class="text">View Scheduled Meetings</span></a></button>

                </div><br>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Meetings History</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive" style="text-align: center;">
                                    <form action="hmeeting.php" method="POST">
                                        <label for="sprn">PRN</label>
                                        <select name="sprn" title="Select your PRN">
                                            <?php
                                            // Retrieve assigned students using the teacher's tid
                                            $TID = $_SESSION['loginid'];
                                            $getAssignedStudents = mysqli_query($conn, "SELECT PRN, Name FROM assign WHERE TID='$TID'");
                                            while ($row = mysqli_fetch_assoc($getAssignedStudents)) {
                                                // Create an option for each assigned student
                                                echo '<option value="' . $row['PRN'] . '">' . $row['Name'] . ' ' . $row['PRN'] . '</option>';
                                            }
                                            ?>
                                        </select><br>
                                        <button type="submit" class="btn btn-success">Submit</button><br>
                                    </form><br>

                                    <table class="table table border" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th>PRN</th>
                                                <th>Department</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                            </tr>
                                            <?php
                                            if (isset($_POST['sprn'])) {
                                                $selectedPRN = $_POST['sprn'];
                                                $query = mysqli_query($conn, "SELECT * FROM `meetings` WHERE `tid`='$TID' AND `PRN`='$selectedPRN'");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['PRN'] . "</td>";
                                                    echo "<td>" . $row['Department'] . "</td>";
                                                    echo "<td>" . $row['Class'] . "</td>";
                                                    echo "<td>" . $row['Subject'] . "</td>";
                                                    echo "<td>" . $row['Location'] . "</td>";
                                                    echo "<td>" . $row['Date'] . "</td>";
                                                    echo "<td>" . $row['Start_time'] . "</td>";
                                                    echo "<td>" . $row['End_time'] . "</td>";
                                                    echo "<td>";
                                                    echo "</form>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table><br>

                        </form>
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