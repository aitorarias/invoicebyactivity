<html>
<head>
    <title>Registro</title>
    <title>Acceso restringido</title>
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
    <a class="navbar-item">
        Regístrate introduciendo todos los campos
      </a>
      <a class="navbar-item" href="./index.php">
        Vuelve atrás 🔙
      </a>
    </div>

    </div>
  </div>
</nav>

    <?php
    include("connect.php");
 
    if(isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
 
        if($user == "" || $pass == "" || $nombre == "" || $email == "") {
            echo "Todos los campos han de ser cubiertos.";
            echo "<a href='register.php'>Vuelve atrás</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(nombre, email, username, password) VALUES('$nombre', '$email', '$user', md5('$pass'))")
            or die("No se ha podido establecer conexión con la base de datos.");
            
            echo "Registro completado con éxito";
            echo "<a href='login.php'>Ahora, logueate</a>";
        }
    } else {
?>
            <br/><br/>
        <form name="form1" method="post" action="">
            <table class="table">
                <tr> 
                    <td>Nombre</td>
                    <td><input type="text" name="nombre" class="input is-primary" placeholder="Introduzca su nombre"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="text" name="email" class="input is-primary" placeholder="Introduzca su email"></td>
                </tr>            
                <tr> 
                    <td>Nombre de usuario</td>
                    <td><input type="text" name="username" class="input is-primary" placeholder="Introduzca su nombre de usuario"></td>
                </tr>
                <tr> 
                    <td>Contraseña</td>
                    <td><input type="password" name="password" class="input is-danger" placeholder="Introduzca su contraseña"></td>
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