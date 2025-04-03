<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "restaurante"; 

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
