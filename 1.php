<?php
session_start();
include "connection.php";
$time = time();
if ($time > $_SESSION['expire']) {
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
                        <a href="/AdminPortal/ReceptionistAdmin.html" class="nav-link px-3 active">
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
    <!-- start model for add doctor -->
    <!-- Using model for adding Doctors -->
    <div class="modal" id="Addingmodel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Receptionist</h3>
                    <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form action="AdminPHPFile.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Name:</label>
                                <input type="text" name="name" id="" placeholder="Enter Name" class="form-control mt-2"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Contact</label>
                                <input type="tel" name="contact" id="" placeholder="0300-3234123"
                                    class="form-control mt-2 " required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="" class="form-control mt-2" placeholder="12/12/2002"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="" class="form-control mt-2"
                                    placeholder="Enter Address" required>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Password</label>
                                <input type="text" name="password" id="" class="form-control mt-2"
                                    placeholder="Enter Password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Timing</label>
                                <select name="shiftTiming" id="shiftTiming" class="form-select text-dark mt-2" required>
                                    <option value="" class="" selected>Select
                                        Timing</option>
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
                                            <input type="radio" name="gender" id="" class="form-check-input"
                                                value="male">
                                            <label for="" class="form-check-label mt-1">Male</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check mt-2">
                                            <input type="radio" name="gender" id="" class="form-check-input"
                                                value="female">
                                            <label for="" class="form-check-label mt-1">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="receptionist_add" id="" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- 
        ============================
                Recceptionist
        ============================
     -->
    <main class="mt-5 pt-5 ">
        <div class="container-fluid mx-5">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Receptionist</h4>
                    </div>
                </div>
                <!-- Horizantal line -->
                <hr class="dropdown-divider bg-light my-4">
                <!-- alert -->
                <?php
                if (isset($_SESSION['receptionistAdminAlert'])) {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo $_SESSION['receptionistAdminAlert'] ?>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    <?php
                    unset($_SESSION['receptionistAdminAlert']);
                }
                ?>

                <!-- Doctor Box -->
                <div class="row row-cols-1 row-cols-lg-2 g-5 p-3">
                    <div class="col px-5">
                        <div class="card bg-success cardDoctor" style="width: 24rem;">
                            <div class="card-body">
                                <h3 class="card-title d-flex text-white">
                                    <span class="mt-4">
                                        <i class="fal fa-hospital-user fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">

                                        <?php
                                        include "connection.php";

                                        $q = "SELECT COUNT(receptionist_id) FROM receptionist";
                                        $result = mysqli_query($conn, $q);
                                        $row = mysqli_fetch_array($result);
                                        echo ' <h3 class="display-3">' . $row[0] . '</h3>';
                                        ?>
                                    </span>
                                </h3>
                                <h3 class="card-text mt-4 font-weight-bold text-white">Total Receptionist</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col px-5">
                        <div class="card bg-danger cardDoctor" style="width: 24rem;">
                            <div class="card-body">
                                <h3 class="card-title d-flex ">
                                    <span class="mt-4 text-white">
                                        <i class="fal fa-hospital-user fa-lg" style="color: #c0c7d3;"></i>
                                    </span>
                                    <span class=" ms-auto">
                                        <!-- <h3 class="display-3 text-white">2</h3> -->
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

                                        $q1 = "SELECT COUNT(d.receptionist_id) FROM receptionist AS d INNER JOIN employees AS e on d.receptionist_id=e.receptionist_id 
                                        WHERE shiftTimING='$shiftTime'";
                                        $t = mysqli_query($conn, $q1);
                                        $row = mysqli_fetch_array($t);
                                        echo ' <h3 class="display-3 text-white">' . $row[0] . '</h3>';
                                        ?>
                                    </span>
                                </h3>
                                <h3 class="card-text mt-4 font-weight-bold text-white">Active Receptionist</h3>
                            </div>
                        </div>
                    </div>
                    <!-- using css for media query -->

                </div>


                <!-- Searching Form -->
                <div class="col-lg-12 mt-5">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <!-- using css for btn and class name   -->
                            <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Addingmodel">Add
                                Receptionist</a>
                        </div>
                        <div class="col-lg-8">
                            <form action="">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="text" name="" id="" class="form-control w-75 "
                                        placeholder="Search Receptionist">
                                    <input type="button" name="" id="" class="btn btn-primary mx-4"
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
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>

                        <!-- using php for read data  -->
                        <?php
                        $read = "SELECT * FROM receptionist as r inner join employees as e on r.receptionist_id =e.receptionist_id 
                        inner join employees_portal as ep on e.employee_id =ep.employee_id";
                        $readresult = mysqli_query($conn, $read);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($readresult as $row) {
                                echo '
                            <tr class="col text-center paddingRow">
                            <td class="emp_id"> ' . $row['employee_id'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['contact'] . '</td>
                            <td>' . $row['dob'] . '</td>
                            <td>' . $row['address'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td class="paddingRowImg">
                            <button class="btn btn-primary text-center update_btnTB  ">Update</button>
                                <button class="btn btn-danger mx-2 delete_btnTB" >Delete</button>
                            </td>
                        </tr>
                            ';
                            }
                        }
                        ?>
                    </table>
                </div>




                <!-- update modal -->
                <div class="modal" id="UpdateDoctormodel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Update Record</h3>
                                <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="AdminPHPFile.php" method="POST">
                                    <div class="row">
                                        <input type="text" name="receptionist_id" id="receptionist_id">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Doctor Name:</label>
                                            <input type="text" name="update_name" id="update_name"
                                                placeholder="Enter Name" class="form-control mt-2" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Contact</label>
                                            <input type="tel" name="update_contact" id="update_contact"
                                                placeholder="0300-3234123" class="form-control mt-2 " required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Date of Birth</label>
                                            <input type="date" name="update_dob" id="update_dob"
                                                class="form-control mt-2" placeholder="12/12/2002" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" name="update_address" id="update_address"
                                                class="form-control mt-2" placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Password</label>
                                            <input type="text" name="update_password" id="update_password"
                                                class="form-control mt-2" placeholder="Enter Password" required>
                                        </div>
                                    </div>

                                    <input type="submit" name="recp_update_btn" id="" class="btn btn-primary mt-3">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function () {
                        $('.update_btnTB').click(function (e) {
                            e.preventDefault();
                            var id = $(this).closest('tr').find('.emp_id').text();
                            //    alert(id);
                            $.ajax({
                                type: "POST",
                                url: "AdminPHPFile.php",
                                data: {
                                    'checking_Recp_update_btn': true,
                                    'id_': id,
                                },
                                success: function (response) {
                                    $.each(response, function (key, value) {
                                        // console.log(value);
                                        $('#receptionist_id').val(value.receptionist_id);
                                        $('#update_name').val(value.name);
                                        $('#update_contact').val(value.contact);
                                        $('#update_dob').val(value.dob);
                                        $('#update_address').val(value.address);
                                        $('#update_password').val(value.password);
                                    });
                                    $('#UpdateDoctormodel').modal('show');
                                }
                            });
                        });
                    });
                </script>

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
                                <form action="AdminPHPFile.php" method="POST">
                                    <input type="text" name="receptionist_id1" id="receptionist_id1">
                                    <input type="submit" name="recp_delete_btn" class="btn btn-primary" value="Yes">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $('.delete_btnTB').click(function (e) {
                            e.preventDefault();
                            var id = $(this).closest('tr').find('.emp_id').text();
                            //    alert(id);
                            $.ajax({
                                type: "POST",
                                url: "AdminPHPFile.php",
                                data: {
                                    'checking_recp_delete_btn': true,
                                    'id_': id,
                                },
                                success: function (response) {
                                    $.each(response, function (key, value) {
                                        //    console.log(value);
                                        $('#receptionist_id1').val(value.receptionist_id);
                                    });
                                    $('#deletemodal').modal('show');
                                }
                            });
                        });
                    });
                </script>

            </div>
        </div>
    </main>



</body>

</html>