<!-- reject_vet.php -->

<?php
include 'connect.php';

if (isset($_GET['vet_id'])) {
    $vetId = $_GET['vet_id'];

    // Fetch vet data from temp_vet
    $q = "SELECT * FROM temp_vet WHERE v_id = $vetId";
    $result = mysqli_query($con, $q);
    $vet = mysqli_fetch_assoc($result);

    // Delete the vet data from temp_vet without moving to vets
    $qDelete = "DELETE FROM temp_vet WHERE vet_id = $vetId";

    if (mysqli_query($con, $qDelete)) {
        echo "Vet Rejected Successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid Request";
}
?>
