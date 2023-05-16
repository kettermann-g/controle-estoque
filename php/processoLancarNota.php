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
  $origemDestino = filter_input(INPUT_POST, "origem");




  $findNota = $notaFiscalDAO->findNotaByNumero($numeroNota, true);


  // builda nota
  
  if($findNota) {
    $nota = $notaFiscalDAO->buildNota($findNota);

    // pra cada item, insert na tabela movimentacao com id da nota no objeto

    // update lancada na tabela de notas
    // atualizar itens ou inserir no estoque geral


    foreach($nota->produtos as $produto) {
      $produtoExiste = $notaFiscalDAO->checarEstoque($produto['marca_item'], $produto['descricao_item']);
      
      $notaFiscalDAO->movimentarProduto($nota->tipoMOV, $produto, $produtoExiste, $user->id);

      $notaFiscalDAO->lancarProduto($nota->tipoMOV, $produto, $user->id, $nota->id, $origemDestino);
    }

    



  } else {
    echo "NAO!!!! >:(";
  }