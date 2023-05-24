<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
    header('location:login.php');
}

$PRN = $_SESSION['loginid'];
$getData1 = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row1 = mysqli_fetch_assoc($getData1);

$getData4 = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row4 = mysqli_fetch_assoc($getData4);

$query = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$rowCount = mysqli_num_rows($query);


// Retrieve assigned teachers using the student's PRN
$PRN = $_SESSION['loginid'];

          



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Queries</title>

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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mentoring System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profiles.php">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pinfos.php">
                    <i class="fas fa-fw fa-id-badge"></i>
                    <span>Personal Information</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ginfos.php">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>General Information</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Select Academic Year
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcademic"
                    aria-expanded="true" aria-controls="collapseAcademic">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Academic Records</span>
                </a>
                <div id="collapseAcademic" class="collapse" aria-labelledby="headingAcademic" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Academic Year:</h6>
                        <a class="nav-link collapsed" href="#first-year" data-toggle="collapse" data-target="#collapseFirstYear" aria-expanded="false" aria-controls="collapseFirstYear" style="color:black; ">First Year</a>
                        <div id="collapseFirstYear" class="collapse" aria-labelledby="headingFirstYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics11.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics12.php" style="background-color:black; color: white;">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#second-year" data-toggle="collapse" data-target="#collapseSecondYear" aria-expanded="false" aria-controls="collapseSecondYear" style="color:black; ">Second Year</a>
                        <div id="collapseSecondYear" class="collapse" aria-labelledby="headingSecondYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics21.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics22.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#third-year" data-toggle="collapse" data-target="#collapseThirdYear" aria-expanded="false" aria-controls="collapseThirdYear" style="color:black; ">Third Year</a>
                        <div id="collapseThirdYear" class="collapse" aria-labelledby="headingThirdYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics31.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics32.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#fourth-year" data-toggle="collapse" data-target="#collapseFourthYear" aria-expanded="false" aria-controls="collapseFourthYear" style="color:black; ">Fourth Year</a>
                        <div id="collapseFourthYear" class="collapse" aria-labelledby="headingFourthYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics41.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics42.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <div style="text-align:center">
                        <a href="academics_PDF.php?PRN=<?php echo $PRN; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate all Report</a>
                    </div>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="skills.php">
                    <i class="fas fa-award"></i>
                    <span>Skills and Achievements</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="placements.php">
                    <i class="fas fa-university"></i>
                    <span>Placement</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="meeting.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Meetings</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="queries.php">
                    <i class="fa fa-question"></i>
                    <span>Queries</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
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
                    <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                            <a class="nav-link text-dark">Academic Year <?php echo $row4['academic_year']; ?></a>
                        </li>
    </ul>                        
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-dark">Student Module</a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "PRN: ",$row4['PRN']; ?></span>
                                <img class="img-profile rounded-circle"
                                src="images/<?php echo $row4['Img']; ?>">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color: #4e73df;">
      <h6 class="m-0 font-weight-bold" style="color: #fff;">Queries</h6>
    </div>
    <?php
if (isset($_POST['submit'])) {
    $PRN = $_SESSION['loginid'];
    $Query = $_POST['query'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Retrieve TID from the assign table
    $query_assign = mysqli_query($conn, "SELECT `TID` FROM `assign` WHERE `PRN` = '$PRN'");
    $row_assign = mysqli_fetch_assoc($query_assign);
    $TID = $row_assign['TID'];

$query = mysqli_query($conn, "SELECT COUNT(*) AS count FROM `queries` WHERE `PRN` = '$PRN'");
$row = mysqli_fetch_assoc($query);
$count = $row['count'];

if ($count > 0) {

    
    // Update existing query with TID
    $query = mysqli_query($conn, "UPDATE `queries` SET
        `response` = null, 
        `TID` = '$TID',
        `Query` = '$Query', 
        `Date` = '$Date', 
        `Time` = '$Time' 
        WHERE `PRN` = '$PRN'");
} else {
    // Insert new query with TID
    $query = mysqli_query($conn, "INSERT INTO `queries` (`PRN`, `TID`, `Query`, `Date`, `Time`)
        VALUES ('$PRN', '$TID', '$Query', '$Date', '$Time')");
}
}
?>

<form action="#" method="post">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT `TID` FROM `assign` WHERE `PRN` = '$PRN'");
                    $row = mysqli_fetch_assoc($query);
                    $TID = $row['TID'];
                    ?>
                    <tr>
                        <td><label for="TID">Assigned Teacher</label></td>
                        <td><?php echo $TID; ?></td>
                    </tr>
                    <tr>
                        <td><label for="query">Query</label></td>
                        <td>
                            <input type="text" id="query" name="query">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date</label></td>
                        <td>
                            <input type="date" id="date" name="date" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="time">Time</label></td>
                        <td>
                            <input type="time" id="time" name="time" readonly>
                        </td>
                    </tr>
                </tbody>
                <script>
    // Get the date and time input fields
    var dateField = document.getElementById("date");
    var timeField = document.getElementById("time");

    // Update the date and time fields with the current date and time
    var currentDate = new Date();
    var currentDateString = currentDate.toISOString().slice(0, 10);
    var hours = String(currentDate.getHours()).padStart(2, "0");
    var minutes = String(currentDate.getMinutes()).padStart(2, "0");
    var currentTimeString = hours + ":" + minutes;

    dateField.value = currentDateString;
    timeField.value = currentTimeString;
</script>

            </table>
            <br>
            <div class="button text-center">
                <button type="submit" name="submit" class="btn btn-success btn-icon-split" onclick="showAlert()">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Submit</span>
                </button>
            </div>
            <br>
            <script>
                function showAlert() {
                    alert("Query is sent to Teacher");
                }
            </script>
            <div class="button text-center">
                <a href="squeries.php?PRN=<?php echo $PRN; ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-eye"></i>
                    </span>
                    <span class="text">Response to Previous Query</span>
                </a>
            </div>
        </div>
    </div>
            </form>

      </div>
    </div>
  </div>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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