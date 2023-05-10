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

  public function findDisponiveis($userId) {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE id_usuario = :id AND lancada = 0");

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

    $nota->id = $data['idNota'];
    $nota->numero = $data['numeroNota'];
    $nota->id_usuario = $data['id_usuario'];
    $nota->produtos = $this->findProdutos($nota->id);

    return $nota;

  }

  public function movimentar($tipoMOV, $idNota) {
    // pega a nota recebida
    // find nota by id

    //$nota = $this->findNotaById($idNota);

    

    // builda nota


    // pra cada item, insert na tabela movimentacao com id da nota no objeto
    // update lancada na tabela de notas
    // atualizar itens ou inserir no estoque geral
  }

  public function lancarNota($idNota) {
    $stmt = $this->conn->prepare("UPDATE notafiscal SET lancada = 1 WHERE idNota = :idNota");

    $stmt->bindParam(":idNota", $idNota);

    $stmt->execute();
  }

  public function findNotaByNumero($numeroNota) {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE numeroNota = :numeroNota limit 1");

    $stmt->bindParam(":numeroNota", $numeroNota);

    $stmt->execute();

    
    if($nota = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $nota;
    } else {
      return false;
    }


  }

  public function findNotaById($idNota) {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE idNota = :idNota limit 1");

    $stmt->bindParam(":idNota", $idNota);

    $stmt->execute();

    
    if($nota = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $nota;
    } else {
      return false;
    }

  }


}
