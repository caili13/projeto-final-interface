<?php
$conn = new mysqli('localhost', 'root', '', 'senai_solicitacoes', 3307);
if ($conn->connect_error) {
    echo 'Erro de conexão: ' . $conn->connect_error . PHP_EOL;
    exit(1);
}
echo 'Conexão com banco OK' . PHP_EOL;

$result = $conn->query('SHOW TABLES');
$tables = [];
while ($row = $result->fetch_array()) {
    $tables[] = $row[0];
}
echo 'Tabelas encontradas: ' . implode(', ', $tables) . PHP_EOL;

if (in_array('usuarios', $tables)) {
    $result = $conn->query('SELECT COUNT(*) as total FROM usuarios');
    $row = $result->fetch_assoc();
    echo 'Usuários cadastrados: ' . $row['total'] . PHP_EOL;
}

if (in_array('solicitacoes', $tables)) {
    $result = $conn->query('SELECT COUNT(*) as total FROM solicitacoes');
    $row = $result->fetch_assoc();
    echo 'Solicitações cadastradas: ' . $row['total'] . PHP_EOL;
}

if (in_array('slots', $tables)) {
    $result = $conn->query('SELECT COUNT(*) as total FROM slots');
    $row = $result->fetch_assoc();
    echo 'Slots disponíveis: ' . $row['total'] . PHP_EOL;
}

if (in_array('agendamentos', $tables)) {
    $result = $conn->query('SELECT COUNT(*) as total FROM agendamentos');
    $row = $result->fetch_assoc();
    echo 'Agendamentos feitos: ' . $row['total'] . PHP_EOL;
}
?>