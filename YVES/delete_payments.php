<?php
include('database_connection.php');

// Check if PaymentID is set
if(isset($_REQUEST['PaymentID'])) {
    $cid = $_REQUEST['PaymentID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customer WHERE PaymentID=?");
    $stmt->bind_param("i", $Pid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "PaymentID is not set.";
}

$connection->close();
?>
