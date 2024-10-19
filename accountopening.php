



<?php
session_start();
include('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer</title>
    <link rel="shortcut icon" href="noidalogo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="bank.css">
    
    </head>
<body>
   <div id="raja">
    <span> <img id="im" src="noidalogo.jpg" alt=""></span>
    <h1 class="hd" >Noida Bank  Of India  </h1></div>
    <div class="same">
    <table >
                <thead>
                <th><a href="http://localhost/BorrowDeposit.php" id="a">Dashboard|</a></th>
                        <th><a href="accountopeningform.html" id="a">Open A/C|</a></th>
                        <th><a href="http://localhost/depositor_page.php" id="a">Depositer|</a></th>
                        <th><a href="http://localhost/loan.php" id="a">Loan</a></th>
                </thead>
            </table>
    </div>
   
    <br><br><br><br>
<?php
// Database connection settings
$servername = "localhost"; // Change if necessary
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "dsa"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_street, customer_city) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $customer_name, $address, $city);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h3>New record created successfully</h3>";
        echo "<h3>Account Opened Successfully !</h3>";
    echo "<p><strong>Customer Name:</strong> " . $_POST['firstname'] . "</p>";
    echo "<p><strong>Address:</strong> " . $_POST['address']. "</p>";
    echo "<p><strong>City:</strong> " . $_POST['city']. "</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

   

 


    
        
        
</body>
</html>




