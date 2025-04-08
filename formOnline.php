<?php
$host = 'db.hvxexxjlrmqhdadepuwc.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = '@Thallis30129887';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = $_POST['nome'] ?? '';
    $nasc = $_POST['nascimento'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $SouN = $_POST['experiencia'] ?? '';
    $mensagem = $_POST['descricao'] ?? '';

    $sql = "INSERT INTO candidatos (nome, nascimento, email, telefone, experiencia, descricao, data_envio)
            VALUES (:nome, :nascimento, :email, :telefone, :experiencia, :descricao, now())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':nascimento' =>$nasc,
        ':email' => $email,
        ':telefone' => $telefone,
        ':experiencia' => $SouN,
        ':descricao' => $mensagem,
    ]);

    echo "Mensagem enviada com sucesso! 🎉";
} catch (PDOException $e) {
    echo "Erro ao enviar: " . $e->getMessage();
}
?>
