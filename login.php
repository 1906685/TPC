<?php
	require 'config.php';
	if (isset($_POST['login'])) {
		$errMsg = '';
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == '')
			$errMsg ='ingrese su nombre de usuario';
		if($password == '')
			$errMsg ='ingres su contraseña';
		
		if ($errMsg == '') {
			try {
				$stmt = $connect -> prepare('SELECT id, fullname, username, password, id_num, email, secretpin FROM  users WHERE username = :username');
				$stmt ->execute(array(
					':username' =>$username));
				$data = $stmt ->fetch(PDO::FETCH_ASSOC);
				if ($data == false){
					$errMsg = "usuario $username no encontrado.";
				}
				else{
					if ($password ==$data['password']){
						$_SESSION['name'] = $data['fullname'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['secretpin'] = $data['secretpin'];
						$_SESSION['password'] = $data['password'];
						$_SESSION['id_num'] = $data['id_num'];
						$_SESSION['email'] = $data['email'];
						header('Location: dashboard.php');
						exit;
					}
					else
						$errMsg = 'contraseña incorrecta';
				}
			}
			catch(PDOException $e){
				$errMsg = $e->getMessage();
			}
			
		}
	}
?>
<html>
<head><title>ingreso</title>
<link rel="stylesheet" type="text/css" href="css.css"></head>
<body class="body2"><div class="login">
 	<div><h1>Ingresa</h1>
	<span> <a href="register.php">Registrate</a></span>
	<form action="" method="post">
		<input type="text" class="casillano" name="username" placeholder="Usuario"   value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/><br><br>
		<input type="password" class="casillano" name="password" placeholder="Contraseña" autocomplete="off" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/><br><br>
		<input type="submit" class="accion" name="login" placeholder="Ingresar" class="submit"/><br>
	</form>
	
		<span><a href="forgot.php">Olvido la contraseña</a></span><br>
		<span><a href="index.php">Volver al inicio</a></span>
	<?php
		if(isset($errMsg)){
			echo '<h1>'.$errMsg.'</h1>';
		}
	?>
	</div>
</body>
</html>



