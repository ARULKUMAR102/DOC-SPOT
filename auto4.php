<?php
// Schedule Appointment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['schedule_appointment'])) {
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "INSERT INTO appointments (doctor_id, patient_id, appointment_date, appointment_time)
            VALUES ('$doctor_id', '$patient_id', '$appointment_date', '$appointment_time')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
