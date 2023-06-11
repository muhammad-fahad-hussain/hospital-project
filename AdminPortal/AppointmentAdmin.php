<?php
session_start();

include "connection.php";
$time = time();
if ($time > $_SESSION['expire']) {
    $_SESSION['signin'] = "Your are session is expire";
    session_unset();
    session_destroy();
    header("Location: signinportal.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Receptionist-Admin Portal</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <div class="d-flex ms-auto  nav-btn">
                    <!-- use css nav-btn -->
                    <a href="" class="btn btn-primary p-0"></a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown d-flex mx-2 my-2">
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="height: 40px; width: 40px;">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profill</a></li>
                            <li><a class="dropdown-item" href="/AdminPortal/Updateaccount.html">Update Profill</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" id="sidebar" style="scroll-snap-type: none;">
        <div class="offcanvas-body px-0">
            <nav class="navbar-dark">
                <h4 class="mt-5 text-center text-white"> <span
                        class="text-center text-primary">Welcome</span><br><span>Admin Name</span></h4>
                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav ">
                    <li>
                        <a href="/AdminPortal/admindashboard.html" class="nav-link px-3  mt-5">
                            <i class="fas fa-tachometer-alt-average"></i>
                            <span class="mx-1">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/AppointmentAdmin.html" class="nav-link px-3 active">
                            <i class="fal fa-calendar-check"></i>
                            <span class="mx-2">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/doctorAdmin.html" class="nav-link px-3">
                            <i class="far fa-user-md"></i>
                            <span class="mx-2">Doctor</span>
                        </a>
                    </li>

                    <li>
                        <a href="/AdminPortal/patientadmin.html" class="nav-link px-3">
                            <i class="far fa-user-injured"></i>
                            <span class="mx-2">Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/ReceptionistAdmin.html" class="nav-link px-3">
                            <i class="fal fa-hospital-user"></i>
                            <span class="mx-1">Receptionist</span>
                        </a>
                    </li>

                    <li>
                        <a href="/AdminPortal/nursesadmin.html" class="nav-link px-3">
                            <i class="fal fa-user-nurse"></i>
                            <span class="mx-2">Nurse</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/bedAdmin.html" class="nav-link px-3">
                            <i class="far fa-bed"></i>
                            <span class="mx-1">Bed Manager</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/walletAdmin.html" class="nav-link px-3">
                            <i class="fas fa-wallet"></i>
                            <span class="mx-2">Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/message.html" class="nav-link px-3">
                            <i class="fas fa-envelope-square"></i>
                            <span class="mx-2">Messages</span>
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
                        <a href="#" class="nav-link px-3">
                            <i class="far fa-sign-out">
                                <span class="mx-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- 
        ===========================
                MODAL
        ===========================
     -->

    <!-- Medical History modal -->
    <div class="modal" id="UpdateDoctormodel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Message</h5>
                    <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Message</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate cumque, quod libero dolor
                        quibusdam similique perspiciatis animi alias id odit officia quidem corporis a nesciunt atque
                        labore reprehenderit aspernatur quisquam aliquam maiores recusandae hic praesentium laborum!
                        Magni aliquid atque consequatur.</p>
                    <div class="mt-3">
                        <a href="mailto:Mehboobwaqar@riphah.edu.pk"
                            class="text-decoration-none text-white">Mehboobwaqar@riphah.edu.pk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Button Modal -->
    <div class="modal" id="deletemodal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Confirm Delete</h3>
                    <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you confirming?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        ============================
                Doctor
        ============================
     -->

    <main class="mt-2 pt-5 ">
        <div class="col-lg-12 pt-4 px-5 w-100">
            <h3>Appointments</h3>
        </div>
        <!-- Horizantal line -->
        <hr class="dropdown-divider bg-light my-4">
        <div class="col-lg-12 p-3 px-5">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="input-group  ">
                            <label for="" class="input-group-text">Date Appointment Search::</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter Searching date"
                                onchange="this.placeholder = 'DD/MM/yyyy'">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" name="searchAdppointment" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <hr class="dropdown-divider bg-light my-4">
        <?php
        if (isset($_POST['searchAdppointment'])) {
            $date = $_POST['date'];
            $sql = "SELECT * FROM appointmentportal WHERE appointment_date = '$date'";
            $r = mysqli_query($conn, $sql);
            if (mysqli_num_rows($r)) {
                ?>
                <div class="container-fluid ">
                    <div class="container ">
                        <p class="display-6 px-5">Date: <span class="text-muted">
                                <?php echo date("d/m/Y", strtotime($date)) ?>
                            </span></p>
                        <div class="row row-cols-1 row-cols-lg-3 g-5 p-3">
                            <div class="col">
                                <div class="card bg-success cardDoctor" style="width: 24rem;">
                                    <div class="card-body">
                                        <h3 class="card-title d-flex ">
                                            <span class="mt-4 text-white">
                                                <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                            </span>
                                            <span class=" ms-auto">
                                                <?php
                                                $q = "SELECT COUNT(appointment_date) FROM appointmentportal WHERE DATE(appointment_date) = '$date'";
                                                $result = mysqli_query($conn, $q);
                                                $row = mysqli_fetch_array($result);
                                                echo ' <h3 class="display-3 text-white">' . $row[0] . '</h3>';

                                                ?>
                                            </span>
                                        </h3>
                                        <h3 class="card-text mt-4 font-weight-bold text-white">Total Appointment</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- using css for media query -->
                            <div class="col">
                                <div class="card bg-danger cardDoctor" style="width: 24rem;">
                                    <div class="card-body">
                                        <h3 class="card-title d-flex">
                                            <span class="mt-4 text-white">
                                                <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                            </span>
                                            <span class=" ms-auto">
                                                <?php
                                                $date = $_POST['date'];

                                                $q1 = "SELECT COUNT(id) FROM checkup WHERE DATE(date) = '$date'";
                                                $result1 = mysqli_query($conn, $q1);
                                                $row1 = mysqli_fetch_array($result1);
                                                echo ' <h3 class="display-3 text-white">' . $row1[0] . '</h3>';
                                                ?>
                                            </span>
                                        </h3>
                                        <h3 class="card-text mt-4 font-weight-bold text-white">Checked Up</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- using css for media query -->
                            <div class="col">
                                <div class="card bg-primary cardDoctor" style="width: 24rem;">
                                    <div class="card-body">
                                        <h3 class="card-title d-flex">
                                            <span class="mt-4 text-white">
                                                <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                            </span>
                                            <span class=" ms-auto">
                                                <?php
                                                $date = $_POST['date'];
                                                $q1 = "SELECT COUNT(id) FROM checkup WHERE DATE(date) = '$date'";
                                                $result1 = mysqli_query($conn, $q1);
                                                $row1 = mysqli_fetch_array($result1);
                                                echo ' <h3 class="display-3 text-white">' . $row1[0] . '</h3>';
                                                ?>
                                            </span>
                                            </span>
                                        </h3>
                                        <h3 class="card-text mt-4 font-weight-bold text-white">Full</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Searching Form -->
                        <div class="col-lg-12 mt-5">
                            <form action="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" name="" id="" class="form-control w-75 " placeholder="Search Patient">
                                    <input type="button" name="" id="" class="btn btn-primary mx-4" value="Search"></input>
                                </div>
                            </form>
                        </div>
                        <!-- End search  -->

                        <!-- start table -->
                        <div class="col-lg-12 mt-5 mb-5">
                            <!-- using CSS for Padding in row  -->
                            <div class="container">
                                <table class="table border text-center ">
                                    <tr class="col">
                                        <th>Appointment No</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>Appointment time</th>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $readquery = "SELECT * FROM appointmentportal AS a INNER JOIN patient AS p ON a.patient_no=p.patient_no INNER JOIN appointmenttime AS t ON a.time_no =t.time_no INNER JOIN doctor AS d ON a.doctor_id =d.doctor_id INNER JOIN department AS dept  ON dept.dept_no =a.dept_no  WHERE DATE(appointment_date) = '$date' order by t.time asc";
                                    $read = mysqli_query($conn, $readquery);
                                    foreach ($read as $rowread) {
                                        echo '   <tr class="col text-center paddingRow">
                                    <td>' . $rowread['appointmentNo'] . '</td>
                                  
                                    <td>' . $rowread['patient_name'] . '</td>
                                    <td>' . $rowread['contact'] . '</td>
                                    <td>' . $rowread['gender'] . '</td>
                                    <td>' . $rowread['time'] . '</td>
                                    <td>' . $rowread['name'] . '</td>
                                    <td>' . $rowread['dept_name'] . '</td>
                                    <td class="paddingRowImg"><button data-bs-toggle="modal"
                                            data-bs-target="#UpdateDoctormodel"
                                            class="btn btn-primary text-center">Message</button>
                                        <button data-bs-toggle="modal" data-bs-target="#deletemodal"
                                            class="btn btn-danger text-center">Cancel</button>
                                    </td>
                                </tr>';
                                    }
                                    ?>


                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end of php -->
                <?php
            } else {

                ?>
                </span></p>

                <div class="display-6 p-5">No appointments available on this <span>
                        <?php echo date("d/m/Y", strtotime($date)) ?>
                    </span></div>
                <!-- row count end -->
                <?php
            }
        }
        // not searching
        else {
            ?>
            <div class="container-fluid ">
                <div class="container ">

                    <div class="row row-cols-1 row-cols-lg-3 g-5 p-3">
                        <div class="col">
                            <div class="card bg-success cardDoctor" style="width: 24rem;">
                                <div class="card-body">
                                    <h3 class="card-title d-flex ">
                                        <span class="mt-4 text-white">
                                            <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                        </span>
                                        <span class=" ms-auto">
                                            <?php
                                            $q = "SELECT COUNT(appointment_date) FROM appointmentportal WHERE DATE(appointment_date) >=CURDATE()";
                                            $result = mysqli_query($conn, $q);
                                            $row = mysqli_fetch_array($result);
                                            echo ' <h3 class="display-3 text-white">' . $row[0] . '</h3>';

                                            ?>
                                        </span>
                                    </h3>
                                    <h3 class="card-text mt-4 font-weight-bold text-white">Total Appointments</h3>
                                </div>
                            </div>
                        </div>
                        <!-- using css for media query -->
                        <div class="col">
                            <div class="card bg-danger cardDoctor" style="width: 24rem;">
                                <div class="card-body">
                                    <h3 class="card-title d-flex">
                                        <span class="mt-4 text-white">
                                            <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                        </span>
                                        <span class=" ms-auto">
                                            <?php

                                            $q1 = "SELECT COUNT(id) FROM checkup ";
                                            $result1 = mysqli_query($conn, $q1);
                                            $row1 = mysqli_fetch_array($result1);
                                            echo ' <h3 class="display-3 text-white">' . $row1[0] . '</h3>';
                                            ?>
                                        </span>
                                    </h3>
                                    <h3 class="card-text mt-4 font-weight-bold text-white">Checked Up</h3>
                                </div>
                            </div>
                        </div>
                        <!-- using css for media query -->
                        <div class="col">
                            <div class="card bg-primary cardDoctor" style="width: 24rem;">
                                <div class="card-body">
                                    <h3 class="card-title d-flex">
                                        <span class="mt-4 text-white">
                                            <i class="fal fa-calendar-check fa-lg" style="color: #c0c7d3;"></i>
                                        </span>
                                        <span class=" ms-auto">
                                            <?php

                                            $q2 = "SELECT COUNT(appointment_date) FROM appointmentportal WHERE DATE(appointment_date) =CURDATE()";
                                            $result2 = mysqli_query($conn, $q2);
                                            $row2 = mysqli_fetch_array($result2);
                                            echo ' <h3 class="display-3 text-white">' . $row2[0] . '</h3>';
                                            ?>
                                        </span>
                                        </span>
                                    </h3>
                                    <h3 class="card-text mt-4 font-weight-bold text-white">Today Appointments</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Searching Form -->
                    <div class="col-lg-12 mt-5">
                        <form action="">
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" name="" id="" class="form-control w-75 " placeholder="Search Patient">
                                <input type="button" name="" id="" class="btn btn-primary mx-4" value="Search"></input>
                            </div>
                        </form>
                    </div>
                    <!-- End search  -->

                    <!-- start table -->
                    <div class="col-lg-12 mt-5">
                        <!-- using CSS for Padding in row  -->
                        <div class="container">
                            <table class="table border text-center ">
                                <tr class="col">
                                    <th>Appointment No</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Date Appointment</th>
                                    <th>Appointment time</th>
                                    <th>Doctor Name</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $readquery = "SELECT * FROM appointmentportal AS a INNER JOIN patient AS p ON a.patient_no=p.patient_no INNER JOIN appointmenttime AS t ON a.time_no =t.time_no INNER JOIN doctor AS d ON a.doctor_id =d.doctor_id INNER JOIN department AS dept  ON dept.dept_no =a.dept_no  WHERE DATE(appointment_date) >=CURDATE() ORDER BY appointment_date,time asc";

                                $read = mysqli_query($conn, $readquery);
                                foreach ($read as $rowread) {
                                    echo '   <tr class="col text-center paddingRow">
                                <td>' . $rowread['appointmentNo'] . '</td>
                              
                                <td>' . $rowread['patient_name'] . '</td>
                                <td>' . $rowread['contact'] . '</td>
                                <td>' . $rowread['gender'] . '</td>
                                <td>' . $rowread['appointment_date'] . '</td>
                                <td>' . $rowread['time'] . '</td>
                                <td>' . $rowread['name'] . '</td>
                                <td>' . $rowread['dept_name'] . '</td>
                                <td class="paddingRowImg"><button data-bs-toggle="modal"
                                        data-bs-target="#UpdateDoctormodel"
                                        class="btn btn-primary text-center">Message</button>
                                    <button data-bs-toggle="modal" data-bs-target="#deletemodal"
                                        class="btn btn-danger text-center">Cancel</button>
                                </td>
                            </tr>';
                                }
                                ?>


                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }

        ?>
    </main>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>

</body>

</html>