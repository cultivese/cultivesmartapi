<?php
$host = 'srv1783.hstgr.io';
$dbname = 'u746034674_cultive_smart';
$user = 'u746034674_administrador';
$password = '*C06v2188';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()]);
    exit;
}
    