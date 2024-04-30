<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our items</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
      
    }
    section{
    padding:71px;
    border-bottom: 1px solid #ddd;
    }
    footer{
    text-align: center;
    padding: 15px;
    background-color:darkgray;
    }

  </style>
  </head>

  <header>

<body bgcolor="grey">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/arsnl.jpg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./items.php">ITEMS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./orders.php">ORDERS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./order_items.php">ORDER_ITEMS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./staff.php">STAFF</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./customers.php">CUSTOMERS</a>
  
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

    <h1><u> ITEMS Form </u></h1>
    <form method="post">
            
        <label for="itId">item_id:</label>
        <input type="number" id="itId" name="itId"><br><br>

        <label for="me">name:</label>
        <input type="text" id="me" name="me"><br><br>

        <label for="deption">description:</label>
        <input type="text" id="deption" name="deption" required><br><br>

        <label for=prc>price:</label>
        <input type="number" id="prc" name="prc" required><br><br>

        <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO items( item_id, name, description, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $itId, $me, $deption, $prc);
    // Set parameters and execute
    $itId = $_POST['itId'];
    $me = $_POST['me'];
    $deption = $_POST['deption'];
    $prc = $_POST['prc'];

    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
include('database_connection.php');
// SQL query to fetch data from the items table
$sql = "SELECT * FROM items";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of ITEMS</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of ITEMS</h2></center>
    <table border="5">
        <tr>
            <th>item_id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');

        // Prepare SQL query to retrieve all items
        $sql = "SELECT * FROM items";
        $result = $connection->query($sql);

        // Check if there are any items
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $itId = $row['item_id']; // Fetch the itemId
                echo "<tr>
                    <td>" . $row['item_id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td><a style='padding:4px' href='delete_items.php?item_id=$itId'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_items.php?item_id=$itId'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Yves GM</h2></b>
  </center>
</footer>
</body>
</html>