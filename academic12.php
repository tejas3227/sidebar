<?php
include('config.php');
error_reporting(0);

$PRN = $_SESSION['loginid'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row = mysqli_fetch_assoc($getData);

$query = mysqli_query($conn, "select * from `academic12` where `PRN`='$PRN'");
$row1 = mysqli_fetch_assoc($query);


if (isset($_REQUEST['submit'])) {
    header('location:academics12.php');
    $Course1 = $_REQUEST['course112'];
    $ISE11 = $_REQUEST['ise1112'];
    $ISE12 = $_REQUEST['ise1212'];
    $MSE1 = $_REQUEST['mse112'];
    $ESE1 = $_REQUEST['ese112'];
    $MAKE1 = $_REQUEST['make112'];
    $Course2 = $_REQUEST['course212'];
    $ISE21 = $_REQUEST['ise2112'];
    $ISE22 = $_REQUEST['ise2212'];
    $MSE2 = $_REQUEST['mse212'];
    $ESE2 = $_REQUEST['ese212'];
    $MAKE2 = $_REQUEST['make212'];
    $Course3 = $_REQUEST['course312'];
    $ISE31 = $_REQUEST['ise3112'];
    $ISE32 = $_REQUEST['ise3212'];
    $MSE3 = $_REQUEST['mse312'];
    $ESE3 = $_REQUEST['ese312'];
    $MAKE3 = $_REQUEST['make312'];
    $Course4 = $_REQUEST['course412'];
    $ISE41 = $_REQUEST['ise4112'];
    $ISE42 = $_REQUEST['ise4212'];
    $MSE4 = $_REQUEST['mse412'];
    $ESE4 = $_REQUEST['ese412'];
    $MAKE4 = $_REQUEST['make412'];
    $Course5 = $_REQUEST['course512'];
    $ISE51 = $_REQUEST['ise5112'];
    $ISE52 = $_REQUEST['ise5212'];
    $MSE5 = $_REQUEST['mse512'];
    $ESE5 = $_REQUEST['ese512'];
    $MAKE5 = $_REQUEST['make512'];
    $Course6 = $_REQUEST['course612'];
    $ISE61 = $_REQUEST['ise6112'];
    $ISE62 = $_REQUEST['ise6212'];
    $MSE6 = $_REQUEST['mse612'];
    $ESE6 = $_REQUEST['ese612'];
    $MAKE6 = $_REQUEST['make612'];
    $Course7 = $_REQUEST['course712'];
    $ISE71 = $_REQUEST['ise7112'];
    $ISE72 = $_REQUEST['ise7212'];
    $MSE7 = $_REQUEST['mse712'];
    $ESE7 = $_REQUEST['ese712'];
    $MAKE7 = $_REQUEST['make712'];
    $Course8 = $_REQUEST['course812'];
    $ISE81 = $_REQUEST['ise8112'];
    $ISE82 = $_REQUEST['ise8212'];
    $MSE8 = $_REQUEST['mse812'];
    $ESE8 = $_REQUEST['ese812'];
    $MAKE8 = $_REQUEST['make812'];
    $Course9 = $_REQUEST['course912'];
    $ISE91 = $_REQUEST['ise9112'];
    $ISE92 = $_REQUEST['ise9212'];
    $MSE9 = $_REQUEST['mse912'];
    $ESE9 = $_REQUEST['ese912'];
    $MAKE9 = $_REQUEST['make912'];
    $sgpi = $_REQUEST['sgpi12'];
    $cgpi = $_REQUEST['cgpi12'];
    $grade = $_REQUEST['grade12'];

    $query = mysqli_query($conn, "select * from `academic12` where `PRN`='$PRN'");
    $rowCount = mysqli_num_rows($query);
    if ($rowCount != 0) {
        $query = mysqli_query($conn, "update `academic12` set
    `Course1`='$Course1',`ISE11`='$ISE11',`ISE12`='$ISE12',`MSE1`='$MSE1', `ESE1`='$ESE1',`MAKE1`='$MAKE1',`Course2`='$Course2',
    `ISE21`='$ISE21',`ISE22`='$ISE22',`MSE2`='$MSE2', `ESE2`='$ESE2',`MAKE2`='$MAKE2',`Course3`='$Course3',`ISE31`='$ISE31',`ISE32`='$ISE32',`MSE3`='$MSE3',
     `ESE3`='$ESE3',`MAKE3`='$MAKE3',`Course4`='$Course4',`ISE41`='$ISE41',`ISE42`='$ISE42',`MSE4`='$MSE4', `ESE4`='$ESE4',`MAKE4`='$MAKE4',`Course5`='$Course5',
     `ISE51`='$ISE51',`ISE52`='$ISE52',`MSE5`='$MSE5', `ESE5`='$ESE5',`MAKE5`='$MAKE5',`Course6`='$Course6',`ISE61`='$ISE61',`ISE62`='$ISE62',`MSE6`='$MSE6', 
     `ESE6`='$ESE6',`MAKE6`='$MAKE6',`Course7`='$Course7',`ISE71`='$ISE71',`ISE72`='$ISE72',`MSE7`='$MSE7', `ESE7`='$ESE7',`MAKE7`='$MAKE7',`Course8`='$Course8',`ISE81`='$ISE81',
     `ISE82`='$ISE82',`MSE8`='$MSE8', `ESE8`='$ESE8',`MAKE8`='$MAKE8',`Course9`='$Course9',`ISE91`='$ISE91',`ISE92`='$ISE92',`MSE9`='$MSE9', `ESE9`='$ESE9',`MAKE9`='$MAKE9'
     ,`sgpi`='$sgpi',`cgpi`='$cgpi',`grade`='$grade' where `PRN`='$PRN'");
        $_SESSION['successMsg'] = "Academics data saved successfully";
    } else {
        $query = mysqli_query($conn, "Insert into `academic12` (`PRN`,`Course1`,`ISE11`,
        `ISE12`,`MSE1`,`ESE1`,`MAKE1`,`Course2`,`ISE21`,`ISE22`,`MSE2`,`ESE2`,`MAKE2`,`Course3`,`ISE31`,`ISE32`,`MSE3`,`ESE3`,`MAKE3`,`Course4`,`ISE41`,`ISE42`,
        `MSE4`,`ESE4`,`MAKE4`,`Course5`,`ISE51`,`ISE52`,`MSE5`,`ESE5`,`MAKE5`,`Course6`,`ISE61`,`ISE62`,`MSE6`,`ESE6`,`MAKE6`,`Course7`,`ISE71`,`ISE72`,`MSE7`,`ESE7`,`MAKE7`,
        `Course8`,`ISE81`,`ISE82`,`MSE8`,`ESE8`,`MAKE8`,`Course9`,`ISE91`,`ISE92`,`MSE9`,`ESE9`,`MAKE9`,`sgpi`,`cgpi`,`grade`) values ('$PRN',
        '$Course1','$ISE11','$ISE12','$MSE1','$ESE1','$MAKE1','$Course2','$ISE21','$ISE22','$MSE2','$ESE2','$MAKE2','$Course3','$ISE31','$ISE32','$MSE3','$ESE3','$MAKE3','$Course4','$ISE41','$ISE42','$MSE4',
        '$ESE4','$MAKE4','$Course5','$ISE51','$ISE52','$MSE5','$ESE5','$MAKE5','$Course6','$ISE61','$ISE62','$MSE6','$ESE6','$MAKE6','$Course7','$ISE71','$ISE72','$MSE7','$ESE7','$MAKE7',
        '$Course8','$ISE81','$ISE82','$MSE8','$ESE8','$MAKE8','$Course9','$ISE91','$ISE92','$MSE9','$ESE9','$MAKE9','$sgpi','$cgpi','$grade')");
        $_SESSION['successMsg'] = "Academics data inserted successfully";
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

    <title>Academic12</title>

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
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Academic Record (First Year -
                                Second Semester)</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th colspan="6" class="text-center">
                                                    <h4>Academic Report (12)</h4>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>Courses</th>
                                                <th>ISE-I</th>
                                                <th>ISE-II</th>
                                                <th>MSE</th>
                                                <th>ESE</th>
                                                <th>Make up Exam</th>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course112"
                                                        value="<?php echo $row1['Course1']; ?>"></th>
                                                <td><input type="text" name="ise1112"
                                                        value="<?php echo $row1['ISE11']; ?>"></td>
                                                <td><input type="text" name="ise1212"
                                                        value="<?php echo $row1['ISE12']; ?>"></td>
                                                <td><input type="text" name="mse112"
                                                        value="<?php echo $row1['MSE1']; ?>"></td>
                                                <td><input type="text" name="ese112"
                                                        value="<?php echo $row1['ESE1']; ?>"></td>
                                                <td><input type="text" name="make112"
                                                        value="<?php echo $row1['MAKE1']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course212"
                                                        value="<?php echo $row1['Course2']; ?>"></th>
                                                <td><input type="text" name="ise2112"
                                                        value="<?php echo $row1['ISE21']; ?>"></td>
                                                <td><input type="text" name="ise2212"
                                                        value="<?php echo $row1['ISE22']; ?>"></td>
                                                <td><input type="text" name="mse212"
                                                        value="<?php echo $row1['MSE2']; ?>"></td>
                                                <td><input type="text" name="ese212"
                                                        value="<?php echo $row1['ESE2']; ?>"></td>
                                                <td><input type="text" name="make212"
                                                        value="<?php echo $row1['MAKE2']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course312"
                                                        value="<?php echo $row1['Course3']; ?>"></th>
                                                <td><input type="text" name="ise3112"
                                                        value="<?php echo $row1['ISE31']; ?>"></td>
                                                <td><input type="text" name="ise3212"
                                                        value="<?php echo $row1['ISE32']; ?>"></td>
                                                <td><input type="text" name="mse312"
                                                        value="<?php echo $row1['MSE3']; ?>"></td>
                                                <td><input type="text" name="ese312"
                                                        value="<?php echo $row1['ESE3']; ?>"></td>
                                                <td><input type="text" name="make312"
                                                        value="<?php echo $row1['MAKE3']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course412"
                                                        value="<?php echo $row1['Course4']; ?>"></th>
                                                <td><input type="text" name="ise4112"
                                                        value="<?php echo $row1['ISE41']; ?>"></td>
                                                <td><input type="text" name="ise4212"
                                                        value="<?php echo $row1['ISE42']; ?>"></td>
                                                <td><input type="text" name="mse412"
                                                        value="<?php echo $row1['MSE4']; ?>"></td>
                                                <td><input type="text" name="ese412"
                                                        value="<?php echo $row1['ESE4']; ?>"></td>
                                                <td><input type="text" name="make412"
                                                        value="<?php echo $row1['MAKE4']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course512"
                                                        value="<?php echo $row1['Course5']; ?>"></th>
                                                <td><input type="text" name="ise5112"
                                                        value="<?php echo $row1['ISE51']; ?>"></td>
                                                <td><input type="text" name="ise5212"
                                                        value="<?php echo $row1['ISE52']; ?>"></td>
                                                <td><input type="text" name="mse512"
                                                        value="<?php echo $row1['MSE5']; ?>"></td>
                                                <td><input type="text" name="ese512"
                                                        value="<?php echo $row1['ESE5']; ?>"></td>
                                                <td><input type="text" name="make512"
                                                        value="<?php echo $row1['MAKE5']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course612"
                                                        value="<?php echo $row1['Course6']; ?>"></th>
                                                <td><input type="text" name="ise6112"
                                                        value="<?php echo $row1['ISE61']; ?>"></td>
                                                <td><input type="text" name="ise6212"
                                                        value="<?php echo $row1['ISE62']; ?>"></td>
                                                <td><input type="text" name="mse612"
                                                        value="<?php echo $row1['MSE6']; ?>"></td>
                                                <td><input type="text" name="ese612"
                                                        value="<?php echo $row1['ESE6']; ?>"></td>
                                                <td><input type="text" name="make612"
                                                        value="<?php echo $row1['MAKE6']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course712"
                                                        value="<?php echo $row1['Course7']; ?>"></th>
                                                <td><input type="text" name="ise7112"
                                                        value="<?php echo $row1['ISE71']; ?>"></td>
                                                <td><input type="text" name="ise7212"
                                                        value="<?php echo $row1['ISE72']; ?>"></td>
                                                <td><input type="text" name="mse712"
                                                        value="<?php echo $row1['MSE7']; ?>"></td>
                                                <td><input type="text" name="ese712"
                                                        value="<?php echo $row1['ESE7']; ?>"></td>
                                                <td><input type="text" name="make712"
                                                        value="<?php echo $row1['MAKE7']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course812"
                                                        value="<?php echo $row1['Course8']; ?>"></th>
                                                <td><input type="text" name="ise8112"
                                                        value="<?php echo $row1['ISE81']; ?>"></td>
                                                <td><input type="text" name="ise8212"
                                                        value="<?php echo $row1['ISE82']; ?>"></td>
                                                <td><input type="text" name="mse812"
                                                        value="<?php echo $row1['MSE8']; ?>"></td>
                                                <td><input type="text" name="ese812"
                                                        value="<?php echo $row1['ESE8']; ?>"></td>
                                                <td><input type="text" name="make812"
                                                        value="<?php echo $row1['MAKE8']; ?>"></td>
                                            </tr>
                                            <tr>
                                                <th><input type="text" name="course912"
                                                        value="<?php echo $row1['Course9']; ?>"></th>
                                                <td><input type="text" name="ise9112"
                                                        value="<?php echo $row1['ISE91']; ?>"></td>
                                                <td><input type="text" name="ise9212"
                                                        value="<?php echo $row1['ISE92']; ?>"></td>
                                                <td><input type="text" name="mse912"
                                                        value="<?php echo $row1['MSE9']; ?>"></td>
                                                <td><input type="text" name="ese912"
                                                        value="<?php echo $row1['ESE9']; ?>"></td>
                                                <td><input type="text" name="make912"
                                                        value="<?php echo $row1['MAKE9']; ?>"></td>
                                            </tr>

                                            <tr height="20">
                                                <td colspan="6">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <th><label for="sgpi11">SGPI</label></th>
                                                <td><input type="text" name="sgpi12"
                                                        value="<?php echo $row1['sgpi']; ?>"></td>
                                                <th><label for="cgpi11">CGPA</label></th>
                                                <td><input type="text" name="cgpi12"
                                                        value="<?php echo $row1['cgpi']; ?>"></td>
                                                <th><label for="grade11">Grade</label></th>
                                                <td><input type="text" name="grade12"
                                                        value="<?php echo $row1['grade']; ?>"></td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="academics12.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="academics12.php" class="btn btn-primary btn-icon-split">
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