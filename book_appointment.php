<?php
require 'config.php';

session_start();

if (!isset($_SESSION['patient_id'])) {
    die('You must be logged in to book an appointment.');
}

// Fetch available doctors
$sql = "SELECT * FROM doctors";
$doctors = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $patient_id = $_SESSION['patient_id'];

    $sql = "INSERT INTO appointments (doctor_id, patient_id, appointment_date) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$doctor_id, $patient_id, $appointment_date])) {
        echo 'Appointment booked successfully.';
    } else {
        echo 'Error: Could not book appointment.';
    }
}
?>

<form method="POST">
    Doctor:
    <select name="doctor_id" required>
        <?php foreach ($doctors as $doctor): ?>
            <option value="<?= $doctor['id'] ?>"><?= $doctor['name'] ?> (<?= $doctor['specialty'] ?>)</option>
        <?php endforeach; ?>
    </select><br>
    Appointment Date: <input type="datetime-local" name="appointment_date" required><br>
    <input type="submit" value="Book Appointment">
</form>
