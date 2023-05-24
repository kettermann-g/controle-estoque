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
  public function findAll();
  public function findFluxo();
}

// OBJETOS NOTA FISCAL

class NotaFiscal {
  public $id;
  public $numero;
  public $lancada;
  public $tipoMOV;
  public $produtos;
}

interface NotaFiscalDAOInterface {
  public function findAllNotas();
  public function findProdutos($idNotaFiscal);
  public function buildNota($data);
  public function movimentarProduto($tipoMOV, $data, bool $existe, $userId);
  public function findNotaByNumero($numeroNota);
  public function findNotaById($idNota);
  public function findNotasDisponiveis();
  public function lancarProduto($tipoMOV, $data, $userId, $idNota, $origemDestino);
  public function checarEstoque($marca, $descricao);
  public function buscarQuantidade($marca, $descricao);

}