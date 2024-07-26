<?php
require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patients WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($patient && password_verify($password, $patient['password'])) {
        $_SESSION['patient_id'] = $patient['id'];
        echo 'Login successful. <a href="book_appointment.php">Book Appointment</a>';
    } else {
        echo 'Invalid email or password.';
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
