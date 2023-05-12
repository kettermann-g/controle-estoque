<?php
//MOVIMENTAR PRODUTO LINHA 71
//MOVIMENTAR NOTA ULTIMA FUNCAO

  include_once("classes.php");

class NotaFiscalDAO implements NotaFiscalDAOInterface {

  private $conn;

  public function __construct(PDO $conn) {
    $this->conn = $conn;
  }

  public function findAllNotas() {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal");

    $stmt->execute();

    if($notas = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $notas;
    } else {
      return false;
    }

  }

  public function findNotasDisponiveis() {
    $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE lancada = 0");

    $stmt->execute();

    if($notas = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
      return $notas;
    } else {
      return false;
    }

  }
  

  public function findProdutos($idNotaFiscal) {

    $stmt = $this->conn->prepare("SELECT id_item, marca_item, descricao_item, quantidade, medida FROM itens_nota WHERE id_nota = :id");

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

  public function movimentarProduto($tipoMOV, $data, bool $existe, $userId) {
    $marca = $data['marca_item'];
    $descricao = $data['descricao_item'];
    
    //recebe tipo de movimentaçao (saida, entrada)
    //declara querys

    //TERMINAR QUERY
    if($tipoMOV === "Entrada" && !$existe) {
      $qnt = $data['quantidade'];
      $medida = $data['medida'];

      $stmt = $this->conn->prepare("INSERT INTO estoque (marca, descricao, medida, quantidade) VALUES (:marca, :descricao, :medida, :quantidade)");

      $stmt->bindParam(":marca", $marca);
      $stmt->bindParam(":descricao", $descricao);
      $stmt->bindParam(":medida", $medida);
      $stmt->bindParam(":quantidade", $qnt);

      $stmt->execute();


    } else if($tipoMOV === "Entrada" && $existe) {
      
      //ATUALIZANDO ESTOQUE
      //AUMENTANDO QUANTIDADE NO ESTOQUE
      $res = $this->buscarQuantidade($marca, $descricao);

      $qnt = $res['quantidade'];
      $idProduto = $res['idProduto'];
      

      $novaQnt = $qnt + $data['quantidade'];

      $stmtAumentaQuantidade = $this->conn->prepare("UPDATE estoque SET quantidade = :quantidade WHERE marca = :marca AND descricao = :descricao AND idProduto = :idProduto");

      $stmtAumentaQuantidade->bindParam(":quantidade", $novaQnt);
      $stmtAumentaQuantidade->bindParam(":marca", $marca);
      $stmtAumentaQuantidade->bindParam(":descricao", $descricao);
      $stmtAumentaQuantidade->bindParam(":idProduto", $idProduto);

      $stmtAumentaQuantidade->execute();


    } else if ($tipoMOV === "Saída" && $existe) {
      // BUSCANDO QUANTIDADE
      $res = $this->buscarQuantidade($marca, $descricao);

      $qnt = $res['quantidade'];
      $idProduto = $res['idProduto'];

      $novaQnt = $qnt - $data['quantidade'];

      $stmtDiminuiQuantidade = $this->conn->prepare("UPDATE estoque SET quantidade = :quantidade WHERE marca = :marca AND descricao = :descricao AND idProduto = :idProduto");

      $stmtDiminuiQuantidade->bindParam(":quantidade", $novaQnt);
      $stmtDiminuiQuantidade->bindParam(":marca", $marca);
      $stmtDiminuiQuantidade->bindParam(":descricao", $descricao);
      $stmtDiminuiQuantidade->bindParam(":idProduto", $idProduto);

      $stmtDiminuiQuantidade->execute();


    }
    //se resulatdo final for negativo ou se o produto nao existir no estoque aí só deus sabe o que acontece

  }

  public function lancarNota($idNota, $tipoMOV, $userId, $numeroNota) {
    $stmt = $this->conn->prepare("INSERT INTO movimentacao (id_notaFiscal, tipoMovimento, dataMovimento, id_usuario) VALUES (:id_notaFiscal, :tipoMovimento, :dataMovimento, :id_usuario)");

    $dataMovimento = date("Y-m-d");

    $stmt->bindParam(":id_notaFiscal", $idNota);
    $stmt->bindParam(":tipoMovimento", $tipoMOV);
    $stmt->bindParam(":dataMovimento", $dataMovimento);
    $stmt->bindParam(":id_usuario", $userId);

    $stmt->execute();

    $stmtUpdate = $this->conn->prepare("UPDATE notafiscal SET lancada = 1 WHERE idNota = :idNota AND numeroNota = :numeroNota AND id_usuario = :id_usuario");

    $stmtUpdate->bindParam(":idNota", $idNota);
    $stmtUpdate->bindParam(":numeroNota", $numeroNota);
    $stmtUpdate->bindParam(":id_usuario", $userId);

    $stmtUpdate->execute();
  }

  public function findNotaByNumero($numeroNota, $disponivel = false) {
    if (!$disponivel) {
      $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE numeroNota = :numeroNota limit 1");
    } else if ($disponivel) {
      $stmt = $this->conn->prepare("SELECT * FROM notafiscal WHERE numeroNota = :numeroNota AND lancada = 0 limit 1");
    }
   
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

  public function checarEstoque($marca, $descricao) {
    $stmt= $this->conn->prepare("SELECT * FROM estoque WHERE marca = :marca AND descricao = :descricao limit 1");

    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":descricao", $descricao);

    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
      return true;
    } else {
      return false;
    }
  }

  public function buscarQuantidade($marca, $descricao) {
    $stmt = $this->conn->prepare("SELECT idProduto, quantidade FROM estoque WHERE marca = :marca AND descricao = :descricao limit 1");

    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":descricao", $descricao);

    $stmt->execute();

    $res = $stmt->fetch();

    if ($res) {
      return $res;
    } else {
      return false;
    }
  }
}