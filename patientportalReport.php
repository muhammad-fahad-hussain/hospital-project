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

<body style=" background-color: aliceblue;">
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
                        <h4>Report</h4>
                    </div>
                </div>
                <!-- Horizantal line -->

                <hr class="dropdown-divider bg-light my-4">
                <div class="mx-4">
                    <div class="row row-cols-1 row-cols-md-2 g-2 mb-3">

                        <?php
                        $qu = "SELECT c.checkup_id, report.diseases, p.patient_name, report.report_no, c.date,
            d.name as doctor_name, report.appointmentNo, aTime.time, a.appointment_date, 
            TIMESTAMPDIFF(YEAR, P.dob, CURDATE()) AS Age, report.report_text
            FROM patient AS p
            INNER JOIN checkup AS c ON c.patient_id = p.patient_no
            INNER JOIN report_patient AS report ON c.checkup_id = report.checkup_id
            INNER JOIN doctor AS d ON d.doctor_id = c.doctor_id
            LEFT OUTER JOIN appointmentportal AS a ON a.appointmentNo = report.appointmentNo 
            LEFT OUTER JOIN appointmenttime AS aTime ON a.time_no = aTime.time_no
            WHERE p.patient_no = '$patient_no' 
            ORDER BY c.date DESC, a.appointment_date ASC";
                        $re = mysqli_query($conn, $qu);

                        foreach ($re as $rows) {
                            $medicine = "SELECT m.name FROM medicine AS m INNER JOIN report_patient AS r ON r.report_no = m.report_no WHERE m.report_no = " . $rows['report_no'];
                            $medicineR = mysqli_query($conn, $medicine);
                            echo '
                            <div class="col">
                                <div class="card">
                                    <div class="card-header display-6">Report No: <span>' . $rows['checkup_id'] . '</span></div>
                                    <div class="card-body p-5">
                                        <div class="row">
                                            <div class="col-sm-6 p">
                                                <h6><span>Doctor Name: </span><span class="text-muted">' . $rows['doctor_name'] . '</span></h6>
                                            </div>
                                            <div class="col-sm-6 p">
                                                <h6><span>Patient Name: </span><span class="text-muted">' . $rows['patient_name'] . '</span></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6><span>Date check-up: </span><span class="text-muted">' . $rows['date'] . '</span></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6><span class="">Patient Age: </span><span class="text-muted">' . $rows['Age'] . '</span></h6>
                                            </div>
                                        </div>
                                        <hr class="dropdown-divider bg-light my-3">
                                        <h5 class="font-weight-bold text-dark">Diseases: <span class="text-muted">' . $rows['diseases'] . '</span></h5>
                                        <h5>Report Text</h5>
                                        <p class="text-muted">' . $rows['report_text'] . '</p>
                                        <h5>Medicines:</h5>';
                            foreach ($medicineR as $medicineRow) {
                                echo '<p class="text-muted">' . $medicineRow['name'] . '</p>';
                            }
                            echo '<hr class="dropdown-divider bg-light my-3">
                                        <h4>Next Appointment</h4>
                                        <div class="d-flex justify-content-between justify-content-around">
                                            <h5>Date: <span class="text-muted">' . $rows['appointment_date'] . '</span></h5>
                                            <h5>Time: <span class="text-muted">' . $rows['time'] . '</span></h5>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            
                            ';

                        }
                        ?>

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