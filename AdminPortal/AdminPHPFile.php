<?php

session_start();
include "connection.php";

/* ==================================================================================================================
                                                Admin Doctor
   ==================================================================================================================*/


//    department select
if (isset($_POST['department'])) {
    $dept_no = $_POST['department'];
    $query = " SELECT s.speciality_id,s.speciality_name from speciality as s inner join department as d 
    on s.dept_no=d.dept_no where d.dept_no= '$dept_no'";
    $result = mysqli_query($conn, $query);

    foreach ($result as $row) {
        echo '
        <option value="' . $row['speciality_id'] . '" >' . $row['speciality_name'] . '</option>
        ';
    }
}

// add doctor
if (isset($_POST['add_doctor'])) {
    $id = rand(1000, 9999);
    $name = $_POST['doctor_name'];
    $department = $_POST['department'];
    $speciality = $_POST['speciality'];
    $doctor_phone = $_POST['doctor_phone'];
    $dob = $_POST['dob_doctor'];
    $experience = $_POST['experience_doctor'];
    $education = $_POST['education'];
    $address_doctor = $_POST['address_doctor'];
    $gender = $_POST['gender_doctor'];
    $about = $_POST['about'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $img = mysqli_real_escape_string($conn, $image);

    $job_role = "doctor";
    $salary = 100000;
    $emp_id = rand(1000, 5000);
    $shiftTiming = $_POST['shiftTiming'];
    $password = $_POST['password_doctor'];
    $p_id = rand(1000, 5000);

    // if($img)
    // {
    //     echo "upload";
    // }
    // else
    // {
    //     echo "error";

    // }
    $query1 = "INSERT INTO doctor VALUES('$id','$name','$doctor_phone','$dob','$experience','$education','$address_doctor','$img','$gender',
    '$about','$speciality','$department')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        // employee
        $query2 = "INSERT INTO employees (employee_id,job_role,salary,shiftTiming,doctor_id) 
        VALUES('$emp_id','$job_role','$salary','$shiftTiming','$id')";
        $result2 = mysqli_query($conn, $query2);
        // emp_portal
        $query3 = "INSERT INTO employees_portal (portal_id,employee_id,password) VALUES('$emp_id','$emp_id','$password')";
        $result3 = mysqli_query($conn, $query3);


        if ($result3) {
            $_SESSION['doctorAdminAlert'] = "Add the doctor successfully";
            header("Location: doctorAdmin.php");
        }

    } else {
        $_SESSION['doctorAdminAlert'] = "Not added the doctor successfully";
        header("Location: doctorAdmin.php");
    }


}


// update btn doctor
if (isset($_POST['checking_viewbtn_update'])) {
    $id = $_POST['id_'];
    $query = "SELECT * FROM doctor AS d INNER JOIN employees AS e ON d.doctor_id=e.doctor_id INNER JOIN employees_portal AS ep on ep.employee_id=e.employee_id WHERE d.doctor_id='$id'";

    $r = mysqli_query($conn, $query);
    foreach ($r as $row) {
        echo '                
        <form action="AdminPHPFile.php" name="updateDoctorform" method="POST">
                    <input type="hidden" name="doctor_id" id="update_id" value="' . $row['doctor_id'] . '">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label" >Doctor Name:</label>
                            <input type="text" name="doctor_name_U" id="doctor_name_U" placeholder="Enter Doctor Name"
                                class="form-control mt-2" value="' . $row['name'] . '" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Contact</label>
                            <input type="tel" name="doctor_phone_U" id="doctor_phone_U" placeholder="0300-3234123"
                                class="form-control mt-2 " value="' . $row['contact'] . '" required>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Date of Birth</label>
                            <input type="date" name="dob_doctor_U" id="dob_doctor_U" class="form-control mt-2"
                                placeholder="12/12/2002" value="' . $row['dob'] . '" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Experience</label>
                            <input type="number" placeholder="Enter Experience" name="experience_doctor_U" id="experience_doctor_U"
                                class="form-control mt-2" value="' . $row['experience'] . '" required>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address_u" id="" class="form-control mt-2" value="' . $row['address'] . '" placeholder="Enter Address"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Education</label>
                            <input type="text" name="education_u" id="" class="form-control mt-2"
                                placeholder="Enter Education " value="' . $row['education'] . '" required>
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Password</label>
                            <input type="text" name="password_u" id="password_doctor" class="form-control mt-2"
                                placeholder="Choose a password" minlength="5"  value="' . $row['password'] . '" required>
                        </div>
                       
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <label for="" class="form-label">About</label>
                            <textarea class="form-control" name="about_u" id="" rows="5" placeholder="" required>' . $row["about"] . '</textarea>
                        </div>
                    </div>
                    <input type="submit" name="UpdateDoctorform" id="" class="btn  btn-primary mt-3" onclick="UpdateDoctorform()">
                </form>
                  
        ';
    }
}

