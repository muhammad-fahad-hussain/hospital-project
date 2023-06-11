<?php
session_start();
$doctorid = $_SESSION['doctor_id'];
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
                    $s = "SELECT * FROM  doctor as d  WHERE doctor_id = '$doctorid'";
                    $r = mysqli_query($conn, $s);
                    $ro = mysqli_fetch_assoc($r);
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($ro['image']) . '" alt="Doctor Image" class="rounded-circle img-fluid mx-5 w-50 " height="100px">
                    ';
                    ?>
                </div>
                <h4 class="mt-3 text-center text-dark"> <span class="text-center text-primary">Dr. </span><span>
                        <?php
                        $doctor_id;
                        $sql = "SELECT * FROM  doctor as d  WHERE doctor_id = '$doctorid'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo '<span>' . $row['name'] . '</span>';
                        ?>
                    </span></h4>
                <h5 class="text-muted text-center">
                    <?php
                    $doctor_id;
                    $sql = "SELECT * FROM  doctor as d INNER JOIN speciality as s on d.speciality_id=s.speciality_id
                      WHERE doctor_id = '$doctorid'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span>' . $row['speciality_name'] . '</span>';
                    ?>

                </h5>
                <hr class="dropdown-divider bg-light mt-5">
                <h4 class="mt-3 text-center text-dark"> <span class="text-center text-primary">Dr. </span><span>Doctor
                        Name</span></h4>
                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav ">
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
                        <h4>Patient</h4>
                        <p class="text-muted">You have following your patient</p>
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
                                <h5>Medical History</h5>
                                <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2>Medical History</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate cumque, quod
                                    libero dolor quibusdam similique perspiciatis animi alias id odit officia quidem
                                    corporis a nesciunt atque labore reprehenderit aspernatur quisquam aliquam maiores
                                    recusandae hic praesentium laborum! Magni aliquid atque consequatur.</p>
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
                <div class="container-fluid ">
                    <div class="container ">
                        <!-- Searching Form -->
                        <div class="col-lg-12 mt-5">
                            <form action="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" name="" id="" class="form-control w-75 "
                                        placeholder="Search Patient">
                                    <input type="button" name="" id="" class="btn btn-primary mx-4"
                                        value="Search"></input>
                                </div>
                            </form>
                        </div>
                        <!-- End search  -->

                        <!-- start table -->
                        <div class="col-lg-12 mt-5">
                            <!-- using CSS for Padding in row  -->
                            <table class="table border text-center ">
                                <tr class="col">
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                <tr class="col text-center paddingRow">
                                    <td>3021</td>
                                    <td>Mehboob Waqar</td>
                                    <td>0304702123</td>
                                    <td>12/12/2002</td>
                                    <td>MehboobWaqar444@gmail.com</td>
                                    <td>Male</td>
                                    <td class="paddingRowImg"><button data-bs-toggle="modal"
                                            data-bs-target="#UpdateDoctormodel"
                                            class="btn btn-primary text-center">Medical history </button>
                                        <button class="btn btn-danger mx-2" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal">Delete</button>
                                    </td>
                                </tr>
                                <tr class="col text-center paddingRow">
                                    <td>3011</td>
                                    <td>Muhamamad Fahad</td>
                                    <td>03117021000</td>
                                    <td>12/12/2003</td>
                                    <td>mfahadpk176@gmail.com</td>
                                    <td>Male</td>
                                    <td class="paddingRowImg"><button data-bs-toggle="modal"
                                            data-bs-target="#UpdateDoctormodel"
                                            class="btn btn-primary text-center">Medical history </button>
                                        <button class="btn btn-danger mx-2" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal">Delete</button>
                                    </td>
                                </tr>
                                <tr class="col text-center paddingRow">
                                    <td>3031</td>
                                    <td>Muhammad Bilal</td>
                                    <td>03023453423</td>
                                    <td>12/12/2000</td>
                                    <td>mbilal1234@gmail.com</td>
                                    <td>Male</td>
                                    <td class="paddingRowImg"><button data-bs-toggle="modal"
                                            data-bs-target="#UpdateDoctormodel"
                                            class="btn btn-primary text-center">Medical history </button>
                                        <button class="btn btn-danger mx-2" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal">Delete</button>
                                    </td>
                                </tr>
                                <tr class="col text-center paddingRow">
                                    <td>3051</td>
                                    <td>Muhammad Noman</td>
                                    <td>03017021000</td>
                                    <td>12/12/2003</td>
                                    <td>Nomanmalik432@gmail.com</td>
                                    <td>Male</td>
                                    <td class="paddingRowImg"><button data-bs-toggle="modal"
                                            data-bs-target="#UpdateDoctormodel"
                                            class="btn btn-primary text-center">Medical history </button>
                                        <button class="btn btn-danger mx-2" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal">Delete</button>
                                    </td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="/bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>
    <script src="/bootstrap-5.1.3-dist/js/jquery.dataTables.min.js"></script>
    <script src="/bootstrap-5.1.3-dist/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>