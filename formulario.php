<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include "conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    $nome = $_GET["nome"];
    $nascimento = $_GET["nascimento"];
    $email = $_GET["email"];
    $telefone = $_GET["telefone"];
    $experiencia = $_GET["experiencia"];
    $descricao = $_GET["descricao"];

    $stmt = $conn->prepare("INSERT INTO candidatos (nome, nascimento, email, telefone, experiencia, descricao, curriculo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nome, $nascimento, $email, $telefone, $experiencia, $descricao, $caminhoCurriculo);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}
 else {
echo "Método de envio inválido!";
}


$conn->close();

?>
<a href="index.html"><button>VOLTAR</button></a>

</body>
</html>