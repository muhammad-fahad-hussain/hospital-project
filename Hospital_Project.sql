create database Doctors_Hospital;

use Doctors_Hospital;


create table receptionist
(
receptionist_id int primary key,
name varchar(50),
contact varchar(13),
dob date,
address varchar(50),
gender varchar(6)
);

-- add the report foreign key
ALTER TABLE report_patient add COLUMN checkup_id int,ADD CONSTRAINT fk_report_patient FOREIGN KEY (checkup_id) REFERENCES checkup(checkup_id);


ALTER TABLE report_patient ADD COLUMN appointmentNo int,ADD CONSTRAINT FK_appointment_No_Report FOREIGN KEY (appointmentNo) REFERENCES appointmentportal(appointmentNo);