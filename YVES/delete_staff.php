<?php
include('database_connection.php');

// Check if staff_id is set
if(isset($_REQUEST['staff_id'])) {
    $sid = $_REQUEST['staff_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM staff WHERE staff_id=?");
    $stmt->bind_param("i", $sid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "staff_id is not set.";
}

$connection->close();
?>
