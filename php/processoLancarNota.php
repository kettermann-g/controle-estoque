<?php

  session_start();
  include_once("conexao.php");
  include_once("../dao/NotaFiscalDAO.php");
  include_once("../dao/UserDAO.php");


  //instanciando objeto DAO da nota para conversar com o banco de dados
  $notaFiscalDAO = new NotaFiscalDAO($conexao);

  //veriifcando se existe usuario na sessao, se nao, redireciona pro index
  if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userDAO = new UserDAO($conexao);
    $user = $userDAO->findUserLogin($id, $username);

  } else {
    header("Location: ../index.php");
  }
  
  // pegando a nota recebida e o tipo de movimento
  $numeroNota = filter_input(INPUT_POST, "numero-nota");

  echo " $numeroNota <br>";
  
  $tipoMOV = filter_input(INPUT_POST, "movi");

  echo " $tipoMOV <br>";

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

    echo "<br><strong>ENTRANDO NO LOOP FOR EACH PRODUTO DO OBJETO NOTA</strong> <br><br>";

    foreach($nota->produtos as $produto) {
      $produtoExiste = $notaFiscalDAO->checarEstoque($produto['marca_item'], $produto['descricao_item']);
      
      $notaFiscalDAO->movimentarProduto($tipoMOV, $produto, $produtoExiste);
    }



  } else {
    echo "NAO!!!! >:(";
  }
  




  

  


  
  // update lancada na tabela de notas
  // atualizar itens ou inserir no estoque geral
