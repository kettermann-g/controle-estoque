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
      $stmt = $this->conn->prepare("SELECT idMovimento, marca_item_mov, descricao_item_mov, quantidade_mov, medida_mov, origem_destino, notafiscal.numeroNota as numeroNota, IF(tipoMovimento=1, 'Entrada', 'Saída') as tipoMov, DATE_FORMAT(dataMovimento,'%d/%m/%Y %H:%i') as dataMov, usuario.username as username, id_usuario FROM movimentacao
      inner join notafiscal on notafiscal.idNota = movimentacao.id_notaFiscal
      inner join usuario on usuario.id = movimentacao.id_usuario order by idMovimento desc");

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }

    public function findFluxoByUser($username, $userId) {
      $stmt = $this->conn->prepare("SELECT idMovimento, marca_item_mov, descricao_item_mov, quantidade_mov, medida_mov, origem_destino, notafiscal.numeroNota as numeroNota, IF(tipoMovimento=1, 'Entrada', 'Saída') as tipoMov, DATE_FORMAT(dataMovimento,'%d/%m/%Y %H:%i') as dataMov, usuario.username as username, id_usuario
      FROM movimentacao
        inner join notafiscal on notafiscal.idNota = movimentacao.id_notaFiscal
        inner join usuario on usuario.id = movimentacao.id_usuario 
          WHERE username = :username AND id_usuario = :userId
            order by idMovimento desc
          ");

      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":userId", $userId);

      $stmt->execute();

      $listaProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($listaProdutos) {
        return $listaProdutos;
      } else {
        return false;
      }
    }
  }