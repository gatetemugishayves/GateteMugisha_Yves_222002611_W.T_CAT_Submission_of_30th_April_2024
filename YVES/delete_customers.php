<?php
include('database_connection.php');

// Check if customer_id is set
if(isset($_REQUEST['customer_id'])) {
    $cid = $_REQUEST['customer_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customers WHERE customer_id=?");
    $stmt->bind_param("i", $cid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "customer_id is not set.";
}

$connection->close();
?>
