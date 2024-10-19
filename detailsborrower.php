
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
        
        <?php
        include('conn.php'); // Include your database connection file
        
        // Check if the loan_number parameter is set in the URL
        if (isset($_GET['loan_number'])) {
            // Retrieve and sanitize the loan number
            $loanNumber = intval($_GET['loan_number']); // Convert to integer for safety
        
            // Now you can use $loanNumber to query the database or perform other operations
           
            
            // Example query to fetch loan details
            $sql = "SELECT b.customer_name, l.amount, br.branch_name, br.branch_city
                    FROM borrower b
                    INNER JOIN loan l ON b.loan_number = l.loan_number
                    INNER JOIN branch br ON l.branch_name = br.branch_name
                    WHERE l.loan_number = ?";
            
            // Prepare the statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $loanNumber);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display loan details
                    echo "<h2>Loan Details</h2>";
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
        } else {
            echo "No loan number provided.";
        }
        
        // Close the database connection
        mysqli_close($conn);
        ?>
</div>        
   

 


    
        
        
</body>
</html>

