<html>
	<head>
			<script>
					function goBack() {
    							window.history.back(-1);
						}
			</script>
		<?php
			include 'php/head.php';
			include_once 'php/conexao_db.php';
//======== Tratamento de acentos com o banco ========
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');			
		
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
			echo "<fieldset class='fieldSelecArm'><legend><h2>EXÉRCITO</h2></legend><br>
					<div align=center>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr></fieldset>";
						$armas=armasNomes();
						for($x=0;$x < 19;$x++) {
							echo "<tr><td><input type='checkbox' name='$x'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$x' size='7' maxlength='7'><br /></td>
									<td><select name='unid$x'>
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
							echo "<tr><td><input type='checkbox' name='$x'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$x' size='7' maxlength='7'><br /></td>
									<td><select name='unid$x'>
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
		echo "<fieldset class='fieldSelecArm'><legend><h2>MARINHA</h2></legend><br>
					<div align='center'>
					<table color=white align=center>
						  	<tr><th>TIPO</th><th>QUANTOS</th><th>UNIDADE</th></tr>";
						$armas=armasNomes();							
						for($x=39;$x < 54;$x++) {
							echo "<tr><td><input type='checkbox' name='$x'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$x' size='7' maxlength='7'><br /></td>
									<td><select name='unid$x'>
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
							echo "<tr><td><input type='checkbox' name='$x'><b>&nbsp $armas[$x] &nbsp</b></td>
									<td><input type='text' name= 'qnt$x' size='7' maxlength='7'><br /></td>
									<td><select name='unid$x'>
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
		 	<div id="cabecalho"><h1 class="titulo">Quais os armamentos do teu inimigo?</h1></div>
		 	<form action='selecResumo.php' method='post'>
				<div id="menu">
					<div class="nav01"><img src="http://www.militarypower.com.br/Gripen%20FAB.GIF" alt="" height="90px"></div>	
						Você está:&nbsp
					<input type='radio' name='combate' value='Defendendo'><b> Defendendo &nbsp ou &nbsp</b>
					<input type='radio' name='combate' value='Atacando'><b> Atacando?</b>	
					<div class="nav02"><img height="80px" src="http://www.gifsdahora.com.br/gifs_animados/gifs/12Transportes//aviao_soltando_missel.gif" alt=""></div>
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
				<div id="btnSimular"><?php include_once 'php/bntSimular.php';?></div>
				<div id="rodape"><?php include 'php/rodape.php'; ?></div>
			</form>
		</div>
</body>
</html>