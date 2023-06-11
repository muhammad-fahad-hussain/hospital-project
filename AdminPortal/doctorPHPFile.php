<?php
include "connection.php";
session_start();
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

    $message = $_POST['message'];
    $Checked_again = $_POST['Checked_again'];
    //  appointment for checkup again
    $appointmentTime = $_POST['appointmentTime'];
    $appointment_date = $_POST['appointment_date'];

    $appointmentNo = $_POST['appointmentNo'];

    $room_no = $_POST['room'];
    $bedno = $_POST['bedno'];
 
    // read patient name
    $readQuery = "SELECT * from patient where patient_no='$patientID'";
    $readReasult = mysqli_query($conn, $readQuery);
    $r = mysqli_fetch_row($readReasult);


    // only for press admit hospital in yes
    if ($Admit === "yes") {
        $report_no = rand(1, 999);
        $checkupid = rand(1, 999);
        $admit = "INSERT INTO admit(room_no,bed_no,patient_no) VALUES('$room_no','$bedno','$patientID') ";
        $admitResult = mysqli_query($conn, $admit);
        if ($admitResult) {
            // check bed validation availible
            $checkroom = "SELECT * FROM beds as b INNER JOIN room as r on b.room_no=r.room_no WHERE b.room_no='$room_no'";
            $checkResult = mysqli_query($conn, $checkroom);
            $checkRow = mysqli_fetch_array($checkResult);
            if ($checkRow['status'] == 'booked') {
                $_SESSION['doctorPortalAlert'] = "This Bed is already booked";

                // send the value in checkup
                header('Location: checkup.php?patient_no=' . $patientID . ' &appointment_no=' . $appointmentNo . '');
            } else {
                //update beds status
                $room = "UPDATE beds SET status='booked' WHERE bed_no='$bedno'";
                $roomResult = mysqli_query($conn, $room);
                //   report patient
                $admit1 = "INSERT INTO report_patient(report_no,diseases,doctor_id,patient_id,checkup_id) VALUES('$report_no','$diseases','$doctor_id','$patientID',99) ";
                $admitResult1 = mysqli_query($conn, $admit1);

                if ($admitResult1) {
                    $deleteAdmit = "DELETE FROM appointmentportal where appointmentNo ='$appointmentNo'";
                    $deleteResult = mysqli_query($conn, $deleteAdmit);
                    if ($deleteResult) {
                        $_SESSION['appointmentAvalible'] = "Admitted successfull ";
                        header('Location: DoctorPortalcheck up.php');
                    }
                    // echo "Admit";
                } else {
                    $_SESSION['appointmentAvalible'] = "Not Admitted successfull";
                    header('Location: DoctorPortalcheck up.php');

                    // echo "error";
                }
            }
        }
    }
    // if no admit press
    elseif ($Admit === "no") {
        $report_no = rand(1, 999);
        $checkup_id = rand(1, 999);
        
        if ($Checked_again === "yes") {
            // check appointment already
            $appointmentCheck = "SELECT * from appointmentportal as a WHERE a.time_no='$appointmentTime' and a.appointment_date='$appointment_date' and  a.doctor_id='$doctor_id'";

            $appointmentCheckResult = mysqli_query($conn, $appointmentCheck);
            if (mysqli_num_rows($appointmentCheckResult) > 0) {
                $_SESSION['doctorPortalAlert'] = "This Appointment is already booked";
                // send the value in checkup
                header('Location: checkup.php?patient_no=' . $patientID . ' &appointment_no=' . $appointmentNo . '');
            } else {
                $dept = "SELECT dept_no FROM department WHERE dept_no=(SELECT dept_no FROM doctor WHERE doctor_id='$doctor_id')";
                $deptR = mysqli_query($conn, $dept);
                $deptRow = mysqli_fetch_array($deptR);
                $dept_no = $deptRow['dept_no'];


                $appointment = "INSERT INTO appointmentportal(appointment_date, status, dept_no, time_no, patient_no, doctor_id) VALUES('$appointment_date', '$diseases', '$dept_no', '$appointmentTime', '$patientID', '$doctor_id')";
                $appointmentResult = mysqli_query($conn, $appointment);

                if ($appointmentResult) {
                    $_SESSION['appointmentAvalible'] = "Check up complete";
                    header('Location: DoctorPortalcheck up.php');

                }
            }
        
        }
    } else {
        $_SESSION['doctorPortalAlert'] = "Check up already done";
        header('Location: DoctorPortalcheck up.php');

    }
                //   report patient
                $report = "INSERT INTO report_patient(report_no,diseases,report_text,doctor_id,patient_id,checkup_id,appointmentNo) VALUES('$report_no','$diseases',' $message','$doctor_id','$patientID','$checkup_id','$appointmentNo') ";
                $reportResult = mysqli_query($conn, $report);
                // medicine insert
                $n = 1;
                while ($n <= 3) {
                    if ($_POST['medicine_name' . $n] == "") {
                        $n++;
                    } else {
                        $medicine_name = $_POST['medicine_name' . $n];
                        $medicine = "INSERT INTO medicine (name, report_no) VALUES ('$medicine_name.$n', '$report_no')";
                        $medicineResult = mysqli_query($conn, $medicine);
                        $n++;
                    }
                }
        // Check up Date
        $checkup = "INSERT INTO checkup(date,doctor_id,patient_id) VALUES(CURDATE(),'$doctor_id','$patientID') ";
        $checkupResult = mysqli_query($conn, $checkup);
        if ($checkupResult) {
            $deleteAdmit = "DELETE FROM appointmentportal where appointmentNo ='$appointmentNo'";
            $deleteResult = mysqli_query($conn, $deleteAdmit);

         
    }
}


if (isset($_POST['room'])) {
    $room = $_POST['room'];
    $query = "SELECT * FROM beds as b INNER JOIN room as r ON b.room_no=r.room_no WHERE r.room_no='$room'";
    $result = mysqli_query($conn, $query);

    foreach ($result as $row) {
        echo '<option value="' . $row['bed_no'] . '">' . $row['bed_no'] . '</option>';
    }
}
?>