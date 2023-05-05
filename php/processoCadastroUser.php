<?php

include_once("conexao.php");
include_once("../dao/UserDAO.php");

$userDAO = new UserDAO($conexao);

$email = filter_input(INPUT_POST, "email");
$username = filter_input(INPUT_POST, "username");
$nome = filter_input(INPUT_POST, "nome");
$senha = filter_input(INPUT_POST, "senha");
$confirmarSenha = filter_input(INPUT_POST, "confirmar-senha");
$CNPJ = filter_input(INPUT_POST, "cnpj");

if($username && $nome && $senha && $CNPJ) {

  if ($senha === $confirmarSenha) {

    if($userDAO->findByEmail($email) === false) {
      
      $user = new Usuario();

      $user->username = $username;
      $user->email = $email;
      $user->nome = $nome;
      $user->senha = $senha;
      $user->cnpj = $CNPJ;

      $auth = true;

      $userDAO->create($user, $auth);

      
      

    }

  }

}