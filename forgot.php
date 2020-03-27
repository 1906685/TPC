<?php
	require'config.php';
	
	if(isset($_POST['forgotpass'])){
		$errMsg='';
		$secretpin = $_POST['secretpin'];
		$id_num = $_POST['id_num'];
	if(empty($secretpin))
		$errMsg = 'Por favor ingrese su pin para recuperar su contraseña.';
	if(empty($id_num))
		$errMsg = 'Por favor ingrese su numero de documento para recuperar su contraseña.';
	
		if($errMsg ==''){
			try{
				$stmt = $connect->prepare('SELECT password, secretpin, id_num FROM users WHERE secretpin=:secretpin');
				$stmt->execute(array(
				':secretpin'=>$secretpin,
				));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if(($secretpin == $data['secretpin']) && ($id_num == $data['id_num'])){
					$viewpass = 'Su Contraseña es:'.$data['password'].'<br><a href="login.php">Ingrese ya!!</a>';
				}
				else{
					$errMsg = 'No Hay Coincidencia.';
				}
			}
			catch(PDOExeption $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
 ?>
 
 <html>
 <head><title>Olvido Contraseña</title>
 <link rel="stylesheet" type="text/css" href="css.css">
 </head>
 <body class="body2">
 <div class="forgot">
	<b>Recuperar contraseña</b> <br><br>
		<form action="" method="post">
			<input type="text" class="casillano" name="secretpin" placeholder="pin" autocomplete="off" /><br>
			<input type="text" class="casillano" name="id_num" placeholder="id" autocomplete="off" /><br><br>
			<input type="submit"  value="recuperar" name="forgotpass" class="accion"/>
		</form>
	<?php
		if(isset($errMsg)){
			echo'<h1>'.$errMsg.'</h1>';
		}
		if(isset($viewpass)){
			echo'<h1>'.$viewpass.'</h1>';
		}
	?>
	</div>
 </body>
 </html>