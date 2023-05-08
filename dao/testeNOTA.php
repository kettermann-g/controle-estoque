<?php 
  require_once("../php/conexao.php");
  require_once("classes.php");
  require_once("NotaFiscalDAO.php");

  $notaDAO = new NotaFiscalDAO($conexao);


  $data = [
    "id" => 1,
    "numero" => "001285",
    "id_usuario" => 1
  ];

  $nota = $notaDAO->buildNota($data);

  print_r($nota); echo "<br>";echo "<br>";

  print_r($nota->produtos); echo "<br>";echo "<br>";
  print_r($nota->produtos[0]); echo "<br>";echo "<br>";
  print_r($nota->produtos[1]); echo "<br>";echo "<br>";

  foreach($nota->produtos[1] as $chave => $valor) {
    echo "$chave => $valor <br>";
  }

  echo "<br>";

  
  print_r($notaDAO->findProdutos(1)); echo "<br>";