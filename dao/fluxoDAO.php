<?php

  include_once("classes.php");

  class FluxoDAO implements FluxoDAOInterface {
    private $conn;

    public function __construct(PDO $conn) {
      $this->conn = $conn;
    }

    public function buildProduto($data) {
      
    }

    public function movimentar($tipoMOV) {

    }

    public function findAll($userId) {
      $stmt = $this->conn->prepare("SELECT idMovimento, estoque_idProduto, tipoMovimento,  quantidade, dataMovimento, id_usuario FROM movimentacao
        INNER JOIN medidas ON estoque.id_medida = medidas.id_medida
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