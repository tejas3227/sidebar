<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
    header('location:login.php');
}
$PRN = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row = mysqli_fetch_assoc($getData);

$getData2 = mysqli_query($conn, "select * from `pinfo` where `PRN`='$PRN'");
$row2 = mysqli_fetch_assoc($getData2);

if (isset($_REQUEST['submit'])) {
    header('location:profiles.php');
    $Department = $_REQUEST['sd'];
    $Class = $_REQUEST['scl'];
    $Division = $_REQUEST['sdiv'];
    $Roll_Number = $_REQUEST['srn'];
    $Mobile_Number = $_REQUEST['smob'];
    $Alt_Mobile_Number = $_REQUEST['samob'];
    $Email = $_REQUEST['smail'];

    $query = mysqli_query($conn, "select * from `pinfo` where `PRN`='$PRN'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount != 0) {
        $query = mysqli_query($conn, "update `pinfo` set `Division`='$Division',`Roll_Number`='$Roll_Number',
    `Mobile_Number`='$Mobile_Number',`Alt_Mobile_Number`='$Alt_Mobile_Number',`Email`='$Email' where `PRN`='$PRN'");
        $_SESSION['successMsg'] = `echo "<script>alert('Profile updated successfully.');</script>"`;
    } else {
        $query = mysqli_query($conn, "INSERT INTO `pinfo` (`PRN`,`Division`, `Roll_Number`, `Mobile_Number`, `Alt_Mobile_Number`, `Email`)
                               VALUES ('$PRN','$Division', '$Roll_Number', '$Mobile_Number', '$Alt_Mobile_Number', '$Email')");

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
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Profile</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th><label for="sprn">PRN</label></th>
                                                <td><input type="number" name="sprn" value="<?php echo $row['PRN']; ?>"
                                                        placeholder="Enter PRN" title="Enter your PRN" readonly></td>
                                            </tr>
                                            <tr>
                                                <th><label for="sd">Department</label></th>
                                                <td><input type="text" name="sd"
                                                        value="<?php echo $row['Department']; ?>"
                                                        placeholder="Enter Department" title="Enter your Department"
                                                        readonly></td>
                                            </tr>
                                            <tr>
                                                <th><label for="scl">Class</label></th>
                                                <td><input type="text" name="scl" value="<?php echo $row['Class']; ?>"
                                                        placeholder="Enter Class" title="Enter your Class" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label for="sdiv">Division</label></th>
                                                <td> <select name="sdiv">
                                                        <option value="A" <?php if ($row2['Division'] == 'A')
                                                            echo 'selected'; ?>> A </option>
                                                        <option value="B" <?php if ($row2['Division'] == 'B')
                                                            echo 'selected'; ?>> B </option>
                                                        <option value="C" <?php if ($row2['Division'] == 'C')
                                                            echo 'selected'; ?>> C </option>
                                                        <option value="D" <?php if ($row2['Division'] == 'D')
                                                            echo 'selected'; ?>> D </option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <th><label for="srn">Roll Number</label></th>
                                                <td>
                                                    <input type="number" name="srn"
                                                        value="<?php echo $row2['Roll_Number']; ?>"
                                                        placeholder="Enter Roll Number" title="Enter your Roll Number"
                                                        required pattern="[0-9]">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th><label for="smob">Mobile Number</label></th>
                                                <td>
                                                    <input type="text" name="smob"
                                                        value="<?php echo $row2['Mobile_Number']; ?>"
                                                        placeholder="Enter Mobile Number"
                                                        title="Enter 10 Digit Mobile Number" required
                                                        pattern="[0-9]{10}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th><label for="samob">Alternative Mobile Number</label></th>
                                                <td>
                                                    <input type="text" name="samob"
                                                        value="<?php echo $row2['Alt_Mobile_Number']; ?>"
                                                        placeholder="Enter Mobile Number"
                                                        title="Enter 10 Digit Mobile Number" required
                                                        pattern="[0-9]{10}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th><label for="smail">Email</label></th>
                                                <td>
                                                    <input type="email" name="smail"
                                                        value="<?php echo $row2['Email']; ?>"
                                                        placeholder="Enter Email Id" title="Enter Proper Email address"
                                                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="profiles.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="profiles.php" class="btn btn-primary btn-icon-split">
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