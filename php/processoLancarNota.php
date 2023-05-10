<?php
  include_once("conexao.php");
  include_once("../dao/NotaFiscalDAO.php");

  $notaFiscalDAO = new NotaFiscalDAO($conexao);
  $userDAO = new UserDAO($conexao);

  $numeroNota = filter_input(INPUT_POST, "numeroNota");
    // pega a nota recebida


    // find nota by id
    
    //$nota = $this->findNotaById($idNota);

    

    // builda nota


    // pra cada item, insert na tabela movimentacao com id da nota no objeto
    // update lancada na tabela de notas
    // atualizar itens ou inserir no estoque geral
