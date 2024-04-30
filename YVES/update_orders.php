<?php
include('database_connection.php');

// Check if orderID is set
if(isset($_REQUEST['order_id'])) {
    $oid = $_REQUEST['order_id'];
    
    $stmt = $connection->prepare("SELECT * FROM orders WHERE order_id=?");
    $stmt->bind_param("i", $oid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['order_id'];
        $u = $row['customer_id'];
        $y = $row['total_amount'];
        $z = $row['order_date'];
    } else {
        echo "Transaction not found.";
    }
}
?>

<html>
<body>
    <form method="POST">

         <label for="oid">order_id:</label>
        <input type="number" name="oid" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="cid">customer_id:</label>
        <input type="number" name="cid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="tm">total_amount:</label>
        <input type="number" name="tm" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=od>order_date:</label>
        <input type="text" name="od" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $order_id = $_POST['oid'];
    $customer_id = $_POST['cid'];
    $total_amount = $_POST['tm'];
    $order_date = $_POST['od'];
    
    // Update the orders in the database
    $stmt = $connection->prepare("UPDATE orders SET order_id=?, customer_id=?, total_amount=?, order_date=? WHERE order_id=?");
    $stmt->bind_param("sssss",$order_id, $customer_id, $total_amount, $order_date, $order_id);
    $stmt->execute();
    
    // Redirect to orders.php
    header('Location: orders.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
