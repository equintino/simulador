<meta charset='utf-8'>
<script type='text/javascript'>
	function voltar(){
		window.history.go(-1);
	}
	function loginInexistente(url){
			var r = confirm('Login inexistente.\nDeseja cadastar um login?');
			if(r == false){
					voltar();				
			}else{
				window.location= url;
			}	
		}
	function mensagem($a){
		var a = $a;
		document.getElementById('msg').innerHTML = $a;
	}
	function senhaErrada(){
			alert('A senha digitada está incorreta.');
			voltar();		
		}
</script>
<div id='msg'></div>
<?php
	$login = @$_POST['login'];
	$senha = @$_POST['senha'];
	$entrar = @$_POST['entrar'];
		
		function verificaLogin($login,$senha) {
			include 'conexao_db.php';
			$sql = "SELECT `login`, `senha`, `nivel` FROM `tb_usuarios` WHERE login='".$login."'";
			$sql2 = "SELECT `login`, `senha`, `nivel` FROM `tb_usuarios` WHERE senha='".$senha."'";
			$result=mysql_query($sql);
			$linha=mysql_num_rows($result);

				if($linha=mysql_num_rows($result)){
							//echo "Login ok<br>";
							$result2=mysql_query($sql2);
							if($linha=mysql_num_rows($result2)){
								//echo "Senha ok<br>";
								header("Location: ../selecArm_.php?login=$login");
							}else{
								echo "<script>senhaErrada()</script>";
								//echo "<button onclick='voltar()' class='sombra'><b>VOLTAR</b></button>";
							}
					}else{
							echo "<script> loginInexistente('../cadastro.html');</script>";	
							//require('cadastro.html');	
							//header('Location: cadastro.html');	
					}
				}
		
		verificaLogin($login,$senha);
?>