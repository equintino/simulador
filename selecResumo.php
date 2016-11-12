<html>
	<head>
		<script>
			function goBack() {
    				window.history.back();
				}
		</script>
		<?php
/*
// Cria uma variável que terá os dados do erro
	$erro = false;
	@$combate = trim($_POST["combate"]);

// Verifica se o POST tem algum valor
	if ( !isset( $combate ) || empty( $combate ) ) {
			$erro = 'Você não selecionou a opção de defesa ou ataque';
	}	
// Se existir algum erro, mostra o erro
	if ( $erro ) {
			echo "<script>alert('Você não selecionou a opção de defesa ou ataque');	goBack(-1)</script>";
	}	
*/		
			include 'php/head.php';
			include_once 'php/conexao_db.php';
			ini_set( 'display_errors', true );
			error_reporting( E_ALL );
//======== Tratamento de acentos com o banco ========
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');	
		
				$tabela = 'tb_combates';	
				$sql = "SELECT * FROM $tabela ORDER BY id ";
				$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados". mysql_error());		
//======== Variáveis =============
			@$tipoCombate=$_POST["combate"];// Atacando ou defendendo
			@$on=seletOn();// Recebendo as armas selecionadas $on(array)
			@$f=count($on);// Quantidade dos armamentos selecionados			
			@$fator=quantidade($f,$on,qnt);// Recebendo a quantidade dos armamentos $fator(array)		
			@$unidade=quantidade($f,$on,unid);// Unidades dos valores
				
//======= Criando as variáveis (arrays) das Armas Selecionadas =======							
			function seletOn(){
				for($x=1;$x < 63;$x++) {
						if (@$_POST[$x] == 'on'){
							$on[] = $x;
							}
					}
					return @$on;
				}
			function quantidade($f,$on,$qnt){
					for($x=0;$x < $f;$x++){
							$y=$on[$x];
							$z=$qnt.$y;
							$quantidade[] = $_POST[$z];
						}
					return @$quantidade;
				}													

//==== Consultando no banco de dados "desert-operation" na tebela($tabela) a linha($id) com a coluna($col) ====	
			function armasValores($col,$tabela,$id) {
					$sql = "SELECT $col FROM $tabela where id=$id";
					$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
					$linha=mysql_fetch_array($resultado);
					return $linha;	
				}				
//====== Consultar arma no banco por id ============== 
			function listaArma($id){
					$arma=@armasValores('armamento','tb_valores',$id);
						return $arma[0];									
				}			
// ===== Formatando os números ============
			function formatar($num){
					$formatado=number_format($num,0,',','.');
					return $formatado;
				} 
				
// ======= Simular combate =========					
			function pesquisaArmas($comb,$combKey,$armamentoInimigo,$fator,$w,$on,$tipoCombate) {
					@$ataque=$armamentoInimigo[2];
					@$defesa=$armamentoInimigo[3];
					@$valor=$armamentoInimigo[4];
					@$querosene=$armamentoInimigo[6];
					@$diesel=$armamentoInimigo[7];
					
					@$inimigoAtaque=($ataque*$fator[$w]);
					@$inimigoDefesa=($defesa*$fator[$w]);
					@$inimigoValor=($valor*$fator[$w]);
					@$inimigoquerosene=($querosene*$fator[$w]);
					@$inimigodiesel=($diesel*$fator[$w]);
					
					unset($x);
					$y=0;
					if($comb != null) {
								foreach($comb as $x){
									for($x=0;$x<count($combKey);$x++) {
											$power=pesquisaArmasValores($combKey[$x]);}
										$power=pesquisaArmasValores($combKey[$y]);
										$meuAtaque=$power[2];
										$meuDefesa=$power[3];
										$meuValor=$power[4];
										$meuQuerosene=$power[5];
										$meuDiesel=$power[6];							
										
										if(@$tipoCombate=="Defendendo") {
												@$confronto=formatar($inimigoAtaque/$meuDefesa);
											}else{
												@$confronto=formatar($inimigoDefesa/$meuAtaque);											
											}											
										
										echo "<span class='armamento'>$power[1]</span><span class='qntArmamentos'>&nbsp&nbsp $confronto </span><span class='seta'>< = ></span><br>";
										$y++;										
									}
						}	
						unset($comb,$combKey);			
				}			
			
			function pesquisaArmasValores($i){
					$minhasArmas=armasValores('*','tb_valores',$i);
					return $minhasArmas;
				}

