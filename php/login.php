<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='css/login.css'>
		<script type='text/javascript' >
			function aki(){
				document.getElementById('msg').innerhtml="oi";
			}
		</script>
	</head>
	<body>
		<div>
		<form method='post' action="php/validar_.php">
			<table id='login'>
				<tr><td>Login: </td><td><input id='entra' type='text' name='login' required></td></tr>
				<tr><td>Senha: </td><td><input type='password' name='senha' required></td></tr>
				<tr><td></td><td><a href='cadastro.html'>Cadastrar &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
				<input type='submit'  onclick="aki()" value="Enviar"></td></tr>
				<div id='msg'></div>
			</table>
		</form>
		
		</div>
	</body>
</html>