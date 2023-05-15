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

    public function findFluxo($userId) {
      $stmt = $this->conn->prepare("SELECT idMovimento, movimentacao.id_notaFiscal as IDprod, estoque.marca as marca, estoque.descricao as descricao, tipoMovimento, movimentacao.quantidade, DATE_FORMAT(dataMovimento,'%d/%m/%Y') AS dataFormatada, movimentacao.id_usuario FROM movimentacao
      inner join estoque on estoque.idProduto = movimentacao.estoque_idProduto
                WHERE movimentacao.id_usuario = :id");

      $stmt->bindParam(":id", $userId);

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }
  }