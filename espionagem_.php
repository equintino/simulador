<html>
	<head>
		<?php include_once 'php/head_.php';
			  include 'php/conexao_db.php'; 
		?>
		<title>SIMULAÇÃO DE ESPIONAGEM</title>
	</head>
	<body >
		<div id="site">
			<div id="cabecalho"><h1 class="titulo">DESERT OPERATIONS</h1>
			</div>
			<div id="menu"><h1 class="subtitulo">simulador de espionagem</h1>
			</div>
			<div class="nav01"><img src="http://www.militarypower.com.br/Gripen%20FAB.GIF" alt="" height="60px"></div>
			<div class="nav02"><img height="80px" src="http://www.gifsdahora.com.br/gifs_animados/gifs/12Transportes//aviao_soltando_missel.gif" alt=""></div>
			<div id="conteudoEspionagem" >
			<?php 
				//===========
function maiusculo($string){
	$string=strtoupper($string);
	$string=str_replace("á", "Á", $string);
	$string=str_replace("é", "É", $string);
	$string=str_replace("í", "Í", $string);
	$string=str_replace("ó", "Ó", $string);
	$string=str_replace("ú", "Ú", $string);
	$string=str_replace("â", "Â", $string);
	$string=str_replace("ê", "Ê", $string);
	$string=str_replace("ô", "Ô", $string);
	$string=str_replace("Î", "I", $string);
	$string=str_replace("Û", "U", $string);
	$string=str_replace("ã", "Ã", $string);
	$string=str_replace("õ", "Õ", $string);
	$string=str_replace("ç", "Ç", $string);
	$string=str_replace("à", "A", $string);
	return $string;
}
function unidades(){
	echo "<option value=''></option>
		 <option value='1000000'>Milhões</option>
		 <option value='1000000000'>Bilhões</option>
		 <option value='1000000000000'>Trilhões</option>
		 <option value='1000000000000000'>Quadrilhões</option>
		 <option value='1000000000000000000'>Quintilhões</option>
		 <option value='1000000000000000000000'>Sextilhões</option>
		 <option value='1000000000000000000000000'>Septilhões</option>
		 <option value='1000000000000000000000000000'>Octilhões</option>
		 <option value='1000000000000000000000000000000'>Nonilhões</option>
		 <option value='1000000000000000000000000000000000'>Decilhões</option>";
}
function unidadesValor($n){
	$nUnid=strlen($n);
	switch (true){
		case ($nUnid > 9 && $nUnid < 13):
			switch($nUnid){
				case 10: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 11: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 12: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Mil";
			break;
		case ($nUnid > 12 && $nUnid < 16):
			switch($nUnid){
				case 13: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 14: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 15: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Bil";
			break;
		case ($nUnid > 15 && $nUnid < 19):
			switch($nUnid){
				case 16: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 17: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 18: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Tri";
			break;
		case ($nUnid > 18 && $nUnid < 22):
			switch($nUnid){
				case 19: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 20: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 21: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Quad";
			break;
		case ($nUnid > 21 && $nUnid < 25):
			switch($nUnid){
				case 22: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 23: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 24: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Quint";
			break;
		case ($nUnid > 24 && $nUnid < 28):
			switch($nUnid){
				case 25: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 26: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 27: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Sext";
			break;
		case ($nUnid > 27 && $nUnid < 31):
			switch($nUnid){
				case 28: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 29: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 30: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Sept";
			break;
		case ($nUnid > 30 && $nUnid < 34):
			switch($nUnid){
				case 31: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 32: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 33: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Octo";
			break;
		case ($nUnid > 33 && $nUnid < 37):
			switch($nUnid){
				case 34: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 35: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 36: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Non";
			break;
		case ($nUnid > 36 && $nUnid < 40):
			switch($nUnid){
				case 37: 
					$n=number_format(substr($n,0,4),0,'','.');
					break;
				case 38: 
					$n=number_format(substr($n,0,5),0,'','.');
					break;
				case 39: 
					$n=number_format(substr($n,0,6),0,'','.');
					break;
			}
			return "$n Dec";
			break;
		default:
			$n=number_format($n,0,'','.');
			return "$n";
			break;
	}
}
function consultaDb($id){
	$resultado=mysql_query("select * from tb_espionagem where id=$id");
	$arma=maiusculo(mysql_result($resultado,0,"arma"));
	$ataque=mysql_result($resultado,0,"ataque");
	$defesa=mysql_result($resultado,0,"defesa");
	$valor=mysql_result($resultado,0,"valor");
	$ouro=mysql_result($resultado,0,"ouro");
				
	$valorArma = array("arma" => $arma, "ataque" => $ataque, "defesa" => $defesa, "valor" => $valor, "ouro" => $ouro);
	return $valorArma;
}
function respNao(){
	echo "<form action='espionagem_.php?resp=naoCalc' method='POST'>";
	echo "<h2 align='center' >O que você vai utilizar e quanto?</h2>";
	echo "<fieldset class='tabEspionagem'>";
	echo "<table class='tabEspionagem'><tr><caption class='captionEspionagem'>";
	echo "</caption></tr>
		  <tr><th>ARMA</th><th>QUANT.</th><th>UNIDADE</th></tr>
		  <tr><td><input type='radio' name='arma' value='1' required> Satélite Espião</td>
		  <td><input type='number' name='qnt'></td><td><select name='unid'>",unidades(),"</select><td></tr>
		  <tr><td><input type='radio' name='arma' value='2'> Avião de Espionagem</td></tr>
		  <tr><td><input type='radio' name='arma' value='3'> Patrulha Aérea</td></tr>
		  <tr><td><input type='radio' name='arma' value='4'> Agente</td></tr>
		  <tr><td></td><td></td><td class='bntEspionagem'><input type=\"button\" value=\"Voltar\" onclick=history.back()> &nbsp <input type='submit' value='Avançar'></td></tr>";
	echo "</fielset></table></form>";
}
function respSim(){
	echo "<form action='espionagem_.php?resp=simCalc' method='POST'>";
	echo "<h2 align='center' >Selecione as armas de espionagem do seu adversário e sua quantidade.</h2>";
	echo "<div class='tabEspionagem2'>";
	echo "<table>
		  <tr><th>ARMA</th><th>QUANT.</th><th>UNIDADE</th></tr>
		  <tr><td><input type='checkbox' name='arma1' value='1' > Satélite Espião</td>
		  <td><input type='number' name='qntSat'></td><td>","<select name='unid1'>",unidades(),"</select><td></tr>
		  <tr><td><input type='checkbox' name='arma2' value='2'> Avião de Espionagem</td>
		  <td><input type='number' name='qntAvi'></td><td>","<select name='unid2'>",unidades(),"</select><td></tr>
		  <tr><td><input type='checkbox' name='arma3' value='3'> Patrulha Aérea</td>
		  <td><input type='number' name='qntPat'></td><td>","<select name='unid3'>",unidades(),"</select><td></tr>
		  <tr><td><input type='checkbox' name='arma4' value='4'> Agente</td>
		  <td><input type='number' name='qntAge'></td><td>","<select name='unid4'>",unidades(),"</select><td></tr>
		  <tr><td></td>
		</table>";
	echo "<div class='bntEspionagem'><input type=\"button\" value=\"Voltar\" onclick=history.back()> &nbsp <input type='submit' value='Avançar'></div></form></div>";	
}
function naoCalc($id,$qnt){
	$resultado=mysql_query("select * from tb_espionagem where id=$id");
	$arma=mysql_result($resultado,0,"arma");
	$ataque=mysql_result($resultado,0,"ataque")*$qnt;
	$valor=mysql_result($resultado,0,"valor");
	$ouro=mysql_result($resultado,0,"ouro");
		if($_POST['unid']<>''){
			$unid=$_POST['unid'];
		}else{
			$unid=1;
		}
				
	$patVencidas=($ataque/8000)/3;
	$satVencidos=($ataque/15000)/3;
	$n=number_format($qnt*$unid,0,'','');
	$nUnidade=unidadesValor($n);
	$n2=number_format($patVencidas*$unid,0,'','');
	$nUnidade2=unidadesValor($n2);
	$n3=number_format($satVencidos*$unid,0,'','');
	$nUnidade3=unidadesValor($n3);
	$n4=number_format(3250*$qnt*$unid,0,'','');
	$nUnidade4=unidadesValor($n4);
	$n5=number_format(($unid*$qnt*5000000)+(950*3250),0,'','');
	$nUnidade5=unidadesValor($n5);
	$n6=number_format(6500*$qnt*$unid,0,'','');
	$nUnidade6=unidadesValor($n6);
	$n7=number_format(($qnt*1400000*$unid)+(950*6500),0,'','');
	$nUnidade7=unidadesValor($n7);
	
	echo "<h2 align='center'>";
	echo "Você com esta quantidade de: <span class='destaque'>\"<span class='destaque2'>",$nUnidade,'</span> ',$arma,"\"</span><br>Poderá vencer: <span class='destaque2'>",$nUnidade2,"</span> Patrulhas Aéreas<br>ou<br><span class='destaque2'>",$nUnidade3,"</span> Satélites Espiões</h2><br>";
	echo "<div class='tabEspionagem3'>";
	echo "<table>";
	echo "<tr><th>ARMA</th><th>OURO GASTO</th><th>TOTAL GASTO EM COMBATE</th></tr>";
	echo "<tr><td>Satélite Espião</td><td align='right'>". $nUnidade4,"</td><td align='right'>$ " , $nUnidade5 ,"</td></tr>";
	echo "<tr><td>Patrulha Aérea</td><td align='right'>",$nUnidade6,"</td><td align='right'>$ ", $nUnidade7 ,"</td></tr>";
	echo "</table></div>";
	echo "<div class='voltarEsp1'><input type=\"button\" value=\"Voltar\" onclick=history.back()>&nbsp";
		echo "<span class='botao'><input type=\"button\" value=\"Home\" onclick=document.location.href='index_.php'></span></div>";
	echo "<div class='percente'><table>";
	echo "<form action='espionagem_.php?resp=percentual&qntArma=$n&arma=$arma' method='post'>";
		echo "<tr><td>Se você espionou e o resultado não foi 100%,</td></tr>
		  <tr><td>então insira aqui o percentual <input type='text' name='percente' size='2' maxlength='3'>
		  <td align='right'><input type='submit' value='Avançar'></td></tr>";
	echo "</form>";
	echo "</table></div>";
}
function simCalc(){
	if(isset($_POST['arma1'])){
		if($_POST['unid1']<>''){
			$unid1=$_POST['unid1'];
		}else{
			$unid1=1;
		}
		$arma1=$_POST['arma1'];
		$qntSat=$_POST['qntSat'];
		$valorArma=consultaDb($arma1);
		$totalDefesa[]=$valorArma['defesa']*$qntSat*$unid1;
	}else{
		$arma1='';
		$qntSat='';
	}
	if(isset($_POST['arma2'])){
		if($_POST['unid2']<>''){
			$unid2=$_POST['unid2'];
		}else{
			$unid2=1;
		}
		$arma2=$_POST['arma2'];
		$qntAvi=$_POST['qntAvi'];
		$valorArma=consultaDb($arma2);
		$totalDefesa[]=$valorArma['defesa']*$qntAvi*$unid2;
	}else{
		$arma2='';
		$qntAvi='';
	}
	if(isset($_POST['arma3'])){
		if($_POST['unid3']<>''){
			$unid3=$_POST['unid3'];
		}else{
			$unid3=1;
		}
		$arma3=$_POST['arma3'];
		$qntPat=$_POST['qntPat'];
		$valorArma=consultaDb($arma3);
		$totalDefesa[]=$valorArma['defesa']*$qntPat*$unid3;
	}else{
		$arma3='';
		$qntPat='';
	}
	if(isset($_POST['arma4'])){
		if($_POST['unid4']<>''){
			$unid4=$_POST['unid4'];
		}else{
			$unid4=1;
		}
		$arma4=$_POST['arma4'];
		$qntAge=$_POST['qntAge'];
		$valorArma=consultaDb($arma4);
		$totalDefesa[]=$valorArma['defesa']*$qntAge*$unid4;
	}else{
		$arma4='';
		$qntAge='';
	}
	if($arma1+$arma2+$arma3+$arma4==''){
		echo "<div class='msg'>Você não selecionou nenhuma opção!<br>";
		echo "<span class='botao'><input type=\"button\" value=\"Voltar\" onclick=history.back()></span></div>";
	}
	
	@$somaDefesa=array_sum($totalDefesa);
	if(isset($somaDefesa)){
		$satelite=number_format(($somaDefesa/90000)*3,0,'','.');
		$patrulha=number_format(($somaDefesa/48000)*3,0,'','.');
		
		$n=number_format($somaDefesa/90000*3,0,'','');
		$nUnidade=unidadesValor($n);
		$n2=number_format(($somaDefesa/48000)*3,0,'','');
		$nUnidade2=unidadesValor($n2);
		$n3=number_format(($somaDefesa/90000)*3250,0,'','');
		$nUnidade3=unidadesValor($n3);
		$n4=number_format((($somaDefesa/90000)*5000000)+(950*($somaDefesa/90000)*3250),0,'','');
		$nUnidade4=unidadesValor($n4);
		$n5=number_format(($somaDefesa/48000)*6500,0,'','');
		$nUnidade5=unidadesValor($n5);
		$n6=number_format((($somaDefesa/48000)*1400000)+(950*($somaDefesa/48000)*6500),0,'','');
		$nUnidade6=unidadesValor($n6);

		echo "<h2 align='center'>";
		echo "Você vai precisar de <span class='destaque'>$nUnidade </span>Satélites ou ";
		echo "de <span class='destaque'>$nUnidade2</span> Patrulhas<br>";
		echo "</h2><br>";
		echo "<div class='tabEspionagem3'>";
		echo "<table>";
		echo "<tr><th>ARMA</th><th>OURO GASTO</th><th>TOTAL GASTO EM COMBATE</th></tr>";
		echo "<tr><td>Satélite Espião</td><td align='right'>", $nUnidade3,"</td><td align='right'>$ ",$nUnidade4,"</td></tr>";
		echo "<tr><td>Patrulha Aérea</td><td align='right'>",$nUnidade5,"</td><td align='right'>$ ",$nUnidade6,"</td></tr>";
		echo "</table></div>";
		echo "<div class='voltarEsp1'><input type=\"button\" value=\"Voltar\" onclick=history.back()>&nbsp";
		echo "<span class='botao'><input type=\"button\" value=\"Home\" onclick=document.location.href='index_.php'></span></div>";
	}
}
	//===========
if(isset($_POST['percente'])){
	if($_POST['percente'] < 1 || $_POST['percente'] > 99 ){
		echo "<div class='msg'>O percentual precisa estar entre 1 a 99<br>";
		echo "<span class='botao'><input type='button' value='Voltar' onclick='history.back()'></span></div>";
		exit;
	}elseif(preg_match("/[a-z,A-Z]/",$_POST['percente'])){
		echo "<div class='msg'>Você deve inserir somente números<br>";
		echo "<span class='botao'><input type='button' value='Voltar' onclick='history.back()'></span></div>";
		exit;
	}
	$y=number_format($_GET['qntArma']*100/$_POST['percente'],0,'','');
	echo "<div class='msg'>Você vai precisar de<br>",unidadesValor($y)," de ",$_GET['arma'],"<br>";
		echo "<span class='botao'><input type=\"button\" value=\"HOME\" onclick=document.location.href='index_.php'></span></div>";
}
if(!isset($_GET['resp'])){
	$resposta='';
}else{
	$resposta=$_GET['resp'];
}
if($resposta==''){ 
	echo "<br><br>
	<div class='tituloEspionagem'>Você sabe o que teu adversário tem de unidades espiã?</div>
	<div class='resp'>
	<form id='esp' action='espionagem_.php' method='get'>
	<input type='radio' name='resp' value='nao' required>Não&nbsp
	<input type='radio' name='resp' value='sim'>Sim
	&nbsp&nbsp&nbsp
	<input type='submit' value='Avançar'>
	</form>
	</div>";
}
	echo "<br>";
	if($resposta=='nao'){
		respNao();
	}elseif($resposta=='naoCalc'){
		$id=$_POST['arma'];
		$qnt=$_POST['qnt'];
		naoCalc($id,$qnt);
	}elseif($resposta=='sim'){
		respSim();
	}elseif($resposta=='simCalc'){
		simCalc();					
	}
?>
	</div>
	<div id="rodape"><?php include 'php/rodape_.php'; ?></div>
	</div>
	</body>
</html>