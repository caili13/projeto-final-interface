<?php
$conn = new mysqli('localhost', 'root', '', 'senai_solicitacoes', 3307);
if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$senha_hash = password_hash('admin123', PASSWORD_DEFAULT);
$conn->query("INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('Admin', 'admin@senai.com', '$senha_hash', 'admin')");

$senha_hash2 = password_hash('user123', PASSWORD_DEFAULT);
$conn->query("INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('Usuario', 'user@senai.com', '$senha_hash2', 'solicitante')");

echo 'Usuários criados com sucesso\n';
?>