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
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        a .navbar {
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

    <!-- top navigation bar -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-white" id="sidebar">
        <div class="offcanvas-body px-0">
            <nav class="navbar-dark">
                <!-- Admin profill -->
                <div class="mt-4 px-4">
                    <!-- using php for img -->
                    <?php
                    $doctor_id;
                    $s = "SELECT * FROM  doctor as d  WHERE doctor_id = '$doctor_id'";
                    $r = mysqli_query($conn, $s);
                    $ro = mysqli_fetch_assoc($r);
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($ro['image']) . '" alt="Doctor Image" class="rounded-circle img-fluid mx-5 w-50 " height="100px">
                    ';
                    ?>
                </div>
                <h4 class="mt-3 text-center text-dark"> <span class="text-center text-primary">Dr. </span><span>
                        <?php
                        $doctor_id;
                        $sql = "SELECT * FROM  doctor as d  WHERE doctor_id = '$doctor_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo '<span>' . $row['name'] . '</span>';
                        ?>
                    </span></h4>
                <h5 class="text-muted text-center">
                    <?php
                    $doctor_id;
                    $sql = "SELECT * FROM  doctor as d INNER JOIN speciality as s on d.speciality_id=s.speciality_id
                      WHERE doctor_id = '$doctor_id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span>' . $row['speciality_name'] . '</span>';
                    ?>

                </h5>
                <!-- <hr class="dropdown-divider bg-light mt-3">
                <h4 class="mt-4 text-center text-dark"> <span class="text-center text-primary">
                        
                        <form action="">
                            <div class="input-group p-3">
                                <input type="date" class="form-control w-50" id="dateInput">
                                <button class="btn btn-outline-secondary" type="submit" id=""><i
                                        class="fas fa-arrow-right fa-lg"></i></button>
                            </div>
                        </form>
                        <script>
                            // var currentDate = new Date();
                            // var dateInput = document.getElementById('dateInput');
                            // var formattedDate = currentDate.toISOString().slice(0, 10);
                            // dateInput.value = formattedDate;
                        </script>
                </h4> -->
                <hr class="dropdown-divider bg-light mt-4">
                <ul class="navbar-nav mt-4">
                    <li>
                        <a href="DoctorPortalmyAppointment.php" class="nav-link px-3">
                            <i class="fal fa-calendar-check"></i>
                            <span class="mx-2">Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="DoctorPortalmyPatient.php" class="nav-link px-3">
                            <i class="far fa-user-injured"></i>
                            <span class="mx-2">My Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="DoctorPortalcheck up.php" class="nav-link px-3">
                            <i class="fal fa-user-nurse"></i>
                            <span class="mx-2">Check Up</span>
                        </a>
                    </li>
                    <li>
                        <a href="DoctorPortalmyAppointment.php" class="nav-link px-3">
                            <i class="fas fa-envelope-square"></i>
                            <span class="mx-2">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="nav-link px-3">
                            <i class="far fa-sign-out"></i>
                            <span class="mx-1">Logout</span>
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
                        <h4>Check Up</h4>
                        <p class="text-muted">You have following Check Up</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="display-6 mt-4">
                            <!-- current time -->
                            <?php 
                            date_default_timezone_set('Asia/Karachi');

                            echo date("h:i", time());
                             ?>
                        </p>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
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
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 p-5 pt-0">
                        <!-- USING PHP IN  -->
                       

                    </div>

                    <div class="row row-cols-1 row-cols-lg-2 p-5 pt-0">
                        <!-- query -->
                        <?php
                        $query = "SELECT * from doctor as d inner JOIN appointmentportal as a on a.doctor_id=d.doctor_id 
                    inner JOIN patient as p on p.patient_no=a.patient_no INNER join appointmenttime as t
                    on t.time_no=a.time_no where d.doctor_id='$doctor_id' order by time asc";

                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                                $date=date("Y-m-d");
                                $time = date('H:i:s', time());
                                if( $date===$row['appointment_date'] && $time<$row['time'])
                                {
                                    $age = date_diff(date_create($row['dob']), date_create(date("Y/m/d")))->format('%y');
                                echo '
                                <div class="col mt-3">
                                <div class="card">
                                    <p class="card-header text-muted">' . $row['time'] . '</p>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-9">
                                        <input type="hidden" value="' . $row['patient_no'] . '">
                                                <h6 class=""><span>'.$row['patient_name'].'</span>, <span> ' . $age . '</span></h6>
                                                <p class="text-muted pt-0">' . $row['status'] . '</p>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <a href="tel:" class="call"><i
                                                                class="far fa-envelope-open-text"
                                                                style="color: #0a58ca !important; margin-right: 5px !important;"></i>Message</a>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <a href="tel::<?php echo $row["contact"];" class="call mx-0"><i class="fal fa-phone-plus"
                                                                style="color: #0a58ca !important; margin-right: 5px !important;"></i>Call</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                            <a class="btn btn-primary" href="checkup.php?patient_no='.$row['patient_no'].'&appointment_no='.$row['appointmentNo'].'">Check Up</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ';
                                }
                                
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



   
</body>

</html>