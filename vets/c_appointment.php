<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept']) || isset($_POST['reject'])) {
        $appointment_id = $_POST['accept'] ?? $_POST['reject'];
        $action = isset($_POST['accept']) ? 'accepted' : 'rejected';

        // Check if the appointment with the specified cli_id exists
        $checkAppointmentQuery = "SELECT * FROM clinical_appointments WHERE cli_id = '$appointment_id'";
        $checkAppointmentResult = mysqli_query($con, $checkAppointmentQuery);

        if (!$checkAppointmentResult) {
            echo "Error checking appointment existence: " . mysqli_error($con);
            exit;
        }

        $appointmentRow = mysqli_fetch_assoc($checkAppointmentResult);

        if (!$appointmentRow) {
            echo "Appointment with cli_id $appointment_id does not exist.";
            exit;
        }

        // Retrieve the user ID (u_id) associated with the appointment
        $u_id = $appointmentRow['u_id'];

        // Perform actions based on accept or reject
        if ($action === 'accepted') {
            // Update clinical_notif for accepted appointment
            $notificationMessage = "Appointment accepted";
        } elseif ($action === 'rejected') {
            // Update clinical_notif for rejected appointment
            $notificationMessage = "Appointment rejected";
        }

        // Insert notification into clinical_notif table
        $insertNotificationQuery = "INSERT INTO clinical_notif (u_id, message) VALUES ('$u_id', '$notificationMessage')";
        $insertNotificationResult = mysqli_query($con, $insertNotificationQuery);

        if (!$insertNotificationResult) {
            echo "Error updating clinical_notif table: " . mysqli_error($con);
            exit;
        }

        // Delete data from clinical_appointments after successful insertion into clinical_notif
        $deleteAppointmentQuery = "DELETE FROM clinical_appointments WHERE cli_id = '$appointment_id'";
        $deleteAppointmentResult = mysqli_query($con, $deleteAppointmentQuery);

        if (!$deleteAppointmentResult) {
            echo "Error deleting data from clinical_appointments: " . mysqli_error($con);
            exit;
        }

        echo "Appointment $action for cli_id $appointment_id. Notification sent to u_id $u_id: $notificationMessage";
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid request method.";
}

// Close the connection
mysqli_close($con);
?>
