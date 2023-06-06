<?php
session_start();
$doctor_id = $_SESSION['doctor_id'];
include "connection.php";
$time = time();
if ($time > $_SESSION['expire']) {
    session_unset();
    session_destroy();
    header("Location: signinportal.php");
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
    <link rel="stylesheet" href="doctorPortal.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Admin Portal</title>
    <style>
        .navbar {
            display: none;
        }

        @media screen and (max-width:774px) {
            .navbar {
                display: block;
            }

            .main {
                margin-top: 5rem !important;
            }
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>

        </div>
    </nav>
    <!-- top navigation bar -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-white" id="sidebar">
        <div class="offcanvas-body px-0">
            <nav class="navbar-dark">
                <!-- Admin profill -->
                <div class="mt-4 px-4">
                    <!-- using php for img -->
                    <?php
                    $doctor_id;
                    $sql = "SELECT * FROM  doctor as d  WHERE doctor_id = '$doctor_id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Doctor Image" class="rounded-circle img-fluid mx-5 w-50 " height="100px">
                    ';
                    ?>
                </div>
                <h4 class="mt-3 text-center text-dark"> <span class="text-center text-primary">Dr. </span><span>Doctor
                        Name</span></h4>
                <h5 class="text-muted text-center">Neurology</h5>
                <hr class="dropdown-divider bg-light mt-5">
                <h4 class="mt-3 text-center text-dark"> <span class="text-center text-primary">Dr. </span><span>Doctor
                        Name</span></h4>
                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav ">
                    <li>
                        <a href="/DoctorPortal/myAppointment.html" class="nav-link px-3 active">
                            <i class="fal fa-calendar-check"></i>
                            <span class="mx-2">Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="/DoctorPortal/myPatient.html" class="nav-link px-3">
                            <i class="far fa-user-injured"></i>
                            <span class="mx-2">My Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="/DoctorPortal/check up.html" class="nav-link px-3">
                            <i class="fal fa-user-nurse"></i>
                            <span class="mx-2">Check Up</span>
                        </a>
                    </li>
                    <li>
                        <a href="/DoctorPortal/messagedoctor.html" class="nav-link px-3">
                            <i class="fas fa-envelope-square"></i>
                            <span class="mx-2">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <i class="far fa-sign-out"></i>
                            <span class="mx-2">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <!-- 
        ===========================
                Appointment
        ===========================
     -->
    <main class="main mt-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h4>Appointments</h4>
                        <p class="text-muted">You have following appointments today</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="display-6 mt-4">8:17 AM</p>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 p-5 pt-0">
                        <!-- USING PHP IN  -->
                        <?php
                        if (isset($_SESSION['appointmentAvalible'])) {
                            ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $_SESSION["appointmentAvalible"] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                            <?php
                            unset($_SESSION['appointmentAvalible']);
                        }
                        ?>
                        <?php
                        $query = "SELECT * from doctor as d inner JOIN appointmentportal as a on a.doctor_id=d.doctor_id 
                    inner JOIN patient as p on p.patient_no=a.patient_no INNER join appointmenttime as t
                    on t.time_no=a.time_no where d.doctor_id='$doctor_id' order by time asc";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                                $dob = date_diff(date_create($row['dob']), date_create(date("Y/m/d")))->format('%y');
                                echo '
                                <div class="col mt-3">
                                <div class="card w-75">
                                    <p class="card-header text-muted">' . $row['time'] . '</p>
                                    <div class="card-body">
                                        <h6 class=""><span>' . $row['patient_name'] . '</span>, <span>'.$dob.'</span></h6>
                                        <p class="text-muted pt-0">' . $row['status'] . '</p>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a href="" class="call"><i class="far fa-envelope-open-text"
                                                        style="color: #0a58ca !important; margin-right: 5px !important;"></i>Message</a>
                                            </div>
                                            <div class="col-sm-5">
                                                <a href="tel:" class="call mx-0"><i class="fal fa-phone-plus"
                                                        style="color: #0a58ca !important; margin-right: 5px !important;"></i>Call</a>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ';
                            }


                        } else {

                            $_SESSION['appointmentAvalible'] = "Appointment not avalible";
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
    <script src="bootstrap-5.1.3-dist/js/jquery.dataTables.min.js"></script>
    <script src="bootstrap-5.1.3-dist/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>