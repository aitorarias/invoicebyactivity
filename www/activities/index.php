<?php
session_start(); // Metodo PHP que inicializa la sesion. Difiere de los otros métodos simplemente por prueba/error
$connect = mysqli_connect("mysql.aarias.colexio-karbo.com", "karbo_aarias", "ACruz*2017", "karbo_aarias"); 
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Actividades</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="container" style="width:60%;">
	<h2 align="center">Actividades</h2>
    <?php
    // de mi tabla employees
	$query = "SELECT * FROM activities ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-3">
            <form method="post" action="carro.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["actividad"]; ?></h5>
            <h5 class="text-danger"> <?php echo $row["precio"]; ?>€</h5>
            <input type="hidden" name="hidden_actividad" value="<?php echo $row["actividad"]; ?>">
            <input type="hidden" name="hidden_precio" value="<?php echo $row["precio"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Añadir">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
    <div style="clear:both"></div>
    <h2>Factura</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th width="40%">Nombre</th>
    <th width="10%">Actividad</th>
    <th width="20%">Precio</th>
    <th width="15%">Total</th>
    <th width="5%">Borrar plato</th>
    </tr>
    <?php
    // sino esta vacio el carro, entonces
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values) // LOGICA DEL CARRO DE LA COMPRA
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td> <?php echo $values["product_salary"]; ?>€</td>
            <td><?php echo number_format($values["product_salary"], 2); ?>€</td>
            <td><a href="carro.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["product_salary"]);
		}
		?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">€<?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
    <div>
        <a href="../website/index.php" class="btn btn-success pull-right">Vuelve a la web</a>
    </div>
    <div>
        <a href="../php/CRUD/index.php" class="btn btn-success pull-right">Administrador</a>
    </div>
    </div>
 </body>
</html>