<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='css/login.css'>
	</head>
	<body>
		<div>
		<form method='post'>
			<table id='login'>
				<tr><td>Login: </td><td><input id='entra' type='text' name='login' required></td></tr>
				<tr><td>Senha: </td><td><input type='password' name='senha' required></td></tr>
				<tr><td></td><td><a href='cadastro.html'>Cadastrar &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
				<input type='submit' name='entrar' value='Entrar'></td></tr>
				<div id='msg'></div>
				<?php include 'php/validar.php'?>
			</table>
		</form>
		</div>
	</body>
</html>