<?php session_start(); ?>
<html>
<head>
    <title>Acceso restringido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    <script>
        alert("Esta página es de uso exclusivo para los administradores. Por favor, si no tienes dicho rol, abandónala. Tu dirección IP será guardada por motivos de seguridad. Gracias. ")
    </script>
    <div id="header">
        Bienvenid@ a la administración
    </div>
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a href='view.php'>Ver la lista de usuarios dados de alta en la plataforma</a>
        <br/><br/>
    <?php    
    } else {
        echo "Debes estar logueado para ver esta página.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>¡Regístrate como personal autorizado!</a>";
    }
    ?>
    <div id="footer">
        Aitor Arias Cruz | 2019 Examen Final Xestión Empresarial
    </div>
</body>
</html>