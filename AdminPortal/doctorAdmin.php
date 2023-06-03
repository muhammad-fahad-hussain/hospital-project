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
    <script src="adminJS.js"></script>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Admin Portal</title>

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
                <h4 class="mt-5 text-center text-white"> <span class="text-center text-primary">Welcome</span><br><span>
                        <?php echo $_SESSION['name']
                            ?>
                    </span></h4>
                <hr class="dropdown-divider bg-light mt-5">
                <ul class="navbar-nav ">
                    <li>
                        <a href="/AdminPortal/admindashboard.html" class="nav-link px-3 mt-5">
                            <i class="fas fa-tachometer-alt-average"></i>
                            <span class="mx-1">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/AppointmentAdmin.html" class="nav-link px-3">
                            <i class="fal fa-calendar-check"></i>
                            <span class="mx-2">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="/AdminPortal/doctorAdmin.html" class="nav-link px-3 active">
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
        ===========================
                MODAL
        ===========================
     -->
    <!-- Using model for adding Doctors -->
    <div class="modal" id="AddingDoctormodel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Doctor</h3>
                    <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--  -->
                    <form action="AdminPHPFile.php" name="addDoctorform" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Doctor Name:</label>
                                <input type="text" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name"
                                    class="form-control mt-2" required>
                            </div>

                            <div class="col-md-6">
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
                                    <!-- <option value="Select Speciality" class="" selected>Select
                                        Speciality</option>
                                    <option value="Anaesthesia">Anaesthesia</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dental">Dental</option>
                                    <option value="Emergency">Emergency</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Gastroenterology">Gastroenterology</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="EYE">Ophthalmology (EYE)</option>
                                    <option value="ENT">Otolaryngology (ENT)</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Pulmonology">Pulmonology</option>
                                    <option value="Rheumatology">Rheumatology</option>
                                    <option value="UROLOGY">UROLOGY</option>
                                    <option value="Orthopaedics">Orthopaedics</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Speciality</label>
                                <select name="speciality" id="speciality" class="form-select text-dark mt-2" required>
                                    <option value="" class="" selected>Select
                                        Speciality</option>
                                    <?php
                                    if (isset($_POST['department'])) {
                                        $dept_no = $_POST['department'];
                                        $query = " SELECT s.speciality_id,s.speciality_name from speciality as s inner join department as d 
                                            on s.dept_no=d.dept_no where d.dept_no= '$dept_no'";
                                        $result = mysqli_query($conn, $query);

                                        foreach ($result as $row) {
                                            '<option value="' . $row['speciality_id'] . '" >' . $row['speciality_name'] . '</option>
                                                ';
                                        }
                                    }

                                    ?>
                                    <script>
                                        $(document).ready(function () {
                                            $('#department').on('change', function (event) {
                                                var dept_id = $(this).val();
                                                //   alert(dept_id);
                                                $.post(
                                                    "AdminPHPFile.php",
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
                            <div class="col-md-6">
                                <label for="" class="form-label">Contact</label>
                                <input type="tel" name="doctor_phone" id="doctor_phone" placeholder="0300-3234123"
                                    class="form-control mt-2 " required>
                            </div>

                        </div>


                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="date" name="dob_doctor" id="dob_doctor" class="form-control mt-2"
                                    placeholder="12/12/2002" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Experience</label>
                                <input type="number" placeholder="Enter Experience" name="experience_doctor"
                                    id="experience_doctor" class="form-control mt-2" required>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Education</label>
                                <input type="text" name="education" id="education" class="form-control mt-2"
                                    placeholder="Enter Education" required>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Password</label>
                                <input type="text" name="password_doctor" id="password_doctor" class="form-control mt-2"
                                    placeholder="Choose a password" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address_doctor" id="address_doctor" class="form-control mt-2"
                                    placeholder="Enter Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Timing</label>
                                <select name="shiftTiming" id="shiftTiming" class="form-select text-dark mt-2" required>

                                    <option value="Select Speciality" class="" selected>Select Timing</option>
                                    <option value="8:00">08:00AM to 04:00PM</option>
                                    <option value="16:00">04:00AM to 12:00AM</option>
                                    <option value="23:59">12:00AM to 8:00AM</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 mt-1">
                                <label for="" class="form-label">Gender</label>
                                <div class="row ">
                                    <div class="col-sm-2">
                                        <div class="form-check mt-2">
                                            <input type="radio" name="gender_doctor" id="gender_doctor"
                                                class="form-check-input" value="male" required>
                                            <label for="" class="form-check-label mt-1">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check mt-2">
                                            <input type="radio" name="gender_doctor" id="gender_doctor"
                                                class="form-check-input" value="female" required>
                                            <label for="" class="form-check-label mt-1">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control mt-2" placeholder="Image"
                                    required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="" class="form-label">About</label>
                                <textarea class="form-control" name="about" id="about" rows="5" placeholder="About"
                                    required></textarea>
                            </div>
                        </div>
                        <input type="submit" name="add_doctor" id="" onclick="AddDoctorform()"
                            class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- update modal -->


    <!-- 
        ============================
                Doctor
        ============================
     -->
    <main class="mt-5 pt-5 ">
        <div class="container-fluid mx-3">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Doctor</h4>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">

                <!-- alert  for show the message-->


                <?php
                if (isset($_SESSION['doctorAdminAlert'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo $_SESSION["doctorAdminAlert"] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <?php
                    unset($_SESSION['doctorAdminAlert']);
                }
                ?>
                <!-- Doctor Box -->
                <div class="row row-cols-1 row-cols-lg-3 g-5 p-3">
                    <div class="col">
                        <div class="card bg-success cardDoctor" style="width: 20rem;">
                            <div class="card-body">
                                <h3 class="card-title d-flex text-white">
                                    <span class="mt-4">
                                        <i class="fal fa-user-md fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <!-- using php in card fortotal dcotor  -->

                                        <?php
                                        include "connection.php";

                                        $q = "SELECT COUNT(doctor_id) FROM doctor";
                                        $result = mysqli_query($conn, $q);
                                        $row = mysqli_fetch_array($result);
                                        echo ' <h3 class="display-3">' . $row[0] . '</h3>';
                                        ?>
                                    </span>
                                </h3>
                                <h3 class="card-text mt-4 font-weight-bold text-white">Total Doctors</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-danger cardDoctor" style="width: 20rem;">
                            <div class="card-body">
                                <h3 class="card-title d-flex ">
                                    <span class="mt-4 text-white">
                                        <i class="fal fa-user-md fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <?php
                                        include "connection.php";
                                        $shiftTime = "";
                                        $time = date("H:i:s", time());
                                        $t8 = strtotime("8:00");
                                        $t16 = strtotime("16:00");
                                        $t24 = strtotime("23:59");
                                        if ($time > $t8 && $time < $t16) {
                                            $shiftTime = "8:00";
                                        } else if ($time > $t16 && $time < $t24) {
                                            $shiftTime = "16:00";
                                        } else {
                                            $shiftTime = "23:59";
                                        }

                                        $q = "SELECT COUNT(d.doctor_id) FROM doctor AS d INNER JOIN employees AS e on d.doctor_id=e.doctor_id 
                                        WHERE shiftTiming='$shiftTime'";
                                        $result = mysqli_query($conn, $q);
                                        $row = mysqli_fetch_array($result);
                                        echo ' <h3 class="display-3 text-white">' . $row[0] . '</h3>';
                                        ?>
                                    </span>
                                </h3>
                                <h3 class="card-text mt-4 font-weight-bold text-white">Available Doctors</h3>
                            </div>
                        </div>
                    </div>
                    <!-- using css for media query -->
                    <div class="col">
                        <div class="card bg-primary cardDoctor" style="width: 20rem;">
                            <div class="card-body">
                                <h3 class="card-title d-flex ">
                                    <span class="mt-4 text-white">
                                        <i class="fas fa-building fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <!-- using php in card fortotal dcotor  -->

                                        <?php
                                        include "connection.php";

                                        $q = "SELECT COUNT(dept_no) FROM department";
                                        $result = mysqli_query($conn, $q);
                                        $row = mysqli_fetch_array($result);
                                        echo ' <h3 class="display-3 text-white">' . $row[0] . '</h3>';
                                        ?>
                                    </span>
                                </h3>
                                <h3 class="card-text mt-4 font-weight-bold text-white">Total Departments</h3>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Searching Form -->
                <div class="col-lg-12 mt-5">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <!-- using css for btn and class name   -->
                            <a href="" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#AddingDoctormodel">Add
                                Doctor</a>
                        </div>
                        <div class="col-lg-8">
                            <form action="AdminPHPFile.php" method="POST">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" name="search" id="" class="form-control w-75 "
                                        placeholder="Search Doctor name  or id">
                                    <input type="submit" name="searching_doctor" id="" class="btn btn-primary mx-4"
                                        value="Search"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End search  -->

                <!-- start table -->
                <div class="col-lg-12 mt-5">
                    <!-- using CSS for Padding in row  -->
                    <table class="table border text-center ">
                        <tr class="col ">
                            <th>Image</th>
                            <th>Doctor ID</th>
                            <th>Emp. ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Speciality</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        <!-- ussing php for the read data in databasse -->
                        <?php
                        $conn = new mysqli("localhost", "root", "", "hospital_project");
                        $query = "SELECT * FROM doctor AS d INNER JOIN employees AS e ON d.doctor_id=e.doctor_id INNER JOIN employees_portal AS ep on ep.employee_id=e.employee_id INNER JOIN speciality AS s on s.speciality_id=d.speciality_id INNER JOIN department AS dept on dept.dept_no=d.dept_no;";
                        $result = mysqli_query($conn, $query);
                        foreach ($result as $row) {
                            echo ' <tr class="col text-center paddingRow">
                            <td class="paddingRowImg">
                            <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" class="rounded-circle" width="50px" height="50px">

                            </td>
                            <td class="doctorID">' . $row['doctor_id'] . '</td>
                            <td id="emp_id">' . $row['employee_id'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['dept_name'] . '</td>
                            <td>' . $row['speciality_name'] . '</td>
                            <td>' . $row['contact'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td class="paddingRowImg">
                            <button class="btn btn-success text-center viewBtnTb">View</button>
                            <button class="btn btn-primary text-center mx-2 updateBtnTb">Edit</button>
                                <button class="btn btn-danger delete_btnTB" >Delete</button>
                            </td>
                        </tr>';
                        }
                        ?>

                    </table>
                </div>

            </div>
        </div>
    </main>

    <!-- View Doctor -->

    <div class="modal" id="view_Modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Record</h4>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="viewing_data">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {
            $('.viewBtnTb').click(function (e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.doctorID').text();
                // alert(id);

                $.ajax({
                    type: "POST",
                    url: "AdminPHPFile.php",
                    data: {
                        'checking_viewbtn': true,
                        'id_': id,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.viewing_data').html(response);
                        $('#view_Modal').modal('show');

                    }
                });
            });
        });
    </script>


    <!-- update doctor -->
    <div class="modal" id="UpdateDoctormodel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update data</h3>
                    <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="viewing_form_update">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('.updateBtnTb').click(function (e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.doctorID').text();
                // alert(id);

                $.ajax({
                    type: "POST",
                    url: "AdminPHPFile.php",
                    data: {
                        'checking_viewbtn_update': true,
                        'id_': id,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.viewing_form_update').html(response);
                        $('#UpdateDoctormodel').modal('show');

                    }
                });
            });
        });
    </script>
    <!-- end update function -->


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
                    <div class="viewing_form_delete">

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>

        $(document).ready(function () {
            $('.delete_btnTB').click(function (e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.doctorID').text();
                // alert(id);

                $.ajax({
                    type: "POST",
                    url: "AdminPHPFile.php",
                    data: {
                        'checking_delete_btn': true,
                        'id_': id,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.viewing_form_delete').html(response);
                        $('#deletemodal').modal('show');

                    }
                });
            });
        });
    </script>

</body>

</html>