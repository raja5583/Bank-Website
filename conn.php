<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$DB_USERNAME="root";
$DB_PASS="";
$DB_HOSTNAME="localhost";
$DB_NAME="dsa"; //write name of your database
$conn=mysqli_connect($DB_HOSTNAME,$DB_USERNAME,$DB_PASS,$DB_NAME) or die('DATABASE CONNECTION ERROR');
?>
</body>
</html>