if (isset($_POST['UpdateDoctorform'])) {
    $id = $_POST['doctor_id'];
    $name = $_POST['doctor_name_U'];
    $phone = $_POST['doctor_phone_U'];
    $dob = $_POST['dob_doctor_U'];
    $experience = $_POST['experience_doctor_U'];
    $education = $_POST['education_u'];
    $password = $_POST['password_u'];
    $about = $_POST['about_u'];
    $address_u = $_POST['address_u'];
    $shiftTiming = $_POST['shiftTiming'];


    $query = "UPDATE doctor SET name='$name',contact='$phone',dob='$dob',address='$address_u',experience='$experience',education='$education',about='$about' WHERE doctor_id='$id'";
    $result = mysqli_query($conn, $query);
    // $query = "UPDATE employees SET shiftTiming='$shiftTiming' WHERE doctor_id='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['doctorAdminAlert'] = "Update the record successfully";
        header("Location: doctorAdmin.php");
    } else {
        $_SESSION['doctorAdminAlert'] = "Delete the record successfully";
        header("Location: doctorAdmin.php");
    }
}


// view

// view
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['id_'];

    $query = "SELECT * FROM doctor AS d INNER JOIN employees AS e ON d.doctor_id=e.doctor_id INNER JOIN employees_portal AS ep 
    ON ep.employee_id=e.employee_id INNER JOIN department AS dept ON dept.dept_no=d.dept_no INNER JOIN speciality AS s ON 
    s.speciality_id=d.speciality_id WHERE d.doctor_id ='$id'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            // while($row=mysqli_fetch_assoc($result))

            $id = $row['doctor_id'];
            $name = $row['name'];
            echo '                
            <div class="row ">
            <div class="col-md-4">
                <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" class="img-fluid pt-3 pb-3 px-2">
            </div>
            <div class="col-md-8">
            <p for="" class=" display-6 px-3">Doctor ID: ' . $id . '</p>
                <div class="row pt-1 px-4">
                    <div class="col-md-6 px-3">
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Name:</label>
                             <p class="text-muted">' . $name . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Speciality:</label>
                             <p class="text-muted">' . $row['speciality_name'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Experience:</label>
                             <p class="text-muted">' . $row['experience'] . '</p>
                        </div>  
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Contact:</label>
                             <p class="text-muted">' . $row['contact'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Portal Password:</label>
                             <p class="text-muted">' . $row['password'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Address:</label>
                             <p class="text-muted">' . $row['address'] . '</p>
                        </div>
                                                            
                        
                    </div>

                    <div class="col-md-6">
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Department:</label>
                             <p class="text-muted">' . $row['dept_name'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Data of Births:</label>
                             <p class="text-muted">' . $row['dob'] . '</p>
                        </div>
                        
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Education:</label>
                             <p class="text-muted">' . $row['education'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Salary:</label>
                             <p class="text-muted">RS: ' . $row['salary'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Start Timing:</label>
                             <p class="text-muted">' . $row['shiftTiming'] . '</p>
                        </div>
                        <div style="font-size: 1.1em;">
                            <label for="" class="form-">Gender:</label>
                             <p class="text-muted">' . $row['gender'] . '</p>
                        </div>
                        
                    </div>

                </div>
                <div style="font-size: 1.1em;" class="mt-3 px-4">
                    <label for="" class="pb-2 display-6">About:</label>
                     <p style="font-size: 1em;" class="text-muted">' . $row['about'] . '</p>
                </div>
            </div>
        </div>
              
            ';

        }

    }
}

// delete doctor

if (isset($_POST['checking_delete_btn'])) {
    $id = $_POST['id_'];
    $query = "SELECT * FROM doctor AS d INNER JOIN employees AS e ON d.doctor_id=e.doctor_id INNER JOIN employees_portal AS ep on ep.employee_id=e.employee_id WHERE d.doctor_id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            // while($row=mysqli_fetch_assoc($result))
            echo ' 
            <form action="AdminPHPFile.php" method="POST">
              <input type="hidden" name="d_ID" id="d_ID" value="' . $row['doctor_id'] . '">
              <input name="delete_doctor" type="submit" class="btn btn-primary"  value="Yes">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
            </form>
            ';

        }

    }
}

if (isset($_POST['delete_doctor'])) {
    $id = $_POST['d_ID'];
    $query = "DELETE FROM doctor WHERE doctor_id= '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['doctorAdminAlert'] = "Deleted the record successfully";
        header("Location: doctorAdmin.php");
    } else {
        $_SESSION['doctorAdminAlert'] = "Employee Delete Failed";
        header("Location: doctorAdmin.php");
    }
}


