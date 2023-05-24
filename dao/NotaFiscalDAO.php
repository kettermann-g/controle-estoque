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
    $nota->tipoMOV = $data['tipoMov'];
    $nota->produtos = $this->findProdutos($nota->id);

    return $nota;

  }

  // funcao usada em foreach(array de produtos da nota fiscal)
  //
  // tipo mov: entrada / saida já determinado na nota fiscal que
  // vem do banco e guardado no objeto da nota
  //
  // data: array associativo contendo as inforamações do produto
  //
  // bool existe: utilizar funcao checar estoque para determinar
  // valor da variavel
  //
  // userId: propriedade id do objeto usuario da sessao
  public function movimentarProduto($tipoMOV, $data, bool $existe, $userId) {
    $marca = $data['marca_item'];
    $descricao = $data['descricao_item'];
    
    $ENTRADA = $tipoMOV === 1;
    $SAIDA  = $tipoMOV === 0;
    if($ENTRADA && !$existe) {
      $qnt = $data['quantidade'];
      $medida = $data['medida'];

      $stmt = $this->conn->prepare("INSERT INTO estoque (marca, descricao, medida, quantidade) VALUES (:marca, :descricao, :medida, :quantidade)");

      $stmt->bindParam(":marca", $marca);
      $stmt->bindParam(":descricao", $descricao);
      $stmt->bindParam(":medida", $medida);
      $stmt->bindParam(":quantidade", $qnt);

      $stmt->execute();


    } else if($ENTRADA && $existe) {
      
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


    } else if ($SAIDA && $existe) {
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

  public function lancarProduto($tipoMOV, $data, $userId, $idNota, $origemDestino) {
    $stmt = $this->conn->prepare("INSERT INTO movimentacao (marca_item_mov, descricao_item_mov, quantidade_mov, medida_mov, origem_destino, id_notaFiscal, tipoMovimento, dataMovimento, id_usuario) VALUES (:marca_item_mov, :descricao_item_mov, :quantidade_mov, :medida_mov, :origem_destino, :id_notaFiscal, :tipoMovimento, :dataMovimento, :id_usuario)");

    date_default_timezone_set('America/Sao_Paulo');

    $dataMovimento = date("Y-m-d H:i:s");

    $stmt->bindParam(":marca_item_mov", $data['marca_item']);
    $stmt->bindParam(":descricao_item_mov", $data['descricao_item']);
    $stmt->bindParam(":quantidade_mov", $data['quantidade']);
    $stmt->bindParam(":medida_mov", $data['medida']);
    $stmt->bindParam(":origem_destino", $origemDestino);
    $stmt->bindParam(":id_notaFiscal", $idNota);
    $stmt->bindParam(":tipoMovimento", $tipoMOV);
    $stmt->bindParam(":dataMovimento", $dataMovimento);
    $stmt->bindParam(":id_usuario", $userId);

    $stmt->execute();

    $stmtUpdate = $this->conn->prepare("UPDATE notafiscal SET lancada = 1 WHERE idNota = :idNota");

    $stmtUpdate->bindParam(":idNota", $idNota);

    $stmtUpdate->execute();

    header("Location: ../fluxoEstoque.php");
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