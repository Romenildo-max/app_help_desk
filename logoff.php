<?php

    session_start(); //sempre executar está function

    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //remover indices do array de sessão
    //unset()

    unset($_SESSION['x']); //removendo apenas o indice do array com a variavel 'x', remover o indice apenas se existir

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    //destruir a variavel de sessão
    //session_destroy()

    session_destroy(); //será destruida
    //forçar um redirecionamento

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    */

    session_destroy(); //destruindo toda a sessão(arrays)
    header('Location: index.php'); //forçando um novo redirecionamento para index.php
?>