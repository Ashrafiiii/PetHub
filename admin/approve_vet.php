<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'connect.php';

if (isset($_GET['vet_id'])) {
    $vetId = $_GET['vet_id'];

    // Fetch vet data from temp_vet using prepared statement
    $qSelect = "SELECT * FROM temp_vet WHERE vet_id = ?";
    $stmtSelect = mysqli_prepare($con, $qSelect);
    mysqli_stmt_bind_param($stmtSelect, "i", $vetId);
    mysqli_stmt_execute($stmtSelect);
    $result = mysqli_stmt_get_result($stmtSelect);

    if ($result) {
        $vet = mysqli_fetch_assoc($result);

        // Move vet data to vets table using prepared statement
        $qMove = "INSERT INTO vets (f_name, l_name, phone_no, email, clinic_name, pwd, country, state, district, road, landmark, town_village, PIN, profile_picture, treatment_type, has_field_assistant, field_asst, field_asst_phone, field_asst_email)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtMove = mysqli_prepare($con, $qMove);
        mysqli_stmt_bind_param($stmtMove, "sssssssssssssssssss", $vet['f_name'], $vet['l_name'], $vet['phone_no'], $vet['email'], $vet['clinic_name'], $vet['pwd'], $vet['country'], $vet['state'], $vet['district'], $vet['road'], $vet['landmark'], $vet['town_village'], $vet['PIN'], $vet['profile_picture'], $vet['treatment_type'], $vet['has_field_assistant'], $vet['field_asst'], $vet['field_asst_phone'], $vet['field_asst_email']);

        if (mysqli_stmt_execute($stmtMove)) {
            // Delete the vet data from temp_vet after moving to vets using prepared statement
            $qDelete = "DELETE FROM temp_vet WHERE vet_id = ?";
            $stmtDelete = mysqli_prepare($con, $qDelete);
            mysqli_stmt_bind_param($stmtDelete, "i", $vetId);
            mysqli_stmt_execute($stmtDelete);

            echo "Vet Approved Successfully";
        } else {
            echo "Move Error: " . mysqli_error($con);
        }
    } else {
        echo "Select Error: " . mysqli_error($con);
    }
} else {
    echo "No vet_id parameter provided";
}
?>
