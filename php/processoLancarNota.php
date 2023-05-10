<?php
  include_once("conexao.php");
  include_once("../dao/NotaFiscalDAO.php");

  $notaFiscalDAO = new NotaFiscalDAO($conexao);

  if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userDAO = new UserDAO($conexao);
    $user = $userDAO->findUserLogin($id, $username);

  }


  $numeroNota = filter_input(INPUT_POST, "numero-nota");

  echo $numeroNota;
    // pega a nota recebida


    // find nota by id
    
    //$nota = $this->findNotaById($idNota);

    

    // builda nota


    // pra cada item, insert na tabela movimentacao com id da nota no objeto
    // update lancada na tabela de notas
    // atualizar itens ou inserir no estoque geral
