<?php

    session_start();

    //estamos trabalhadno na ontagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']); //subtituindo o # pelo -
    $categoria = str_replace('#', '-', $_POST['categoria']); //subtituindo o # pelo -
    $descricao =  str_replace('#', '-', $_POST['descricao']); //subtituindo o # pelo -

    //implode('#', $_POST); //transorma um array em uma string
    
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; //formatando o array e colocando dentro de uma variavel os '#' para dar espaço, PHP_EOL para o novo chamado ir para a proxima linha

    //abrindo o arquivo
    $arquivo = fopen('../app_help_desk_arquivo_protegido/arquivo.hd','a'); //'arquivo.hd' primeiro parametro é o nome do arquivo e o segundo 'a' é o que deseja fazer o o arquivo, qualquer duvida consulta a documentação PHP e pesquisar por fopen - fopen abre o arquivo


    //escrevendo o texto
    fwrite($arquivo, $texto); //dois parametro, o arquivo e o segundo o que quero escrever dentro do arquivo

    //fechando o arquivo
    fclose($arquivo); //fechando arquivo

    //echo $texto;
    header('Location: abrir_chamado.php'); //indo para outra localização depois de abrir o chamado
    
?>