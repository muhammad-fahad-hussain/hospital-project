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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Patient Portal</title>

    <style>
        .border:hover {
            border-left: #0d6efd solid 3px !important;
        }

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
            <h3 class="mt-3 text-center text-white"><?php echo $_SESSION['patient_name'] ?></h3>
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
                   Make an Appointment
        =====================================
     -->


    <main class="mt-5 pt-5 ">
        <div class="container-fluid mx-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Make Appointment</h4>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="border p-3">Patient ID: <span id="patientID"><?php echo $patient_no ?></span></h5>
                    </div>
                </div>

                <?php
                if (isset($_SESSION['AppointmentStatus'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo $_SESSION["AppointmentStatus"] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>

                    <?php
                    unset($_SESSION['AppointmentStatus']);
                }
                ?>

                <form action="main.php" method="POST">
                    <div class="row mt-4">
                        <input type="hidden" name="patientID" id="" value="<?php echo $patient_no ?>">
                        <div class="col-lg-6">
                            <label for="department" class="form-label">Select Department</label>
                            <select name="department" id="department" class="form-select text-dark mt-2" required>
                                <?php
                                include "connection.php";
                                $dept_query = "SELECT dept_no, dept_name FROM department";
                                $department_result = mysqli_query($conn, $dept_query);
                                foreach ($department_result as $row) {
                                    echo "<option value='" . $row['dept_no'] . "'>" . $row['dept_name'] . "</option>";
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="" class="form-label">Select Doctor</label>
                            <select name="doctorid" id="speciality" class="form-select text-dark mt-2" required>
                                <option value="" class="" selected>Select
                                    Doctor</option>

                                <script>
                                    $(document).ready(function () {
                                        $('#department').on('change', function (event) {
                                            var dept_id = $(this).val();
                                           // alert(dept_id);
                                            $.post(
                                                "main.php",
                                                { department: dept_id },
                                                function (data) {
                                                    $("#speciality").html(data);
                                                }
                                            );
                                        });
                                    });
                                </script>
                            </select>
                        </div>

                    </div>
                    <div class="row mt-4">

                        <div class="col-lg-6">
                            <label for="appointment" class="form-label">Select appointment time</label>
                            <select name="appointmentTime" id="appointment" class="form-select text-dark mt-2" required>
                                <?php
                                include "connection.php";
                                $dept_query = "SELECT * FROM appointmentTime as a";
                                $department_result = mysqli_query($conn, $dept_query);
                                foreach ($department_result as $row) {
                                    echo "<option value='" . $row['time_no'] . "'>" . $row['time'] . "</option>";
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="appointment" class="form-label">Select Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control mt-2 ">

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <label for="appointment" class="form-label">Status</label>
                            <input type="text" name="status" id="status" class="form-control mt-2 " placeholder="Status" required>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-7">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"
                                    required></textarea>

                        </div>
                    </div>
            </div>
            <input type="submit" name="appointmentPortal" id="" class="btn btn-primary mx-2 mb-3 mt-3" value="Appointment Booked">
            </form>
        </div>
        </div>
    </main>

</body>

</html>