<?php

//Iniciando a sessão
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

session_unset(); // Apagando todos os dados da sessão
session_destroy(); // Destruindo a sessão
header('location: ../index.php'); // redicionar página

?>