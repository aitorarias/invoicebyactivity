<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Acceso Privado</title>
</head>
<body>
    <div id="header">
        Welcome to my page! 
    </div>
    <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Welcome <?php echo $_SESSION['nombre'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a href='view.php'>View and Add Products</a>
        <br/><br/>
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>
    <div id="footer">
        Created by <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">Mukesh Chapagain</a>
    </div>
</body>
</html>
</html>