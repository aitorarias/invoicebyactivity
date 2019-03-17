<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Login</title>
</head>
 
<body>
<a href="index.php">Home</a> <br />
<?php
include("connect.php");
 
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
    }
} else {
?>
    <p><font size="+2">Login</font></p>
    <form nombre="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td width="10%">Username</td>
                <td><input type="text" nombre="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" nombre="password"></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" nombre="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>