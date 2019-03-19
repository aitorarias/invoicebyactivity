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
<a href="index.php">Vuelve a la pantalla principañ</a> <br />
<?php
include("connect.php");
 
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "El usuario o contraseña están vacíos. Inténtalo de nuevo 😃 ";
        echo "<br/>";
        echo "<a href='login.php'>Vuelve atrás 🔙</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("No podemos ejecutar la siguiente consulta 😧.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Nombre de usuario o contraseña incorrecta.";
            echo "<br/>";
            echo "<a href='login.php'>Vuelve atrás</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
    }
} else {
?>
    <p><font size="+2">Login</font></p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td width="10%">Nombre de usuario</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Contraseña</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>