<?php
session_start();
include 'connection.php';
if (isset($_POST['signinBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM patient_portal AS pp INNER JOIN patient AS p ON pp.patient_no = p.patient_no WHERE (p.email='$username' or pp.patient_no = '$username') AND pp.password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row && ($row['patient_no'] == $username && $row['password'] == $password) || $row && ($row['email'] == $username && $row['password'] == $password)) {
        $_SESSION['end'] = time()+ 600;
        $_SESSION['patient_no'] = $row['patient_no'];
        $_SESSION['patient_name'] = $row['patient_name'];
        //  echo  $_SESSION['patient_no'];
         header("Location: patientportal.php");
    } else {
        $_SESSION['signinPatient'] = "Enter the correct password and username.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>

    <link rel="stylesheet" href="CSS/mainpage.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .Sign_IN {
            /* background-image: url('image/signin.jpg'); */
            height: 100vh;
            width: 100%;
            object-fit: cover;
        }

        .card {
            background-color: transparent;
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
                    <!-- using alert for show the status -->
                    <?php
                    if (isset($_SESSION['signinPatient'])) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?php
                            echo $_SESSION['signinPatient']
                                ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['signinPatient']);
                    }
                    ?>
                    <!-- end  -->
                    <form action="" method="POST">
                        <div class="mt-3">
                            <label for="" class="form-label font-weight-bold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="username" id="" class="form-control"
                                    placeholder="Username or Email">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label font-weight-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"> <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-center mb-4">
                            <input type="submit" name="signinBtn" id="" class="btn btn-primary" value="Sign In"
                                onclick="">
                        </div>
                    </form>
                    <div class="mt-3 text-center ">
                        <p class="text-white font-weight-bold">Username/Email does not exist</p>
                        <a href="NewPatientRegistration.html" class="text-decoration-none text-white ">Registration</a>
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