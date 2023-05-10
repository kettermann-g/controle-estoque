<?php
  require_once("../php/conexao.php");
  require_once("classes.php");
  require_once("NotaFiscalDAO.php");

  $notaDAO = new NotaFiscalDAO($conexao);

  $conexao->query("INSERT INTO estoque (id_usuario, marca, descricao, medida, quantidade)
  VALUES (1, 'Razer', 'Headset Kraken Verde', 'Unitário', '10')
  ON DUPLICATE KEY UPDATE quantidade = quantidade + 10");


