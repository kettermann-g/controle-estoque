<?php

  include_once("classes.php");

  class ProdutoDAO implements ProdutoDAOInterface {
    private $conn;

    public function __construct(PDO $conn) {
      $this->conn = $conn;
    }

    public function buildProduto($data) {
      
    }

    public function movimentar($tipoMOV) {

    }

    public function findAll($userId) {
      $stmt = $this->conn->prepare("SELECT idMovimento, estoque_idProduto, tipoMovimento, quantidade, DATE_FORMAT(dataMovimento,'%d/%m/%Y') AS dataFormatada, id_usuario  FROM movimentacao
          WHERE id_usuario = :id_usuario");

      $stmt->bindParam(":id_usuario", $userId);

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll();

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }
  }