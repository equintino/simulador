<html>
	<head>
		<?php include_once 'php/head.php'; ?>
		<script type="text/javascript">
				function msg(){
					alert('Simulação em construção');
					}	
		</script>
	</head>
	<body >
		<div id="site">
			<div id="cabecalho"><h1 class="titulo">DESERT OPERATIONS</h1><h1 class="subtitulo">simulador de combate</h1>
			
			</div>
			<div id="menu"></div>
			<div class="nav01"><img src="http://www.militarypower.com.br/Gripen%20FAB.GIF" alt="" height="90px"></div>
			<div class="nav02"><img height="80px" src="http://www.gifsdahora.com.br/gifs_animados/gifs/12Transportes//aviao_soltando_missel.gif" alt=""></div>
			<div id="conteudo" >
				<h2 class="tituloConteudo">O QUE VOCÊ DESEJA FAZER?</h2><br><br><br><br><br>
					<div class="botaoPrincipal"><br><br><br>
						<a href='selecArm.php' class='btn' id='btn'>Simular Combates</a><br><br><br><br>
						<a href="#" class='btn' id='btn2' onclick=msg(this)>Simular Espionagem</a><br><br><br><br>
						<a href="#" class='btn' id='btn3' onclick=msg(this)>Limite Máximo de Armamento por QG</a><br><br><br>
					</div>
			</div>
			<div id="sidebar"><h3 class="login">Login</h3></div>
			<div id="rodape"><?php include 'php/rodape.php'; ?></div>
		</div>
	</body>
</html>
	