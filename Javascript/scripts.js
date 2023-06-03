function validateForm(event) {
  event.preventDefault();

  // Get form values
  const patientName = document.getElementById('patientName').value;
  const speciality = document.getElementById('speciality').value;
  const email = document.getElementById('email').value;
  const contactNo = document.getElementById('contactNo').value;
  const dob = document.getElementById('dob').value;
  const appointmentDate = document.getElementById('appointmentDate').value;
  const appointmentTime = document.getElementById('appointmentTime').value;
  const message = document.getElementById('message').value;

  // Validate form inputs
  if (patientName === '' || speciality === '' || email === '' || contactNo === '' || dob === '' || appointmentDate === '' || appointmentTime === '') {
    alert('Please fill in all required fields.');
    return;
  }

  // Perform additional validation
  if (!validateEmail(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  // Submit the form if all validations pass
  document.getElementById('appointmentForm').submit();
}

// Email validation function
function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}


function patientPortal() {
  var username = document.getElementById("patientUsername").value;
  var password = document.getElementById("patientPassword").value;

  if (username === "fahad" && password === "fahad") {
    window.location.href = "patientportal.html";
  } else if (username === "mehboob" && password === "mehboob") {
    window.location.href = "patientportal.html";
  } else {
    alert("Invalid account credentials. Please try again.");
  }


}
function Portals() {
  var usertype = document.getElementById("user-type").value;
  var username = document.getElementById("Portalusername").value;
  var password = document.getElementById("PortalPassword").value;

  if (usertype === "admin") {
    if (username === "fahad" && password === "fahad") {
      window.location.href = "/AdminPortal/admindashboard.html";
    } else if (username === "mehboob" && password === "mehboob") {
      window.location.href = "/AdminPortal/admindashboard.html";
    } else {
      alert("Invalid account credentials. Please try again.");
    }
  } else if (usertype === "receptionist") {
    if (username === "mehboob" && password === "mehboob") {
      window.location.href = "/Receptionist/ReceptionistDashboard.html";
    } else if (username === "taimoor" && password === "taimoor") {
      window.location.href = "/Receptionist/ReceptionistDashboard.html";
    } else {
      alert("Invalid account credentials. Please try again.");
    }
  } else if (usertype === "doctor") {
    if (username === "fahad" && password === "fahad") {
      window.location.href = "/Doctor/DoctorDashboard.html";
    } else if (username === "asad" && password === "asad") {
      window.location.href = "/Doctor/DoctorDashboard.html";
    } else {
      alert("Invalid account credentials. Please try again.");
    }
  }
}






/* =============================
       Appointment Modal
   =============================
*/


function AppointmentValidation() {
  let name = document.forms["appointmentForm"]["nameAppintment"].value;
  let p = /^[a-zA-Z\s]*$/;
  if (!p.test(name)) {
    alert("Enter only character for name");
    return false;
  }


  let contact = document.forms["appointmentForm"]["phoneAppintment"].value;
  let c = /^\d{12}$/;
  let no = /^\d{11}$/;
  if (!c.test(contact) && !no.test(contact)) {
    alert("Enter valid phone number");
    return false;
  }

  //date of birth
  
  let dob = document.forms["appointmentForm"]["DOBAppintment"].value;
  let nowDate1 = new Date();
  let inputDate1 = new Date(dob);
  
  let dd = inputDate1.getDate();
  let dm = inputDate1.getMonth();
  let dy = inputDate1.getFullYear();
  
  let dn = nowDate1.getDate();
  let dm1 = nowDate1.getMonth();
  let dy1 = nowDate1.getFullYear();
  
  if (dy>dy1||(dy===dy1 && dm>dm1) || (dy===dy1 && dm===dm1 && dd>dn)) {
    alert("Please enter a date of birth less than the current date.");
    return false;
  }
  //date
  let date = document.forms["appointmentForm"]["dateAppintment"].value;
  let nowDate = new Date();
  let inputDate = new Date(date);
  
  let d = inputDate.getDate();
  let m = inputDate.getMonth();
  let y = inputDate.getFullYear();
  
  let n = nowDate.getDate();
  let m1 = nowDate.getMonth();
  let y1 = nowDate.getFullYear();
  
  if (y<y1||(y===y1 && m<m1) || (y===y1 && m===m1 && d<n)) {
    alert("Please enter a date greater than the current date.");
    return false;
  }

  let day = inputDate.getDay();
  if (day === 6 || day === 0) {
    alert("Sorry! Saturday and Sunday are off.");
    return false;
  }
  //time
  let time= document.forms["appointmentForm"]["timeAppintment"].value;
  let selectHour=parseInt(time.split(":")[0]);

  if (selectHour < 9 || selectHour > 22) {
    alert("Please select a time between 9 AM and 10 PM.");
    return false;
  }

  let selectedMin= parseInt(selectedTime.split(":")[1]);

  if (selectedMin !== 0 && selectedMin !== 30) {
    alert("Please select a time between 9 AM and 10 PM in 30-minute increments.");
    return false;
  }



}

/*===============================
      NewPatientRegistration
  ===============================
  */

function NewPatientRegistration()
{
  let name=document.forms["newPatientRegistration"]["reg_name"].value;
  let n=/^[a-zA-Z\s]*$/;
  if(!n.test(name))
  {
    alert("Enter only name");
    return false;
  }


  let contact = document.forms["newPatientRegistration"]["contact_Reg"].value;
  let c = /^\d{12}$/;
  let no = /^\d{11}$/;
  if (!c.test(contact) && !no.test(contact)) {
    alert("Enter valid phone number");
    return false;
  }

  //date of birth
  
  let dob = document.forms["newPatientRegistration"]["DOB_reg"].value;
  let nowDate1 = new Date();
  let inputDate1 = new Date(dob);
  
  let dd = inputDate1.getDate();
  let dm = inputDate1.getMonth();
  let dy = inputDate1.getFullYear();
  
  let dn = nowDate1.getDate();
  let dm1 = nowDate1.getMonth();
  let dy1 = nowDate1.getFullYear();
  
  if (dy>dy1||(dy===dy1 && dm>dm1) || (dy===dy1 && dm===dm1 && dd>dn)) {
    alert("Please enter a date of birth less than the current date.");
    return false;
  }

  let password = document.forms["newPatientRegistration"]["password_patient"].value;
  if (password.length<5) {
    alert("Enter password minimum 5 characters");
    return false;
  }

  let gender = document.querySelector('input[name="genderRadioBtn"]:checked');
  if(!gender)
  {
    alert ("Please select a gender");
    return false;
  }

}


/*===============================
      NewPatientRegistration
  ===============================
  */
