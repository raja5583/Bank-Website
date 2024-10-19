<?php
session_start(); 
include('conn.php');


$userid = $_POST['userid'];
$pass = $_POST['passwd'];


$stmt = $conn->prepare("SELECT * FROM master_login WHERE userid = ? AND passwd = ?");
$stmt->bind_param("ss", $userid, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
   
    $_SESSION['userid'] = $row['userid'];
    
   
    header('Location: BorrowDeposit.php');  
    exit();
} else {
    echo "<h1>Invalid username or password</h1>";
    
    exit();
}

$stmt->close();
$conn->close();
?>