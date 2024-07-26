<?php
require 'config.php';

session_start();

if (!isset($_SESSION['doctor_id'])) {
    die('You must be logged in to view appointments.');
}

$doctor_id = $_SESSION['doctor_id'];

// Fetch appointments for the logged-in doctor
$sql = "SELECT a.id, p.name AS patient_name, a.appointment_date, a.status 
        FROM appointments a
        JOIN patients p ON a.patient_id = p.id
        WHERE a.doctor_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$doctor_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Your Appointments</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Appointment Date</th>
        <th>Status</th>
    </tr>
    <?php foreach ($appointments as $appointment): ?>
        <tr>
            <td><?= $appointment['id'] ?></td>
            <td><?= $appointment['patient_name'] ?></td>
            <td><?= $appointment['appointment_date'] ?></td>
            <td><?= $appointment['status'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
