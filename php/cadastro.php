<meta charset='utf-8'>
<script>
			function voltar(){
					window.history.go (-1);
			}
</script>
<?php
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	$senha2=$_POST['senha2'];
	$nivel=$_POST['nivel'];

	include 'conexao_db.php';
	/*$sql="show tables";
	$result=mysql_query($sql);
	while($linha=mysql_fetch_array($result) or die (mysql_error())){
		echo "$linha[0]<br>";
	}*/
		if($senha != $senha2) {
				echo "<script>
						alert('A senha não confere!');
						voltar();
					 </script>";		
		}
		function casdastro($login,$senha,$nivel,$nome,$email){
			$sql="INSERT INTO `tb_usuarios`(`id`,`nome`,`email`,`login`,`senha`,`nivel`,`credito`) VALUES ('','$nome','$email','$login','$senha','$nivel','10')";
			if($result=mysql_query($sql) or die (mysql_error())){
				echo "<script>
						alert('Cadastro realizado com sucesso');
						window.location='../index_.php';
					 </script>";
				//header('Location:../index_.php');
			} else{
				echo "<script>
						alert('Não foi possível efetuar o cadastro.\nTente novamente.');
						voltar();
					  </script>";
			}
		}
		function loginExistente($login,$senha,$nivel,$nome,$email){
			$sql="select `login` from `tb_usuarios` where login='$login'";
			$sql2="select `email` from `tb_usuarios` where email='$email'";
			$query=mysql_query($sql) or die (mysql_error());
			$query2=mysql_query($sql2) or die (mysql_error());
			$result=mysql_num_rows($query);
			$result2=mysql_num_rows($query2);
					if($result != 0) {
						echo "<script type='text/javascript'>
								alert('Login existente');
								voltar();
							 </script>";
					} elseif ($result2 != 0) {
						echo "<script type='text/javascript'>
								alert('Este e-mail já está cadastrado');
								voltar()
							 </script>";
					} else {
							casdastro($login,$senha,$nivel,$nome,$email);					
					}
	}
	loginExistente($login,$senha,$nivel,$nome,$email);
?>