<?php session_start(); ?>
 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//incluyendo el archivo que conecta a la base de datos
include_once("connect.php");
 
// recogiendo datos en orden ascendente
$result = mysqli_query($mysqli, "SELECT * FROM login ORDER BY id ASC");
?>
 
<html>
<head>
    <title>Consulta de usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
 
<body>
<a href="index.php">Home</a> | <a href="register.php">Nuevo registro</a> | <a href="logout.php">Logout</a>
<br/><br/>
    
<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>ID</td>
        <td>Nombre</td>
        <td>Email</td>
        <td>Username</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {        
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['nombre']."</td>";
        echo "<td>".$res['email']."</td>";    
        echo "<td>".$res['username']."</td>";    
    }
    ?>
</table>    
</body>
</html>
