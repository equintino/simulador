<meta charset='utf-8'>
<?php
    // sessions.php

    session_start();

    if (isset($_SESSION['usuario'])) {
        echo "Bem vindo {$_SESSION['usuario']}!<br>";
    } else {
        echo 'Você NUNCA passou por aqui.'."<br>";
        $_SESSION['usuario'] = 'João';
    }
    date_default_timezone_set("Brazil/East");
    echo date("d/m/Y à\s H:i:s");

?>