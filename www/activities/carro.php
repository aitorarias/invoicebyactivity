<?php
session_start(); //metodo PHP que me permite checkear si se ha iniciado sesión con mi cuenta
$connect = mysqli_connect("mysql.aarias.colexio-karbo.com", "karbo_aarias", "ACruz*2017", "karbo_aarias"); 
if(isset($_POST["add"])) 
{
	if(isset($_SESSION["cart"])) // inicializamos la sesion
	{
		$item_array_id = array_column($_SESSION["cart"], "product_id"); // devuelve los valores de una columna de input
		if(!in_array($_GET["id"], $item_array_id)) 
		{
			$count = count($_SESSION["cart"]); //CUENTA LOS ELEMENTOS DE CART => IMPORTANTE
			$item_array = array(
			'product_id' => $_GET["id"], //consigue el ID
			'item_name' => $_POST["hidden_actividad"], // traigo la actividad del index.php
			'product_salary' => $_POST["hidden_precio"], // traigo el precio del index.php
			);
			$_SESSION["cart"][$count] = $item_array;
			echo '<script>window.location="index.php"</script>';
		}
		else
		{
			echo '<script>alert("La actividad ha sido añadido a tu cuenta")</script>'; //checkeo con alert
			echo '<script>window.location="index.php"</script>'; //me mantengo en el index
		}
	}
	else
	{
		$item_array = array(
		'product_id' => $_GET["id"],
		'item_name' => $_POST["hidden_actividad"],
		'product_salary' => $_POST["hidden_precio"],
		);
		$_SESSION["cart"][0] = $item_array; 
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values) // se devuelve values por convencion PHP
		{
			if($values["product_id"] == $_GET["id"]) // sólo id, puesto que ello engloba todo el plato, absurdo traer todas las propiedades
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("El plato ha sido borrado")</script>'; // checkeo con alert
				echo '<script>window.location="index.php"</script>'; // me situa otra vez en la misma pagina
			}
		}
	}
}
?>