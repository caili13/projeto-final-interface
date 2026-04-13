<?php
header('Content-Type: application/json; charset=utf-8');
include "backend/config.php";

try {
    echo json_encode([
        "conexao" => "OK",
        "banco" => "senai_solicitacoes",
        "status" => "Conectado"
    ]);
    
    $result = $conn->query("SELECT COUNT(*) as total FROM slots");
    $row = $result->fetch_assoc();
    
    $slots = $conn->query("SELECT id, data, horario, capacidade FROM slots LIMIT 5");
    $slotsList = [];
    while ($s = $slots->fetch_assoc()) {
        $slotsList[] = $s;
    }
    
    echo json_encode([
        "conexao" => "OK",
        "totalSlots" => (int)$row['total'],
        "slots" => $slotsList
    ]);
} catch (Exception $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
