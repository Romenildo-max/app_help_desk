<? require_once "validador_acesso.php" ?> <!-- incluido o arquivo validador_acesso.php ao arquivo -->

<?php

  //chamados
  $chamados = [];

  //abrir o arquivo.hd
  $arquivo = fopen('../app_help_desk_arquivo_protegido/arquivo.hd','r'); //'arquivo.hd' primeiro parametro é o nome do arquivo e o segundo 'r' é o que deseja fazer o o arquivo, qualquer duvida consulta a documentação PHP e pesquisar por fopen - fopen abre o arquivo

  //percorre o array enquanto houver registro (linhas) a serem recuperados
  while(!feof($arquivo)) { //testa pelo fim de um arquivo
    //linhas
    $registro = fgets($arquivo); //função para recuperar os registro contido dentro do arquivo até a ultima linha
    $chamados[] = $registro; //inserindo os registro do arquivo.hd no array chamados
  }

  //fechar o arquivo aberto
  fclose($arquivo);
  //...

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <? foreach($chamados as $chamado) { ?> <!--para percorrer o array -->

                <?php

                  $chamado_dados = explode('#', $chamado); //retornado um array

                  //
                  if($_SESSION['perfil_id'] == 2) { //verificando se a session perfil_id é igual á 2
                    
                    //só vamos exibir o chamado que ele criou
                    if($_SESSION['id'] != $chamado_dados[0]) { //verificando se a session id foi o mesmo usuario que fez o chamado
                      continue; //para ignorar e ir para o proximo codigo
                    } 
                  }

                  if(count($chamado_dados) < 3) { //caso o array chamado_dados tenha menos de 3 elementos iremos pular para o proximo
                    continue;
                  }

                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$chamado_dados[1]?></h5> <!-- imprimindo PHP no html, o array chamado_dados e recuperando o elemento do indice 1-->
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6> <!-- imprimindo PHP no html, o array chamado_dados e recuperando o elemento do indice 2-->
                    <p class="card-text"><?=$chamado_dados[3]?></p> <!-- imprimindo PHP no html, o array chamado_dados e recuperando o elemento do indice 3-->

                  </div>
                </div>
              <? } ?> <!--fechando o bloco de codigo do foreach-->

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a> <!--criando link para voltar para home-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>