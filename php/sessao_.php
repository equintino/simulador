<?php	
			date_default_timezone_set("Brazil/East");
	function sessaoTabela($usuarioSessao,$fim) {
			$inicioSessao=date("d/m/Y à\s H:i:s");
			$sql="INSERT INTO `tb_sessoes`(`id`, `login`, `inicio`, `fim`) VALUES ('','$usuarioSessao','$inicioSessao','$fim')";
			mysql_query($sql) or die ('Não foi possĩvel criar entrada de dados!'. mysql_error());
	}
	session_start();	
		if(isset($_SESSION['usuario'])) {		
		} else {
			$_SESSION['usuario']=@$_GET['login'];	
			$_SESSION['inicioConexao']=date('h')*60+date('i');
			sessaoTabela($_SESSION['usuario'],'logado');
		}
		$soma=date('h')*60+date('i')-@$_SESSION['inicioConexao'];
		if($soma>1 || $soma < 0){
			$saida=	date("d/m/Y à\s H:i:s");
			$usuarioSessao=$_SESSION['usuario'];
			$sql = "UPDATE `tb_sessoes` SET `fim` ='".$saida."' WHERE `login` = '".$usuarioSessao."'";	
			mysql_query($sql) or die ('Não consegui gravar a saída'. mysql_error());						
			session_destroy();
				echo "<script type='text/javascript'>alert('Sua sessão expirou');
						window.location= 'index_.php';
					 </script>";
		}
		//echo date('h')*60+date('i')." - ".$_SESSION['inicioConexao']." = ".$soma;
?>