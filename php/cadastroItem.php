<?php
    $servername = '127.0.0.1:1360';
    $user = 'root';
    $psw = '';
    $dbName = 'projeto_integrador';

    $conn = mysqli_connect($servername, $user, $psw, $dbName);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }
?>

<?php
    $referencia = $_POST["referencia"];
    $produto = $_POST["produto"];
    $valor_unitario = $_POST["valor_unitario"];
    $descricao = $_POST["descricao"];


    $sql = "INSERT INTO cadastro (referencia, produto, valor_unitario, descricao) VALUES ('$referencia', '$produto', '$valor_unitario', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Informações cadastradas com sucesso.";
    } else {
        echo "Erro ao inserir informações." . $conn -> error;
    }

    header("Location: cadastroNew.html");
?>