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




// ======================================================================================================================
//                               portal checkup
// ======================================================================================================================

//    department select
if (isset($_POST['rooms'])) {
  $room = $_POST['room'];
  $query = "SELECT bed_no from beds as s inner join room as d 
  on s.room_no=d.room_no where d.room_no='$room'";
  $result = mysqli_query($conn, $query);

  foreach ($result as $row) {
    echo '
      <option value="' . $row['bed_no'] . '" >' . $row['bed_no'] . '</option>
      ';
  }
}



if (isset($_POST['checkUpBtn'])) {
  $patientID = $_POST['patientID'];
  $doctor_id = $_POST['doctor_id'];
  $diseases = $_POST['diseases'];
  $Admit = $_POST['Admit'];
  $medicine_name1 = $_POST['medicine_name1'];
  $medicine_name2 = $_POST['medicine_name2'];
  $medicine_name3 = $_POST['medicine_name3'];
  $message = $_POST['message'];
  $Checked_again = $_POST['Checked_again'];
  //  appointment for checkup again
//  $appointmentTime= $_POST['appointmentTime'];
//  $appointment_date= $_POST['appointment_date'];

  $appointmentTime = $_POST['appointmentTime'];
  $appointment_date = $_POST['appointment_date'];


  $room_no = $_POST['room'];
  $bedno = $_POST['bedno'];

  if ($Admit === "yes") {
    $admit = "INSERT INTO admit(room_no,bed_no,patient_no) VALUES('$room_no','$bedno','$patientID') ";
    $admitResult = mysqli_query($conn, $admit);
    if ($admitResult) {
      $admit1 = "INSERT INTO report_patient(diseases,doctor_id,patient_id) VALUES('$diseases','$doctor_id','$patientID') ";
      $admitResult1 = mysqli_query($conn, $admit1);
      if ($admitResult1) {
        echo "Admit";
      } else {
        echo "error";
      }
    }
  }
}





// ======================================================================================================================
//                               portal Appointmetn
// ======================================================================================================================

// delete doctor

if (isset($_POST['checking_delete_btn'])) {
  $id = $_POST['id_'];
  //echo $id;
  $query = "SELECT * FROM appointmentportal AS d WHERE d.appointmentNo='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0) {
    echo '  <form action="main.php" method="POST">
    <input type="hidden" name="d_ID" id="d_ID" value="' . $id . '">
    <input name="delete_appointment" type="submit" class="btn btn-primary" value="Yes">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
</form>';
  }

}

if (isset($_POST['delete_appointment'])) {
  $id = $_POST['d_ID'];
  $query = "DELETE FROM appointmentportal WHERE appointmentNo= '$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $_SESSION['AppointmentStatus'] = "Appointment cancel successfully";
    header("Location: patientportalappointment.php");
  } else {
    $_SESSION['AppointmentStatus'] = "Appointment cancel Failed";
    header("Location: patientportalappointment.php");
  }
}



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
// appointmetn

  if (isset($_POST['appointmentPortal'])) {
    $patientid = $_POST['patientID'];
    $dept_no = $_POST['department'];
    $doctorid = $_POST['doctorid'];
    $time = $_POST['appointmentTime'];
    $date = $_POST['appointment_date'];

    $status = $_POST['status'];
    $message = $_POST['message'];
    // Appointment is already booked

    $appointmentCheck = "SELECT * from appointmentportal as a WHERE a.time_no='$time' and a.appointment_date='$date' and  a.doctor_id='$doctorid'";
    $appointmentCheckResult = mysqli_query($conn, $appointmentCheck);

    if (mysqli_num_rows($appointmentCheckResult) > 0) {
      $_SESSION['AppointmentStatus'] = "This Appointment is already booked";
      // 
      header('Location: patientportalappointment.php');
    } else {
      $query = "INSERT INTO appointmentportal(appointment_date,status,message,dept_no,time_no,patient_no,doctor_id)
      VALUES('$date','$status','$message','$dept_no','$time','$patientid','$doctorid')";
      $result = mysqli_query($conn, $query);
      if ($result) {
        $_SESSION['AppointmentStatus'] = "Your appointment number is " . $time;
        header("location: patientportalappointment.php");

        // echo "Your appointment is booked";

        // header("location: patientportalappointment.php");
      } else {
        $_SESSION['AppointmentStatus'] = "Your appointment is not booked";
        // echo "Your appointment is not booked";
        header("location: patientportalappointment.php");

      }
    }

  }
}


?>