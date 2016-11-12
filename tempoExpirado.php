<?php
define('TEMPOEX', 5*60); /*tempo de expiração da sessão em minutos*/

//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_probability', 100);
ini_set('session.gc_maxlifetime', TEMPOEX);
ini_set('session.cookie_lifetime', TEMPOEX);
ini_set('session.cache_expire', TEMPOEX);

session_start();

if(isset($_SESSION['algumaChave'])){
	session_regenerate_id();
}
?>

<?php
// segundo exemplo
// Inicia uma sessão.
session_start();

// Verifica se $_SESSION['ultimoClick'] esta setada e não esta vazia.
// Caso esteja, ele verifica o tempo que o usuario levou entre um clique e outro.
// Caso não, ele seta a sessão e dá o valor do tempo time() atual.
if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) {

$tempoAtual = time();

// Faz uma condição entre o tempo do ultimo click e o tempo atual.
// Caso dê maior que 60 segundos, redireciona para a pagina desejada.
// Caso não de maior, apenas atualiza o valor do ultimo clique para o valor atual.
if ( ($tempoAtual - $_SESSION['ultimoClick']) > '60' ) {

header("Location:sair.php?motivo=inatividade");
exit();

}else{

$_SESSION['ultimoClick'] = time();

}

}else{

$_SESSION['ultimoClick'] = time();

}

?>

<?php
// revisao
//Inicia a sessão
session_start();
//Verifica se há dados ativos na sessão
if(empty($_SESSION["id"]) || empty($_SESSION["nome"]) || empty($_SESSION["login"]))
{
//Caso não exista dados registrados, exige login
header("Location:./login.php");
}
// Verifica se $_SESSION['ultimoClick'] esta setada e não esta vazia.
// Caso esteja, ele verifica o tempo que o usuario levou entre um clique e outro.
// Caso não, ele seta a sessão e dá o valor do tempo time() atual.
if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) {

$tempoAtual = time();

// Faz uma condição entre o tempo do ultimo click e o tempo atual.
// Caso dê maior que 60 segundos, redireciona para a pagina desejada.
// Caso não de maior, apenas atualiza o valor do ultimo clique para o valor atual.
if ( ($tempoAtual - $_SESSION['ultimoClick']) > '60' ) {

session_unregister($_SESSION['ultimoClick']);
$_SESSION = array();
session_destroy();
header("Location:sair.php?motivo=inatividade");
exit();

}else{

$_SESSION['ultimoClick'] = time();

}

}else{

$_SESSION['ultimoClick'] = time();

}

?>