<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location:/chepulsar/login.php');
	if(isset($_POST['update'])) {
		$errMsg = '';
		
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];
		
		if($password != $passwordVarify)
			$errMsg ='Error en la contraseña.';
		if($errMsg ==''){
			try{
				$sql = "UPDATE users SET fullname=:fullname, password=:password, secretpin=:secretpin WHERE username=:username";
				$stmt = $connect->prepare($sql);
				$stmt->execute(array(
				':fullname' => $fullname,
				':secretpin' => $secretpin,
				':password' => $password,
				':username' => $_SESSION['username']
				));
					header('Location: /chepulsar/update.php?action=updated');
					exit;
			}
			catch(PDOException $e){
				$errMsg = $e->getMessage();
			}
		}
	}
	if(isset($_GET['action']) && $_GET['action'] == 'updated'){
		$errMsg = 'Datos Actualizados Correctamente. <a href="logout.php">Salga</a> e ingrese de nuevo.';
	}?>
<html>
<head><title>Actualizar</title><link rel="stylesheet" type="text/css" href="css.css"></head>
<body class="body2"><div class="update">
<b class="smallext">UPDATE</b><br><br>
	<form action="" method="post">
		Nombre Completo<br>
		<input type="text" class="casillano"name="fullname" value="<?php echo $_SESSION['name']; ?>"/><br>
		Usuario<br>
		<input type="text" class="casillano"name="username" disabled autocomplete="off" value="<?php echo $_SESSION['username']; ?>"/><br>

		Pin secreto<br>
		<input type="text" class="casillano"name="secretpin" autocomplete="off" value="<?php echo $_SESSION['secretpin']; ?>" /><br>
		<hr>
		Contraseña<br>
		<input type="password" class="casillano"name="password" autocomplete="off" value="<?php echo $_SESSION['password']; ?>" /><br>
		Validar Contraseña<br>
		<input type="text" class="casillano" name="passwordVarify"  /><br><br>
		<input type="submit" autocomplete="off"class="accion"name="update" value="Actualizar" class="submit"/><br>
		<?php
			if(isset($errMsg)){
				echo "<h1>".$errMsg."</h1>";
			}
		?>
	</form>	
</div>	
</body>
</html>