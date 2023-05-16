<?php

  include_once("classes.php");

  class ProdutoDAO implements ProdutoDAOInterface {
    private $conn;

    public function __construct(PDO $conn) {
      $this->conn = $conn;
    }

    public function buildProduto($data) {
      
    }

    public function findAll() {
      $stmt = $this->conn->prepare("SELECT idProduto, marca, descricao, medida, quantidade FROM estoque");

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }

    public function findFluxo() {
      $stmt = $this->conn->prepare("SELECT idMovimento, movimentacao.id_notaFiscal as IDprod, estoque.marca as marca, estoque.descricao as descricao, tipoMovimento, movimentacao.quantidade, DATE_FORMAT(dataMovimento,'%d/%m/%Y') AS dataFormatada, movimentacao.id_usuario FROM movimentacao");

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }
  }