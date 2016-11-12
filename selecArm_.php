<html>
	<head>
			<script>
					function goBack() {
    							window.history.back(-1);
						}
					function sair(){
								//window.close();
								//document.open("<?php include 'login.html'; ?>");		
					}
			</script>
		<?php
			include 'php/head_.php';
			include_once 'php/conexao_db.php';
			include_once 'php/sessao.php';
//=========Iniciando uma sessao===========
			
						
//======== Tratamento de acentos com o banco ========
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
		
//======== Variáveis ============
	@$combate=$_POST["combate"];
	@$login=$_GET['login'];
	function saudacao($login,$soma){
		if(isset($login)){
			$credito = credito($login);
			echo "Bem vindo - $login ($credito créditos / $soma min logado) <button onclick=sair()> Sair</button>";
		}
	}
//======== Créditos ===========
	function credito($login){
			$sql="select `credito` from `tb_usuarios` where login='$login'";
			$query=mysql_query($sql);
			while($resultado=mysql_fetch_array($query)){
				return $resultado[0];
			}
	}
			if(@$credito > 0) {
					reducaoCredito($credito,$login);
				}
	function reducaoCredito($credito,$login){
			$novoCredito=$credito-1;
			$sql = "UPDATE `desert_operations`.`tb_usuarios` SET `credito` = '$novoCredito' WHERE login = '$login'";
			$query=mysql_query($sql);	
		}
		
//======= Preenchimento das opções =======
	function campoBanco() {	
		//if(isset($_POST['acao']) && isset($_POST['acao']) == 'acao') {
			if($combate != ""){
				echo "<script type='text/javascript'>alert('Você não selecionou a opção de ataque ou defesa');</script>";		
			}
		//}
	}		
//======= Opções de combate ==========
	function armasNomes() {
			$tabela = 'tb_valores';
			$sql = "SELECT armamento FROM $tabela ORDER BY id ";
			$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
			
					while($linha=mysql_fetch_array($resultado)) {
						 	$armamento[]=$linha[0];
						}	
					return $armamento;	
			}
			
//======== Função Exército ============
	function exercito() {
			echo "<fieldset class='fieldSelecArm'><legend><h2>EXÉRCITO</h2></legend>
					<div align=center>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr></fieldset>";
						$armas=armasNomes();
						for($x=0;$x < 19;$x++) {
							$id=$x+1;
							echo "<tr><td><input type='checkbox' name='$id'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name='qnt$id' size='7' maxlength='7'><br /></td>
									<td><select name='unid$id'>
											<option value='mil'>Mil</option>
											<option value='milhões'>Milhões</option>
											<option value='bilhões'>Bilhões</option>
											<option value='trilhões'>Trilhões</option>
											<option value='quadrilhões'>Quadrilhões</option>
											<option value='quintilhões'>Quintilhões</option>
											<option value='sextilhões'>Sextilhões</option>			
									</select></td></tr>";
							}
			echo "</table></div></fieldset>";
		}
		
//========= Função Aeronáutica ==========
	function aeronautica() {
			echo "<fieldset class='fieldSelecArm'><legend><h2>AERONÁUTICA</h2></legend><br>
					<div align='center'>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr>";
						$armas=armasNomes();								
						for($x=19;$x < 39;$x++) {
							$id=$x+1;
							echo "<tr><td><input type='checkbox' name='$id'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$id' size='7' maxlength='7'><br /></td>
									<td><select name='unid$id'>
											<option value='mil'>Mil</option>
											<option value='milhões'>Milhões</option>
											<option value='bilhões'>Bilhões</option>
											<option value='trilhões'>Trilhões</option>
											<option value='quadrilhões'>Quadrilhões</option>
											<option value='quintilhões'>Quintilhões</option>
											<option value='sextilhões'>Sextilhões</option>				
									</select></td></tr>";
							}
			echo "</table></div></fieldset>";
		}
		
//======== Função Marinha ==============
	function marinha(){
		echo "<fieldset class='fieldSelecArm'><legend><h2>MARINHA</h2></legend>
					<div align='center'>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr>";
						$armas=armasNomes();							
						for($x=39;$x < 54;$x++) {
							$id=$x+1;
							echo "<tr><td><input type='checkbox' name='$id'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$id' size='7' maxlength='7'><br /></td>
									<td><select name='unid$id'>
											<option value='mil'>Mil</option>
											<option value='milhões'>Milhões</option>
											<option value='bilhões'>Bilhões</option>
											<option value='trilhões'>Trilhões</option>
											<option value='quadrilhões'>Quadrilhões</option>
											<option value='quintilhões'>Quintilhões</option>
											<option value='sextilhões'>Sextilhões</option>				
									</select></td></tr>";
							}
		echo "</table></div></fieldset>";	
	}		
//========= Função Defesa ===============
	function defesa() {
			echo "<fieldset class='fieldSelecArm'><legend><h2>DEFESA</h2></legend><br>
					<div align='center'>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr>";
						$armas=armasNomes();							
						for($x=54;$x < 62;$x++) {
							$id=$x+1;
							echo "<tr><td><input type='checkbox' name='$id'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$id' size='7' maxlength='7'><br /></td>
									<td><select name='unid$id'>
											<option value='mil'>Mil</option>
											<option value='milhões'>Milhões</option>
											<option value='bilhões'>Bilhões</option>
											<option value='trilhões'>Trilhões</option>
											<option value='quadrilhões'>Quadrilhões</option>
											<option value='quintilhões'>Quintilhões</option>
											<option value='sextilhões'>Sextilhões</option>				
									</select></td></tr>";
							}
			echo "</table></div></fieldset>";
		}											
		?>
	</head>
<body>
		<div id="site">
			<div class='saudacao'><?php saudacao($login,$soma); ?></div>
		 	<div id="cabecalho"><br><h1 class="titulo">Quais os armamentos do teu inimigo?</h1></div>
		 	<form action='selecResumo_.php' method='POST'>
				<div id="menu">
					<div class="nav01"><img src="imagens/Gripen%20FAB.GIF" alt="F22" height="50px"></div>	
						Você está:&nbsp
					<input type='radio' name='combate' value='Defendendo' required title="Você precisa definir o tipo de combate(Defendendo ou Atacando)."><b> Defendendo &nbsp ou &nbsp</b>
					<input type='radio' name='combate' value='Atacando' required title="Você precisa definir o tipo de combate(Defendendo ou Atacando)."><b> Atacando?</b>	
					<div class="nav02"><img height="75px" src="imagens/aviao_soltando_missel.gif" alt=""></div>
				</div>			
				<div id='conteudo'>
					<div class="meioSelecArm">	
						<?php	
							echo "<div id='exe'><br>";
								exercito();
							echo "</div>";
							echo "<div id='aer'><br>";
								aeronautica();
							echo "</div>";
							echo "<div id='mar'><br>";
								marinha();
							echo "</div>";
							echo "<div id='def'><br>";
								defesa();
							echo "</div>";
						?>
					</div>
				</div>
				<div id="sidebar">
					<ul class="ulsidebar">
						<a href="#exe"><li><h3>EXÉRCITO</h3></li></a>
						<a href="#aer"><li><h3>AERONÁUTICA</h3></li></a>
						<a href="#mar"><li><h3>MARINHA</h3></li></a>
						<a href="#def"><li><h3>DEFESA</h3></li></a>				
					</ul>
				</div>
				<div id="btnSimular">
					<ul>
						<li><button class='sombra' ><b>SIMULAR COMBATE</b></button></li>
					<ul>
				</div>
				<div id="rodape"><?php include 'php/rodape_.php'; ?></div>
			</form>
		</div>
</body>
</html>