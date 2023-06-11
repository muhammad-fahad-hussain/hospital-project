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
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin Portal</title>
    <style>
        .filtered-result {
            background-color: yellow;
            /* Add any other styling you want */
        }

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

        .no-border {
            border: none;
            outline: none;
        }

        .no-border:hover {
            border: none !important;
            outline: none !important;

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
                <hr class="dropdown-divider bg-light mt-3">
                <h4 class="mt-4 text-center text-dark"> <span class="text-center text-primary">
                        <!-- date -->
                        <form action="">
                            <div class="input-group p-3">
                                <input type="date" class="form-control w-50" id="dateInput">
                                <button class="btn btn-outline-secondary" type="submit" id=""><i
                                        class="fas fa-arrow-right fa-lg"></i></button>
                            </div>
                        </form>
                        <script>
                            var currentDate = new Date();
                            var dateInput = document.getElementById('dateInput');
                            var formattedDate = currentDate.toISOString().slice(0, 10);
                            dateInput.value = formattedDate;
                        </script>
                </h4>
                <hr class="dropdown-divider bg-light mt-4">
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
                        <h4>Appointments</h4>
                        <p class="text-muted">You have following appointments today</p>
                    </div>
                    <div class="col-lg-3">
                        <p class="display-6 mt-4">8:17 AM</p>
                    </div>
                </div>
                <!-- 

======================================
         breadcrumb
======================================
-->
                <div class="col-md-12 bg-light pt-5">
                    <!-- using breadcrumb bootstrap class  -->
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb px-3">
                            <li class="breadcrumb-item "><a href="DoctorPortalcheck up.php"
                                    class="text-decoration-none text-primary">Check Up</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check it</li>
                        </ol>
                    </nav>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
                <div class="container p-5">
                    <?php
                    if (isset($_SESSION['doctorPortalAlert'])) {
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?php echo $_SESSION["doctorPortalAlert"] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                        <?php
                        unset($_SESSION['doctorPortalAlert']);
                    }
                    ?>
                    <!-- using form -->
                    <form action="doctorPHPFile.php" method="POST">
                        <!-- get the value form Doctor checkup page -->
                        <input type="text" name="appointmentNo" id="" value="<?php echo $_GET['appointment_no'] ?>">
                        <input type="text" name="patientID" id="" value="<?php echo $_GET['patient_no'] ?>">
                        <input type="text" name="doctor_id" id="" value="<?php echo $doctor_id ?>">
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <label for="appointment" class="form-label">Diseases</label>
                                <input type="text" name="diseases" id="status" class="form-control mt-2 "
                                    placeholder="Diseases" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="Admit" class="form-label">Admit in Hospital</label>
                                <select name="Admit" id="Admit" class="form-select text-dark mt-2" required
                                    onchange="showInputBox()">
                                    <option value="" select>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <!-- block  -->
                            <div id="admitinHospital" style="display: none;">
                                <div class="row mt-4">

                                    <div class="col-lg-6">
                                        <label for="room" class="form-label">Room No</label>
                                        <select name="room" id="room" class="form-select text-dark mt-2">
                                            <?php
                                            include "connection.php";
                                            $dept_query = "SELECT * FROM room";
                                            $department_result = mysqli_query($conn, $dept_query);
                                            foreach ($department_result as $row) {
                                                echo "<option value='" . $row['room_no'] . "'>" . $row['room_no'] . "</option>";
                                            }
                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="bedno1" class="form-label">Select Bed</label>
                                        <select name="bedno" id="bedno" class="form-select text-dark mt-2">
                                            <option value="" selected>Select Bed</option>
                                        </select>
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            $('#room').on('change', function (event) {
                                                var room_no = $(this).val();
                                                $.post(
                                                    "doctorPHPFile.php",
                                                    { room: room_no },
                                                    function (data) {
                                                        $("#bedno").html(data);
                                                    }
                                                );
                                            });
                                        });
                                    </script>


                                </div>
                            </div>
                            
                            <!-- using JS condition if yes not show the block -->
                            
                            <div id="inputBoxContainer" style="display: none;">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label for="appointment" class="form-label">Recommend Medicine</label>
                                        <input type="text" name="medicine_name1" id="status" class="form-control mt-2 "
                                            placeholder="Recommend Medicine">

                                        <input type="text" name="medicine_name2" id="status" class="form-control mt-2 "
                                            placeholder="Recommend Medicine">
                                        <input type="text" name="medicine_name3" id="status" class="form-control mt-2 "
                                            placeholder="Recommend Medicine">

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-7">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" name="message" id="message" rows="5"
                                            placeholder="Message"></textarea>

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label for="Checked_again" class="form-label">Checked again</label>
                                        <select name="Checked_again" id="Checked_again"
                                            class="form-select text-dark mt-2" onchange="showInputBoxAppointment()">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>

                                        </select>
                                    </div>
                                </div>
                                <div id="inputBoxAppointment" style="display: none;">

                                    <div class="row mt-4">

                                        <div class="col-lg-6">
                                            <label for="appointment" class="form-label">Select appointment time</label>
                                            <select name="appointmentTime" id="appointment"
                                                class="form-select text-dark mt-2">
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
                                            <input type="date" name="appointment_date" id="appointment_date"
                                                class="form-control mt-2 ">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- checkUpBtn -->
                        <input type="submit" name="checkUpBtn" id="" class="btn btn-primary mx-2 mb-3 mt-3"
                            value="Check">
                    </form>
                </div>

            </div>
        </div>
    </main>
    <!-- JS -->
    <script>

        function showInputBoxAppointment() {
            var selectElement = document.getElementById("Checked_again");
            var inputBoxContainer = document.getElementById("inputBoxAppointment");

            if (selectElement.value === "yes") {
                inputBoxContainer.style.display = "block";
            } else {
                inputBoxContainer.style.display = "none";
            }
        }

        function showInputBox() {
            var selectElement = document.getElementById("Admit");
            var inputBoxContainer = document.getElementById("inputBoxContainer");
            var admitinHospital = document.getElementById("admitinHospital");

            if (selectElement.value === "no") {
                inputBoxContainer.style.display = "block";
                admitinHospital.style.display = "none";

            } else if (selectElement.value === "yes") {
                inputBoxContainer.style.display = "none";
                admitinHospital.style.display = "block";
            }
            else {
                inputBoxContainer.style.display = "none";
                admitinHospital.style.display = "none";
            }
        }
    </script>

    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>

</body>

</html>