// ======== Consulta no banco de dados "desert-operation" na tabela "tb_combates" na linha($on[]/id) o confronto entre as armas($armamentos[]) =======
			function combateForcasarmadas($tipoCombate,$on,$f,$fator,$idInicial,$idFinal,$unidade){
						$contador=0;
						for ($w=0;$w < $f;$w++){
								@$resultCombates=armasValores('*','tb_combates',$on[$w]);// Array do resultado dos combates das armas selecionadas
								@$armamentoInimigo=armasValores('*','tb_valores',$on[$w]);
								@$b=$on["$w"]-1;
								if( $b > 53 and $tipoCombate == "Defendendo" ) {
										//echo $listaArma[$b]." É um armamento utilizado para defesa<br>";
									} else {
									echo "<h4><span class='tituloArma'>".listaArma($on[$w])."</span><br><span class='unidade'>(".$unidade[$contador].")</span></h4><br>";											
											$contador++;
											unset($perde,$perdeKey,$empata,$empataKey,$neutro,$neutroKey,$vence,$venceKey);
									for ($i=$idInicial;$i<$idFinal+1;$i++){	
										switch( $resultCombates[$i+1] ){
													case "PERDE":
														$iniArma=listaArma($on[$w])."_perde";
														@$perde[]=listaArma($i);
														@$perdeKey[]=$i;
														break;
													case "EMPATA":
														$iniArma=listaArma($on[$w])."_empata";
														@$empata[]=listaArma($i);
														@$empataKey[]=$i;
														break;
													case "NEUTRO":
														$iniArma=listaArma($on[$w])."_neutro";
														@$neutro[]=listaArma($i);
														@$neutroKey[]=$i;
														break;							
													case "VENCE":
														$iniArma=listaArma($on[$w])."_vence";
														@$vence[]=listaArma($i);
														@$venceKey[]=$i;
														break;
												}												
										}									
									}
								if(@$perde != null) {				
										echo "<fieldset class='fieldset2'><legend><h4>Aqui eu venço</h4></legend>";
											pesquisaArmas($perde,$perdeKey,$armamentoInimigo,$fator,$w,$on,$tipoCombate);
												echo "</fieldset><br>";									
									}	
								if(@$empata != null) {		
										echo "<fieldset class='fieldset2'><legend><h4>Aqui eu empato</h4></legend>";
											pesquisaArmas($empata,$empataKey,$armamentoInimigo,$fator,$w,$on,$tipoCombate);					
										echo "</fieldset><br>";
									}
								if(@$neutro != null) {						
										echo "<fieldset class='fieldset2'><legend><h4>Aqui não haverá confronto</h4></legend>";
											pesquisaArmas($neutro,$neutroKey,$armamentoInimigo,$fator,$w,$on,$tipoCombate);										
										echo "</fieldset><br>";	
									}	
								if(@$vence != null) {																							
										echo "<fieldset class='fieldset2'><legend><h4>Aqui eu perco</h4></legend>";
											pesquisaArmas($vence,$venceKey,$armamentoInimigo,$fator,$w,$on,$tipoCombate);
										echo "</fieldset><br>";
									}
									unset($perde,$empata,$neutro,$vence);
								}
						}
