<html>
	<head>
		<?php include_once 'php/head_.php'; ?>
		<script type="text/javascript">
				function msg(){
					alert('Simulação em construção');
					}
				function msgLogin(){
					alert('Você não fez o login!');
					document.getElementById('entra').focus();
				}
				var x=$_GET['kk'];
				window.alert(x);
		</script>
	</head>
	<body >
		<div id="site">
			<div id="cabecalho"><h1 class="titulo">DESERT OPERATIONS</h1><h1 class="subtitulo">simulador de combate</h1>
			</div>
			<div id="menu"><h4>O que você deseja fazer?</h4></div>
			<div class="nav01"><img src="imagens/Gripen%20FAB.GIF" alt="" height="50px"></div>
			<div class="nav02"><img height="75px" src="imagens/aviao_soltando_missel.gif" alt=""></div>
			<div id="conteudo" >
				<br><br><br><br><br>
					<div class="botaoPrincipal"><br><br><br>
						<a href='#' onclick='msgLogin()' class='btn' id='btn'>Simular Combates</a><br><br><br><br>
						<a href="espionagem_.php" class='btn' id='btn2' title="Simulador de Espionagem" >Simular Espionagem</a><br><br><br><br>
						<a href="#" class='btn' id='btn3' title="Botão desabilitado" onclick=msg(this)>Limite Máximo de Armamento por QG</a><br><br><br>
					</div>
			</div>
			<div id="sidebar"><h3 class="login"> <?php require 'php/login.php' ?></h3></div>
			<div id="rodape"><?php include 'php/rodape_.php'; ?></div>
		</div>
	</body>
</html>
	