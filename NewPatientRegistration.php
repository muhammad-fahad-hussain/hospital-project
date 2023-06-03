<?php
session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="CSS/mainpage.css">
  <script src="Javascript/scripts.js"></script>



  <title>New Patient Registration</title>
  <style>
    .border-left {
      border-left: 1px gray solid;
    }

    @media screen and (max-width:767px) {
      .border-left {
        border-left: none !important;
        padding-top: 0% !important;
        margin-top: 0% !important;
      }

      .border-left {
        border-left: none !important;
        padding-top: 0% !important;
        margin-top: 0% !important;
      }

    }
  </style>

</head>

<body>
  <nav class="Navigation-appointment">
    <h2 class="logo">Doctors Hospital</h2>
    <nav>
      <button data-bs-toggle="modal" data-bs-target="#appoinmentModal"
        style="background-color: transparent; border: none;"> <a href="#" class="Navigation-btn"> <img
            src="icon/calendar.png" alt="icon" height="30px" width="30px" class="icon-Navigation-btn">
          Appointment</a></button>
      <a href="/signInPatient.html" class="Navigation-btn" target="_blank"><img src="icon/log-in.png" alt=""
          height="30px" width="30px" class="icon-Navigation-btn"> Sign In</a>
    </nav>
  </nav>




  <div class="modal " id="appoinmentModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">Appointment</h5>
          <button class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <form action="">
              <div class="row">
                <div class="col-sm-6">
                  <label for="" class="form-label">Patient Name:</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label">Select Speciality</label>
                  <select name="" id="" class="form-select text-dark" required>
                    <option value="Select Speciality" class="" selected>Select Speciality</option>
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
                    <option value="Orthopaedics">Orthopaedics</option>
                  </select>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-6">
                  <label for="" class="form-label">Email:</label>
                  <input type="email" name="" id="" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label">Contact No:</label>
                  <input type="tel" name="" id="" class="form-control" placeholder="Enter Contact No" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-6">
                  <label for="" class="form-label">Date Of Birth:</label>
                  <input type="date" name="" id="" class="form-control" required>
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label">Date:</label>
                  <input type="date" name="" id="" class="form-control" required>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-6">
                  <label for="" class="form-label">Time:</label>
                  <input type="time" name="" id="" class="form-control" required>
                </div>
              </div>
              <div class="col-sm-8 mt-3">
                <label for="" class="form-label">Message:</label>
                <textarea class="form-control" name="" id="" rows="5" placeholder="Message"></textarea>
              </div>
              <input type="submit" name="" id="" class="btn btn-primary mt-3">

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark"
    style="background:linear-gradient(to right , #51478a , #3f7897,#16aeb9)">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/mainpage.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/doctor.html">Doctors</a>
        </li>
        <!-- Department Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button" data-bs-toggle="dropdown">
            Departments
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/departmentAnaesthesia.html" target="_blank">Anaesthesia</a>
            </li>
            <li><a class="dropdown-item" href="#" target="_blank">Cardiology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Dental</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Emergency</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Endocrinology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Gastroenterology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Neurology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Orthopaedics</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Ophthalmology (EYE)</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Otolaryngology (ENT)</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Psychology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Pulmonology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">Rheumatology</a></li>
            <li><a class="dropdown-item" href="#" target="_blank">UROLOGY</a></li>
          </ul>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" type="button" data-bs-toggle="dropdown">
            Services
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="/AdminPortal/signinportal.html" target="_blank">Admin portal</a></li>

            <li><a class="dropdown-item" href="signInPatient.html" target="_blank"> Patient portal</a></li>
            <li><a class="dropdown-item" href="AdminPortal/signinportal.html" target="_blank">Doctor Portal</a></li>
            <li><a class="dropdown-item" href="AdminPortal/signinportal.html" target="_blank">Receptionist Portal</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact.html">Contact Us</a>
        </li>

      </ul>

    </div>
  </nav>
  <!-- 

  ======================================
          Registration breadcrumb
  ======================================
 -->
  <div class="col-md-12 bg-light px-5 pt-5" style="height: 30vh ;">
    <!-- using breadcrumb bootstrap class  -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb px-5">
        <li class="breadcrumb-item "><a href="/mainpage.html" class="text-decoration-none text-primary">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Patient Registration</li>
      </ol>
    </nav>
    <p class="px-5"><span class="text-dark font-weight-bold display-6">NEW PATIENT </span><span
        style="color: forestgreen;" class="font-weight-bold display-6">REGISTRATION</span> </p>
  </div>
  <!-- 

  ======================================
          Registration From
  ======================================
 -->

  <div class="col-md-12  mt-3">
    <div class="container-fluid">
      <div class="container">
        <div class="card p-3" style="border: none;padding: 0% !;">
          <h5 class="card-header text-center bg-primary text-white "> Consent Form</h5>
          <div class="card-body border border-primary">
            <!-- GENERAL CONSENT FOR TREATMENT -->
            <div class="card  p-3 mt-4" style="border: none;">
              <h6 class="card-header text-center bg-danger">GENERAL CONSENT FOR TREATMENT</h6>
              <div class="card-body border">
                <div class="container">
                  <div class="card-text">
                    We are requesting your consent to provide medical treatment and care for your current condition.
                    This
                    consent form is designed to ensure that you are fully informed about your medical condition, the
                    proposed treatment plan, and any associated risks or benefits.
                    <br>
                    We assure you that your information will be kept confidential and secure, and will only be accessed
                    by
                    authorized personnel for the purpose of providing you with quality healthcare services. Your
                    information
                    may also be shared with other healthcare providers involved in your treatment and care, as
                    necessary.
                    <br>

                    By clicking "I Agree" on the registration portal, you are indicating your consent to the collection,
                    use,
                    and disclosure of your personal information as described above. <br>

                    If you have any questions or concerns about our privacy policies and practices, please do not
                    hesitate
                    to contact us.
                    <br>
                    Thank you for choosing our hospital for your healthcare needs.
                  </div>
                </div>
              </div>
            </div>
            <div class="card p-3 mt-4" style="border: none;">
              <h6 class="card-header text-center bg-success ">PATIENT DETAILS </h6>
              <div class="card-body border">
                <div class="container">
                  <!-- form -->
                  <!-- using alert for show the status -->
                  <?php
                  if (isset($_SESSION['RegistratedStatus'])) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <?php
                      echo $_SESSION['RegistratedStatus']
                        ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['RegistratedStatus']);
                  }
                  ?>
                  <!-- end  -->
                  <form action="main.php" name="newPatientRegistration" method="POST">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="" class="form-label">Full Name</label>
                          <input type="text" name="name" id="reg_name" class="form-control"
                            placeholder="Enter Full Name" required>
                        </div>
                        <div class="mt-3">
                          <label for="" class="form-label">Email ID</label>
                          <input type="email" name="email" id="" class="form-control" placeholder="email@example.com"
                            required>
                        </div>
                        <div class="mt-3">
                          <label for="" class="form-label">Contact</label>
                          <input type="tel" name="contact" id="contact_Reg" class="form-control"
                            placeholder="Enter Contact No" required>
                        </div>
                        <div class="mt-3">
                          <label for="form-label">Date of Birth</label>
                          <div class="input-group mt-2">
                            <input type="date" class="form-control" name="dob" id="DOB_reg" required>
                            <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i
                                class="fas fa-calendar-alt"></i></button> -->
                          </div>
                        </div>
                        <br>
                      </div>
                      <!-- col-md-6 -->
                      <div class="col-md-6 border-left">
                        <div class="mt-3">
                          <label for="" class="form-label">Password</label>
                          <input type="text" name="password" id="password_patient" class="form-control"
                            placeholder="Enter Password" min="8" required>
                        </div>
                        <div class="mt-3">
                          <label for="" class="form-label">Gender</label>
                          <div class="row">
                            <div class="col-sm-2">
                              <div class="form-check">
                                <input type="radio" name="gender" id="" class="form-check-input" value="male">
                                <label for="" class="form-check-label">Male</label>
                              </div>

                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <input type="radio" name="gender" id="" class="form-check-input" value="female">
                                <label for="" class="form-check-label">Female</label>

                              </div>
                            </div>
                          </div>
                        </div>
                        <hr style="background-color: black;">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                          <label class="form-check-label" for="flexCheckDefault">I Agree</label>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" name="registrationBtn"
                          onclick="NewPatientRegistration()" value="Registrated">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Form -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 
  ===============================
           Footer
  ===============================
 -->
  <div class="col-md-12" style="background-color: #0e1d1c;">
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 ">
            <h4 class="mt-5 mb-5" style="color: forestgreen;"> <span style="color: beige;">Doctors</span>
              Hospital</h4>
            <p style="color: beige;">Doctors Hospital is the best hospital in Lahore, providing world-class
              care to all patients. We are a multi-specialty hospital with cutting-edge integrated
              technology and Western-trained staff.</p>

          </div>
          <!-- Use Css .set -->
          <!-- General -->
          <div class="col-md-3  px-5">
            <ul class="list-unstyled mx-5">
              <li>
                <h4 class="mt-5 mb-5" style="color:#fff">General</h4>
              </li>
              <li>
                <a href="/mainpage.html" class="set">Home</a>
              </li>
              <li>
                <a href="/about.html" class="set">About</a>
              </li>
              <li>
                <a href="AdminPortal/signinportal.html" class="set">Services</a>
              </li>
              <li>
                <a href="/doctor.html" class="set">Doctor</a>
              </li>
              <li>
                <a href="departmentAnaesthesia.html" class="set">Department</a>
              </li>
              <li>
                <a href="/contact.html" class="set">Contect Us</a>
              </li>

            </ul>

          </div>
          <!-- Email -->
          <div class="col-md-3 px-4">
            <ul class="list-unstyled">
              <li>
                <h4 class="mt-5 mb-5" style="color:#fff">Email</h4>
              </li>
              <li class="set">
                <i class="fas fa-envelope-open-dollar"></i>
                <a href="mailto:mfahadpk176@gmail.com" class="set mx-2">General Enquiry</a>
              </li>
              <li class="set">
                <i class="fas fa-envelope-open-dollar"></i>
                <a href="mailto:mehboobwaqar444@gmail.com" class="set mx-2">Suport,Complaints &
                  Feedback</a>
              </li>
              <li class="set">
                <i class="fas fa-envelope-open-dollar"></i>
                <a href="mailto:mfahadpk176@gmail.com" class="set mx-2">JCI Related Concerns</a>
              </li>

            </ul>

          </div>
          <!-- support -->
          <div class="col-md-3 px-5">
            <ul class="list-unstyled mx-5 px-2">
              <li>
                <h4 class="mt-5 mb-5" style="color:#fff">Support</h4>
              </li>
              <li>
                <a href="/NewPatientRegistration.html" class="set" target="_blank">Sign Up</a>
              </li>
              <li>
                <a href="/signInPatient.html" class="set" target="_blank">Sign In</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <hr style="color: #39c7cc; height: 3px;">
    <!-- Copyright -->
    <div class="container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <p style="color: #fff;">©Copyright 2022. Doctors Hospital Hospital. All Rights Reserved.</p>
          </div>
          <div class="col-md-3">
            <ul class="list-unstyled d-flex justify-content-between px-3">
              <li>
                <a href="#" class="set" target="_blank">Privacy Policy</a>
              </li>
              <li>
                <a href="/about.html" class="set" target="_blank">About Us</a>
              </li>
            </ul>
          </div>
          <div class="col-md-1">

          </div>
          <div class="col-md-2">
            <ul class="list-unstyled d-flex justify-content-between">
              <li>
                <a href="https://www.facebook.com/mehboob.waqar.5?mibextid=ZbWKwL" class="set" target="_blank"><i
                    class="fab fa-facebook"></i></a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/muhammadfahadhussain/" class="set" target="_blank"><i
                    class="fab fa-linkedin"></i></a>
              </li>
              <li>
                <a href="https://instagram.com/its_sharii01?igshid=YmMyMTA2M2Y=" class="set" target="_blank"><i
                    class="fab fa-instagram"></i></a>
              </li>
              <li>
                <a href="https://www.twitter.com/" class="set" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href="https://www.youtube.com/" class="set" target="_blank"><i class="fab fa-youtube"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>



  </div>
  <!-- script -->
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="bootstrap-5.1.3-dist/js/jquery-3.5.1.js"></script>

</body>

</html>