//========== Fim Funções ==============
		?>		
	</head>
	<body>
		<div id="site">
			<div id="cabecalho"><h1 class="titulo">ARMAMENTOS SELECIONADOS</h1></div>
			<div id="menu">
				<div class="nav01"><img src="http://www.militarypower.com.br/Gripen%20FAB.GIF" alt="" height="90px"></div>
							<?php echo "<h2>Você está $tipoCombate</h2>";?>
				<div class="nav02"><img height="80px" src="http://www.gifsdahora.com.br/gifs_animados/gifs/12Transportes//aviao_soltando_missel.gif" alt=""></div>
			</div>
			<div id="meio" align='center'>
				<br><br>
				<table class="tabelaResumo" width=98% border=1 cellpadding=1 cellspacing=1 >
					<caption><h4>Armas utilizadas pelo seu adversário</h4></caption>
					<tr>
						<th><h2>Id</h2></th>
						<th><h2>Armamento</h2></th>
						<th><h2>Ataque</h2></th>
						<th><h2>Defesa</h2></th>
						<th><h2>Valor</h2></th>
						<th><h2>Querosene</h2></th>
						<th><h2>Diesel</h2></th>
						<th><h2>Munição</h2></th>
						<th><h2>Custo</h2></th>
						<th><h2>Velocidade</h2></th>
						<th><h2>Unidade</h2></th>
					</tr>	
					<?php
//========== Conteúdo da Tabela ========
							for($x=0;$x < $f;$x++) {
								$id=$on[$x];
								$d=$id-1;
// $valores = Valores dos armamentos(ataque, defesa, valor, querosene, diesel, munição, custo, velocidade)
								$valores=armasValores('*','tb_valores',$id);
									if($tipoCombate == "Atacando" || $tipoCombate == "Defendendo" && $d < 54){
											echo "<tr>";
											echo "<th><h2>",$id,"</h2></th>";
											echo "<td><h2>".listaArma($on[$x])."</h2></td>";
										
												for($y=2;$y < 5;$y++) {				
// $y = Valores dos armamentos(ataque,defesa,valor)
// $numero = Valores dos armamentos
// $formatado = Número formatado	
														$numero=$valores[$y]*$fator[$x];
														$formatado=formatar($numero);
														echo "<td class='numeros' ><h2>".$formatado."</h2></td>";
													}
											for($y=6;$y < 10;$y++) {
// $y = Valores dos armamentos(querosene,diesel,munição,custo,velocidade)					
													$numero=$valores[$y]*$fator[$x];
													$formatado=formatar($numero);
													echo "<td class='numeros'><h2>".$formatado."</h2></td>";
												}
											echo "<td align=center ><h2>".$valores[10]."</h2></td>";
											echo '<td align=center><h2>'.$unidade[$x].'</h2></td></tr>';
										}
								}
							echo "</tr><br>";
				echo "</table>";
				echo "<table>";
							echo "<div class='quadroCombate'><br>";
									echo "<fieldset id='exe' class='exercito'><legend><span ><h2 >EXÉRCITO</h2></span></legend>";
										combateForcasarmadas($tipoCombate,$on,$f,$fator,1,19,$unidade);
									echo "</fieldset>";
									echo "<fieldset id='aer' class='aeronautica'><legend><h2>AERONÁUTICA</h2></legend>";
										combateForcasarmadas($tipoCombate,$on,$f,$fator,20,39,$unidade);					
									echo "</fieldset>";	
									echo "<fieldset id='mar' class='marinha'><legend><h2>MARINHA</h2></legend>";
											combateForcasarmadas($tipoCombate,$on,$f,$fator,40,54,$unidade);					
									echo "</fieldset>";
									if($tipoCombate == "Defendendo" ){
											echo "<fieldset id='def' class='defesa'><legend><h2>DEFESA</h2></legend>";
													combateForcasarmadas($tipoCombate,$on,$f,$fator,55,62,$unidade,$unidade);					
											echo "</fieldset>";
										}
							echo "</div>";	
				?>
				</table>
			</div>			
			<div id="btnSimular"><?php include 'php/bntSimular.php'?></div>
			<div id="rodape"><?php include 'php/rodape.php'?></div>
		</div>
	</body>
</html>