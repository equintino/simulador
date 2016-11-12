<?php	
	$local = 'sql113.byethost7.com';
	$usuario_root = 'b7_16656868';
	$banco = 'b7_16656868_do';
	$senha_root = 'monica924';

/*
	$local = 'localhost';
	$usuario_root = 'root';
	$senha_root = '';
	$banco = 'desert_operations';
*/
	mysql_query('SET NAMES=utf-8');
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
			
	$conexao = mysql_connect($local,$usuario_root,$senha_root) or die ('Não foi possivel conectar! - '.mysql_error());
	$db = mysql_select_db($banco);
	/*
	$sql="show databases";
	$result=mysql_query($sql);
	echo $local."<br>".$result;
	*/
	
?>