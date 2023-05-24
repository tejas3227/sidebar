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
                                    <?php echo "PRN: ", $row4['PRN']; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="images/<?php echo $row4['Img']; ?>">
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
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <?php
                                            if (isset($_GET['PRN'])) {
                                                $PRN = $_GET['PRN'];

                                                $query3 = mysqli_query($conn, "SELECT * FROM `queries` WHERE `PRN`='$PRN'");
                                                $rowCount3 = mysqli_num_rows($query3);

                                                if ($rowCount3 > 0) {
                                                    $row = mysqli_fetch_assoc($query3);
                                                    $PRN = $row['PRN'];
                                                    $TID = $row['TID'];
                                                    $query = $row['query'];
                                                    $response = $row['response'];
                                                    $Date = $row['Date'];
                                                    $time = $row['time'];
                                                    ?>

                                                    <tr>
                                                        <td><label for="PRN">PRN</label></td>
                                                        <td>
                                                            <?php echo $PRN; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="TID">Assigned Teacher ID</label></td>
                                                        <td>
                                                            <?php echo $TID; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="query">Query</label></td>
                                                        <td>
                                                            <?php echo $query; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="response">Response</label></td>
                                                        <td>
                                                            <?php echo $response; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="Date">Date</label></td>
                                                        <td>
                                                            <?php echo $Date; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="time">Time</label></td>
                                                        <td>
                                                            <?php echo $time; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    // Handle case when no rows are found
                                                }
                                            }
                                            ?>
                                        </tbody>


                                    </table>
                                    <br>
                                    <script>
                                        function showAlert() {
                                            alert("Query is sent to Teacher");
                                        }
                                    </script>
                                    <div class="button text-center">
                                        <a href="queries.php?PRN=<?php echo $PRN; ?>"
                                            class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-paper-plane"></i>
                                            </span>
                                            <span class="text">Send New Query </span>
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