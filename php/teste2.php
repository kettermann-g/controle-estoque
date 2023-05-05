<?php

include("conexao.php");

$stmt = $conexao->prepare("UPDATE usuario SET senha = :senha WHERE username = 'lucassantos'");

$stmt->bindParam("senha", password_hash("lucassantos", PASSWORD_DEFAULT));

$stmt->execute();

$stmt = $conexao->prepare("UPDATE usuario SET senha = :senha WHERE username = 'joaosilva'");

$stmt->bindParam("senha", password_hash("joaosilva", PASSWORD_DEFAULT));

$stmt->execute();
