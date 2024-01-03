<?php
include 'connect.php';

// Retrieve user ID from the session
session_start();
$userId = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';

// Retrieve user's pets
$q = "SELECT * FROM pets WHERE u_id = '$userId'";
$result = mysqli_query($con, $q);

// Retrieve the first pet for pre-filled information
$pet = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinical Appointment Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        h2, h3 {
            text-align: center;
            color: #007bff;
        }

        .pre-filled-info-section,
        .user-input-section {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
        }

        th, td {
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .btn-book-appointment {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="v_reg.php">
        <div class="container">
            <h2>Virtual Appointment Booking</h2>

            <!-- Display pre-filled pet information -->
            <div class="pre-filled-info-section">
                <h3>Pre-filled Information</h3>
                <table class="table table-bordered table-hover">
                    <tbody>
                        <?php
                        if ($pet !== null) {
                            echo '<tr>';
                            echo '<td>Name: ' . $pet['name'] . '</td>';
                            echo '<td>Age: ' . $pet['age'] . '</td>';
                            echo '<td>Gender: ' . $pet['gender'] . '</td>';
                            echo '<td>Species: ' . $pet['species'] . '</td>';
                            echo '<td>Breed: ' . $pet['breed'] . '</td>';
                            echo '<td>Weight: ' . $pet['weight'] . '</td>';
                            echo '<td>Medical History: ' . $pet['medical_history'] . '</td>';
                            echo '<td>Vaccination Status: ' . $pet['vaccination_status'] . '</td>';
                            echo '</tr>';
                        } else {
                            echo '<tr><td colspan="8">No pet data available.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- User input section -->
            <div class="user-input-section">
                <h3>User Input</h3>
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Appointment Date: <input type="date" name="appointment_date"></td>
                            <td>Country: <input type="text" name="country"></td>
                            <td>State: <input type="text" name="state"></td>
                            <td>Town/Village: <input type="text" name="town_village"></td>
                            <td>PIN: <input type="text" name="pin"></td>
                            <td>
                                Vet Selection:
                                <select class="form-control" name="vet_selection" id="vet_selection">
                                    <?php
                                    // Retrieve vets for selection
                                    $vetsQuery = 'SELECT * FROM vets WHERE treatment_type = "virtual"';
                                    $vetsResult = mysqli_query($con, $vetsQuery);

                                    while ($vet = mysqli_fetch_assoc($vetsResult)) {
                                        echo '<option value="' . $vet['v_id'] . '">' . $vet['f_name'] . ' ' . $vet['l_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary btn-book-appointment">Book Appointment</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
