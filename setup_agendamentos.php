<?php
$conn = new mysqli('localhost', 'root', '', 'senai_solicitacoes', 3307);

if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$alterTable = "ALTER TABLE agendamentos 
    MODIFY COLUMN status VARCHAR(50) NOT NULL DEFAULT 'Pendente'";

if ($conn->query($alterTable)) {
    echo 'Coluna status atualizada com sucesso<br>';
} else {
    echo 'Erro ao atualizar coluna: ' . $conn->error . '<br>';
}

$updateStatus = "UPDATE agendamentos SET status = 'Pendente' WHERE status IS NULL OR status = ''";
if ($conn->query($updateStatus)) {
    echo 'Agendamentos antigos atualizados<br>';
} else {
    echo 'Erro ao atualizar agendamentos: ' . $conn->error . '<br>';
}

echo 'Setup completado!';
$conn->close();
?>
