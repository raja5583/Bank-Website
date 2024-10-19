

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
    <div class="rm">
    <table >
        
                       <th ><a href="http://localhost/BorrowDeposit.php" id="a">Dashboard|</a></th>
                        <th><a href="accountopeningform.html" id="a">OpenA/C|</a></th>
                        <th><a href="http://localhost/depositor_page.php" id="a">Depositer|</a></th>
                        <th><a href="http://localhost/loan.php" id="a">Loan</a></th>
                
            </table>
    </div>
   
    <div class="phpwork">
        <?php
        include('conn.php');

        // List of Depositors
        echo "<h2>List of Depositors</h2>";
        $sql = "SELECT customer_name, depositor.account_number, balance
                FROM depositor
                INNER JOIN account ON depositor.account_number = account.account_number";
        $res = mysqli_query($conn, $sql);
        $linkText = "Click here";
        if ($res && mysqli_num_rows($res) > 0) {
            echo '<table border="1"><tr><th>Name</th><th>A/C No.</th><th>Balance</th><th>Details</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                $accountNumber = $result['account_number'];
                $url = "http://localhost/details.php?account_number=" . urlencode($accountNumber);
                echo '<tr><td>' . htmlspecialchars($result['customer_name']) . '</td>
                      <td>' . htmlspecialchars($result['account_number']) . '</td>
                      <td>' . htmlspecialchars($result['balance']) . '</td>
                      <td><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($linkText) . '</a></td></tr>';
            }
            echo '</table>';
        } else {
            echo "<p>No depositors found.</p>";
        }

        // List of Borrowers
        echo "<h2>List of Borrowers</h2>";
        $sql = "SELECT customer_name, borrower.loan_number, amount
                FROM borrower
                INNER JOIN loan ON borrower.loan_number = loan.loan_number";
        $res = mysqli_query($conn, $sql);
        $linkText = "Click here";
        if ($res && mysqli_num_rows($res) > 0) {
            echo '<table border="1"><tr><th>Name</th><th>Loan No.</th><th>Amount</th><th>Details</th></tr>';
            while ($result = mysqli_fetch_assoc($res)) {
                $accountNumber = $result['loan_number'];
                $url = "http://localhost/detailsborrower.php?loan_number=" . urlencode($accountNumber);
                echo '<tr><td>' . htmlspecialchars($result['customer_name']) . '</td>
                      <td>' . htmlspecialchars($result['loan_number']) . '</td>
                      <td>' . htmlspecialchars($result['amount']) . '</td>
                      <td><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($linkText) . '</a></td></tr>';
            }
            echo '</table>';
        } else {
            echo "<p>No borrowers found.</p>";
        }

        mysqli_close($conn); // Close the connection
        ?>
   </div>

 


    
        
        
</body>
</html>

