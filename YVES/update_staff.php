<?php
include('database_connection.php');

// Check if staff_id is set
if(isset($_REQUEST['staff_id'])) {
    $sid = $_REQUEST['staff_id'];
    
    $stmt = $connection->prepare("SELECT * FROM staff WHERE staff_id=?");
    $stmt->bind_param("i", $sid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['staff_id'];
        $u = $row['name'];
        $y = $row['role'];
        $z = $row['email'];
        $w = $row['phone'];
        
    } else {
        echo "staff not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="sid">staff_id:</label>
        <input type="number" name="sid" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="n">name:</label>
        <input type="text" name="n" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for=rl>role:</label>
        <input type="text" name="rl" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="e">email:</label>
        <input type="text" name="e" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="tel">phone:</label>
        <input type="number" name="tel" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $staff_id = $_POST['sid'];
    $name = $_POST['n'];
    $role = $_POST['rl'];
    $email = $_POST['e'];
    $phone = $_POST['tel'];
    
    // Update the staff in the database
    $stmt = $connection->prepare("UPDATE staff SET staff_id=?, name=?, role=?, email=?, phone=? WHERE staff_id=?");
    $stmt->bind_param("ssssss", $staff_id, $name, $role, $email, $phone, $staff_id);
    $stmt->execute();
    
    // Redirect to staff.php
    header('Location: staff.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
