

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
        <table>
            <tr>
                <td><a class="rem" href="">Home&nbsp;|</a></td>
                <td><a class="rem" href="">About Us&nbsp;| </a></td>
                <td><a class="rem" href="http://localhost/login.php">Login&nbsp;|</a></td>
            </tr>
        </table>
    </div>
   
<form action="login_check.php" method="POST">
        <label for="userid">User ID:</label>
        <input type="text" name="userid"required><br><br>
        
        <label for="passwd">Password:</label>
        <input type="password" name="passwd"required><br><br>
        
        <input type="submit" value="Login">
    </form>
   

 


    
        
        
</body>
</html>

