<?php
session_start();
include "connection.php";
?>

<?php

if (isset($_POST['signin'])) {
    $check = $_POST['user-type'];
    $username = $_POST['Portalusername'];
    $password = $_POST['PortalPassword'];

    if ($check == 'admin') {
        $sql = "SELECT * FROM admin WHERE admin_id = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['admin_id'] == $username && $row['password'] == $password) {
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + 600;
            $_SESSION['name'] = $row['name'];
            $_SESSION['admin_id'] = $row['admin_id'];
            header("Location: doctorAdmin.php");
            exit();
        } else {
            $_SESSION['signin'] = "Please enter your correct username and password";
        }
    }
    // doctor
    else if ($check == 'doctor') {
        $sql = "SELECT * FROM  employees as e inner join employees_portal AS ep on e.employee_id=ep.employee_id inner join doctor AS d on e.doctor_id=d.doctor_id WHERE e.employee_id = '$username' AND ep.password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['employee_id'] == $username && $row['password'] == $password) {
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + 600;
            $_SESSION['doctor_id'] = $row['doctor_id'];
            header("Location: DoctorPortalmyAppointment.php");
            exit();
        } else {
            $_SESSION['signin'] = "Please enter your correct username and password";
        }
    } else {
        $_SESSION['signin'] = "Please select a user-type";
    }

    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>

    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .Sign_IN {
            background-image: url('image/signup.jpg');
            height: 100vh;
            width: 100%;
            object-fit: cover;
        }

        .card {
            background-color: rgba(26, 2, 133, 0);
        }

        .text-decoration-none:hover {
            color: blue !important;
            text-decoration: underline !important;
            font-weight: bold !important;
        }
    </style>
</head>

<body>
    <!-- 
        =======================
              Sign IN
        =======================
     -->

    <div class="Sign_IN">
        <div class="container d-flex justify-content-center align-items-center pt-5">
            <div class="card p-0 mt-5" style="width: 400px;">
                <h1 class="card-header text-center">Sign In</h1>
                <div class="card-body p-5">
                    <?php
                    if (isset($_SESSION['signin'])) {
                        ?>

                        <div class="alert alert-warning alert-dismissible " role="alert">
                            <?php echo $_SESSION['signin'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['signin']);
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="mt-4">
                            <label for="" class="form-label font-weight-bold">Select User Type</label>
                            <select class="form-control" name="user-type" id="">
                                <option value="">Select User Type</option>
                                <option value="admin">Admin</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label font-weight-bold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="Portalusername" id="Portalusername" class="form-control"
                                    placeholder="Username or Email">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label font-weight-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"> <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="PortalPassword" id="PortalPassword" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-center mb-4">
                            <button type="submit" class="btn btn-primary" name="signin">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center ">
                        <p class="text-white font-weight-bold">Username/Email does not exist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- using script  -->
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>
    <script src="Javascript/scripts.js"></script>
</body>

</html>