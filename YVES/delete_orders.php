<?php
include('database_connection.php');

// Check if order_id is set
if(isset($_REQUEST['order_id'])) {
    $oid = $_REQUEST['order_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM orders WHERE order_id=?");
    $stmt->bind_param("i", $oid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "order_id is not set.";
}

$connection->close();
?>
