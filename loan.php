






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
    <div class="phpwork">
    <h2>Get Details by Loan Number</h2>
    <form method="post">
        <label for="account_number">Enter Loan Number:</label>
        <input type="text" name="loan_number" required>
        <button type="submit">Get Details</button>
    </form>
</div>
<?php
include('conn.php');
 // Include your database connection

// Check if the loan_number parameter is set in the URL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanNumber = $_POST['loan_number']; // Convert to integer for safety

    // Prepare a query to fetch loan details
    $sql = "SELECT l.loan_number, l.amount, b.customer_name, br.branch_name, br.branch_city
            FROM loan l
            INNER JOIN borrower b ON l.loan_number = b.loan_number
            INNER JOIN branch br ON l.branch_name = br.branch_name
            WHERE l.loan_number = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $loanNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results were returned
    if ($result && mysqli_num_rows($result) > 0) {
        // Display loan details
        echo "<h2>Loan Details</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Loan Number: " . htmlspecialchars($row['loan_number']) . "<br>";
            echo "Customer Name: " . htmlspecialchars($row['customer_name']) . "<br>";
            echo "Loan Amount: " . htmlspecialchars($row['amount']) . "<br>";
            echo "Branch Name: " . htmlspecialchars($row['branch_name']) . "<br>";
            echo "Branch City: " . htmlspecialchars($row['branch_city']) . "<br>";
        }
    } else {
        echo "No loan found for this loan number.";
    }

    // Close the statement
    $stmt->close();
} 

// Close the database connection
mysqli_close($conn);
?>



 


    
        
        
</body>
</html>

