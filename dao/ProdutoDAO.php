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
      $stmt = $this->conn->prepare("SELECT idProduto, marca, descricao, medidas.nome_extenso as medida, quantidade FROM estoque
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