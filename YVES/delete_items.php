<?php
include('database_connection.php');

// Check if itemId is set
if(isset($_REQUEST['item_id'])) {
    $itID = $_REQUEST['item_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM items WHERE item_id=?");
    $stmt->bind_param("i", $itId);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "items is not set.";
}

$connection->close();
?>
