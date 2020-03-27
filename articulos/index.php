<?php
//incluir el config
include_once("config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM articulos ORDER BY id DESC");
?>
<html>
<head>
	<title>tabla de articulos</title>
</head>

<body>
<a href="add.html">Añadir mas articulos</a><br>
<table width='80%' border=1>
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
</body>
</html>