<?php
ini_set('session.use_cookies', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.use_trans_sid', '0');
    // cookies.php

    if (isset($_COOKIE['cookie_teste'])) {
        echo 'Você JÁ passou por aqui!';
    } else {
        echo 'Você NUNCA passou por aqui.';
        setcookie('cookie_teste', 'Algum valor...', time() + 3600);
    }
    // Agora verifica a senha

//if(!strcmp($senha, $dados["senha"]))
?>

<?php

// Inicia sessões, para assim poder destruí-las

session_start();

session_destroy();



header("Location: login.html");

?>

