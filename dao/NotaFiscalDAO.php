<?php

  include_once("classes.php");

class NotaFiscalDAO implements NotaFiscalDAOInterface {

  private $conn;

  public function __construct(PDO $conn) {
    $this->conn = $conn;
  }

  public function findAllNotas($userId) {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE id_usuario = :id");

    $stmt->bindParam(":id", $userId);

    $stmt->execute();

    
    if($notas = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $notas;
    } else {
      return false;
    }

  }

  public function findProdutos($idNotaFiscal) {

    $stmt = $this->conn->prepare("SELECT id_item, marca_item, descricao_item, quantidade FROM itens_nota WHERE id_nota = :id");

    $stmt->bindParam(":id", $idNotaFiscal);

    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $produtos;
  }

  public function buildNota($data) {
    $nota = new NotaFiscal();

    $nota->id = $data['id'];
    $nota->numero = $data['numero'];
    $nota->id_usuario = $data['id_usuario'];
    $nota->produtos = $this->findProdutos($nota->id);

    return $nota;

  }

  public function movimentar($saida = false) {

  }

  public function findNotaByNumero($numeroNota) {

  }

  public function findNotaById($idNota) {

  }


}
