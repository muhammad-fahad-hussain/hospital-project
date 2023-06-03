
create database hospital_project;
use  hospital_project;

create table receptionist
(
receptionist_id int primary key,
name varchar(50),
contact varchar(13) unique,
dob date,
address varchar(50),
gender varchar(6)
);


create table nurse
(
nurse_id int primary key,
name varchar(50)

);


CREATE TABLE department (
  dept_no INT PRIMARY KEY,
  dept_name VARCHAR(50) NOT NULL
);
CREATE TABLE speciality (
  speciality_id INT PRIMARY KEY,
  speciality_name VARCHAR(50),
  dept_no INT,
  FOREIGN KEY (dept_no) REFERENCES department(dept_no) on delete CASCADE on update CASCADE
);

CREATE TABLE doctor (
  doctor_id INT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  contact VARCHAR(13) UNIQUE,
  dob DATE,
  experience INT,
  education VARCHAR(50),
  address VARCHAR(100),
  image varbinary NOT NULL,
  gender VARCHAR(8),
  about TEXT,
  speciality_id INT,
  dept_no INT,
  FOREIGN KEY (dept_no) REFERENCES department(dept_no),
  FOREIGN KEY (speciality_id) REFERENCES speciality(speciality_id),
);
create table employees
(
employee_id int primary key,
job_role varchar(10),
salary decimal(10,2),
shiftTiming time,
doctor_id int,
receptionist_id int,
nurse_id int,
  FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (receptionist_id) REFERENCES receptionist(receptionist_id) ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (nurse_id) REFERENCES nurse(nurse_id) ON DELETE CASCADE ON UPDATE CASCADE

);

CREATE TABLE department (
  dept_no INT PRIMARY KEY,
  dept_name VARCHAR(50) NOT NULL
);
CREATE TABLE speciality (
  speciality_id INT PRIMARY KEY,
  speciality_name VARCHAR(50),
  dept_no INT,
  FOREIGN KEY (dept_no) REFERENCES department(dept_no) on delete CASCADE on update CASCADE
);


create table employee_record
(
record_no int primary key,
pay_salary decimal(10,2),
employee_id int,
pay_date date,
foreign key (employee_id) references employees(employee_id) on delete cascade on update cascade
);

create table employees_portal
(
portal_id int primary key,
employee_id int,
password varchar(30) check(length(password)>5),
foreign key (employee_id) references employees(employee_id) on delete cascade on update cascade
);


INSERT INTO department (dept_no, dept_name)
VALUES (1, 'Anaesthesia'),
       (2, 'Cardiology'),
       (3, 'Dental'),
       (4, 'Emergency'),
       (5, 'Endocrinology'),
       (6, 'Gastroenterology'),
       (7, 'Neurology'),
       (8, 'EYE'),
       (9, 'ENT'),
       (10, 'Psychology'),
       (11, 'Pulmonology'),
       (12, 'Rheumatology'),
       (13, 'UROLOGY'),
       (14, 'Orthopaedics');


INSERT INTO speciality (speciality_id, speciality_name, dept_no)
VALUES
  (1, 'Anesthesiology', 1),
  (2, 'Cardiology', 2),
  (3, 'Dentistry', 3),
  (4, 'Emergency Medicine', 4),
  (5, 'Endocrinology', 5),
  (6, 'Gastroenterology', 6),
  (7, 'Neurology', 7),
  (8, 'Ophthalmology', 8),
  (9, 'Otolaryngology', 9),
  (10, 'Psychology', 10),
  (11, 'Pulmonology', 11),
  (12, 'Rheumatology', 12),
  (13, 'Urology', 13),
  (14, 'Orthopaedics', 14),
  (15, 'Dermatology', 6),
  (16, 'Hematology', 5),
  (17, 'Nephrology', 6),
  (18, 'Oncology', 2),
  (19, 'Pediatrics', 4),
  (20, 'Radiology', 1),
  (21, 'Gynecology', 4),
  (22, 'Internal Medicine', 5),
  (23, 'Allergy and Immunology', 6),
  (24, 'Infectious Disease', 4),
  (25, 'Neonatology', 4),
  (26, 'Physical Medicine and Rehabilitation', 14),
  (27, 'Sports Medicine', 14),
  (28, 'Geriatrics', 5),
  (29, 'Pain Medicine', 1),
  (30, 'Sleep Medicine', 7),
  (31, 'Neurosurgery', 7),
  (32, 'Plastic Surgery', 9),
  (33, 'Vascular Surgery', 2),
  (34, 'Family Medicine', 4),
  (35, 'Occupational Therapy', 14);

  select s.speciality_id,s.speciality_name from speciality as s inner join department as d 
  on s.dept_no=d.dept_no where d.dept_no=3;
  
  select d.dept_name,COUNT(s.speciality_name) from speciality s inner join department d 
  on d.dept_no=s.dept_no group by dept_name having COUNT(s.speciality_name)>2;

  
  select d.dept_name,s.speciality_name,s.speciality_id from speciality s inner join department d 
  on d.dept_no=s.dept_no where s.dept_no=5;

  create table admin
(
    admin_id int primary key,
    name varchar(50),
    password varchar(50)
        
);
INSERT INTO admin(admin_id, name, password) VALUES ('37125','Muhammad Fahad','123456');

--patient table
create table patient
(
patient_no int primary key,
patient_name varchar(50),
email varchar(50) unique,
contact varchar(13) unique,
dob date,
gender varchar(6)

);

create table appointmentTime
(
time_no int primary key,
time time,
appointment_token_no int
);
INSERT INTO appointmentTime (time_no, time, appointment_token_no)
VALUES
    (1, '08:00:00', 1),
    (2, '08:30:00', 2),
    (3, '09:00:00', 3),
    (4, '09:30:00', 4),
    (5, '10:00:00', 5),
    (6, '10:30:00', 6),
    (7, '11:00:00', 7),
    (8, '11:30:00', 8),
    (9, '12:00:00', 9),
    (10, '12:30:00', 10),
    (11, '13:00:00', 11),
    (12, '13:30:00', 12),
    (13, '14:00:00', 13),
    (14, '14:30:00', 14),
    (15, '15:00:00', 15),
    (16, '15:30:00', 16);
create table patient_portal
(
portal_no int primary key,
patient_no int,
password varchar(50),
foreign key (patient_no) references patient(patient_no) on delete cascade on update cascade
);


create table appointmentPortal
(
 appointmentNo int primary key, --AUTO_INCREMENT,
 appointment_date date,
 status varchar(50),
 message text,

 dept_no int,
 time_no int,
 patient_no int,
 doctor_id int,

  foreign key (dept_no) references department(dept_no),
  foreign key (time_no) references appointmentTime(time_no),
  foreign key (patient_no) references patient(patient_no),
  foreign key (doctor_id) references doctor(doctor_id)

);
