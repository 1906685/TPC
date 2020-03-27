<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
	<head><title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body class="body2">
	<div class="dashboard">
	<div class="encabezadod"><div align="center">
	<?php
		if(isset($errMsg)){
			echo '<h1>'.$errMsg.'</h1>';
		}
	?>
	<b><?php echo $_SESSION['name'];?></b><br>
		Bienvenido <?php echo $_SESSION['name'];?><br>
		<a href="update.php">Actualizar</a>
		<div id="menu" align="center">
   <ul class="nav">
		<li><a href="articulos/index.php">articulos</a>
		</li>
		<li><a href="compras/index.php">compras</a>
		</li>
		<li><a href="empleado/index.php">empleados</a>
		</li>
		<li><a href="servicios/index.php">servicios </a>
		</li>
		<li><a href="ventas/index.php">ventas</a>
		</li>
		<li><a href="index.php">registrese</a>
		</li>
	</ul>
</div>
		<br><br><a href="logout.php">Salir</a><br><br>
		
	</div></div></div>
	</body>
	
</html>