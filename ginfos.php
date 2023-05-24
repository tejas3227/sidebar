<?php
include('config.php');
error_reporting(0);

if (!isset($_SESSION['loginid'])) {
    header('location:login.php');
}
$PRN = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row1 = mysqli_fetch_assoc($getData);

$getData2 = mysqli_query($conn, "select * from `ginfo` where `PRN`='$PRN'");
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

    <title>SB Admin 2 - Dashboard</title>

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

            <li class="nav-item active">
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
                <div id="collapseAcademic" class="collapse" aria-labelledby="headingAcademic"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Academic Year:</h6>
                        <a class="nav-link collapsed" href="#first-year" data-toggle="collapse"
                            data-target="#collapseFirstYear" aria-expanded="false" aria-controls="collapseFirstYear"
                            style="color:black; ">First Year</a>
                        <div id="collapseFirstYear" class="collapse" aria-labelledby="headingFirstYear"
                            data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics11.php"
                                style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics12.php"
                                style="background-color:black; color: white;">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#second-year" data-toggle="collapse"
                            data-target="#collapseSecondYear" aria-expanded="false" aria-controls="collapseSecondYear"
                            style="color:black; ">Second Year</a>
                        <div id="collapseSecondYear" class="collapse" aria-labelledby="headingSecondYear"
                            data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics21.php"
                                style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics22.php"
                                style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#third-year" data-toggle="collapse"
                            data-target="#collapseThirdYear" aria-expanded="false" aria-controls="collapseThirdYear"
                            style="color:black; ">Third Year</a>
                        <div id="collapseThirdYear" class="collapse" aria-labelledby="headingThirdYear"
                            data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics31.php"
                                style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics32.php"
                                style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#fourth-year" data-toggle="collapse"
                            data-target="#collapseFourthYear" aria-expanded="false" aria-controls="collapseFourthYear"
                            style="color:black; ">Fourth Year</a>
                        <div id="collapseFourthYear" class="collapse" aria-labelledby="headingFourthYear"
                            data-parent="#collapseAcademic">
                            <a class="collapse-item" href="academics41.php"
                                style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="academics42.php"
                                style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <div style="text-align:center">
                            <a href="academics_PDF.php?PRN=<?php echo $PRN; ?>"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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

            <li class="nav-item">
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
                            <a class="nav-link text-dark">Academic Year <?php echo $row1['academic_year']; ?></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo "PRN: ", $row1['PRN']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="images/<?php echo $row1['Img']; ?>">
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
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">General Information</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tbody>

                                        <tr>
                                            <th colspan="4">
                                                <h4>Board Exams</h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Class</th>
                                            <th>Board</th>
                                            <th>Percentage Marks</th>
                                            <th>Year of Passing</th>
                                        </tr>

                                        <tr>
                                            <td><label for="ssc">S.S.C./10th </label></td>
                                            <td>
                                                <?php echo $row2['SSC_Board']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['SSC_Percent']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['SSC_YOP']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="hsc">H.S.C./12th </label></td>
                                            <td>
                                                <?php echo $row2['HSC_Board']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['HSC_Percent']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['HSC_YOP']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="dsy">Diploma </label></td>
                                            <td>
                                                <?php echo $row2['DSY_Board']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['DSY_Percent']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['DSY_YOP']; ?>
                                            </td>
                                        </tr>

                                        <tr height="20">
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <h4>Competetive Exam</h4>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th>Name of Exams</th>
                                            <th>Organised by</th>
                                            <th>Grade/Marks</th>
                                            <th>Year of Exam</th>
                                        </tr>

                                        <tr>
                                            <td><label for="cet">CET </label></td>
                                            <td>
                                                <?php echo $row2['CET_Org']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['CET_Grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['CET_YOE']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="jeem">JEE MAINS </label></td>
                                            <td>
                                                <?php echo $row2['JEEM_Org']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['JEEM_Grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['JEEM_YOE']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="jeea">JEE ADVANCE </label></td>
                                            <td>
                                                <?php echo $row2['JEEA_Org']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['JEEA_Grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['JEEA_YOE']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="nso">NSO </label></td>
                                            <td>
                                                <?php echo $row2['NSO_Org']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['NSO_Grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['NSO_YOE']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="imo">IMO </label></td>
                                            <td>
                                                <?php echo $row2['IMO_Org']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['IMO_Grade']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['IMO_YOE']; ?>
                                            </td>
                                        </tr>

                                        <tr height="20">
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <h4>Any Other Exam</h4>
                                            </th>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr height="20">
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <h4>Activities</h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td><label for="hobbies">Hobbies</label></td>
                                            <td>
                                                <?php echo $row2['Hobbies1']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Hobbies2']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Hobbies3']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="Strength">Strength</label></td>
                                            <td>
                                                <?php echo $row2['Strength1']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Strength2']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Strength3']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label for="Weakness">Weakness</label></td>
                                            <td>
                                                <?php echo $row2['Weakness1']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Weakness2']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['Weakness3']; ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><label for="AOI">Area of Interest you would like to explore</label></td>
                                            <td>
                                                <?php echo $row2['AOI'] ?></textarea>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="button text-center">
                            <a href="ginfo.php" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit General Information</span>
                            </a><br><br>
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