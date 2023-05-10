<?php
//MOVIMENTAR PRODUTO LINHA 71
//MOVIMENTAR NOTA ULTIMA FUNCAO

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

  public function findNotasDisponiveis($userId) {
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
    if($tipoMOV === "entrada" && !$existe) {
      $qnt = $data['quantidade'];
      $medida = $data['medida'];

      // $stmt = $this->conn->prepare("INSERT INTO movimentacao (estoque_idProduto, tipoMovimento, quantidade, dataMovimento, id_usuario) VALUES (:idProduto, :tipoMovimento, :quantidade, ");
      echo $data['marca_item'] . " - " . $data['descricao_item'] . " não existe no estoque :D talvez o código nao esteja funcionando <br>";
      

      echo "O tipo do movimentos é entrada e o produto não existe no estoque! o produto vai ser colocado por query INSERT <br><br>";

      echo "PRINT R INFORMAÇOES QUE CHEGAM NA FUNCAO MOVIMENTAR PELA VARIAVEL DATA <br>";
      print_r($data); echo "<br><br>";

      $stmt = $this->conn->prepare("INSERT INTO estoque (id_usuario, marca, descricao, medida, quantidade) VALUES (:id_usuario, :marca, :descricao, :medida, :quantidade)");

      $stmt->bindParam(":id_usuario", $userId);
      $stmt->bindParam(":marca", $marca);
      $stmt->bindParam(":descricao", $descricao);
      $stmt->bindParam(":medida", $medida);
      $stmt->bindParam(":quantidade", $qnt);

      $stmt->execute();


    } else if($tipoMOV === "entrada" && $existe) {
      
      

      echo "$marca - $descricao já existe no estoque :D código funcionando! <br>";
      echo "O tipo do movimentos é entrada e o produto existe no estoque! vai ter a quantidade atualizada por UPDATE<br><br>";

      echo "PRINT R INFORMAÇOES QUE CHEGAM NA FUNCAO MOVIMENTAR PELA VARIAVEL DATA <br>";
      print_r($data);echo "<br><br>";

      //ATUALIZANDO ESTOQUE
      $res = $this->buscarQuantidade($marca, $descricao);

      $qnt = $res['quantidade'];
      $idProduto = $res['idProduto'];

      echo "QUANTIDADE ESTOQUE: $qnt | ID PRODUTO $idProduto<br><br>";
      

      $novaQnt = $qnt + $data['quantidade'];

      echo "NOVA QUANTIDADE: $novaQnt <br><br>";

      $stmtUpdateQuantidade = $this->conn->prepare("UPDATE estoque SET quantidade = :quantidade WHERE marca = :marca AND descricao = :descricao AND idProduto = :idProduto AND id_usuario = :id_usuario");

      $stmtUpdateQuantidade->bindParam(":quantidade", $novaQnt);
      $stmtUpdateQuantidade->bindParam(":marca", $marca);
      $stmtUpdateQuantidade->bindParam(":descricao", $descricao);
      $stmtUpdateQuantidade->bindParam(":idProduto", $idProduto);
      $stmtUpdateQuantidade->bindParam(":id_usuario", $userId);

      $stmtUpdateQuantidade->execute();


    }

    echo "----------------<br><br>";
    //checa se ja existe (FOI FEITO FORA DA FUNÇÃO, aqui é utilizado só a boolean passada por fora da função nessa checagem)
    //na entrada, se nao existe, da insert
    //na entrada, se existe, select quantidade, adiciona, update
    //na saída, se nao existe, da erro
    //na saída, se existe, select quantidade, subtrai, update
    //se resulatdo final for negativo fodase nao é problema pra agora

  }

  public function lancarNota($idNota) {
    $stmt = $this->conn->prepare("UPDATE notafiscal SET lancada = 1 WHERE idNota = :idNota");

    $stmt->bindParam(":idNota", $idNota);

    $stmt->execute();
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

  public function movimentarNota($tipoMOV) {
    
  }
}
