<?php
include('database_connection.php');

// Check if order_item_id is set
if(isset($_REQUEST['order_item_id'])) {
    $oiid = $_REQUEST['order_item_id'];
    
    $stmt = $connection->prepare("SELECT * FROM order_items WHERE order_item_id=?");
    $stmt->bind_param("i", $oiid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['order_item_id'];
        $u = $row['order_id'];
        $y = $row['item_id'];
        $z = $row['quantity'];
        
    } else {
        echo "order_items not found.";
    }
}
?>

<html>
<body>
    <form method="POST">

        <label for="oiid">order_item_id:</label>
        <input type="number" name="oiid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>
        <label for="oid">order_id:</label>
        <input type="number" name="oid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="itId">item_id:</label>
        <input type="number" name="itId" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=qty>quantity:</label>
        <input type="number" name="qty" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $order_item_id = $_POST['oiid'];
    $order_id = $_POST['oid'];
    $item_id = $_POST['itId'];
    $quantity = $_POST['qty'];

    
    // Update the order_items in the database
    $stmt = $connection->prepare("UPDATE order_items SET order_item_id=?, order_id=?, item_id=?, quantity=? WHERE order_item_id=?");
    $stmt->bind_param("sssss", $order_item_id, $order_id, $item_id, $quantity,$order_item_id);
    $stmt->execute();
    
    // Redirect to order_items.php
    header('Location: order_items.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
