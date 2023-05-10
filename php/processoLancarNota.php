<?php

  session_start();
  include_once("conexao.php");
  include_once("../dao/NotaFiscalDAO.php");
  include_once("../dao/UserDAO.php");



  $notaFiscalDAO = new NotaFiscalDAO($conexao);

  if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userDAO = new UserDAO($conexao);
    $user = $userDAO->findUserLogin($id, $username);

  } else {
    header("Location: ../index.php");
  }
  

  $numeroNota = filter_input(INPUT_POST, "numero-nota");

  echo $numeroNota;
  // pega a nota recebida


  // find nota by numero
  echo "<br>";
  print_r($user); echo "<br><br>";
  echo $user->id . "<br><br>";
  $findNota = $notaFiscalDAO->findNotaByNumero($numeroNota, true);


  // builda nota
  echo $findNota['id_usuario'] . "<br><br>";
  if($findNota && $findNota['id_usuario'] === $user->id) {
    $nota = $notaFiscalDAO->buildNota($findNota);
    echo "id do usuario da nota bate com o usuario da sessao hihi :3 xd <br><br>";

    $nota = $notaFiscalDAO->buildNota($findNota);
    print_r($nota); echo "<br><br>";

    // pra cada item, insert na tabela movimentacao com id da nota no objeto
    print_r($nota->produtos); echo "<br><br>";

    foreach($nota->produtos as $produto) {
      
    }



  } else {
    echo "NAO!!!! >:(";
  }
  




  

  


  
  // update lancada na tabela de notas
  // atualizar itens ou inserir no estoque geral
