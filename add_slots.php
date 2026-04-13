<?php
$conn = new mysqli('localhost', 'root', '', 'senai_solicitacoes', 3307);
if ($conn->connect_error) {
    die('Erro: ' . $conn->connect_error);
}

$dates = ['2026-04-11', '2026-04-12', '2026-04-13', '2026-04-14', '2026-04-15'];
$times = ['08:00:00', '10:00:00', '14:00:00', '16:00:00'];

foreach ($dates as $date) {
    foreach ($times as $time) {
        $conn->query("INSERT INTO slots (data, horario, capacidade) VALUES ('$date', '$time', 5)");
    }
}

echo "Slots adicionados com sucesso!\n";

// Listar todos os slots
$result = $conn->query("SELECT * FROM slots ORDER BY data, horario");
echo "\nSlots cadastrados:\n";
while ($row = $result->fetch_assoc()) {
    echo $row['data'] . ' ' . $row['horario'] . ' (Capacidade: ' . $row['capacidade'] . ")\n";
}
?>
