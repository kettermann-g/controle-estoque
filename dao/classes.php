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
  public function movimentar($tipoMOV);
  public function findAll($userId);
  public function findFluxo($userId);
}