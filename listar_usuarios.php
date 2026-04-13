<?php
$conn = new mysqli('localhost', 'root', '', 'senai_solicitacoes', 3307);
if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$result = $conn->query('SELECT id, nome, email, tipo FROM usuarios');

echo "=== USUÁRIOS CADASTRADOS ===\n\n";
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . "\n";
    echo "Nome: " . $row['nome'] . "\n";
    echo "Email: " . $row['email'] . "\n";
    echo "Tipo: " . $row['tipo'] . "\n";
    echo "---\n";
}
?>
