<?php

//validador criado apenas para conseguir acessar as paginas protegidas

  session_start();

  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') { //verificando se a session foi autenticada
  header('Location: index.php?login=erro2'); //caso a session não esteja autenticada aparecera esse erro
  }
 
?>

