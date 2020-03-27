<?php
//incluir el config
include_once("config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM articulos ORDER BY id DESC");
?>
<html>
<head>
	<title>tabla de articulos</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
<div class="contenido">
<div id="menu">
	<ul  class="nav">
		<li><a href="../dashboard.php" > dashboard</a></li>
		<li><a href='javascript:self.history.back();'>Regresa</a></li>
		<li><a href="javascript:abrir()">ingresar articulo</a></li>
		<li><a href="../logout.php">Salir</a></li>
	</ul>
</div><br><br><br><br>
<table class="table" border="2">
	<tr>
		<td>Tipo</td>
		<td>Nombre</td>
		<td>Serial</td>
		<td>Marca</td>
		<td>Garantia</td>
		<td>Proveedor</td>
		<td>Cantidad</td>
		<td>Precio de compra</td>
		<td>Precio de venta</td>
		<td>Material</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo "<td>".$row['tipo']."</td>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['serial']."</td>";
		echo "<td>".$row['marca']."</td>";
		echo "<td>".$row['garantia']."</td>";
		echo "<td>".$row['proveedor']."</td>";
		echo "<td>".$row['cantidad']."</td>";
		echo "<td>".$row['p_compra']."</td>";
		echo "<td>".$row['p_venta']."</td>";
		echo "<td>".$row['material']."</td>";
		echo "<td><a href=\"edit.php?id=$row[id]\"> Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila')\">Borrar</a></td>";
		echo "</tr>";
	}
	?>
	</table>
	<form action="" id="form" method="post" align="center">
		<table>
			<tr>
				<td>Tipo</td>
				<td><input type="text" class="casillano" name="tipo"></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" class="casillano" name="nombre"></td>
			</tr>
			<tr>
				<td>Serial</td>
				<td><input type="text" class="casillano" name="serial"></td>
			</tr>
			<tr>
				<td>Marca</td>
				<td><input type="text" class="casillano" name="marca"></td>
			</tr>
			<tr>
				<td>Garantia</td>
				<td><input type="text" class="casillano" name="garantia"></td>
			</tr>
			<tr>
				<td>Proveedor</td>
				<td><input type="text" class="casillano" name="proveedor"></td>
			</tr>
			<tr>
				<td>Cantidad</td>
				<td><input type="text"class="casillano"  name="cantidad"></td>
			</tr>
			<tr>
				<td>Precio de compra</td>
				<td><input type="text" class="casillano" name="p_compra"></td>
			</tr>
			<tr>
				<td>Precio de venta</td>
				<td><input type="text" class="casillano" name="p_venta"></td>
			</tr>
			<tr>
				<td>Material</td>
				<td><input type="text" class="casillano" name="material"></td>
			</tr>
			<tr>
				<td><input type="submit" class="accion" value="ocultar formulario">
	</td>
				<td><input type="submit" class="accion" name="Submit" value="Add"><br></td>
			</tr>
		<table>
	</form>
	
	<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$serial = $_POST['serial'];
	$marca = $_POST['marca'];
	$garantia = $_POST['garantia'];
	$proveedor = $_POST['proveedor'];
	$cantidad = $_POST['cantidad'];
	$p_compra = $_POST['p_compra'];
	$p_venta = $_POST['p_venta'];
	$material = $_POST['material'];
// verificador de variables
	if(empty($tipo) || empty($nombre) || empty ($serial) || empty ($marca) || empty ($garantia) ||empty ($proveedor) || empty ($cantidad) || empty ($p_compra) || empty ($p_venta) || empty ($material)){
		if(empty($tipo)){
			echo "<h1>Campo: Tipo esta vacio.</h1>";
		}		
		if(empty($nombre)){
			echo "<h1>Campo: Nombre esta vacio.</h1>";
		}
		if(empty($serial)){
			echo "<h1>Campo: Serial esta vacio.</h1>";
		}
		if(empty($marca)){
			echo "<h1>Campo: Marca esta vacio.</h1>";
		}
		if(empty($garantia)){
			echo "<h1>Campo: Garantia esta vacio.</h1>";
		}
		if(empty($proveedor)){
			echo "<h1>Campo: Provedor esta vacio.</h1>";
		}
		if(empty($cantidad)){
			echo "<h1>Campo: Cantidad esta vacio.</h1>";
		}
		if(empty($p_compra)){
			echo "<h1>Campo: Precio de compra esta vacio.</h1>";
		}
		if(empty($p_venta)){
			echo "<h1>Campo: Precio de venta esta vacio.</h1>";
		}
		if(empty($material)){
			echo "<h1>Campo: Material esta vacio.</h1>";
		}
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO articulos (tipo, nombre, serial, marca, garantia, proveedor, cantidad, p_compra, p_venta, material) VALUES(:tipo, :nombre, :serial, :marca, :garantia, :proveedor, :cantidad, :p_compra, :p_venta, :material)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':tipo', $tipo);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':serial', $serial);
		$query->bindparam(':marca', $marca);
		$query->bindparam(':garantia',$garantia);
		$query->bindparam(':proveedor',$proveedor);
		$query->bindparam(':cantidad', $cantidad);
		$query->bindparam(':p_compra', $p_compra);
		$query->bindparam(':p_venta', $p_venta);
		$query->bindparam(':material', $material);
		$query->execute();
		
		header ("Location: index.php");
	}	
	}
?>
<script>
function abrir(){
  document.getElementById("form").style.display="block";
  }
	</script>
</div>
</body>
</html>