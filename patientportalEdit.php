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
        @media screen and (max-width:991px) {
            .nav-btn {
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
            <h3 class="mt-3 text-center text-white">
                <?php echo $_SESSION['patient_name'] ?>
            </h3>
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
                <h3 class="mt-5 text-center text-white">
                    <?php echo $_SESSION['patient_name'] ?>
                </h3>


                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav">
                    <li>
                        <a href="patientportal.php" class="nav-link px-3 active mt-5">
                            <i class="fas fa-tachometer-alt-average"></i>
                            <span class="mx-1">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="patientportalEdit.php" class="nav-link px-3">
                            <i class="far fa-edit"></i>
                            <span class="mx-1">Edit Profill</span>
                        </a>
                    </li>
                    <li>
                        <a href="patientportaldoctor.php" class="nav-link px-3">
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
                        <a href="patientportalReport.php" class="nav-link px-3">
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
                        <a href="logout.php" class="nav-link px-3">
                            <i class="far fa-sign-out">
                                <span class="mx-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>


    <main class="mt-5 pt-5 ">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Update Account</h4>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
                <div class="col-lg-12 mt-5">
                    <form action="">
                        <div class="mt-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Contact</label>
                            <input type="tel" pattern="[0-9]{11}" name="" id="" class="form-control" placeholder="Enter Contact no">
                        </div>
                        <div class="mt-3">
                            <label for="" class="label-form" >Password</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="mt-3">
                            <label for="" class="label-form">Confirm Password</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Enter Confirm Password">
                        </div>
                        <input type="submit" class="btn btn-primary mt-4" name="" id="">
                    </form>
                </div>
            </div>
        </div>
    </main>


    <script src="./bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>
    <script src="./bootstrap-5.1.3-dist/js/jquery.dataTables.min.js"></script>
    <script src="./bootstrap-5.1.3-dist/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>