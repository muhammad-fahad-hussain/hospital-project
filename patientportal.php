<?php
session_start();
$patient_no = $_SESSION['patient_no'];
include "connection.php";
// echo  $_SESSION['patient_no'];
$time = time();
if ($time > $_SESSION['end']) {
    session_unset();
    session_destroy();
    header("Location: signinpatient.php");
    $_SESSION['signin'] = "Your are session is expire";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="CSS/patientportal.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <title>Patient Portal</title>
    <style>
        @media screen and (max-width:991px){
            .nav-btn{
                margin-top: 10px !important;
            }
        }
    </style>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <h3 class="mt-5 text-center text-white"><?php echo $_SESSION['patient_name'] ?></h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <div class="d-flex ms-auto  nav-btn">
                    <!-- use css nav-btn -->
                    <a href="" class="btn btn-primary">Make Appointment</a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown d-flex mx-2 my-2">
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="height: 40px; width: 40px;">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profill</a></li>
                            <li><a class="dropdown-item" href="#">Update Profill</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" id="sidebar">
        <div class="offcanvas-body ">
            <nav class="navbar-dark">
                

                <!-- using php for show the name -->
                <?php
                
                // $name="SELECT name FROM patient WHERE patient_no=$patient_no";
            
                // $patient_no;
                // $sql = "SELECT * FROM  patient as d  WHERE patient_no = '$patient_no'";
                // $result = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($result); ?>
                 <h3 class="mt-5 text-center text-white"><?php echo $_SESSION['patient_name'] ?></h3>
                
               
                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav">
                    <li>
                        <a href="patientportal.php" class="nav-link px-3 active mt-5">
                            <i class="fas fa-tachometer-alt-average"></i>
                            <span class="mx-1">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-3">
                            <i class="far fa-edit"></i>
                            <span class="mx-1">Edit Profill</span>
                        </a>
                    </li>
                    <li>
                        <a href="/patientportaldoctor.html" class="nav-link px-3">
                            <i class="far fa-user-md"></i>
                            <span class="mx-2">Your Doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="patientportalappointment.php" class="nav-link px-3">
                            <i class="fal fa-calendar-check"></i>
                            <span class="mx-1">Make Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <i class="fas fa-envelope-square"></i>
                            <span class="mx-1">Report</span>
                        </a>
                    </li>

                    <!-- Horizantal line -->
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>

                    <li>
                        <a href="#" class="nav-link px-3">
                            <i class="fas fa-user-circle"></i>
                            <span class="mx-1">Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="AdminPortal/logout.php" class="nav-link px-3">
                            <i class="far fa-sign-out">
                                <span class="mx-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
    </div>


    <!-- 

        =====================================
                   Dashboard
        =====================================
     -->


     <main class="mt-5 pt-5 ">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Dashboard</h4>
                    </div>
                </div>
                <!-- Horizantal line -->

                <hr class="dropdown-divider bg-light my-4">
                <div class="row row-cols-1 row-cols-md-4 mx-4 g-0 ">
                    <div class="col px-2 mt-3">
                        <div class="card bg-success text-white" style="height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">

                                    <span class="mt-4">
                                        <i class="far fa-clock fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <h5>24/04/2023</h5>
                                        <p class="">9:00 AM</p>
                                    </span>
                                </h5>
                                <h5 class="card-text mt-5 font-weight-bold">Schedule An Appointment</h5>
                            </div>

                        </div>
                    </div>
                    <div class="col px-2 mt-3">
                        <div class="card bg-warning text-light" style=" height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">

                                    <span class="mt-4">
                                        <i class="fas fa-calendar-alt fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <h5>19/04/2023</h5>
                                        <p class="">9:00 AM</p>
                                    </span>
                                </h5>
                                <h5 class="card-text mt-5 font-weight-bold">Appointment Check-in</h5>
                            </div>

                        </div>
                    </div>
                    <div class="col px-2 mt-3">
                        <div class="card bg-primary text-white" style="height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">
                                    <span class="mt-4">
                                        <i class="fal fa-user-md fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class="display-3 ms-auto">1</span>
                                </h5>
                                <h5 class="card-text mt-4 font-weight-bold">List Of Doctor</h5>
                            </div>
                            <div class="card-footer">
                                <a href="/patientportaldoctor.html" class="text-decoration-none text-white"> View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col px-2 mt-3">
                        <div class="card bg-danger text-white" style=" height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">

                                    <span class="mt-4">
                                        <i class="fal fa-file-chart-line fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class="display-3 ms-auto">1</span>
                                </h5>
                                <h5 class="card-text mt-4 font-weight-bold">Reports</h5>
                            </div>
                            <div class="card-footer">
                                View Details
                            </div>
                        </div>
                    </div>
                    <div class="col px-2 mt-3">
                        <div class="card bg-secondary text-white" style="height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">

                                    <span class="mt-4">
                                        <i class="fas fa-money-check fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class="ms-auto">RS: 1</span>
                                </h5>
                                <h5 class="card-text mt-5 font-weight-bold">View Charges</h5>
                            </div>
                            <div class="card-footer">
                                <a href="" class="text-decoration-none text-white"> View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col px-2 mt-3">
                        <div class="card bg-info text-white" style="height: 12rem;">
                            <div class="card-body ">
                                <h5 class="card-title d-flex">

                                    <span class="mt-4">
                                        <i class="far fa-tty fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class="display-3 ms-auto"></span>
                                </h5>
                                <h5 class="card-text mt-5 font-weight-bold">Contact Us</h5>
                            </div>
                            <div class="card-footer">
                                View Details
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>
</body>

</html>