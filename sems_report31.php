<?php
include('config.php');
error_reporting(0);
if (!isset($_SESSION['loginid'])) {
  header('location:tlogin.php');
}
$TID = $_SESSION['loginid'];
$getData1 = mysqli_query($conn, "select * from `teachinfo` where `tid`='$TID'");
$row1 = mysqli_fetch_assoc($getData1);

if (isset($_POST['sprn'])) {
  $PRN = $_POST['sprn'];
  $getData3 = mysqli_query($conn, "SELECT * FROM `pinfo`
  JOIN `skills` ON `pinfo`.`PRN` = `skills`.`PRN`
  JOIN `ginfo` ON `pinfo`.`PRN` = `ginfo`.`PRN`
  JOIN `studinfo` ON `pinfo`.`PRN` = `studinfo`.`PRN`
  WHERE `pinfo`.`PRN`='$PRN'");

  $row3 = mysqli_fetch_assoc($getData3);
  $getData4 = mysqli_query($conn, "select * from `academic31` where `PRN`='$PRN'");
  $row4 = mysqli_fetch_assoc($getData4);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
    .card-container {
  max-width: 450px; /* change the value as per your requirement */
  margin: 0 auto; /* center align the card horizontally */
}

    .card-image img{
  width: 100%;
  height: 200px;
  opacity: 50%;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  object-fit: cover;
}

.profile-image img{
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

.profile-image img:hover{
  transform: scale(1.1);
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="tdashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mentoring System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tdashboard.php">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tprofiles.php">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Profile</span></a>
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
                    <span>Semester Report</span>
                </a>
                <div id="collapseAcademic" class="collapse" aria-labelledby="headingAcademic" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Academic Year:</h6>
                        <a class="nav-link collapsed" href="#first-year" data-toggle="collapse" data-target="#collapseFirstYear" aria-expanded="false" aria-controls="collapseFirstYear" style="color:black; ">First Year</a>
                        <div id="collapseFirstYear" class="collapse" aria-labelledby="headingFirstYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="sems_report11.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="sems_report12.php" style="background-color:black; color: white;">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#second-year" data-toggle="collapse" data-target="#collapseSecondYear" aria-expanded="false" aria-controls="collapseSecondYear" style="color:black; ">Second Year</a>
                        <div id="collapseSecondYear" class="collapse" aria-labelledby="headingSecondYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="sems_report21.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="sems_report22.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#third-year" data-toggle="collapse" data-target="#collapseThirdYear" aria-expanded="false" aria-controls="collapseThirdYear" style="color:black; ">Third Year</a>
                        <div id="collapseThirdYear" class="collapse" aria-labelledby="headingThirdYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="sems_report31.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="sems_report32.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                        <a class="nav-link collapsed" href="#fourth-year" data-toggle="collapse" data-target="#collapseFourthYear" aria-expanded="false" aria-controls="collapseFourthYear" style="color:black; ">Fourth Year</a>
                        <div id="collapseFourthYear" class="collapse" aria-labelledby="headingFourthYear" data-parent="#collapseAcademic">
                            <a class="collapse-item" href="sems_report41.php" style="background-color:black; color: white; margin-bottom: 10px;">First Sem</a>
                            <a class="collapse-item" href="sems_report42.php" style="background-color:black; color: white">Second Sem</a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="tmeeting_table.php">
                    <i class="far fa-calendar-alt"></i>
                    <span>Meetings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tqueriess.php">
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
                    <ul class="navbar-nav ml-auto">
                        
                      
                    <li class="nav-item">
        <a class="nav-link text-dark" >Teacher Module</a>
    </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "TID: ", $row1['tid']; ?></span>
                                <img class="img-profile rounded-circle"
                                src="images/<?php echo $row1['img']; ?>">
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
                <!-- End of Topbar -->
                <div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive text-center">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tbody>
            <tr>
              <th><label for="year">Academic Record for the Year</label></th>
              <td><?php echo "Third Year"; ?></td>
              <th><label for="sem">SEM</label></th>
              <td><?php echo "First Semester"; ?></td>
            </tr>
          </tbody>
        </table> 
      </div> 
    </div> 
  </div> 

  <div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive text-center">
        <form method="post">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tbody>
            <tr>
              <th><label for="sprn">Select PRN</label></th>
              <td>
                <select name="sprn" title="Select your PRN">
                <?php
                // Retrieve assigned students using the teacher's tid
                $TID = $_SESSION['loginid'];
                $getAssignedStudents = mysqli_query($conn, "SELECT PRN, Name, Class FROM assign WHERE TID='$TID'");
                while ($row2 = mysqli_fetch_assoc($getAssignedStudents)) {
                  // Create an option for each assigned student
                  echo '<option value="' . $row2['PRN'] . '">' . $row2['Name'] . ' (' . $row2['PRN'] . ' - ' . $row2['Class'] . ')</option>';
                }
                ?>
                </select>
              </td>
              <td colspan="2">
              <button class="btn btn-success btn-icon-split" type="submit"><span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Submit</span></button>
              </td>
            </tr>
          </tbody>
        </table>
        </form>
        <?php
        if (isset($row3)) {
          ?>
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3" style="background-color: #4e73df;" data-toggle="collapse" href="#profileTable">
            <h6 class="m-0 font-weight-bold" style="color: #fff;">Profile</h6>
          </div>
          <div class="card-body collapse" id="profileTable">
            <div class="table-responsive text-center">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <th><label for="sname">Name</label></th>
                    <td><?php echo $row3['Name']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="sd">Department</label></th>
                    <td><?php echo $row3['Department']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="scl">Class</label></th>
                    <td><?php echo $row3['Class']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="sdiv">Division</label></th>
                    <td><?php echo $row3['Division']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="srn">Roll Number</label></th>
                    <td><?php echo $row3['Roll_Number']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="smob">Mobile Number</label></th>
                    <td><?php echo $row3['Mobile_Number']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="samob">Alternative Mobile Number</label></th>
                    <td><?php echo $row3['Alt_Mobile_Number']; ?></td>
                  </tr>
                  <tr>
                    <th><label for="smail">Email</label></th>
                    <td><?php echo $row3['Email']; ?></td>
                  </tr>
                </tbody>
              </table> 
            </div> 
          </div> 
        </div> 
      </div>


      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3" style="background-color: #4e73df;" data-toggle="collapse" href="#personalInfoTable">
            <h6 class="m-0 font-weight-bold" style="color: #fff;">Personal Information</h6>
          </div>
          <div class="card-body collapse" id="personalInfoTable">
            <div class="table-responsive text-center">
              <table class="table table-bordered" id="personalInfoTable" width="100%" cellspacing="0">
                <tbody>
                <tr>
                      <th><label for="sname">Name of the Student </label></th>
                      <td><?php echo $row3['Name']; ?></td>
                      </tr>
                    
                      <tr>
                      <th><label for="sdob">Date of Birth </label></th>
                      <td><?php echo $row3['DOB']; ?></td>
                      </tr>
                    
                      <tr>
                      <th><label for="blood">Blood Group </label></th>
                      <td><?php echo $row3['Blood_Group']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="health">Any Health Issue </label></th>
                      <td><?php echo $row3['Health_Issue']; ?></td>
                      </tr>

                      <tr>
                       <th><label for="aq">Admission Quota</label></th>
                       <td><?php echo $row3['Add_Quota']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="smob">Mobile Number </label></th>
                      <td><?php echo $row3['Mobile_Number']; ?></td>
                      </tr>

                      <tr>
                       <th><label for="samob">Alt Mobile Number</label></th>
                       <td ><?php echo $row3['Alt_Mobile_Number']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="semail">Email id </label></th>
                      <td><?php echo $row3['Email']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Address Details</h4> </th>
  </tr>


                      <tr>
                      <th><label for="padd">Permanent Address </label></th>
                      <td><?php echo $row3['P_Address']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="cadd">Communication Address </label></th>
                      <td><?php echo $row3['C_Address']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Father Information</h4> </th>
  </tr>

                      <tr>
                      <th><label for="fname">Name of Father </label></th>
                      <td><?php echo $row3['F_Name']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="focc">Occupation </label></th>
                      <td><?php echo $row3['F_Occup']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="fdes">Designation </label></th>
                      <td><?php echo $row3['F_Des']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="forg">Organization </label></th>
                      <td><?php echo $row3['F_Org']; ?></td>
                      </tr>
 
                      <tr>
                      <th><label for="femail">Email id </label></th>
                      <td><?php echo $row3['F_Email']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Mother Information</h4> </th>
  </tr>

                      <tr>
                      <th><label for="mname">Name of Mother </label></th>
                      <td><?php echo $row3['M_Name']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="mocc">Occupation </label></th>
                      <td><?php echo $row3['M_Occup']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="mdes">Designation </label></th>
                      <td><?php echo $row3['M_Des']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="morg">Organization </label></th>
                      <td><?php echo $row3['M_Org']; ?></td>
                      </tr>
 
                      <tr>
                      <th><label for="memail">Email id </label></th>
                      <td><?php echo $row3['M_Email']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Sibling 1 Information</h4> </th>
  </tr>

                      <tr>
                      <th><label for="s1name">Name of Sibling 1 </label></th>
                      <td><?php echo $row3['Sib1_Name']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s1qual">Qualification </label></th>
                      <td><?php echo $row3['Sib1_Qual']; ?></td>
                      </tr>
                    
                      <tr>
                      <th><label for="s1occ">Occupation </label></th>
                      <td><?php echo $row3['Sib1_Occ']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s1org">Organization </label></th>
                      <td><?php echo $row3['Sib1_Org']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s1des">Designation </label></th>
                      <td><?php echo $row3['Sib1_Des']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="s1email">Email id </label></th>
                      <td><?php echo $row3['Sib1_Email']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="s1mob">Mobile Number </label></th>
                      <td><?php echo $row3['Sib1_Mob']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Sibling 2 Information</h4> </th>
  </tr>

                      <tr>
                      <th><label for="s2name">Name of Sibling 2 </label></th>
                      <td><?php echo $row3['Sib2_Name']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s2qual">Qualification </label></th>
                      <td><?php echo $row3['Sib2_Qual']; ?></td>
                      </tr>
                    
                      <tr>
                      <th><label for="s2occ">Occupation </label></th>
                      <td><?php echo $row3['Sib2_Occ']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s2org">Organization </label></th>
                      <td><?php echo $row3['Sib2_Org']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="s2des">Designation </label></th>
                      <td><?php echo $row3['Sib2_Des']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="s2email">Email id </label></th>
                      <td><?php echo $row3['Sib2_Email']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="s2mob">Mobile Number </label></th>
                      <td><?php echo $row3['Sib2_Mob']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" style="font-weight: bold;"><h4>Guardian Information</h4></th>
  </tr>

                    
                      <tr>
                      <th><label for="gname">Name of local guradian (if any) </label></th>
                      <td><?php echo $row3['G_Name']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="gqual">Qualification </label></th>
                      <td><?php echo $row3['G_Qual']; ?></td>
                      </tr>
                    
                      <tr>
                      <th><label for="gocc">Occupation </label></th>
                      <td><?php echo $row3['G_Occ']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="gorg">Organization </label></th>
                      <td><?php echo $row3['G_Org']; ?></td>
                      </tr>

                      <tr>
                      <th><label for="gdes">Designation </label></th>
                      <td><?php echo $row3['G_Des']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="gemail">Email id </label></th>
                      <td><?php echo $row3['G_Email']; ?></td>
                      </tr>

                    
                      <tr>
                      <th><label for="gmob">Mobile Number </label></th>
                      <td><?php echo $row3['G_Mob']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>Contact in Case of Emergency</h4> </th>
  </tr>

                      <tr>
                      <th><label for="ename">Name </label></th>
                      <td><?php echo $row3['E_Name']; ?></td>
                  </tr>
                
                  <tr>
                      <th><label for="eadd">Address </label></th>
                      <td><?php echo $row3['E_Add']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="emob">Mobile Number </label></th>
                      <td><?php echo $row3['E_Mob']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="eamob">Alternative Mobile Number </label></th>
                      <td><?php echo $row3['EA_Mob']; ?></td>
                  </tr>

                  <tr height="20">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2"><h4>For Outstation Students</h4> </th>
  </tr>

                  <tr>
                      <th><label for="hname">Name of the Hostel </label></th>
                      <td><?php echo $row3['H_Name']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="rno">Room Number </label></th>
                      <td><?php echo $row3['R_No']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="doa">Date of Admission </label></th>
                      <td><?php echo $row3['DOA']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="hadd">Address </label></th>
                      <td><?php echo $row3['H_Add']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="wn">Name of Warden/Guadrian </label></th>
                      <td><?php echo $row3['W_Name']; ?></td>
                  </tr>

                  <tr>
                      <th><label for="hc">Contact Number </label></th>
                      <td><?php echo $row3['H_Con']; ?></td>
                  </tr>
                </tbody>
              </table> 
            </div> 
          </div> 
        </div> 
      </div>


      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3" style="background-color: #4e73df;" data-toggle="collapse" href="#generalInfoTable">
            <h6 class="m-0 font-weight-bold" style="color: #fff;">General Information </h6>
          </div>
          <div class="card-body collapse" id="generalInfoTable">
            <div class="table-responsive text-center">
              <table class="table table-bordered" id="generalInfoTable" width="100%" cellspacing="0">
                <tbody>
                <tr>
    <th colspan="4"><h4>Board Exams</h4> </th>
  </tr>
            <tr>
                      <th>Class</th>
                      <th>Board</th>
                      <th>Percentage Marks</th>
                      <th>Year of Passing</th>
                  </tr>

                  <tr>
                      <td><label for="ssc">S.S.C./10th </label></td>
                      <td><?php echo $row3['SSC_Board']; ?></td>
                      <td><?php echo $row3['SSC_Percent']; ?></td>
                      <td><?php echo $row3['SSC_YOP']; ?></td>
                  </tr>

                  <tr>
                      <td><label for="hsc">H.S.C./12th </label></td>
                      <td><?php echo $row3['HSC_Board']; ?></td>
                      <td><?php echo $row3['HSC_Percent']; ?></td>
                      <td><?php echo $row3['HSC_YOP']; ?></td>
                  </tr>

                  <tr>
                      <td><label for="dsy">Diploma </label></td>
                      <td><?php echo $row3['DSY_Board']; ?></td>
                      <td><?php echo $row3['DSY_Percent']; ?></td>
                      <td><?php echo $row3['DSY_YOP']; ?></td>
                  </tr>

                  <tr height="20">
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="4"><h4>Competetive Exam</h4> </th>
  </tr>

                  <tr>
                  <th>Name of Exams</th>
                  <th>Organised by</th>
                  <th>Grade/Marks</th>
                  <th>Year of Exam</th>
                 </tr>

                 <tr>
                  <td><label for="cet">CET </label></td>
                  <td><?php echo $row3['CET_Org']; ?></td>
                  <td><?php echo $row3['CET_Grade']; ?></td>
                  <td><?php echo $row3['CET_YOE']; ?></td>
                  </tr>

                  <tr>
                  <td><label for="jeem">JEE MAINS </label></td>
                  <td><?php echo $row3['JEEM_Org']; ?></td>
                  <td><?php echo $row3['JEEM_Grade']; ?></td>
                  <td><?php echo $row3['JEEM_YOE']; ?></td>
                  </tr>

                  <tr>
                  <td><label for="jeea">JEE ADVANCE </label></td>
                  <td><?php echo $row3['JEEA_Org']; ?></td>   
                  <td><?php echo $row3['JEEA_Grade']; ?></td>
                  <td><?php echo $row3['JEEA_YOE']; ?></td>
                  </tr>

                  <tr>
                  <td><label for="nso">NSO </label></td>
                  <td><?php echo $row3['NSO_Org']; ?></td>
                  <td><?php echo $row3['NSO_Grade']; ?></td>
                  <td><?php echo $row3['NSO_YOE']; ?></td>
                  </tr>

                  <tr>
                  <td><label for="imo">IMO </label></td>
                  <td><?php echo $row3['IMO_Org']; ?></td>
                  <td><?php echo $row3['IMO_Grade']; ?></td>
                  <td><?php echo $row3['IMO_YOE']; ?></td>
                  </tr>

                  <tr height="20">
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="4"><h4>Any Other Exam</h4> </th>
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
    <th colspan="4"><h4>Activities</h4> </th>
  </tr>
                  <tr>
                          <td><label for="hobbies">Hobbies</label></td>
                          <td><?php echo $row3['Hobbies1']; ?></td>
                          <td><?php echo $row3['Hobbies2']; ?></td>
                          <td><?php echo $row3['Hobbies3']; ?></td>
                      </tr>

                      <tr>
                          <td><label for="Strength">Strength</label></td>
                          <td><?php echo $row3['Strength1']; ?></td>
                          <td><?php echo $row3['Strength2']; ?></td>
                          <td><?php echo $row3['Strength3']; ?></td>
                      </tr>

                      <tr>
                          <td><label for="Weakness">Weakness</label></td>
                          <td><?php echo $row3['Weakness1']; ?></td>
                          <td><?php echo $row3['Weakness2']; ?></td>
                          <td><?php echo $row3['Weakness3']; ?></td>
                      </tr>


                      <tr>
                          <td><label for="AOI">Area of Interest you would like to explore</label></td>
                          <td><?php echo $row3['AOI'] ?></textarea></td>
                      </tr>
                </tbody>
              </table> 
            </div> 
          </div> 
        </div> 
      </div>


      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3" style="background-color: #4e73df;" data-toggle="collapse" href="#skillAchievementTable">
            <h6 class="m-0 font-weight-bold" style="color: #fff;">Skill and Achievements</h6>
          </div>
          <div class="card-body collapse" id="skillAchievementTable">
            <div class="table-responsive text-center">
              <table class="table table-bordered" id="skillAchievementTable" width="100%" cellspacing="0">
                <tbody>
                <tr>
    <th colspan="1"><h4>Skills</h4> </th>
  </tr>
          <tr>
                          <td><?php echo $row3['Skill1']; ?></td>
                      </tr>
                      <tr>
                          <td><?php echo $row3['Skill2']; ?></td>
                      </tr>
                      <tr>
                          <td><?php echo $row3['Skill3']; ?></td>
                      </tr>
                      <tr>
                          <td><?php echo $row3['Skill4']; ?></td>
                      </tr>
                      <tr>
                          <td><?php echo $row3['Skill5']; ?></td>
                      </tr>

                      <tr height="20">
    <td colspan="1">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="1"><h4>Achievements</h4> </th>
  </tr>

                      <tr>
                          <td><?php echo $row3['Achievment1']; ?></td>
                          </tr>
                          <tr>
                              <td><?php echo $row3['Achievment2']; ?></td>
                          </tr>
                          <tr>
                              <td><?php echo $row3['Achievment3']; ?></td>
                          </tr>
                          <tr>
                              <td><?php echo $row3['Achievment4']; ?></td>
                          </tr>
                          <tr>
                              <td><?php echo $row3['Achievment5']; ?></td>
                          </tr>
                </tbody>
              </table> 
            </div> 
          </div> 
        </div> 
      </div>


      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3" style="background-color: #4e73df;" data-toggle="collapse" href="#academicRecord11Table">
            <h6 class="m-0 font-weight-bold" style="color: #fff;">Academic Record 31</h6>
          </div>
          <div class="card-body collapse" id="academicRecord11Table">
            <div class="table-responsive text-center">
              <table class="table table-bordered" id="academicRecord11Table" width="100%" cellspacing="0">
                <tbody>
                <tr height="20">
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="6"><h4>Academic Report (31)</h4> </th>
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
                              <th><?php echo $row4['Course1']; ?></th>
                              <td><?php echo $row4['ISE11']; ?></td>
                              <td><?php echo $row4['ISE12']; ?></td>
                              <td><?php echo $row4['MSE1']; ?></td>
                              <td><?php echo $row4['ESE1']; ?></td>
                              <td><?php echo $row4['MAKE1']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course2']; ?></th>
                              <td><?php echo $row4['ISE21']; ?></td>
                              <td><?php echo $row4['ISE22']; ?></td>
                              <td><?php echo $row4['MSE2']; ?></td>
                              <td><?php echo $row4['ESE2']; ?></td>
                              <td><?php echo $row4['MAKE2']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course3']; ?></th>
                              <td><?php echo $row4['ISE31']; ?></td>
                              <td><?php echo $row4['ISE32']; ?></td>
                              <td><?php echo $row4['MSE3']; ?></td>
                              <td><?php echo $row4['ESE3']; ?></td>
                              <td><?php echo $row4['MAKE3']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course4']; ?></th>
                              <td><?php echo $row4['ISE41']; ?></td>
                              <td><?php echo $row4['ISE42']; ?></td>
                              <td><?php echo $row4['MSE4']; ?></td>
                              <td><?php echo $row4['ESE4']; ?></td>
                              <td><?php echo $row4['MAKE4']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course5']; ?></th>
                              <td><?php echo $row4['ISE51']; ?></td>
                              <td><?php echo $row4['ISE52']; ?></td>
                              <td><?php echo $row4['MSE5']; ?></td>
                              <td><?php echo $row4['ESE5']; ?></td>
                              <td><?php echo $row4['MAKE5']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course6']; ?></th>
                              <td><?php echo $row4['ISE61']; ?></td>
                              <td><?php echo $row4['ISE62']; ?></td>
                              <td><?php echo $row4['MSE6']; ?></td>
                              <td><?php echo $row4['ESE6']; ?></td>
                              <td><?php echo $row4['MAKE6']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course7']; ?></th>
                              <td><?php echo $row4['ISE71']; ?></td>
                              <td><?php echo $row4['ISE72']; ?></td>
                              <td><?php echo $row4['MSE7']; ?></td>
                              <td><?php echo $row4['ESE7']; ?></td>
                              <td><?php echo $row4['MAKE7']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course8']; ?></th>
                              <td><?php echo $row4['ISE81']; ?></td>
                              <td><?php echo $row4['ISE82']; ?></td>
                              <td><?php echo $row4['MSE8']; ?></td>
                              <td><?php echo $row4['ESE8']; ?></td>
                              <td><?php echo $row4['MAKE8']; ?></td>
                          </tr>
                          <tr>
                              <th><?php echo $row4['Course9']; ?></th>
                              <td><?php echo $row4['ISE91']; ?></td>
                              <td><?php echo $row4['ISE92']; ?></td>
                              <td><?php echo $row4['MSE9']; ?></td>
                              <td><?php echo $row4['ESE9']; ?></td>
                              <td><?php echo $row4['MAKE9']; ?></td>
                          </tr>

                              <tr height="20">
    <td colspan="6">&nbsp;</td>
  </tr>

  <tr>
                              <th><label for="sgpi">SGPI</label></th>
                              <td><?php echo $row4['sgpi']; ?></td>
                              <th><label for="cgpi">CGPA</label></th>
                              <td><?php echo $row4['cgpi']; ?></td>
                              <th><label for="grade">Grade</label></th>
                              <td><?php echo $row4['grade']; ?></td>
                          </tr>
                </tbody>
              </table> 
            </div> 
          </div> 
        </div> 
      </div>




    <div class="card shadow mb-4">
      <div class="card-header py-3" style="background-color: #4e73df;">
        <h6 class="m-0 font-weight-bold" style="color: #fff;">Generated Report (Third Year - First Semester)</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive text-center">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <?php
          if (isset($_POST['sprn'])) {
            $selectedPRN = $_POST['sprn'];
            echo '<p>Selected PRN: ' . $selectedPRN . '</p>';
          }
          $getData = mysqli_query($conn, "select * from `semrepo31` where `PRN`='$selectedPRN'");
          $row = mysqli_fetch_assoc($getData);
          ?>
            <tbody>
              <tr>
                <th>Sr.No</th>
                <th>Details</th>
                <th>Remarks</th>
              </tr>
      <tr>
          <td>1</td>
          <td>ISE I/II MSE/ ESE</td>
          <td><label for="review31"></label><?php echo $row['Review']; ?></td>
      </tr>
      <tr>
          <td>2</td>
          <td>Students attendance and his/her regularity</td>
          <td><label for="attendance31"><?php echo $row['Attendance']; ?> </td>
      </tr>
      <tr>
          <td>3</td>
          <td>Semester Result of the Earlier Semester</td>
          <td><label for="result31"></label><?php echo $row['Result']; ?></td>
      </tr>
      <tr>
          <td>4</td>
          <td>Participation in various activities(Technical/Sports/Cultural/Co-carricular)</td>
          <td><label for="carricular31"></label><?php echo $row['Carricular']; ?> </td>
      </tr>
      <tr>
          <td>5</td>
          <td>Communication and Professional Skills</td>
          <td><label for="candp31"></label> <?php echo $row['CandP_Skills']; ?> </td>
      </tr>
      <tr>
          <td>6</td>
          <td>General Behaviour and Discipline</td>
          <td><label for="behaviour31"></label> <?php echo $row['Behaviour']; ?></td>
      </tr>
      <tr>
          <td>7</td>
          <td>Any Other Specify</td>
          <td><label for="other31"></label> <?php echo $row['Other']; ?></td>
      </tr>
            </tbody>
          </table><br>
          <a href="sems_report31_PDF.php?sprn=<?php echo $selectedPRN; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                  class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                      </div>
                      <br>
          <div class="button text-center">
                      <a href="sem_report31.php?sprn=<?php echo $selectedPRN; ?>" class="btn btn-primary btn-icon-split">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-edit"></i>
                                          </span>
                                          <span class="text">Edit Semester Report</span>
                                      </a>
                                      </div>
        </div>
      </div>
    </div>
  </div>
                  <!-- Begin Page Content -->
           
              <!-- End of Main Content -->

            
          </div>
          <!-- End of Content Wrapper -->

      </div>
      <?php
        }
        ?>
    <!-- End of Page Wrapper -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>2023 &copy; Student Mentoring</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

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