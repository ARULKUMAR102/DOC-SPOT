<?php
// Add Doctor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_doctor'])) {
    $doctor_name = $_POST['doctor_name'];
    $specialization = $_POST['specialization'];

    $sql = "INSERT INTO doctors (doctor_name, specialization) VALUES ('$doctor_name', '$specialization')";

    if ($conn->query($sql) === TRUE) {
        echo "New doctor added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
