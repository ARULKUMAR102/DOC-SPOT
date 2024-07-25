<?php
// Fetch and display appointments
$sql = "SELECT a.id, d.doctor_name, p.patient_name, a.appointment_date, a.appointment_time
        FROM appointments a
        INNER JOIN doctors d ON a.doctor_id = d.id
        INNER JOIN patients p ON a.patient_id = p.id
        ORDER BY a.appointment_date ASC, a.appointment_time ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["doctor_name"]."</td>
                <td>".$row["patient_name"]."</td>
                <td>".$row["appointment_date"]."</td>
                <td>".$row["appointment_time"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
