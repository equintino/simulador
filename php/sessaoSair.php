<?php	
			include 'conexao_db.php';
function sessaoSair($usuarioLogin){
			$saida=	date("d/m/Y à\s H:i:s");
			$sql = "UPDATE `tb_sessoes` SET `fim` ='" .$saida."' WHERE `login` = '".$usuarioLogin."'";	
			mysql_query($sql) or die ('Não consegui gravar a saída'. mysql_error());						
			session_destroy();
			mysql_close();		
		}
		echo @$_GET['login'];
		sessaoSair($_GET['login']);
?>