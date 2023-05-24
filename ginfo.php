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

if (isset($_REQUEST['submit'])) {
    header('location:ginfos.php');
    $SSC_Board = $_POST['sscboard'];
    $SSC_Percent = $_POST['sscpercent'];
    $SSC_YOP = $_POST['sscyop'];
    $HSC_Board = $_POST['hscboard'];
    $HSC_Percent = $_POST['hscpercent'];
    $HSC_YOP = $_POST['hscyop'];
    $DSY_Board = $_POST['dsyboard'];
    $DSY_Percent = $_POST['dsypercent'];
    $DSY_YOP = $_POST['dsyyop'];
    $CET_Org = $_POST['cetorg'];
    $CET_Grade = $_POST['cetgrade'];
    $CET_YOE = $_POST['cetyoe'];
    $JEEM_Org = $_POST['jeemorg'];
    $JEEM_Grade = $_POST['jeemgrade'];
    $JEEM_YOE = $_POST['jeemyoe'];
    $JEEA_Org = $_POST['jeeaorg'];
    $JEEA_Grade = $_POST['jeeagrade'];
    $JEEA_YOE = $_POST['jeeayoe'];
    $NSO_Org = $_POST['nsoorg'];
    $NSO_Grade = $_POST['nsograde'];
    $NSO_YOE = $_POST['nsoyoe'];
    $IMO_Org = $_POST['imoorg'];
    $IMO_Grade = $_POST['imograde'];
    $IMO_YOE = $_POST['imoyoe'];
    $Strength1 = $_POST['strength1'];
    $Strength2 = $_POST['strength2'];
    $Strength3 = $_POST['strength3'];
    $Hobbies1 = $_POST['hobby1'];
    $Hobbies2 = $_POST['hobby2'];
    $Hobbies3 = $_POST['hobby3'];
    $Weakness1 = $_POST['weakness1'];
    $Weakness2 = $_POST['weakness2'];
    $Weakness3 = $_POST['weakness3'];
    $AOI = $_POST['aoi'];

    $query = mysqli_query($conn, "select * from `ginfo` where `PRN`='$PRN'");
    $rowCount = mysqli_num_rows($query);

    if ($rowCount != 0) {
        $query = mysqli_query($conn, "update `ginfo` set SSC_Board='$SSC_Board',SSC_Percent='$SSC_Percent',SSC_YOP='$SSC_YOP',HSC_Board='$HSC_Board',
        HSC_Percent='$HSC_Percent',HSC_YOP='$HSC_YOP',DSY_Board='$DSY_Board',DSY_Percent='$DSY_Percent',DSY_YOP='$DSY_YOP',CET_Org='$CET_Org',
        CET_Grade='$CET_Grade',CET_YOE='$CET_YOE',JEEM_Org='$JEEM_Org',JEEM_Grade='$JEEM_Grade',JEEM_YOE='$JEEM_YOE',JEEA_Org='$JEEA_Org',
        JEEA_Grade='$JEEA_Grade',JEEA_YOE='$JEEA_YOE',NSO_Org='$NSO_Org',NSO_Grade='$NSO_Grade',NSO_YOE='$NSO_YOE',IMO_Org='$IMO_Org',IMO_Grade='$IMO_Grade',IMO_YOE='$IMO_YOE'
        ,Strength1='$Strength1',Strength2='$Strength2',Strength3='$Strength3',Hobbies1='$Hobbies1',Hobbies2='$Hobbies2',Hobbies3='$Hobbies3',Weakness1='$Weakness1',
        Weakness2='$Weakness2',Weakness3='$Weakness3',AOI='$AOI' where PRN='$PRN' ");
        $_SESSION['successMsg'] = "General Information data saved successfully";
    } else {
        $query = mysqli_query($conn, "insert into `ginfo` (PRN,SSC_Board,SSC_Percent,SSC_YOP,HSC_Board,HSC_Percent,HSC_YOP,DSY_Board,DSY_Percent,DSY_YOP,CET_Org,CET_Grade,CET_YOE,JEEM_Org,JEEM_Grade,JEEM_YOE,JEEA_Org,JEEA_Grade,JEEA_YOE,NSO_Org,NSO_Grade,NSO_YOE,IMO_Org,IMO_Grade,IMO_YOE,Strength1,Strength2,Strength3,Hobbies1,Hobbies2,Hobbies3,Weakness1,Weakness2,Weakness3,AOI)
      values ('$PRN','$SSC_Board','$SSC_Percent','$SSC_YOP','$HSC_Board','$HSC_Percent','$HSC_YOP','$DSY_Board','$DSY_Percent','$DSY_YOP','$CET_Org','$CET_Grade','$CET_YOE','$JEEM_Org','$JEEM_Grade','$JEEM_YOE','$JEEA_Org','$JEEA_Grade','$JEEA_YOE','$NSO_Org','$NSO_Grade','$NSO_YOE','$IMO_Org','$IMO_Grade','$IMO_YOE','$Strength1','$Strength2','$Strength3','$Hobbies1','$Hobbies2','$Hobbies3','$Weakness1','$Weakness2','$Weakness1','$AOI')");
        $_SESSION['successMsg'] = "Data Inserted successfully";
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

    <title>Personal Information</title>

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
                            <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit General Information</h6>
                        </div>
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th colspan="4">
                                                    <h4>Previous Exam</h4>
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
                                                <td><input type="text" name="sscboard"
                                                        value="<?php echo $row2['SSC_Board']; ?>"></td>
                                                <td><input type="text" name="sscpercent"
                                                        value="<?php echo $row2['SSC_Percent']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="text" name="sscyop"
                                                        value="<?php echo $row2['SSC_YOP']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="hsc">H.S.C./12th </label></td>
                                                <td><input type="text" name="hscboard"
                                                        value="<?php echo $row2['HSC_Board']; ?>"></td>
                                                <td><input type="text" name="hscpercent"
                                                        value="<?php echo $row2['HSC_Percent']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="text" name="hscyop"
                                                        value="<?php echo $row2['HSC_YOP']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="dsy">Diploma </label></td>
                                                <td><input type="text" name="dsyboard"
                                                        value="<?php echo $row2['DSY_Board']; ?>"></td>
                                                <td><input type="text" name="dsypercent"
                                                        value="<?php echo $row2['DSY_Percent']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="text" name="dsyyop"
                                                        value="<?php echo $row2['DSY_YOP']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
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
                                                <td><input type="text" name="cetorg"
                                                        value="<?php echo $row2['CET_Org']; ?>"></td>
                                                <td><input type="number" name="cetgrade"
                                                        value="<?php echo $row2['CET_Grade']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="number" name="cetyoe"
                                                        value="<?php echo $row2['CET_YOE']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="jeem">JEE MAINS </label></td>
                                                <td><input type="text" name="jeemorg"
                                                        value="<?php echo $row2['JEEM_Org']; ?>"></td>
                                                <td><input type="number" name="jeemgrade"
                                                        value="<?php echo $row2['JEEM_Grade']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="number" name="jeemyoe"
                                                        value="<?php echo $row2['JEEM_YOE']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="jeea">JEE ADVANCE </label></td>
                                                <td><input type="text" name="jeeaorg"
                                                        value="<?php echo $row2['JEEA_Org']; ?>"></td>
                                                <td><input type="number" name="jeeagrade"
                                                        value="<?php echo $row2['JEEA_Grade']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="number" name="jeeayoe"
                                                        value="<?php echo $row2['JEEA_YOE']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="nso">NSO </label></td>
                                                <td><input type="text" name="nsoorg"
                                                        value="<?php echo $row2['NSO_Org']; ?>"></td>
                                                <td><input type="number" name="nsograde"
                                                        value="<?php echo $row2['NSO_Grade']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="number" name="nsoyoe"
                                                        value="<?php echo $row2['NSO_YOE']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="imo">IMO </label></td>
                                                <td><input type="text" name="imoorg"
                                                        value="<?php echo $row2['IMO_Org']; ?>"></td>
                                                <td><input type="number" name="imograde"
                                                        value="<?php echo $row2['IMO_Grade']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
                                                <td><input type="number" name="imoyoe"
                                                        value="<?php echo $row2['IMO_YOE']; ?>"
                                                        title="Enter in Proper Format" pattern="[0-9]+"></td>
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
                                                <th style="text-align: center;"><label for="strength">Strength </label>
                                                </th>
                                                <td><input type="text" name="strength1"
                                                        value="<?php echo $row2['Strength1']; ?>"></td>
                                                <td><input type="text" name="strength2"
                                                        value="<?php echo $row2['Strength2']; ?>"></td>
                                                <td><input type="text" name="strength3"
                                                        value="<?php echo $row2['Strength3']; ?>"></td>
                                            </tr>

                                            <tr>
                                                <th style="text-align: center;"><label for="hobbies">Hobbies </label>
                                                </th>
                                                <td><input type="text" name="hobby1"
                                                        value="<?php echo $row2['Hobbies1']; ?>"></td>
                                                <td><input type="text" name="hobby2"
                                                        value="<?php echo $row2['Hobbies2']; ?>"></td>
                                                <td><input type="text" name="hobby3"
                                                        value="<?php echo $row2['Hobbies3']; ?>"></td>
                                            </tr>


                                            <tr>
                                                <th style="text-align: center;"><label for="weakness">Weakness </label>
                                                </th>
                                                <td><input type="text" name="weakness1"
                                                        value="<?php echo $row2['Weakness1']; ?>"></td>
                                                <td><input type="text" name="weakness2"
                                                        value="<?php echo $row2['Weakness2']; ?>"></td>
                                                <td><input type="text" name="weakness3"
                                                        value="<?php echo $row2['Weakness3']; ?>"></td>
                                            </tr>


                                            <th>
                                            <td><label for="aoi">Area of Interest you would like to explore</label></td>
                                            <td><textarea name="aoi" id="AOI" cols="30" rows="10"
                                                    value="<?php echo $row2['AOI'] ?>"></textarea></td>
                                            </th>






                                        </tbody>
                                    </table><br>
                                    <div class="text-center">
                                        <div class="button text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                                <a href="ginfos.php" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Submit</span></a></button>
                                            <a href="ginfos.php" class="btn btn-primary btn-icon-split">
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