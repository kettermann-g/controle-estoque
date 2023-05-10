<?php 
  require_once("../php/conexao.php");
  require_once("classes.php");
  require_once("NotaFiscalDAO.php");

  $notaDAO = new NotaFiscalDAO($conexao);


  $data = [
    "idNota" => 1,
    "numeroNota" => "001285",
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

  
  print_r($notaDAO->findProdutos(1)); echo "<br>";echo "<br>";

  echo "TESTE SALAVNDO OBJETOS EM ARRAY <br> <br>";

  $allNotas = $notaDAO->findAllNotas(1);


  echo "PRINT R ALL NOTAS <br>";
  print_r($allNotas);

  echo "<br> <br>";

  $notas = [];

  $c = 0;

  foreach($allNotas as $nota) {
    $notas[$c] = $notaDAO->buildNota($nota);
    $c++;
  }

  echo "PRINT R NOTAS (OBJETOS EM ARRAY) <br>";
  print_r($notas);

  echo "<br> <br>";

  foreach($notas as $nota) {
    echo "ID NOTA: " . $nota->id . "<br>";
    echo "ID USUARIO: " . $nota->id_usuario . "<br>";
    echo "NUMERO NOTA: " . $nota->numero . "<br><br>";
    echo "ITENS: <br>";
    foreach($nota->produtos as $produtos) {
      echo "| ID ITEM: " . $produtos['id_item'] . "| MARCA ITEM: ". $produtos['marca_item'] . "| DESCRIÇÃO ITEM: " .  $produtos['descricao_item'] . "| QUANTIDADE: " . $produtos['quantidade'] . "<br>";
    }
    echo "<br>";
  }


  echo "FIND NOTAS NAO LANCADAS <br> <br>";

  $notasDisponiveis = $notaDAO->findDisponiveis(1);

  echo "PRINT R NOTAS DISPONIVEIS <br>";
  print_r($notasDisponiveis);

  echo "<br> <br>";

  $listaNotas = [];

  $c = 0;

  foreach($notasDisponiveis as $nota) {
    $listaNotas[$c] = $notaDAO->buildNota($nota);
    $c++;
  }

  echo "PRINT R NOTAS (OBJETOS EM ARRAY) <br>";
  print_r($listaNotas);

  echo "<br> <br>";

  foreach($listaNotas as $nota) {
    echo "ID NOTA: " . $nota->id . "<br>";
    echo "ID USUARIO: " . $nota->id_usuario . "<br>";
    echo "NUMERO NOTA: " . $nota->numero . "<br><br>";
    echo "ITENS: <br>";
    foreach($nota->produtos as $produtos) {
      echo "| ID ITEM: " . $produtos['id_item'] . "| MARCA ITEM: ". $produtos['marca_item'] . "| DESCRIÇÃO ITEM: " .  $produtos['descricao_item'] . "| QUANTIDADE: " . $produtos['quantidade'] . "<br>";
    }
    echo "<br>";
  }