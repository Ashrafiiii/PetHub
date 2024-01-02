<?php
include 'connect.php';

$q = "SELECT * FROM pets";
$result = mysqli_query($con, $q);

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
        /* Your styles remain unchanged */
    </style>
</head>
</head>
<body>
    <form method="post" action="c_reg.php">
        <div class="container">
            <h2 class="text-center">Clinical Appointment Booking</h2>

            <!-- Pet Information and Vet Selection Section -->
            <div class="appointment-section">
                <h3>Book Appointment</h3>
                <table class="table table-bordered table-hover">
                    <!-- ... (your existing table header) ... -->
                    <tbody>
                        <?php
                        if ($pet !== null) {
                            echo '<tr>';
                            echo '<td>' . $pet['name'] . '</td>';
                            echo '<td>' . $pet['age'] . '</td>';
                            echo '<td>' . $pet['gender'] . '</td>';
                            echo '<td>' . $pet['species'] . '</td>';
                            echo '<td>' . $pet['breed'] . '</td>';
                            echo '<td>' . $pet['weight'] . '</td>';
                            echo '<td>' . $pet['medical_history'] . '</td>';
                            echo '<td>' . $pet['vaccination_status'] . '</td>';
                            echo '<td><input type="date" name="appointment_date"></td>';
                            echo '<td><input type="text" name="country"></td>';
                            echo '<td><input type="text" name="state"></td>';
                            echo '<td><input type="text" name="town_village"></td>';
                            echo '<td><input type="text" name="pin"></td>';
                            echo '<td>
                                    <select class="form-control" name="vet_selection" id="vet_selection">';

                            $vetsQuery = 'SELECT * FROM vets WHERE treatment_type = "clinical"';
                            $vetsResult = mysqli_query($con, $vetsQuery);

                            while ($vet = mysqli_fetch_assoc($vetsResult)) {
                                echo '<option value="' . $vet['v_id'] . '">' . $vet['f_name'] . ' ' . $vet['l_name'] . '</option>';
                            }

                            echo '</select></td>';
                            echo '<td><button class="btn btn-primary btn-book-appointment">Book Appointment</button></td>';
                            echo '</tr>';
                        } else {
                            echo '<tr><td colspan="15">No pet data available.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
