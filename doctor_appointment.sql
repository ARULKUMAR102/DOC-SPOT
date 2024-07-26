CREATE DATABASE doctor_appointment;

USE doctor_appointment;

-- Table for storing doctor details
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    specialty VARCHAR(100),
    phone VARCHAR(15),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Table for storing patient details
CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(15),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Table for storing appointment details
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT,
    patient_id INT,
    appointment_date DATETIME,
    status ENUM('scheduled', 'completed', 'canceled') DEFAULT 'scheduled',
    FOREIGN KEY (doctor_id) REFERENCES doctors(id),
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);
