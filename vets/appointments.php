<?php
include 'connect.php';

// Assuming you have a database connection in $con

$query = "SELECT * FROM virtual_appointments";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Fetch all rows as an associative array
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Display the data in a table with colors
    echo '<html>';
    echo '<head>';
    echo '<style>';
    echo 'table {';
    echo '    width: 60%;';
    echo '    margin: auto;';
    echo '    border-collapse: collapse;';
    echo '}';
    echo 'th, td {';
    echo '    border: 1px solid #dddddd;';
    echo '    text-align: left;';
    echo '    padding: 8px;';
    echo '}';
    echo 'th {';
    echo '    background-color: #f2f2f2;';
    echo '}';
    echo 'tr:nth-child(even) {';
    echo '    background-color: #f9f9f9;';
    echo '}';
    echo 'tr:hover {';
    echo '    background-color: #f1f1f1;';
    echo '}';
    echo '</style>';
    echo '</head>';
    echo '<body>';

    echo '<form action="process_appointment.php" method="post">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Appointment Date</th>';
    echo '<th>Country</th>';
    echo '<th>State</th>';
    echo '<th>Town/Village</th>';
    echo '<th>PIN</th>';
    echo '<th>Pet Name</th>';
    echo '<th>Age</th>';
    echo '<th>Gender</th>';
    echo '<th>Species</th>';
    echo '<th>Breed</th>';
    echo '<th>Weight</th>';
    echo '<th>Medical History</th>';
    echo '<th>Vaccination Status</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['appointment_date'] . '</td>';
        echo '<td>' . $row['country'] . '</td>';
        echo '<td>' . $row['state'] . '</td>';
        echo '<td>' . $row['town_village'] . '</td>';
        echo '<td>' . $row['pin'] . '</td>';
        echo '<td>' . $row['pet_name'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['species'] . '</td>';
        echo '<td>' . $row['breed'] . '</td>';
        echo '<td>' . $row['weight'] . '</td>';
        echo '<td>' . $row['medical_history'] . '</td>';
        echo '<td>' . $row['vaccination_status'] . '</td>';
        echo '<td>';
        
        if (isset($row['a_id'])) {
            echo '<button type="submit" name="accept" value="' . $row['a_id'] . '">Accept</button>';
            echo '<button type="submit" name="reject" value="' . $row['a_id'] . '">Reject</button>';
        } else {
            echo 'N/A';
        }
        
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</form>';
    echo '</body>';
    echo '</html>';
}

// Close the connection
mysqli_close($con);
?>
