<!-- approve_vet.php -->

<?php
include 'connect.php';

if (isset($_GET['v_id'])) {
    $vetId = $_GET['v_id'];


    // Fetch vet data from temp_vet
    $q = "SELECT * FROM temp_vet WHERE v_id = $vetId";
    $result = mysqli_query($con, $q);
    $vet = mysqli_fetch_assoc($result);

    // Move vet data to vets table
    $qMove = "INSERT INTO vets (f_name, l_name, phone_no, email, clinic_name, pwd, country, state, district, road, landmark, town_village, PIN, profile_picture, treatment_type, has_field_assistant, field_asst, field_asst_phone, field_asst_email)
              VALUES ('{$vet['f_name']}', '{$vet['l_name']}', '{$vet['phone_no']}', '{$vet['email']}', '{$vet['clinic_name']}', '{$vet['pwd']}', '{$vet['country']}', '{$vet['state']}', '{$vet['district']}', '{$vet['road']}', '{$vet['landmark']}', '{$vet['town_village']}', '{$vet['PIN']}', '{$vet['profile_picture']}', '{$vet['treatment_type']}', '{$vet['has_field_assistant']}', '{$vet['field_asst']}', '{$vet['field_asst_phone']}', '{$vet['field_asst_email']}')";

    if (mysqli_query($con, $qMove)) {
        // Delete the vet data from temp_vet after moving to vets
        $qDelete = "DELETE FROM temp_vet WHERE v_id = $vetId";
        mysqli_query($con, $qDelete);

        echo "Vet Approved Successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid Request";
}
?>
