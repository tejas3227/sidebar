<?php
error_reporting(0);
include('config.php');

if (!isset($_SESSION['loginid'])) {
    header('location:tlogin.php');
}
$TID = $_SESSION['loginid'];
$PRN = $_REQUEST['sprn'];
$getData = mysqli_query($conn, "select * from `studinfo` where `PRN`='$PRN'");
$row1 = mysqli_fetch_assoc($getData);
$getData1 = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row = mysqli_fetch_assoc($getData1);


if (isset($_POST['submit'])) {
    $PRN = $_GET['prn']; // Retrieve PRN value from URL parameter
    $response = $_POST['response'];

    $query = mysqli_query($conn, "SELECT * FROM `queries` WHERE `PRN` = '$PRN'");
    if (mysqli_num_rows($query) > 0) {
        $updateQuery = mysqli_query($conn, "UPDATE `queries` SET `response` = '$response', `status` = 'read' WHERE `PRN` = '$PRN'");
        if ($updateQuery) {
            header('location:tqueriess.php');
            exit();
        } else {
            echo "Error updating response: " . mysqli_error($conn);
        }
    } else {
        echo "No matching records found for PRN: " . $PRN;
    }
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

    <title>Queries</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .card-container {
            max-width: 450px;
            /* change the value as per your requirement */
            margin: 0 auto;
            /* center align the card horizontally */
        }

        .card-image img {
            width: 100%;
            height: 200px;
            opacity: 50%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
        }

        .profile-image img {
            z-index: 1;
            width: 160px;
            height: 180px;
            position: relative;
            margin-top: -75px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 100px;
            border: 10px solid #fff;
            transition-duration: 0.4s;
            transition-property: transform;
        }

        .profile-image img:hover {
            transform: scale(1.1);
        }
    </style>
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
                                    <?php echo "TID: ", $row['tid']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="images/<?php echo $row['img']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="tlogout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #4e73df;">
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Queries</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="table-responsive text-center">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <?php
                                                // Retrieve the PRN value from the URL query parameter
                                                if (isset($_GET['prn'])) {
                                                    $selectedPRN = $_GET['prn'];
                                                    // Retrieve query data for the selected PRN
                                                    $getQueryData = mysqli_query($conn, "SELECT * FROM queries WHERE PRN='$selectedPRN'");
                                                    if ($getQueryData && mysqli_num_rows($getQueryData) > 0) {
                                                        $row4 = mysqli_fetch_assoc($getQueryData);
                                                        ?>
                                                        <td><label for="PRN">PRN</label></td>
                                                        <td>
                                                            <?php echo $row4['PRN']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="query">Query</label></td>
                                                        <td>
                                                            <?php echo $row4['query']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="response">Response</label></td>
                                                        <td><input type="text" id="response" name="response"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="date">Date</label></td>
                                                        <td>
                                                            <?php echo $row4['Date']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="time">Time</label></td>
                                                        <td>
                                                            <?php echo $row4['time']; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><br>
                                            <div class="button text-center">
                                                <button type="submit" name="submit" class="btn btn-success btn-icon-split"
                                                    onclick="showAlert()">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span>
                                                </button><br><br>
                                                <a href="tmeeting_table.php" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <span class="text">Show All Queries</span></a></button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                                    }
                                                }
                                                ?>
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