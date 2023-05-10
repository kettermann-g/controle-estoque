<?php

include_once("conexao.php");
include_once("../dao/UserDAO.php");

$userDAO = new UserDAO($conexao);

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");

if($userDAO->authenticateUser($email, $senha)) {
  header("Location: ../index.php");
} else {
  //header("location: ../login.php");
}