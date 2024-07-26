<?php
require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM doctors WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($doctor && password_verify($password, $doctor['password'])) {
        $_SESSION['doctor_id'] = $doctor['id'];
        echo 'Login successful. <a href="view_appointments.php">View Appointments</a>';
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
