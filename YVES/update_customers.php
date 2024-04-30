<?php
include('database_connection.php');

// Check if customer_id is set
if(isset($_REQUEST['customer_id'])) {
    $cid = $_REQUEST['customer_id'];
    
    $stmt = $connection->prepare("SELECT * FROM customers WHERE customer_id=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['customer_id'];
        $u = $row['name'];
        $y = $row['email'];
        $z = $row['phone'];
    } else {
        echo "Customers not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="cid">customer_id:</label>
        <input type="text" name="cid" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="nm">Name:</label>
        <input type="text" name="nm" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="em">Email:</label>
        <input type="text" name="em" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=pn>Phone:</label>
        <input type="number" name="pn" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $customer_id = $_POST['cid'];
    $name = $_POST['nm'];
    $email = $_POST['em'];
    $phone = $_POST['pn'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE customers SET customer_id=?, name=?, email=?, phone=?  WHERE customer_id=?");
    $stmt->bind_param("sssss",$customer_id, $name, $email, $phone,  $customer_id);
    $stmt->execute();
    
    // Redirect to customers.php
    header('Location: customers.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
