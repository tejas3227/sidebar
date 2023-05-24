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
  $PRN = $_SESSION['loginid'];
  $DOB = $_POST['sdob'];
  $Blood_Group = $_POST['blood'];
  $Health_Issue = $_POST['health'];
  $Add_Quota = $_POST['aq'];
  $Mobile_Number = $_REQUEST['smob'];
  $Alt_Mobile_Number = $_REQUEST['samob'];
  $Email = $_REQUEST['smail'];
  $P_Address = $_POST['padd'];
  $C_Address = $_POST['cadd'];
  $F_Name = $_POST['fname'];
  $F_Occup = $_POST['focc'];
  $F_Des = $_POST['fdes'];
  $F_Org = $_POST['forg'];
  $F_Email = $_POST['femail'];
  $M_Name = $_POST['mname'];
  $M_Occup = $_POST['mocc'];
  $M_Des = $_POST['mdes'];
  $M_Org = $_POST['morg'];
  $M_Email = $_POST['memail'];
  $Sib1_Name = $_POST['s1name'];
  $Sib1_Qual = $_POST['s1qual'];
  $Sib1_Occ = $_POST['s1occ'];
  $Sib1_Org = $_POST['s1org'];
  $Sib1_Des = $_POST['s1des'];
  $Sib1_Email = $_POST['s1email'];
  $Sib1_Mob = $_POST['s1mob'];
  $Sib2_Name = $_POST['s2name'];
  $Sib2_Qual = $_POST['s2qual'];
  $Sib2_Occ = $_POST['s2occ'];
  $Sib2_Org = $_POST['s2org'];
  $Sib2_Des = $_POST['s2des'];
  $Sib2_Email = $_POST['s2email'];
  $Sib2_Mob = $_POST['s2mob'];
  $G_Name = $_POST['gname'];
  $G_Qual = $_POST['gqual'];
  $G_Occ = $_POST['gocc'];
  $G_Org = $_POST['gorg'];
  $G_Des = $_POST['gdes'];
  $G_Email = $_POST['gemail'];
  $G_Mob = $_POST['gmob'];
  $E_Name = $_POST['ename'];
  $E_Add = $_POST['eadd'];
  $E_Mob = $_POST['emob'];
  $EA_Mob = $_POST['eamob'];
  $H_Name = $_POST['hname'];
  $R_No = $_POST['rno'];
  $DOA = $_POST['doa'];
  $H_Add = $_POST['hadd'];
  $W_Name = $_POST['wn'];
  $H_Con = $_POST['hc'];

  $query = mysqli_query($conn, "select * from `pinfo` where `PRN`='$PRN'");
  $rowCount = mysqli_num_rows($query);

  if ($rowCount != 0) {
    $query = mysqli_query($conn, "update `pinfo` set DOB='$DOB',Blood_Group='$Blood_Group',Health_Issue='$Health_Issue',
    Add_Quota='$Add_Quota',Mobile_Number='$Mobile_Number',Alt_Mobile_Number='$Alt_Mobile_Number',Email='$Email',P_Address='$P_Address',C_Address='$C_Address',
    F_Name='$F_Name',F_Occup='$F_Occup',F_Des='$F_Des',F_Org='$F_Org',F_Email='$F_Email',M_Name='$M_Name',
    M_Occup='$M_Occup',M_Des='$M_Des',M_Org='$M_Org',M_Email='$M_Email',Sib1_Name='$Sib1_Name',Sib1_Qual='$Sib1_Qual',Sib1_Occ='$Sib1_Occ',Sib1_Org='$Sib1_Org',
    Sib1_Des='$Sib1_Des',Sib1_Email='$Sib1_Email',Sib1_Mob='$Sib1_Mob',Sib2_Name='$Sib2_Name',Sib2_Qual='$Sib2_Qual',Sib2_Occ='$Sib2_Occ',Sib2_Org='$Sib2_Org',
    Sib2_Des='$Sib2_Des',Sib2_Email='$Sib2_Email',Sib2_Mob='$Sib2_Mob',G_Name='$G_Name',G_Qual='$G_Qual',G_Occ='$G_Occ',G_Org='$G_Org',
    G_Des='$G_Des',G_Email='$G_Email',G_Mob='$G_Mob',E_Name='$E_Name',E_Add='$E_Add',E_Mob='$E_Mob',EA_Mob='$EA_Mob',H_Name='$H_Name',
    R_No='$R_No',DOA='$DOA',H_Add='$H_Add',W_Name='$W_Name',H_Con='$H_Con' where PRN='$PRN'");
    $_SESSION['successMsg'] = "Personal Information Updated successfully";
    header('location:pinfos.php');
  } else {
    $query = mysqli_query($conn, "insert into `pinfo` (PRN,DOB,Blood_Group,Health_Issue,Add_Quota,Mobile_Number,Alt_Mobile_Number,Email,P_Address,C_Address,F_Name,F_Occup,F_Des,F_Org,F_Email,M_Name,M_Occup,M_Des,M_Org,M_Email,Sib1_Name,Sib1_Qual,Sib1_Occ,Sib1_Org,Sib1_Des,Sib1_Email,Sib1_Mob,Sib2_Name,Sib2_Qual,Sib2_Occ,Sib2_Org,Sib2_Des,Sib2_Email,Sib2_Mob,G_Name,G_Qual,G_Occ,G_Org,G_Des,G_Email,G_Mob,E_Name,E_Add,E_Mob,EA_Mob,H_Name,R_No,DOA,H_Add,W_Name,H_Con) 
   values ('$PRN','$DOB','$Blood_Group','$Health_Issue','$Add_Quota','$Mobile_Number','$Alt_Mobile_Number','$Email','$P_Address','$C_Address','$F_Name','$F_Occup','$F_Des','$F_Org','$F_Email','$M_Name','$M_Occup','$M_Des','$M_Org','$M_Email','$Sib1_Name','$Sib1_Qual','$Sib1_Occ','$Sib1_Org','$Sib1_Des','$Sib1_Email','$Sib1_Mob','$Sib2_Name','$Sib2_Qual','$Sib2_Occ','$Sib2_Org','$Sib2_Des','$Sib2_Email','$Sib2_Mob','$G_Name','$G_Qual','$G_Occ','$G_Org','$G_Des','$G_Email','$G_Mob','$E_Name','$E_Add','$E_Mob','$EA_Mob','$H_Name','$R_No','$DOA','$H_Add','$W_Name','$H_Con')");
    $_SESSION['successMsg'] = "Personal Information Data Inserted successfully";
    header('location:pinfos.php');
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo "PRN: ", $row['PRN']; ?>
                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

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
              <h6 class="m-0 font-weight-bold" style="color: #fff;">Edit Personal Information</h6>
            </div>
            <form action="#" method="post">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td><label for="sname">Name of the Student </label></td>
                        <td> <input type="text" name="sname" value="<?php echo $row['Name']; ?>" readonly
                            placeholder="Enter Your Name" title="Enter your Name"></td>
                      </tr>

                      <tr>
                        <td><label for="sdob">Date of Birth </label></td>
                        <td> <input type="date" name="sdob" value="<?php echo $row2['DOB']; ?>"
                            placeholder="Enter Your DOB" title="Enter your DOB"></td>
                      </tr>

                      <tr>
                        <td><label for="blood">Blood Group </label></td>
                        <td> <input type="text" name="blood" value="<?php echo $row2['Blood_Group']; ?>"
                            placeholder="Enter Your Blood Group" title="Enter Correct Blood Group" pattern="[ABO][+-]">
                        </td>
                      </tr>

                      <tr>
                        <td><label for="health">Any Health Issue </label></td>
                        <td> <input type="text" name="health" value="<?php echo $row2['Health_Issue']; ?>"
                            placeholder="Enter Health Issue" title="Enter Health Issue"></td>
                      </tr>

                      <tr>
                        <td><label for="aq">Admission Quota</label></td>
                        <td><select name="aq">
                            <option value="SC" <?php if ($row2['Add_Quota'] == 'SC')
                              echo 'selected'; ?>>SC</option>
                            <option value="ST" <?php if ($row2['Add_Quota'] == 'ST')
                              echo 'selected'; ?>>ST</option>
                            <option value="NT" <?php if ($row2['Add_Quota'] == 'NT')
                              echo 'selected'; ?>>NT</option>
                            <option value="VJA" <?php if ($row2['Add_Quota'] == 'VJA')
                              echo 'selected'; ?>>VJA</option>
                            <option value="OBC" <?php if ($row2['Add_Quota'] == 'OBC')
                              echo 'selected'; ?>>OBC</option>
                            <option value="OPEN" <?php if ($row2['Add_Quota'] == 'OPEN')
                              echo 'selected'; ?>>OPEN</option>
                          </select></td>
                      </tr>

                      <tr>
                        <td><label for="smob">Mobile Number </label></td>
                        <td> <input type="number" name="smob" readonly value="<?php echo $row2['Mobile_Number']; ?>"
                            placeholder="*Enter Number in Profile Page" title="Enter Mobile Number"></td>
                      </tr>

                      <tr>
                        <td><label for="samob">Alt Mobile Number</label></td>
                        <td><input type="text" name="samob" readonly value="<?php echo $row2['Alt_Mobile_Number']; ?>"
                            placeholder="*Enter Number in Profile Page" title="Enter 10 Mobile Number"></td>
                      </tr>

                      <tr>
                        <td><label for="smail">Email id </label></td>
                        <td> <input type="email" name="smail" readonly value="<?php echo $row2['Email']; ?>"
                            placeholder="*Enter email in Profile Page" title="Enter email id"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Address Details</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="padd">Permanent Address </label></td>
                        <td> <input type="text" name="padd" value="<?php echo $row2['P_Address']; ?>"
                            placeholder="Enter Permanent Address" title="Enter Permanent Address"></td>
                      </tr>

                      <tr>
                        <td><label for="cadd">Communication Address </label></td>
                        <td> <input type="text" name="cadd" value="<?php echo $row2['C_Address']; ?>"
                            placeholder="Enter Communication Address" title="Enter Communication Address"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Father Information</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="fname">Name of Father </label></td>
                        <td> <input type="text" name="fname" value="<?php echo $row2['F_Name']; ?>"
                            placeholder="Enter Father" title="Enter Father Name Correctly"></td>
                      </tr>

                      <tr>
                        <td><label for="focc">Occupation </label></td>
                        <td> <input type="text" name="focc" value="<?php echo $row2['F_Occup']; ?>"
                            placeholder="Enter Occupation" title="Enter Occupation"></td>
                      </tr>

                      <tr>
                        <td><label for="fdes">Designation </label></td>
                        <td> <input type="text" name="fdes" value="<?php echo $row2['F_Des']; ?>"
                            placeholder="Enter Designation" title="Enter Designation"></td>
                      </tr>

                      <tr>
                        <td><label for="forg">Organization </label></td>
                        <td> <input type="text" name="forg" value="<?php echo $row2['F_Org']; ?>"
                            placeholder="Enter Organization" title="Enter Organization"></td>
                      </tr>

                      <tr>
                        <td><label for="femail">Email id </label></td>
                        <td> <input type="email" name="femail" value="<?php echo $row2['F_Email']; ?>"
                            placeholder="Enter email id" title="Enter email id"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Mother Information</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="mname">Name of Mother </label></td>
                        <td> <input type="text" name="mname" value="<?php echo $row2['M_Name']; ?>"
                            placeholder="Enter Mother Name" title="Enter Mother Name Correctly"></td>
                      </tr>

                      <tr>
                        <td><label for="mocc">Occupation </label></td>
                        <td> <input type="text" name="mocc" value="<?php echo $row2['M_Occup']; ?>"
                            placeholder="Enter Occupation" title="Enter Occupation"></td>
                      </tr>

                      <tr>
                        <td><label for="mdes">Designation </label></td>
                        <td> <input type="text" name="mdes" value="<?php echo $row2['M_Des']; ?>"
                            placeholder="Enter Designation" title="Enter Designation"></td>
                      </tr>

                      <tr>
                        <td><label for="morg">Organization </label></td>
                        <td> <input type="text" name="morg" value="<?php echo $row2['M_Org']; ?>"
                            placeholder="Enter Organization" title="Enter Organization"></td>
                      </tr>

                      <tr>
                        <td><label for="memail">Email id </label></td>
                        <td> <input type="email" name="memail" value="<?php echo $row2['M_Email']; ?>"
                            placeholder="Enter email id" title="Enter email id"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Sibling 1 Information</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="s1name">Name of Sibling 1 </label></td>
                        <td> <input type="text" name="s1name" value="<?php echo $row2['Sib1_Name']; ?>"
                            placeholder="Enter Sibling 1 Name" title="Enter Sibling 1 Name"></td>
                      </tr>

                      <tr>
                        <td><label for="s1qual">Qualification </label></td>
                        <td> <input type="text" name="s1qual" value="<?php echo $row2['Sib1_Qual']; ?>"
                            placeholder="Enter Qualification" title="Enter Qualification"></td>
                      </tr>

                      <tr>
                        <td><label for="s1occ">Occupation </label></td>
                        <td> <input type="text" name="s1occ" value="<?php echo $row2['Sib1_Occ']; ?>"
                            placeholder="Enter Occupation" title="Enter Occupation"></td>
                      </tr>

                      <tr>
                        <td><label for="s1org">Organization </label></td>
                        <td> <input type="text" name="s1org" value="<?php echo $row2['Sib1_Org']; ?>"
                            placeholder="Enter Organization" title="Enter Organization"></td>
                      </tr>

                      <tr>
                        <td><label for="s1des">Designation </label></td>
                        <td> <input type="text" name="s1des" value="<?php echo $row2['Sib1_Des']; ?>"
                            placeholder="Enter Desigantion" title="Enter Designation"></td>
                      </tr>


                      <tr>
                        <td><label for="s1email">Email id </label></td>
                        <td> <input type="email" name="s1email" value="<?php echo $row2['Sib1_Email']; ?>"
                            placeholder="Enter email id" title="Enter email id"></td>
                      </tr>


                      <tr>
                        <td><label for="s1mob">Mobile Number </label></td>
                        <td> <input type="number" name="s1mob" value="<?php echo $row2['Sib1_Mob']; ?>"
                            placeholder="Enter Mobile Number" title="Enter Mobile Number" pattern="[0-9]{10}"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Sibling 2 Information</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="s2name">Name of Sibling 2 </label></td>
                        <td> <input type="text" name="s2name" value="<?php echo $row2['Sib2_Name']; ?>"
                            placeholder="Enter Sibling 2 Name" title="Enter Sibling 2 Name"></td>
                      </tr>

                      <tr>
                        <td><label for="s2qual">Qualification </label></td>
                        <td> <input type="text" name="s2qual" value="<?php echo $row2['Sib2_Qual']; ?>"
                            placeholder="Enter Qualification" title="Enter Qualification"></td>
                      </tr>

                      <tr>
                        <td><label for="s2occ">Occupation </label></td>
                        <td> <input type="text" name="s2occ" value="<?php echo $row2['Sib2_Occ']; ?>"
                            placeholder="Enter Occupation" title="Enter Occupation"></td>
                      </tr>

                      <tr>
                        <td><label for="s2org">Organization </label></td>
                        <td> <input type="text" name="s2org" value="<?php echo $row2['Sib2_Org']; ?>"
                            placeholder="Enter Organization" title="Enter Organization"></td>
                      </tr>

                      <tr>
                        <td><label for="s2des">Designation </label></td>
                        <td> <input type="text" name="s2des" value="<?php echo $row2['Sib2_Des']; ?>"
                            placeholder="Enter Desigantion" title="Enter Designation"></td>
                      </tr>


                      <tr>
                        <td><label for="s2email">Email id </label></td>
                        <td> <input type="email" name="s2email" value="<?php echo $row2['Sib2_Email']; ?>"
                            placeholder="Enter email id" title="Enter email id"></td>
                      </tr>


                      <tr>
                        <td><label for="s2mob">Mobile Number </label></td>
                        <td><input type="number" name="s2mob" value="<?php echo $row2['Sib2_Mob']; ?>"
                            placeholder="Enter Mobile Number" title="Enter Mobile Number"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2" style="font-weight: bold;">
                          <h4>Guardian Information</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="gname">Name of local guradian (if any) </label></td>
                        <td> <input type="text" name="gname" value="<?php echo $row2['G_Name']; ?>"
                            placeholder="Enter local guradian Name" title="Enter local guradian Name"></td>
                      </tr>

                      <tr>
                        <td><label for="gqual">Qualification </label></td>
                        <td> <input type="text" name="gqual" value="<?php echo $row2['G_Qual']; ?>"
                            placeholder="Enter Qualification" title="Enter Qualification"></td>
                      </tr>

                      <tr>
                        <td><label for="gocc">Occupation </label></td>
                        <td> <input type="text" name="gocc" value="<?php echo $row2['G_Occ']; ?>"
                            placeholder="Enter Occupation" title="Enter Occupation"></td>
                      </tr>

                      <tr>
                        <td><label for="gorg">Organization </label></td>
                        <td> <input type="text" name="gorg" value="<?php echo $row2['G_Org']; ?>"
                            placeholder="Enter Organization" title="Enter Organization"></td>
                      </tr>

                      <tr>
                        <td><label for="gdes">Designation </label></td>
                        <td> <input type="text" name="gdes" value="<?php echo $row2['G_Des']; ?>"
                            placeholder="Enter Desigantion" title="Enter Designation"></td>
                      </tr>


                      <tr>
                        <td><label for="gemail">Email id </label></td>
                        <td> <input type="email" name="gemail" value="<?php echo $row2['G_Email']; ?>"
                            placeholder="Enter email id" title="Enter email id"></td>
                      </tr>


                      <tr>
                        <td><label for="gmob">Mobile Number </label></td>
                        <td><input type="number" name="gmob" value="<?php echo $row2['G_Mob']; ?>"
                            placeholder="Enter Mobile Number" title="Enter Mobile Number" pattern="[0-9]{10}"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>Contact in Case of Emergency</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="ename">Name </label></td>
                        <td><input type="text" name="ename" value="<?php echo $row2['E_Name']; ?>"
                            placeholder="Enter Name" title="Enter Name"></td>
                      </tr>

                      <tr>
                        <td><label for="eadd">Address </label></td>
                        <td><input type="text" name="eadd" value="<?php echo $row2['E_Add']; ?>"
                            placeholder="Enter Address" title="Enter Address"></td>
                      </tr>

                      <tr>
                        <td><label for="emob">Mobile Number </label></td>
                        <td><input type="number" name="emob" value="<?php echo $row2['E_Mob']; ?>"
                            placeholder="Enter Mobile Number" title="Enter Mobile Number" pattern="[0-9]{10}"></td>
                      </tr>

                      <tr>
                        <td><label for="eamob">Alternative Mobile Number </label></td>
                        <td><input type="number" name="eamob" value="<?php echo $row2['EA_Mob']; ?>"
                            placeholder="Enter Alternative Mobile Number" title="Enter Alternative Mobile Number"
                            pattern="[0-9]{10}"></td>
                      </tr>

                      <tr height="20">
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <h4>For Outstation Students</h4>
                        </th>
                      </tr>

                      <tr>
                        <td><label for="hname">Name of the Hostel </label></td>
                        <td><input type="text" name="hname" value="<?php echo $row2['H_Name']; ?>"
                            placeholder="Name of the Hostel" title="Name of the Hostel"></td>
                      </tr>

                      <tr>
                        <td><label for="rno">Room Number </label></td>
                        <td><input type="number" name="rno" value="<?php echo $row2['R_No']; ?>"
                            placeholder="Room Number" title="Room Number"></td>
                      </tr>

                      <tr>
                        <td><label for="doa">Date of Admission </label></td>
                        <td><input type="date" name="doa" value="<?php echo $row2['DOA']; ?>"
                            placeholder="Date of Admission" title="Date of Admission"></td>
                      </tr>

                      <tr>
                        <td><label for="hadd">Address </label></td>
                        <td><input type="text" name="hadd" value="<?php echo $row2['H_Add']; ?>"
                            placeholder="Address of Hostel" title="Address of Hostel"></td>
                      </tr>

                      <tr>
                        <td><label for="wn">Name of Warden/Guadrian </label></td>
                        <td><input type="text" name="wn" value="<?php echo $row2['W_Name']; ?>"
                            placeholder="Name of Warden/Guadrian" title="Name of Warden/Guadrian">
                        </td>
                      </tr>

                      <tr>
                        <td><label for="hc">Contact Number </label></td>
                        <td><input type="number" name="hc" value="<?php echo $row2['H_Con']; ?>"
                            placeholder="Contact Number" title="Contact Number" pattern="[0-9]{10}"></td>
                      </tr>

                    </tbody>
                  </table><br>
                  <div class="text-center">
                    <div class="button text-center">
                      <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                        <a href="pinfos.php" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Submit</span></a></button>
                      <a href="pinfos.php" class="btn btn-primary btn-icon-split">
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