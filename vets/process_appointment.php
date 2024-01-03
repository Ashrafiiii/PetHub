<?php
include 'connect.php';

if (isset($_POST['accept']) || isset($_POST['reject'])) {
    $appointment_id = $_POST['accept'] ?? $_POST['reject'];
    $phone_no = $_POST['phone_no'];

    // Check if it's an accept or reject action
    $action = isset($_POST['accept']) ? 'accepted' : 'rejected';

    // Update the appointment status in the database
    $status = $action == 'accepted' ? 'Accepted' : 'Rejected';
    $updateQuery = "UPDATE virtual_appointments SET status = '$status' WHERE a_id = '$appointment_id'";
    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        // Notify the user (optional)
        $notification = "Your virtual appointment has been $action by the vet.";
        // Save the notification in the database or any other preferred way

        // Delete the appointment data from the list or table
        $deleteQuery = "DELETE FROM virtual_appointments WHERE a_id = '$appointment_id'";
        $deleteResult = mysqli_query($con, $deleteQuery);

        if ($deleteResult) {
            // Redirect back to UserProfile.php with the notification
            header("Location: ../user/UserProfile.php?notification=" . urlencode($notification));
            exit;
        } else {
            echo "Error deleting appointment data: " . mysqli_error($con);
        }
    } else {
        echo "Error updating appointment status: " . mysqli_error($con);
    }
} else {
    echo "Invalid action.";
}

mysqli_close($con);
?>
