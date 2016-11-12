<script type='text/javascript'>
	function sessaoExpirada(){
		alert('Sua sessão expirou ');
		window.location = 'index_.php';
	}
</script>
<?php	
			date_default_timezone_set("Brazil/East");
	function sessaoTabela($usuarioSessao,$fim) {
			$inicioSessao=date("d/m/Y à\s H:i:s");
			$sql="INSERT INTO `tb_sessoes`(`id`, `login`, `inicio`, `fim`) VALUES ('','$usuarioSessao','$inicioSessao','$fim')";
			mysql_query($sql) or die ('Não foi possĩvel criar entrada de dados!'. mysql_error());
	}
	function sessaoSair($usuarioLogin){
			$saida=	date("d/m/Y à\s H:i:s");
			$sql = "UPDATE `tb_sessoes` SET `fim` ='".$saida."' WHERE `login` = '".$usuarioLogin."'";
				//echo "$saida<br>$usuarioLogin<br>";
			mysql_query($sql) or die ('Não consegui gravar a saída'. mysql_error());						
			session_destroy();		
		}
	session_start();	
		if(isset($_SESSION['usuario'])) {		
		} else {
			$_SESSION['usuario']=@$_GET['login'];	
			$_SESSION['inicioConexao']=date('h')*60+date('i');
			sessaoTabela($_SESSION['usuario'],'logado');
		}
		$soma=date('h')*60+date('i')-@$_SESSION['inicioConexao'];
		if($soma>60 || $soma < 0){
			echo "<script type='text/javascript'>
					sessaoExpirada();
				  </script>";
			sessaoSair($_SESSION['usuario']);
		}
		//echo date('h')*60+date('i')." - ".$_SESSION['inicioConexao']." = ".$soma;
?>