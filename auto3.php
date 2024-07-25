<?php
// Add Patient
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_patient'])) {
    $patient_name = $_POST['patient_name'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO patients (patient_name, contact_number) VALUES ('$patient_name', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New patient added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
