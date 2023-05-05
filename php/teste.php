<?php

include_once("../dao/UserDAO.php");
include_once("conexao.php");

$user = new UserDAO($conexao);

$data = [
  "username" => "joaosilva",
  "nome" => "Joao Silva",
  "email" => "joaosilva@gmail.com",
  "senha" => "joaosilva",
  "cnpj" => "XX.XX.XXX/0001-XX"
];

$senha = $data['senha'];
$email = $data['email'];
//$novoUsuario = $user->buildUser($data);
//$user->create($novoUsuario);
$user->authenticateUser($email, $senha);
