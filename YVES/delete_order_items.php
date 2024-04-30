<?php
include('database_connection.php');

// Check if order_item_id is set
if(isset($_REQUEST['order_item_id'])) {
    $oiid = $_REQUEST['order_item_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM order_items WHERE order_item_id=?");
    $stmt->bind_param("i", $oiid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "order_item_id is not set.";
}

$connection->close();
?>
