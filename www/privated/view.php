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
<nav class="navbar is-danger">
    <div class="navbar-brand">
        <a class="navbar-item" href="./index.php">
        <i class="fas fa-user-secret"></i>
        </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
    <a class="navbar-item" href="./register.php">
       Nuevo registro
      </a>
      <a class="navbar-item" href="./logout.php">
              <span class="icon">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span>Logout</span>
        </a>
      <a class="navbar-item" href="./index.php">
        Vuelve atrás 🔙
      </a>
    </div>

    </div>
  </div>
</nav>
    
<table class="table">
    <tr>
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
