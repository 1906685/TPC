<?php
//incluir el config
include_once("config.php");
//actualizar las variables
if(isset($_POST['Update'])){
	$id = $_POST['id'];
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
	//verificar variables
	if(empty($tipo) || empty($nombre) || empty($serial) || empty($marca) || empty($garantia) || empty($proveedor) || empty ($cantidad) || empty ($p_compra) || empty ($p_venta) || empty ($material)){
		if(empty($tipo)) {
			echo "<h1>Campo: tipo esta vacio</h1><br>";
		}
		if(empty($nombre)){
			echo "<h1>Campo: nombre esta vacio</h1><br>";
		}
		if(empty($serial)){
			echo "<h1>Campo: serial esta vacio</h1><br>";
		}
		if(empty($marca)){
			echo "<h1>Campo: marca esta vacio</h1><br>";
		}
		if(empty($garantia)){
			echo "<h1>Campo: garantia esta vacio</h1><br>";
		}
		if(empty($proveedor)){
			echo "<h1>Campo: proveedor esta vacio</h1><br>";
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
	} else {
		//insertar nuevos datos
		$sql = "UPDATE articulos SET tipo=:tipo, nombre=:nombre, serial=:serial, marca=:marca, garantia=:garantia, proveedor=:proveedor, cantidad=:cantidad, p_compra=:p_compra, p_venta=:p_venta, material=:material WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id',$id);
		$query->bindparam(':tipo',$tipo);
		$query->bindparam(':nombre',$nombre);
		$query->bindparam(':serial',$serial);
		$query->bindparam(':marca',$marca);
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
<?php
//Get id
$id = $_GET['id'];
//selecionar linea
$sql="SELECT * FROM articulos WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' =>$id));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$tipo = $row['tipo'];
		$nombre = $row['nombre'];
		$serial = $row['serial'];
		$marca = $row['marca'];
		$garantia = $row['garantia'];
		$proveedor = $row['proveedor'];
		$cantidad = $row['cantidad'];
		$p_compra = $row['p_compra'];
		$p_venta = $row['p_venta'];
		$material = $row['material'];
}
?>
<html>
<head>
	<title>articulos</title>
	<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body class="body2">
	<a href="index.php">atras</a>
	<br><br>
	
	<form action="edit.php" method="post">
		<table width="25%" border="0">
			<tr>
				<td>tipo</td>
				<td><input type="text" class="casillano" name="tipo" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr>
				<td>nombre</td>
				<td><input type="text" class="casillano" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr>
				<td>serial</td>
				<td><input type="text" class="casillano" name="serial" value="<?php echo $serial;?>"></td>
			</tr>
			<tr>
				<td>marca</td>
				<td><input type="text" class="casillano" name="marca" value="<?php echo $marca;?>"></td>
			</tr>
			<tr>
				<td>garantia</td>
				<td><input type="text" class="casillano" name="garantia" value="<?php echo $garantia;?>"></td>
			</tr>
			<tr>
				<td>proveedor</td>
				<td><input type="text" class="casillano" name="proveedor" value="<?php echo $proveedor;?>"></td>
			</tr>
			<tr>
				<td>Cantidad</td>
				<td><input type="text" class="casillano" name="cantidad" value="<?php echo $cantidad;?>"></td>
			</tr>
			<tr>
				<td>Precio de compra</td>
				<td><input type="text" class="casillano" name="p_compra" value="<?php echo $p_compra;?>"></td>
			</tr>
			<tr>
				<td>Precio de venta</td>
				<td><input type="text" class="casillano" name="p_venta" value="<?php echo $p_venta;?>"></td>
			</tr>
			<tr>
				<td>Material</td>
				<td><input type="text" class="casillano" name="material" value="<?php echo $material;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input type="submit" class="accion" name="Update" value="Update"></td>
			</tr>
		<table>
	</form>
</body>
</html>