// for the searching doctor
if (isset($_POST['searching_doctor'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM doctor WHERE name LIKE '%" . $search . "%' OR doctor_id LIKE '%" . $search . "%'";
    $result = mysqli_query($conn, $query);
    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row of the result
        while ($row = mysqli_fetch_assoc($result)) {
            // Access individual columns of each row
            $doctorName = $row['name'];
            $doctorId = $row['doctor_id'];

            // Perform any actions or display the retrieved data
            echo "Doctor ID: " . $doctorId . "<br>";
            echo "<br>";
        }
    } else {
        echo "No results found.";
    }
}



/* ==================================================================================================================
                                                Receptionist 
   ==================================================================================================================*/


if (isset($_POST['receptionist_add'])) {
    $recp_id = rand(1000, 9999);
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $emp_id = rand(5001, 7000);
    $job_role = "receptionist";
    $salary = 50000;
    $shiftTiming = $_POST['shiftTiming'];
    $password = $_POST['password'];
    $query1 = "INSERT INTO receptionist(receptionist_id,name,contact,dob,address,gender)  VALUES('$recp_id','$name',' $contact','$dob','$address','$gender')";
    $result1 = mysqli_query($conn, $query1);
    if ($query1) {
        // insert employees table
        $query2 = "INSERT INTO employees(employee_id,job_role,salary,shiftTiming,receptionist_id) VALUES('$emp_id','$job_role','$salary','$shiftTiming','$recp_id')";
        $result2 = mysqli_query($conn, $query2);
        // insert employees_portal table
        $query3 = "INSERT INTO employees_portal(portal_id ,employee_id ,password) VALUES('$emp_id','$emp_id','$password')";
        $result3 = mysqli_query($conn, $query3);
        if ($result2) {
            $_SESSION['receptionistAdminAlert'] = "Add the record successfully";
            header("Location: ReceptionistAdmin.php");


        }
    } else {
        // echo "e";
        $_SESSION['receptionistAdminAlert'] = "Remove the Doctor successfully";
        header("Location: ReceptionistAdmin.php");
    }

}


// update

// update
if (isset($_POST['checking_Recp_update_btn'])) {
    $id = $_POST['id_'];
    $result_array = [];
    $read = "SELECT * FROM receptionist as r inner join employees as e on r.receptionist_id =e.receptionist_id 
    inner join employees_portal as ep on e.employee_id =ep.employee_id";
    $result = mysqli_query($conn, $read);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            array_push($result_array, $row);
        }

        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}

if (isset($_POST['recp_update_btn'])) {
    $id = $_POST['receptionist_id'];

    $name = $_POST['update_name'];
    $contact = $_POST['update_contact'];
    $dob = $_POST['update_dob'];
    $address = $_POST['update_address'];
    $password = $_POST['update_password'];

    $query = "UPDATE receptionist SET name='$name',  contact='$contact', dob='$dob', address='$address' WHERE receptionist_id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $query1 = "UPDATE employees as e inner join employees_portal as ep SET ep.password='$password' WHERE e.receptionist_id=$id";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            $_SESSION['receptionistAdminAlert'] = "Successfull Update";

            header('Location: ReceptionistAdmin.php');
            exit();
        }

    } else {
        $_SESSION['receptionistAdminAlert'] = "Not Update";
        header('Location: ReceptionistAdmin.php');
    }
}

// delete
if (isset($_POST['checking_recp_delete_btn'])) {
    $id = $_POST['id_'];
    $result_array = [];
    $read = "SELECT * FROM receptionist as r inner join employees as e on r.receptionist_id =e.receptionist_id 
    inner join employees_portal as ep on e.employee_id =ep.employee_id";
    $result = mysqli_query($conn, $read);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            array_push($result_array, $row);
        }

        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}

if (isset($_POST['recp_delete_btn'])) {

    $id = $_POST['receptionist_id1'];

    $query1 = "DELETE FROM  receptionist WHERE receptionist_id ='$id'";
    $result = mysqli_query($conn, $query1);

    if ($result) {

        $_SESSION['receptionistAdminAlert'] = "Successfull Delete";
        header('Location: ReceptionistAdmin.php');


    } else {
        $_SESSION['receptionistAdminAlert'] = "Not Delete";
        header('Location: ReceptionistAdmin.php');
    }
}

// ===================================================================================
//                               Myappointment
// ==================================================================================
if (isset($_POST['searchAdppointment'])) {
    $date = $_POST['date'];

    $q = "SELECT COUNT(appointment_date) FROM appointmentportal WHERE DATE(appointment_date) = '$date'";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_array($result);
    echo ' <h3 class="display-3">' . $row[0] . '</h3>';
}

?>