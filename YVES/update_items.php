<?php
include('database_connection.php');

// Check if item_id is set
if(isset($_REQUEST['item_id'])) {
    $itId = $_REQUEST['item_id'];
    
    $stmt = $connection->prepare("SELECT * FROM items WHERE item_id=?");
    $stmt->bind_param("i", $itId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['item_id'];
        $u = $row['name'];
        $y = $row['description'];
        $z = $row['price'];
    
    } else {
        echo "items not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="itId">item_id:</label>
        <input type="number" name="itId" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="me">name:</label>
        <input type="text" name="me" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="deption">description:</label>
        <input type="text" name="deption" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="prc">price:</label>
        <input type="number" name="prc" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $item_id = $_POST['itId'];
    $name = $_POST['me'];
    $description = $_POST['deption'];
    $price = $_POST['prc'];
    
    
    // Update the items in the database
    $stmt = $connection->prepare("UPDATE items SET item_id=?, name=?, description=?, price=? WHERE item_id=?");
    $stmt->bind_param("sssss", $item_id, $name, $description, $price, $item_id);
    $stmt->execute();
    
    // Redirect to items.php
    header('Location: items.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
