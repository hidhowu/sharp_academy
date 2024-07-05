<?php
include 'includes/db.php';
// Assuming you have already established a database connection

// Retrieve the email tracking code from the query string
$emailTrackingCode = $_GET['code'];

// Check if the email tracking code exists
if ($emailTrackingCode) {
    // Prepare the update statement
    $sql = "UPDATE stat SET read_email = read_email + 1 WHERE tracking_code = '{$emailTrackingCode}'";
    mysqli_query($conn, $sql);

    // // Create a prepared statement
    // $stmt = mysqli_prepare($conn, $sql);

    // // Bind the email tracking code as a parameter
    // mysqli_stmt_bind_param($stmt, 's', $emailTrackingCode);

    // // Execute the prepared statement
    // mysqli_stmt_execute($stmt);

    // // Check if the update was successful
    // if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Output a transparent pixel image
        header("Content-Type: image/gif");
        echo base64_decode("R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=");
    // } else {
    //     // echo "Failed to update email tracking.";
    // }

    // Close the statement
    // mysqli_stmt_close($stmt);
} else {
    // echo "Invalid email tracking code.";
}

// Close the database connection
mysqli_close($conn);
?>
