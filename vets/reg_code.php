<?php
include 'connect.php';

if (isset($_POST['register'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $pwd = $_POST['pwd'];
    $clinic = $_POST['clinic_name'];
    $Country = $_POST['Country'];
    $State = $_POST['State'];
    $district = $_POST['district'];
    $town_village=$_POST['town_village'];
    $pin = $_POST['pin'];
    $road = $_POST['road'];
    $landmark = $_POST['landmark'];
    $treatment_type = $_POST['treatment_type']; // New field
    $has_field_assistant = isset($_POST['has_field_assistant']) ? 1 : 0; // New field

    // Field assistant information
    $field_asst = isset($_POST['field_asst']) ? $_POST['field_asst'] : '';
    $field_asst_phone = isset($_POST['field_asst_phone']) ? $_POST['field_asst_phone'] : '';
    $field_asst_email = isset($_POST['field_asst_email']) ? $_POST['field_asst_email'] : '';

    $q = "SELECT * FROM temp_vet WHERE phone_no='$phone_no'";
    $data = mysqli_query($con, $q);

    if (mysqli_num_rows($data) == 0) {
        $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $unique_name = uniqid() . '.' . $extension;
        $folder = "images/" . $unique_name;
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $folder);

        $q1 = "INSERT INTO temp_vet(f_name, l_name, pwd, email, phone_no, clinic_name, country, state, district, road, landmark, town_village, PIN, profile_picture, treatment_type, has_field_assistant, field_asst, field_asst_phone, field_asst_email) 
                VALUES ('$f_name', '$l_name', '$pwd', '$email', '$phone_no', '$clinic', '$Country', '$State', '$district', '$road', '$landmark', '$town_village','$pin', '$folder', '$treatment_type', '$has_field_assistant', '$field_asst', '$field_asst_phone', '$field_asst_email')";

        if (mysqli_query($con, $q1)) {
            echo "success";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Phone number already exists";
    }
}
?>
