// Add doctor function

function AddDoctorform() {
    var doctor_name = $('#doctor_name').val();
    var doctor_phone = $('#doctor_phone').val();
    d = /^[a-zA-Z\s]*$/;
    if (!d.test(doctor_name)) {
        alert('Please enter doctor name in alphabets only');
        return false;
    }

    var doctor_phone = $('#doctor_phon').val();
    let c = /^\d{12}$/;
    let no = /^\d{11}$/;
    if (!c.test(doctor_phone) && !no.test(doctor_phone)) {
        alert("Enter valid phone number");
        return false;
    }
    //date of birth
    let dob_doctor = document.forms["addDoctorform"]["dob_doctor"].value;
    let nowDate1 = new Date();
    let inputDate1 = new Date(dob_doctor);

    let dd = inputDate1.getDate();
    let dm = inputDate1.getMonth();
    let dy = inputDate1.getFullYear();

    let dn = nowDate1.getDate();
    let dm1 = nowDate1.getMonth();
    let dy1 = nowDate1.getFullYear();

    if (dy > dy1 || (dy === dy1 && dm > dm1) || (dy === dy1 && dm === dm1 && dd > dn)) {
        alert("Date of birth is not valid");
        return false;
    }
    //experience
    var experience_doctor = $('#experience_doctor').val();
    if (!(experience_doctor >= 0 && experience_doctor < 100)) {
        alert('Please correct enter doctor experience between 0 to 100');
        return false;
    }

    let age = dy1 - dy;
    if (experience_doctor > age) {
        alert('Please correct enter doctor experience ');
        return false;
    }
    if (age < 18) {
        alert("You are not eligible to join us. Age: " + age);
        return false;
    }

    // // password
    //     var password_doctor = $('#password_doctor').val();

    //     if(password_doctor.length<5)
    //     {
    //         alert("Enter password minimum 5 characters");
    //         return false;
    //     }

    //     var genderRadioBtn=document.forms['input[name="genderRadioBtn"]:checked'];
    //     if(!genderRadioBtn)
    //   {
    //     alert ("Please select a gender");
    //     return false;
    //   }


}



// validation update
function UpdateDoctorform() {
    var doctor_name = $('#doctor_name_U').val();
    var doctor_phone = $('#doctor_phone_U').val();
    d = /^[a-zA-Z\s]*$/;
    if (!d.test(doctor_name)) {
        alert('Please enter doctor name in alphabets only');
        return false;
    }

    var doctor_phone = $('#doctor_phone_U').val();
    let c = /^\d{12}$/;
    let no = /^\d{11}$/;
    if (!c.test(doctor_phone) && !no.test(doctor_phone)) {
        alert("Enter valid phone number");
        return false;
    }
    //date of birth
    let dob_doctor = document.forms["updateDoctorform"]["dob_doctor_U"].value;
    let nowDate1 = new Date();
    let inputDate1 = new Date(dob_doctor);

    let dd = inputDate1.getDate();
    let dm = inputDate1.getMonth();
    let dy = inputDate1.getFullYear();

    let dn = nowDate1.getDate();
    let dm1 = nowDate1.getMonth();
    let dy1 = nowDate1.getFullYear();

    if (dy > dy1 || (dy === dy1 && dm > dm1) || (dy === dy1 && dm === dm1 && dd > dn)) {
        alert("Date of birth is not valid");
        return false;
    }
    //experience
    var experience_doctor = $('#experience_doctor_U').val();
    if (!(experience_doctor >= 0 && experience_doctor < 100)) {
        alert('Please correct enter doctor experience between 0 to 100');
        return false;
    }

    let age = dy1 - dy;
    if (experience_doctor > age) {
        alert('Please correct enter doctor experience ');
        return false;
    }
    if (age < 18) {
        alert("You are not eligible to join us. Age: " + age);
        return false;
    }
}



// ===============================
//         Nurses
// ===============================
function AddNurses() {
    var name = $('#name_nurse').val();
    var n = /^[a-zA-Z\s]*$/;
    if (!n.test(name)) {
        alert("Enter only name");
        return false;
    }


 //date of birth
 let nurses = document.forms["addNursesName"]["dob_nurses"].value;
 let nowDate1 = new Date();
 let inputDate1 = new Date(nurses);

 let dd = inputDate1.getDate();
 let dm = inputDate1.getMonth();
 let dy = inputDate1.getFullYear();

 let dn = nowDate1.getDate();
 let dm1 = nowDate1.getMonth();
 let dy1 = nowDate1.getFullYear();

 if (dy > dy1 || (dy === dy1 && dm > dm1) || (dy === dy1 && dm === dm1 && dd > dn)) {
     alert("Date of birth is not valid");
     return false;
 }
    var contact_no = $('#contact_no').val();
    var c = /^\d{12}$/;
    var c_no = /^\d{11}$/;
    if (!c.test(contact_no) && !c_no.test(contact_no)) {
        alert("Please enter a valid contact no");
        return false;
    }

    

    return true;
}




function updateNurse() {
    var name = $('#name_nurse1').val();
    var n = /^[a-zA-Z\s]*$/;
    if (!n.test(name)) {
        alert("Enter only name");
        return false;
    }


 //date of birth
 let nurses = document.forms["addNursesName"]["dob_nurses"].value;
 let nowDate1 = new Date();
 let inputDate1 = new Date(nurses);

 let dd = inputDate1.getDate();
 let dm = inputDate1.getMonth();
 let dy = inputDate1.getFullYear();

 let dn = nowDate1.getDate();
 let dm1 = nowDate1.getMonth();
 let dy1 = nowDate1.getFullYear();

 if (dy > dy1 || (dy === dy1 && dm > dm1) || (dy === dy1 && dm === dm1 && dd > dn)) {
     alert("Date of birth is not valid");
     return false;
 }
    var contact_no = $('#contact_no1').val();
    var c = /^\d{12}$/;
    var c_no = /^\d{11}$/;
    if (!c.test(contact_no) && !c_no.test(contact_no)) {
        alert("Please enter a valid contact no");
        return false;
    }

    

    return true;
}


