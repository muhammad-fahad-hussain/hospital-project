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
     ===============
          Modal
     ==============
     -->
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
    <!-- 
        ============================
                Doctor
        ============================
     -->

    <main class="main mt-5 ">
        <div class="container-fluid ">
            <div class="container ">
                <div class="col-lg-12">
                    <h2>Appointment Message</h2>
                </div>
                <hr class="dropdown-divider bg-light my-4">
                <!-- start table -->
                <div class="col-lg-12 mt-5 " >
                    <h2 class="mx-2 mb-4"><span class="text-primary">Messages</span> to Patients</h2>
                    <!-- using CSS for Padding in row  -->

                    <div class="container px-5 mx-2"  >
                        <table class="table  border text-center">
                            <tr class="col">
                                <th>Appointment No</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Action</th>
                            </tr>
                            <tr class="col text-center paddingRow">
                                <td>1</td>
                                <td>Mehboob Waqar</td>
                                <td>0304702123</td>
                                <td>mehboobwaqar444@gmail.com</td>
                                <td>24/04/2023</td>
                                <td class="paddingRowImg"><button data-bs-toggle="modal"
                                        data-bs-target="#UpdateDoctormodel"
                                        class="btn btn-primary text-center">Message</button>
                                </td>
                            </tr>
                            <tr class="col text-center paddingRow">
                                <td>2</td>
                                <td>Muhamamad Fahad</td>
                                <td>03117021000</td>
                                <td>mfahadpk176@gmail.com</td>
                                <td>24/04/2023</td>
                                <td class="paddingRowImg">
                                    <button data-bs-toggle="modal" data-bs-target="#UpdateDoctormodel"
                                        class="btn btn-primary text-center">Message</button>
                                </td>
                            </tr>
                            <tr class="col text-center paddingRow">
                                <td>3</td>
                                <td>Muhammad Bilal</td>
                                <td>03023453423</td>
                                <td>bilal@gmail.com</td>
                                <td>24/04/2023</td>
                                <td class="paddingRowImg">
                                    <button data-bs-toggle="modal" data-bs-target="#UpdateDoctormodel"
                                        class="btn btn-primary text-center">Message</button>
                                </td>
                            </tr>
                            <tr class="col text-center paddingRow">
                                <td>4</td>
                                <td>Muhammad Noman</td>
                                <td>03017021000</td>
                                <td>mehboobwaqar@gmail.com</td>
                                <td>24/04/2023</td>
                                <td class="paddingRowImg">
                                    <button data-bs-toggle="modal" data-bs-target="#UpdateDoctormodel"
                                        class="btn btn-primary text-center">Message</button>
                                </td>
                            </tr>
                        </table>
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