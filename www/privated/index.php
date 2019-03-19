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
    <nav class="navbar is-danger">
    <div class="navbar-brand">
    <a class="navbar-item">
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
      <a class="navbar-item" href="../index.html">
        Página principal
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="https://bulma.io/documentation/overview/start/">
          Documentación
        </a>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
          <?php
            if(isset($_SESSION['valid'])){            
                include("connect.php");                    
                $result = mysqli_query($mysqli, "SELECT * FROM login");
            ?>            
            <a class="button is-primary" href="./logout.php">
              <span class="icon">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span>Logout</span>
            </a>
            <?php    
    } else {
        echo "<a class='button is-primary' href='login.php'>Login</a>  <a class='button is-link' href='register.php'>¡Regístrate como personal autorizado!</a>";
    }
    ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="hero is-info is-fullheight">
  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Bienvenido
      </h1>
      <h2 class="subtitle">
      <?php
    if(isset($_SESSION['valid'])) {            
        include("connect.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Acceso permitido <?php echo $_SESSION['nombre'] ?>!
        <br/> <br/><br/>
        <a href='view.php'>Puedes ver la lista de usuarios dados de alta en la plataforma</a>
    <?php    
    } else {
        echo "<br/><br/>Acceso restringido. Debes estar logueado para ver esta página.<br/><br/>";
    }
    ?> 
      </h2>
    </div>
  </div>
      <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li>  
            <a href="https://github.com/aitorbuleapp/">GitHub</a>
          </li>
          <li>
            <a href="http://www.aarias.colexio-karbo.com/18-19/">Colexio Karbo</a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/aitorariascruz/?originalSubdomain=es">Aitor Arias</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>
</body>
</html>