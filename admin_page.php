<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
//header("location: http://".$_SERVER['HTTP_HOST']."localhost:8080/Sainacalldrivers/v1/admin_page.php");

// if(isset($_SESSION['user_id']))
// {
echo '<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Saina Call Drivers</title>
    <meta name="description" content="SainaCallDrivers-Details">
    <meta name="keywords" content="SainaCallDrivers descriptions">
    <meta name="author" content="SainaCallDrivers-email">
    <!-- Brand Image -->

    <!-- Favicons -->
    <link href="img/sainaLogo.jpg" rel="icon">
    <!-- Brand Image -->
    <!-- <link rel="icon" href="img/logo.png"> -->
    <!-- Bootstrap and core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
    <!--  My Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3>Saina Call Drivers</h3>
                <strong>SCD</strong>
            </div>
            <!-- sidebar links -->
            <ul class="list-unstyled components">

                <li class="active" data-toggle="tooltip" data-placement="right" title="Admin Portal">
                    <a href="#content-container" id="adminTab">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <span class="menu-title">Admin Portal</span>
                    </a>
                </li>
                <li data-toggle="tooltip" data-placement="right" title="Add Drivers">
                    <a href="#content-container" id="addDriverTab">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                        <span class="menu-title">Add Drivers</span>
                    </a>
                </li>
                <li data-toggle="tooltip" data-placement="right" title="View Drivers">
                    <a href="#content-container" id="viewDriverTab">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span class="menu-title">View Drivers</span>
                    </a>
                </li>

                <li data-toggle="tooltip" data-placement="right" title="Logout">
                    <a href="logout.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="content-container" style="width:100%">
            <div class="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand page-scroll pull-right" style="margin-left:20px;">
                                Admin Portal
                            </a>
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn m-r-20">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>

                    </div>
                </nav>
                <div id="adminContent" class="container-fluid admincls">
                    <div class="row">

                        <div class="col-xs-12">
                            <div class="admin-card">

                                <div class="table-responsive">

                                    <table id="example" class="table table-striped display " cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th style="width:15%;">Customer Name</th>
                                                <th style="width:10%;">Contact Number</th>
                                                <th style="width:10%;">Email</th>
                                                <th style="width:15%;">Booking Date</th>
                                                <th style="width:25%;">Address</th>
                                                <th style="width:25%;">Destination Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>'; include_once 'db.php'; $sql = "SELECT customer_name,location,primary_contact_no,email_id,created_date,date,address,destination_address
                                            FROM customer_details "; $result=""; $result = $mysqli->query($sql); $row=mysqli_fetch_array($result);
                                            foreach ($result as $data) // using foreach to display each element of array
                                            { echo "
                                            <tr id='tr1'>
                                                <td style='width:15%;'>" . $data['customer_name'] . "</td>
                                                <td style='width:10%;'>" . $data['primary_contact_no'] . "</td>
                                                <td style='width:10%;'>" . $data['email_id'] . "</td>
                                                <td style='width:15%;'>" . $data['date'] . "</td>
                                                <td style='width:25%;'>" . $data['address'] . "</td>
                                                <td style='width:25%;'>" . $data['destination_address'] . "</td>
                                            </tr>"; }; echo '</tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>

                    <br/>


                    <div class="line"></div>
                </div>
                <div  id="viewDriver" class="container-fluid viewDrivercls">
                    <div class="row">

                        <div class="col-xs-12">
                            <div class="admin-card">
                                <div class="card-title">
                                    <h4 style="text-align: center;">
                                         Drivers Details
                                    </h4>
                                        
                                </div>
                                <hr>

                                <div class="table-responsive">

                                    <table id="example1" class="table table-striped display " cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th style="width:5%;">Name</th>
                                                <th style="width:20%;">Contact</th>
                                              
                                                <th style="width:10%;">Email</th>
                                                <th style="width:15%;">Aadhar No</th>
                                                <th style="width:15%;">Driving Licence No</th>
                                                <th style="width:35%;">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>'; include_once 'db.php'; $sql = "SELECT name,primary_contact_no,secondary_contact_no,email_id,aadhar_no,driver_license_no,address
                                            FROM driver_details ";
                                             $result="";
                                              $result = $mysqli->query($sql);
                                               $row=mysqli_fetch_array($result);
                                            foreach ($result as $data) // using foreach to display each element of array
                                            { echo "
                                            <tr id='tr1'>
                                                <td style='width:5%;'>" . $data['name'] . "</td>
                                                <td style='width:10%;'>" . $data['primary_contact_no'] . "</td>
                                                
                                                <td style='width:10%;'>" . $data['email_id'] . "</td>
                                                <td style='width:15%;'>" . $data['aadhar_no'] . "</td>
                                                <td style='width:15%;'>" . $data['driver_license_no'] . "</td>
                                                <td style='width:35%;'>" . $data['address'] . "</td>
                                            </tr>"; }; echo '</tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>

                    <br/>


                    <div class="line"></div>
                </div>
                <div id="addDriver" class="container-fluid addDrivercls">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="admin-card">
                                    <div class="card-title">
                                        <h4 style="text-align: center;">
                                            Add Driver
                                        </h4>
                                        
                                    </div><hr>
                                    <div>
                                    <p class="statusMsg"></p>
                                        <form class="form-horizontal" id="register_driver_form" method="POST" action="driver_register.php" enctype="multipart/form-data" autocomplete="off">
                                            <div class="form-group">
                                                <label for="Name" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DriverName" id="Name" placeholder="Enter driver Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Primary contactNo" class="col-sm-2 control-label">Primary Contact No</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control input-sm" name="DriverpriContact" id="primcontactNo" placeholder="Enter your Primary Contact Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Secondary contactNo" class="col-sm-2 control-label">Secondary Contact No</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control input-sm" name="DriverSecContact" id="seccontactNo" placeholder="Enter your Secondary Contact Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                <textarea type="text" class="form-control input-sm" name="DriverAddress" id="address" rows="3" placeholder="Enter your Address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control input-sm" name="DriverEmail" id="email" placeholder="Enter your Email ID">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="aadharNo" class="col-sm-2 control-label">Aadhar No</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control input-sm" name="DriverAadharNo" id="aadharNo" placeholder="Enter your Aadhar Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-2 control-label">Upload Aadhar photo</label>
                                                <div class="col-sm-10">
                                                <input type="file" name="aadharpic" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="licenseNo" class="col-sm-2 control-label">Driving License No</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control input-sm" name="DriverLicenseNo"  id="licenseNo" placeholder="Enter your Driving  Number" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-2 control-label">Upload Driving License photo</label>
                                                <div class="col-sm-10">
                                                 <input type="file" id="licensepic" name="licensepic" accept="image/*">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                <button id="btnSubmit" type="submit" class="btn btn-info btn-width btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>    

            </div>


        </div><br>

</div>


    <div id="footer" class="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;">
        <div class="container-fluid">
            <div class="row wow fadeInUp" data-wow-delay="200ms">
                <div class="col-xs-6 col-sm-4">
                    <p>
                        <b>©</b> 2018 Saina Call Drivers. All rights reserved.</p>
                </div>
                <div class="col-xs-6 col-sm-4 text-center">
                    <ul class="social-section">
                        <li class="facebook">
                            <a href="https://www.facebook.com" title="Facebook">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="https://www.linkedin.com" title="Linkedin">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 text-right credits">
                    <a href="#">
                        <!-- <span>Crafted with <i class="fa fa-heart"></i> by Abhinav</span> -->
                    </a>
                </div>
            </div>
        </div>
    </div>



    <input type="hidden" id="hdntr" />

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script> -->

    <!-- Datatable scripts -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

    <!-- 3rd Party JSs -->
    <script src="js/wow.min.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/driver_register.js"></script>
    <!-- Our own Js Files -->

</body>

</html>';
// exit;
// }
// else
// {
//     echo '<script type="text/javascript">';
//     echo 'window.location.href = "http://www.sainacalldrivers.com/login.php";';
//     echo '</script>';
//     $message = "Please login to see the requests";
// }
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>
