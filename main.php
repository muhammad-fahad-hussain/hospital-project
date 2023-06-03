<?php
session_start();
include "connection.php";


if (isset($_POST['registrationBtn'])) {
  $id = rand(1000, 9999);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];

  $query = "INSERT INTO patient (patient_no,patient_name,email,contact,dob,gender)
  VALUES('$id','$name','$email','$contact','$dob','$gender')";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $query1 = "INSERT INTO patient_portal (patient_no,password)
    VALUES('$id','$password')";
    $result1 = mysqli_query($conn, $query1);
    $_SESSION['RegistratedStatus'] = "Successfull Registrated";
    header("location:NewPatientRegistration.php");

  } else {
    $_SESSION['RegistratedStatus'] = "UnSuccessfull Registrated";
    header("location: NewPatientRegistration.php");
  }


}

// ======================================================================================================================
//                              portal Appointment
// ======================================================================================================================
//    department select


if (isset($_POST['department'])) {
  $dept_no = $_POST['department'];
  $query = "SELECT s.doctor_id, s.name FROM doctor AS s INNER JOIN department AS d ON s.dept_no = d.dept_no WHERE d.dept_no = '$dept_no'";
  $result = mysqli_query($conn, $query);
  if (mysqli_fetch_row($result) > 0) {
    foreach ($result as $row) {
      echo '<option value="' . $row['doctor_id'] . '">' . $row['name'] . '</option>';
    }
  } else {
    echo '<option value="">Not availble doctor</option>';
  }


  if (isset($_POST['appointmentPortal'])) {
    $patientid = $_POST['patientID'];
    $dept_no = $_POST['department'];
    $doctorid = $_POST['doctorid'];
    $time = $_POST['appointmentTime'];
    $date = $_POST['appointment_date'];

    $status = $_POST['status'];
    $message = $_POST['message'];

    $query = "INSERT INTO appointmentportal(appointment_date,status,message,dept_no,time_no,patient_no,doctor_id)
       VALUES('$date','$status','$message','$dept_no','$time','$patientid','$doctorid')";
    $result = mysqli_query($conn, $query);
    if ($result) {
     // $_SESSION['AppointmentStatus'] = "Your appointment number is " . $time;
      echo "Your appointment is booked";

      // header("location: patientportalappointment.php");
    } else {
      //$_SESSION['AppointmentStatus'] = "Your appointment is not booked";
      echo "Your appointment is not booked";
      // header("location: patientportalappointment.php");

    }
  }
}












?>