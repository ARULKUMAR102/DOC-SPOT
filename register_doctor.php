<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO doctors (name, specialty, phone, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $specialty, $phone, $email, $password])) {
        echo 'Doctor registered successfully.';
    } else {
        echo 'Error: Could not register doctor.';
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Specialty: <input type="text" name="specialty" required><br>
    Phone: <input type="text" name="phone" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register Doctor">
</form>
