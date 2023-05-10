<?php


// OBJETOS DE USUÁRIO 
class Usuario {
    public $id;
    public $username;
    public $nome;
    public $email;
    public $senha;
    public $cnpj;

}

interface UserDAOInterface {
    public function buildUser($data);
    public function create(Usuario $user, $auth = false);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findUserLogin($id, $username);

}

// OBJETOS DE ESTOQUE

class Produto {
  public $id;
  public $marca;
  public $descricao;
  public $medida; 
  public $quantidade;
  public $qntMOV;
}

interface ProdutoDAOInterface {
  public function buildProduto($data);
  public function findAll($userId);
  public function findFluxo($userId);
}

//OBJETOS NOTA FISCAL

class NotaFiscal {
  public $id;
  public $numero;
  public $lancada;
  public $id_usuario;
  public $produtos;
}

interface NotaFiscalDAOInterface {
  public function findAllNotas($userId);
  public function findProdutos($idNotaFiscal);
  public function buildNota($data);
  public function movimentar($tipoMOV, $idNota);
  public function findNotaByNumero($numeroNota);
  public function findNotaById($idNota);
  public function findDisponiveis($userId);
  public function lancarNota($idNota);
}